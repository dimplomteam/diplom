<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 17.01.2015
 * Time: 22:48
 */

class baseController {
    private $_defaultAction="index";

    public function __construct($request){
        $action=array_shift($request);
        $action = ($action) ? $action : $this->_defaultAction;
        $action.="Action";
        $this->$action($request);
    }

    public function indexAction($request){

    }

}