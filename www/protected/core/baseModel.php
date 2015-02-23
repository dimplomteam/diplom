<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 20:02
 */

class baseModel {
    private $_fields=array();
    private $_primaryKey="id";
    private $_isLoaded=false;
    private $_defaultValues=array();
//    private $_linkableFields=array();
    private $_foreignLoadedModels=array();
    private $_multiLimits="0,10";
    private $_fullCount="0";
    private $_ordering="";

    public $_tableName;
//    public $_foreignFields=array();
//    public $_offset="0";
//    public $_limit="20";

    public function foreignFields(){
        return array();
    }

    public function getOrder(){
        return ($this->_ordering) ? $this->_ordering : $this->_primaryKey." ASC";
    }

    public function setOrder($order){
        $this->_ordering=$order;
    }

    public function tableName(){
        return ($this->_tableName) ? $this->_tableName : strtolower(get_class($this));
    }

    public function setLimits($offset,$limit){
        $limit= intval($limit) ? intval($limit) : 10;
        $this->_multiLimits=intval($offset).",".intval($limit);
    }

    public function setLimitsStr($limit_str){
        $this->_multiLimits=$limit_str;
    }

    public function __get($key){
        if(!$this->isLoaded()) return false;

        if(array_key_exists($key,$this->foreignFields())){
            return $this->getForeignLoadedModel($key);
        }

        if(isset($this->_fields[$key])){
            if($key=="created_time"){
                return date("d.m.Y H:i:s",strtotime($this->_fields[$key]));
            }
            return $this->_fields[$key];
        }
        if(isset($this->_defaultValues[$key])){
            return $this->_defaultValues[$key];
        }
        return null;


    }

    public function __set($key,$val){
        $this->_fields[$key]=$val;
    }

    public function save(){
        $fields=$this->_fields;
        if(isset($this->_fields["created_time"])){
            unset($fields["created_time"]);
        }

        if(isset($fields[$this->_primaryKey]) && $fields[$this->_primaryKey]){
            $id=$fields[$this->_primaryKey];
            unset($fields[$this->_primaryKey]);

            $pairs=array();
            foreach($fields as $key => $val){
                $pairs[]=addslashes($key)."='".addslashes($val)."'";
            }

            $sql="update ".$this->tableName()." set ".implode(", ",$pairs)." where ".$this->_primaryKey."=".$id;
            App::db()->query($sql);
        }else{
            $keys=array();
            $values=array();

            foreach($fields as $key => $val){
                $keys[]=addslashes($key);
                $values[]=addslashes($val);
            }
            $sql="insert into ".$this->tableName()." (".implode(", ",$keys).") values ('".implode("', '",$values)."')  ";
            App::db()->query($sql);
            $this->_fields[$this->_primaryKey]=App::db()->insert_id;
        }
        return $this->_fields[$this->_primaryKey];
    }

    private function getForeignLoadedModel($key){
        if(array_key_exists($key,$this->_foreignLoadedModels)){
            return $this->_foreignLoadedModels[$key];
        }
        $foreignFields=$this->foreignFields();
        $foreignFields=$foreignFields[$key];
        $model=$foreignFields["model"];
        $this->_foreignLoadedModels[$key] = new $model;

        $from=$foreignFields["from"];
        if($foreignFields["multi"]){
            $array2find=array($foreignFields["field"] => $from);
            $this->_foreignLoadedModels[$key]=$this->_foreignLoadedModels[$key]->loadByFields($array2find,true);
        }else{
            $this->_foreignLoadedModels[$key]->loadById($from);
        }
        return $this->_foreignLoadedModels[$key];
    }

    public function isLoaded(){
        return $this->_isLoaded;
    }

    public function loadById($id){
        $id=intval($id);
        if(!$id) return false;
        $sql="select * from ".$this->tableName()." where ".$this->_primaryKey."=".$id." limit 0,1";
        $res=App::db()->query($sql);
        if(!$res->num_rows) return false;
        $this->_fields=$res->fetch_assoc();
        return $this->_isLoaded=true;
    }

    public function loadByFields($arr,$is_multi=false){
//        if(!count($arr)) return false;
        $where_arr=array();
        foreach($arr as $key => $val) {
            $where_arr[] = "`".addslashes($key)."`" . " = " . "\"".addslashes($val)."\"";
        }
        $sql="select * from ".$this->tableName();
        if(count($where_arr)) {
            $sql .=" where " . implode(" and " , $where_arr);
        }
        $no_limit_sql=$sql;
        if(!$is_multi){
            $sql.=" limit 0,1";
        }else{
            $sql.= " ORDER BY ".$this->getOrder()." limit ".$this->_multiLimits;
        }
        $res=App::db()->query($sql);
        if((!$res->num_rows) && !$is_multi) return false;
        if(!$is_multi) {
            $this->_fields = $res->fetch_assoc();
            return $this->_isLoaded = true;
        }
        $items=array();
        while($item = $res->fetch_assoc()){
            $item_obj_name=get_class($this);
            $item_obj= new $item_obj_name;
            $item_obj->load($item);
            $items[]=$item_obj;
        }
        $res=App::db()->query("SELECT COUNT(*) FROM ( ".$no_limit_sql." )  AS subquery");
        $this->_fullCount=$res->fetch_row();
        $this->_fullCount=$this->_fullCount[0];
        return $items;
    }

    public function loadBySql($sql,$is_multi=false){
        if(!$is_multi){
            $sql.=" limit 0,1";
        }else{
            $sql.= " ORDER BY ".$this->getOrder()." limit ".$this->_multiLimits;
        }
        $res=App::db()->query($sql);
        if((!$res->num_rows) && !$is_multi) return false;
        if(!$is_multi) {
            $this->load($res->fetch_assoc());
            return $this->_isLoaded = true;
        }
        $items=array();
        while($item = $res->fetch_assoc()){
            $item_obj_name=get_class($this);
            $item_obj= new $item_obj_name;
            $item_obj->load($item);
            $items[]=$item_obj;
        }
        $res=App::db()->query("SELECT COUNT(*) FROM ( ".$sql." )  AS subquery");
        $this->_fullCount=$res->fetch_row();
        $this->_fullCount=$this->_fullCount[0];
        return $items;
    }

    public function load($arr){
        if(!count($arr)) return false;
        $this->_fields=$arr;
        return $this->_isLoaded=true;
    }

    public function get($param=null){
        if($param){
            return (isset($this->_fields[$param])) ? $this->_fields[$param] : null;
        }
        return $this->_fields;
    }

//    public function getTable(){
//        return $this->_tableName;
//    }

    public function delete(){
        if(!$this->isLoaded()){
            return false;
        }
        App::db()->query("DELETE FROM ".$this->tableName()."
        WHERE ".$this->_primaryKey." = '".$this->_fields[$this->_primaryKey]."'");
        return $this->unload();
    }

    public function unload(){
        $this->_fields=array();
        $this->_isLoaded=false;
        return true;
    }

    public function getFullCount(){
        return $this->_fullCount;
    }

}