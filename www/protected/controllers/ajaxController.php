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

    public function registrationAction(){
        if(App::user()->isLogined()){
            App::redirect("/profile");
        }
        $user=new User();
        $user->login=$_POST["login"];
        $user->pass=$_POST["pass"];
        $user->email=$_POST["email"];
        if($user->save()){
            App::user()->tryAuthPost();
            App::redirect("/profile");
        }
        App::redirect("/login/registration_fail");
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
        $comment->load(array("post_id" => $post_id, "content" => htmlspecialchars($_POST["content"])));
        $id=$comment->save();
        //var_dump($post);
        App::redirect("/post/view/".$post_id);
    }

    public function rankingAction(){
        $post_id=intval($_POST["postid"]);
        $rank=intval($_POST["rank"]);

        if((!App::user()->isLogined()) || (!$post_id)){
            return false;
        }

        $post = new Post();
        $post->loadById($post_id);
        if(!$post->isLoaded()){
            return false;
        }

        $ranking = new Ranking;
        $ranking->loadByFields(array("post_id" => $post_id, "user_id" => App::user()->id));
        $changing=$rank-$ranking->rank;
        $ranking->rank=$rank;
        $ranking->post_id=$post_id;
        $ranking->user_id=App::user()->id;
        $ranking->save();

        $rank=$post->rank+$changing;
        $post = new Post();
        $post->id=$post_id;
        $post->rank=$rank;
        $post->save();

    }

    public function img_uploadAction(){
        if($url=fileUploader::saveImage($_FILES['img'])){
            if (isset($_POST["iframe"])) {
                $idarea = $_POST["idarea"];
                echo 'OK
';
            }else {
                // use for drag&drop
                header("Content-type: text/javascript");
                echo '{"status":1,"msg":"OK","image_link":"' . $url . '","thumb_link":false}';
            }

        }else{
            echo "false"; exit;
        }

//        // доступные форматы
//        $validFormat = array('jpg', 'jpeg', 'gif', 'png');
//
//        // формат файла
//        $sourcePath = pathinfo($_FILES['img']['name']);
//        $extension = strtolower($sourcePath['extension']);
//
//        // проверка корректности формата
//        if(in_array($extension, $validFormat))
//        {
//            $imageName = 'img_' . time().'_'.rand(100,999).'.'. $extension;
//            $file = PATH."assets/upload/".$imageName;
//            $url= "/assets/upload/".$imageName;
//            move_uploaded_file( $_FILES['img']['tmp_name'], $file);
//
//            if (isset($_POST["iframe"])) {
//                $idarea = $_POST["idarea"];
//                echo 'OK
//';
//            }
//            else {
//                // use for drag&drop
//                header("Content-type: text/javascript");
//                echo '{"status":1,"msg":"OK","image_link":"' . $url . '","thumb_link":false}';
//            }
//        }
//        else
//        {
//            echo "false"; exit;
//        }
    }

    public function avatar_uploadAction(){
        if(!App::user()->isLogined()){
            App::redirect("/login");
        }

        $url=fileUploader::saveImage($_FILES['img']);

        App::redirect("/profile");
    }



}