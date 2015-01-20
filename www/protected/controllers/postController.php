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
        $posts->setLimits(0,10);
        $posts_arr = $posts->loadByFields(array(),true);
        $posts_count = $posts->getFullCount();
        $pagination = new paginationWidget("0","10",$posts_count,"/");
        $this->render("post_line",array("title" =>"main page", "posts" => $posts_arr, "pagination" => $pagination));
    }

}