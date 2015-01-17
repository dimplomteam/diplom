<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 1:19
 */

function __autoload($class_name) {
    $map=array(
        "currentUser" => "classes/currentUser",
        "App" => "core/App",
        "baseModel" => "core/baseModel",
        "Comment" => "models/Comment",
        "Post" => "models/Post",
        "User" => "models/User",
    );

    require_once (PATH."protected/".$map[$class_name].".php");
}