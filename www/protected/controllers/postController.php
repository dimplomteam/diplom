<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 17.01.2015
 * Time: 22:49
 */

class postController extends baseController{

    public function indexAction($request=array()){
        $posts = new Post;
        $posts = $posts->loadByFields(array(),true);
        $this->render("post_line",array("title" =>"main page", "posts" => $posts));
    }

}