<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 17.01.2015
 * Time: 22:48
 */

class baseController extends baseObject{
    public $_defaultAction="index";
    private $_defaultLayout="main";
    public $_layout="";

    public function __construct($request){
        $action=array_shift($request);
        $action = ($action) ? $action : $this->_defaultAction;
        $action.="Action";
        $this->$action($request);
    }

    public function render($tempName,$params=array()){
        $layout = ($this->_layout) ? $this->_layout : $this->_defaultLayout;
        $view = new baseView($layout,$tempName,$params);
    }

//    public function indexAction($request=array()){
//
//    }

}