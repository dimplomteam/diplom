<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 17.01.2015
 * Time: 18:55
 */

class currentUser extends User {

    private $_isLogined=false;

    public function __construct(){
        session_start();
        if($this->_tryAuthSession()){
            return true;
        }
        if($this->_tryAuthPost()){
            return true;
        }

    }

    public function isLogined(){
        return $this->_isLogined;
    }


    private function _tryAuthSession(){
        if(!isset($_SESSION["currentUser"])){
            return false;
        }
        $this->load($_SESSION["currentUser"]);
        $this->_isLogined=true;
        return true;
    }

    private function _tryAuthPost(){
        $login=addslashes($_POST["login"]);
        $pass=addslashes($_POST["pass"]);
        if(!$this->loadByFields(array("login" => $login, "pass" => $pass))){
            return false;
        }

        $_SESSION["currentUser"]=$this->get();
        $this->_isLogined=true;
        return true;
    }




    public function logout(){
        $this->unload();
        $this->_isLogined=false;
        unset($_SESSION["currentUser"]);
    }

}