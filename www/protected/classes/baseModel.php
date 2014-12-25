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
    private $_linkableFields=array();

    public $_tableName;
//    public $_offset="0";
//    public $_limit="20";

    public function __get($key){
        if(!$this->isLoaded()) return false;
        return (isset($this->_fields[$key]))
                ? $this->_fields[$key]
                : ( (isset($this->_defaultValues[$key])) ? $this->_defaultValues[$key] : null );
    }

    public function isLoaded(){
        return $this->_isLoaded;
    }

    public function loadById($id){
        $id=intval($id);
        if(!$id) return false;
        $sql="select * from ".$this->_tableName." where ".$this->_primaryKey."=".$id." limit 0,1";
        $res=App::db()->query($sql);
        if(!$res->num_rows) return false;
        $this->_fields=$res->fetch_assoc();
        return $this->_isLoaded=true;
    }

    public function loadByFields($arr){
        if(!count($arr)) return false;
        $where_arr=array();
        foreach($arr as $key => $val) {
            $where_arr[] = addslashes($key) . " = " . addslashes($val);
        }
        $sql="select * from ".$this->_tableName." where ".implode(" and ".$where_arr)." limit 0,1";
        $res=App::db()->query($sql);
        if(!$res->num_rows) return false;
        $this->_fields=$res->fetch_assoc();
        return $this->_isLoaded=true;
    }

    public function load($arr){
        if(!count($arr)) return false;
        $this->_fields=$arr;
        return $this->_isLoaded=true;
    }

    public function get(){
        return $this->_fields;
    }

}