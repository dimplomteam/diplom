<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 1:19
 */

function __autoload($class_name) {
//    var_dump($class_name);
    $map=array(
        "currentUser" => "classes/currentUser",

        "App" => "core/App",
        "baseModel" => "core/baseModel",
        "baseController" => "core/baseController",
        "baseView" => "core/baseView",
        "baseObject" => "core/baseObject",

        "Comment" => "models/Comment",
        "Post" => "models/Post",
        "User" => "models/User",
        "Ranking" => "models/Ranking",
        "Image" => "models/Image",

        "postController" => "controllers/postController",
        "profileController" => "controllers/profileController",
    );

    require_once (PATH."protected/".$map[$class_name].".php");
}