<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 20.01.15
 * Time: 12:03
 */

class loginController extends baseController {

    public function indexAction($request=array()){
        if(App::user()->isLogined()){
            App::redirect("/profile");
        }
        $this->render("login_index",array("login_error" => ""));
    }

    public function failAction($request=array()){
        $this->render("login_index",array("login_error" => "try something else"));
    }

    public function forgotAction($request=array()){
        $this->render("login_forgot",array());
    }

    public function registrationAction($request=array()){
        if(App::user()->isLogined()){
            App::redirect("/profile");
        }
        $this->render("login_registration",array("registration_error" => ""));
    }

    public function registration_failAction($request=array()){
        $this->render("login_registration",array("registration_error" => "try something else"));
    }

}