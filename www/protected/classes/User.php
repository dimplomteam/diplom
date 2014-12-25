<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 1:37
 */

class User extends baseModel{
    public $table_name="user";
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

    private function _tryAuthCookies(){

    }

    private function _tryAuth(){

    }

}