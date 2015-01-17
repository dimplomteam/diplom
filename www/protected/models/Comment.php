<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 17.01.2015
 * Time: 18:58
 */

class Comment extends baseModel{
    public $_tableName="comment";
    public $_foreignFields=array(
        "user" => array("from" => "user_id",
                        "model" => "User",
                        "field" => "id",
                        "multi" => false)
    );

}