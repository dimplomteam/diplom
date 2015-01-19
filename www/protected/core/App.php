<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 1:22
 */

class App extends baseObject{
    private static $_db_settings=array(
        'DB_USER' => 'root',
        'DB_PASS' => '',
        'DB_NAME' => 'ya_diplom',
        'DB_CHARSET' => 'utf-8',
        'DB_HOST' => 'localhost',
    );

    private static $_db;
    private static $_user;
    private static $_controller;
    private static $_defaultController="post";

    public static function run(){
        self::_db_connect();
        self::_parse_uri();
        self::_user();
        self::_controller();

    }

    public static function db(){
        return self::$_db;
    }

    public static function user(){
        return self::$_user;
    }

    public static function redirect($address=""){
        $address= ($address) ? $address : "/";
        header("Location: ",$address);
        exit;
    }

    private static function _user(){
        self::$_user = new currentUser();
    }

    private static function _controller(){
        $request=explode("/",trim($_GET["r"],"/"));
        $controller=array_shift($request);
        $controller = ($controller) ? $controller : self::$_defaultController;
        $controller.="Controller";
        self::$_controller = new $controller($request);
    }

    private static function _db_connect(){
        self::$_db = new mysqli(self::$_db_settings['DB_HOST'],
            self::$_db_settings['DB_USER'],
            self::$_db_settings['DB_PASS'],
            self::$_db_settings['DB_NAME']);
    }

    private static function _parse_uri(){
        if(strpos($_SERVER["REQUEST_URI"],"?")!==false){
            $page_request=substr($_SERVER["REQUEST_URI"],strpos($_SERVER["REQUEST_URI"],"?")+1);
            if($page_request){
                $page_request=explode("&",$page_request);
                for($i=0;$i<count($page_request);$i++){
                    $item=explode("=",$page_request[$i]);
                    $_GET[$item[0]]=$item[1];
                }}}
    }
}