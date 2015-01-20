<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 20.01.15
 * Time: 12:03
 */

class loginController {

    public function indexAction($request=array()){
        $this->render("login_index",array());
    }

    public function failAction($request=array()){
        $this->render("login_fail",array());
    }

    public function forgotAction($request=array()){
        $this->render("login_forgot",array());
    }

}