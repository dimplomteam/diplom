<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 19.01.2015
 * Time: 23:49
 */

class baseObject {
    private $_params=array();

    public function __get($param){
        return (isset($this->_params[$param])) ? $this->_params[$param] : null;
    }

    public function __set($param,$val){
        return $this->_params[$param]=$val;
    }

    public function __setParams($arr=array()){
        $this->_params=$arr;
    }

    public function __call($name,array $params){
        echo get_called_class()."-&gt not found dynamic method $name";exit;
    }

    public static function __callStatic($name,array $params){
        echo get_called_class().":: not found static method $name";exit;
    }

}