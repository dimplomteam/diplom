<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 1:37
 */

class User extends baseModel{
//    public $_tableName="user";

    public function foreignFields(){
        return array(
            "posts" => array("from" => $this->get("id"),
                "model" => "Post",
                "field" => "user_id",
                "multi" => true),
            "comments" => array("from" => $this->get("id"),
                "model" => "Comment",
                "field" => "user_id",
                "multi" => true),
        );
    }

    public function __get($key){
        if(($key=="image_src")&&(!$this->get($key))){
            return "/assets/img/noavatar.jpg";
        }

        return parent::__get($key);
    }

}