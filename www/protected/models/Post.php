<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 17.01.2015
 * Time: 19:21
 */

class Post extends baseModel{
    public $_tableName="post";
    public $_foreignFields=array(
        "comments" => array("from" => "id",
            "model" => "Comment",
            "field" => "post_id",
            "multi" => true),
        "user" => array("from" => "user_id",
            "model" => "User",
            "field" => "id",
            "multi" => false),
    );
}