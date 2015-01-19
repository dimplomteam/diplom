<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 19.01.2015
 * Time: 23:04
 */

class baseView extends baseObject{
    private $_viewName;

    public function __construct($layout,$tempName,$params=array()){
        $this->__setParams($params);
        $this->_viewName=$tempName;
        require_once(PATH."protected/layouts/".$layout.".php");
    }

    public function view(){
        require_once(PATH."protected/views/".$this->_viewName.".php");
    }

}