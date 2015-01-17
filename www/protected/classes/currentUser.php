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

    }

    public function isLogined(){
        return $this->_isLogined;
    }


    private function _tryAuthSession(){

    }

    private function _tryAuthPost(){

    }


    private function _tryAuth(){

    }

}