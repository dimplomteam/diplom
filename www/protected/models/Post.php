<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 17.01.2015
 * Time: 19:21
 */

class Post extends baseModel{

    public $_categoriesList=array("non-sorted" => "n_sorted", "cat1" => "category1");

    public function foreignFields(){
//        var_dump($this->id);exit;
        if(!$this->isLoaded()) return array();
        return array(
            "comments" => array("from" => $this->get("id"),
                "model" => "Comment",
                "field" => "post_id",
                "multi" => true),
            "user" => array("from" => $this->get("user_id"),
                "model" => "User",
                "field" => "id",
                "multi" => false),
        );
    }

    public function __get($key){
        $res=parent::__get($key);
        if($key=="category"){
            return $this->_categoriesList[$res];
        }
        return $res;
    }

    public function save(){
        $this->title=htmlspecialchars($this->title);
        $this->content=viewHelper::BB(htmlspecialchars($this->content));
        $this->user_id=App::user()->id;
        return parent::save();
    }
}