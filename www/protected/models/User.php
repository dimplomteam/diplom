<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 1:37
 */

class User extends baseModel{
//    public $_tableName="user";
public $_messages=null;

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

    public function itsMe(){
        return ((App::user()->isLogined())&&(App::user()->id==$this->id));
    }

    public function getMessages(){
        if(!$this->isLoaded()){
            return array();
        }
        if($this->_messages!==null){
            return $this->_messages;
        }

        $my_id=App::user()->id;
        $sql="select * from message where ";
        if($this->itsMe()){

        }else{

        }

        $message=new Message;
        $message->setOrder("id DESC");
        $messages_list=$message->loadBySql($sql,true);
        return $this->_messages=$messages_list;
    }

}