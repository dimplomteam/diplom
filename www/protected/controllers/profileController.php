<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 19.01.2015
 * Time: 22:34
 */

class profileController extends baseController{
    private $_defaultAction="view";

    public function viewAction($request=array()){
        $called_username=(isset($request[0])) ? $request[0] : App::user()->login;

        if(!$called_username){
            App::redirect("/login");
        }
        $user = new User;
        $user->loadByFields(array("login"=>$called_username));
        if(!$user->isLoaded()){
            $this->render("404");
        }else{
            $this->render("profile_view",array("user" => $user));
        }


    }

    public function editAction($request=array()){
        if(!App::user()->isLogined()){
            App::redirect("/login");
        }
        $this->render("profile_edit",array("user" => App::user()));
    }

}