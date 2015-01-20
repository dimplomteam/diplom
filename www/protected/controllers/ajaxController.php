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
        App::redirect($_SERVER["HTTP_REFERER"]);
    }

    public function loginAction(){
        if(App::user()->tryAuthPost()){
            App::redirect("/profile");
        }else{
            App::redirect("/login/fail");
        }
    }

}