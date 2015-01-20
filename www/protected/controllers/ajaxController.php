<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 19.01.2015
 * Time: 22:45
 */

class ajaxController extends baseController{

    public function logoutAction(){
        App::user()->logout();
        $_SERVER["HTTP_REFERER"] = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "/";
        App::redirect($_SERVER["HTTP_REFERER"]);
    }

    public function loginAction(){
        if(App::user()->tryAuthPost()){
            App::redirect("/profile");
        }else{
            App::redirect("/login/fail");
        }
    }

    public function post_createAction(){
        if(!App::user()->isLogined()){
            App::redirect("/login");
        }
        $post = new Post;
        $post->load(array("title" => $_POST["title"], "content" => $_POST["content"]));
        $id=$post->save();
        //var_dump($post);
        App::redirect("/post/view/".$id);
    }

    public function comment_addAction($request=array()){
        $post_id= (isset($request[0])) ? intval($request[0]) : 0;
        if((!App::user()->isLogined()) || (!$post_id)){
            App::redirect("/login");
        }
        $comment = new Comment;
        $comment->load(array("post_id" => $post_id, "content" => $_POST["content"]));
        $id=$comment->save();
        //var_dump($post);
        App::redirect("/post/view/".$post_id);
    }

}