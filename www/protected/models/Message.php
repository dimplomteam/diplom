<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 13.02.2015
 * Time: 0:59
 */

class Message extends baseModel{
    public function foreignFields(){
        return array(
            "to_user" => array("from" => $this->get("to_user_id"),
                "model" => "User",
                "field" => "id",
                "multi" => false),
            "from_user" => array("from" => $this->get("from_user_id"),
                "model" => "User",
                "field" => "id",
                "multi" => false),
        );
    }
}