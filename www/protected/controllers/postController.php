<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 17.01.2015
 * Time: 22:49
 */

class postController extends baseController{

    public function __call($action,$request=array()){
        $offset=(isset($_GET["offset"])) ? intval($_GET["offset"]) : 0;
        $limit=(isset($_GET["limit"])) ? intval($_GET["limit"]) : 5;
        $category= ($action=="indexAction") ? array() : array("category" => $action);

        $this->getPostsLine($category,$offset,$limit);
    }

    public function getPostsLine($category,$offset,$limit){
        $posts = new Post;
        $posts->setLimits($offset,$limit);
        $posts->setOrder("id DESC");
        $posts_arr = $posts->loadByFields($category,true);
        $posts_count = $posts->getFullCount();
        $pagination = new paginationWidget($offset,$limit,$posts_count,"/");
        $this->render("post_line",array("title" =>"main page", "posts" => $posts_arr, "pagination" => $pagination));
    }

    public function viewAction($request=array()){
        if(!isset($request[0]) || !intval($request[0])){
            $this->render("404");
        }
        $post_id=intval($request[0]);
        $post = new Post;
        $post->loadById($post_id);
        $this->render("post_view",array("post" => $post));
    }

    public function createAction($request=array()){
        if(!App::user()->isLogined()){
            App::redirect("/login");
        }

        $this->render("post_create");
    }

}