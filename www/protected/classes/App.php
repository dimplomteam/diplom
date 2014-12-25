<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 1:22
 */

class App {
    private static $_db_settings=array(
        'DB_USER' => 'root',
        'DB_PASS' => '',
        'DB_NAME' => 'ya_diplom',
        'DB_CHARSET' => 'utf-8',
        'DB_HOST' => 'localhost',
    );

    private static $_db;
    private static $_user;

    public static function run(){

        self::_db_connect();
        self::_user();


    }

    public static function db(){
        return self::$_db;
    }

    public static function user(){
        return self::$_user;
    }

    protected static function _user(){
        self::$_user = new User();
    }

    private static function _db_connect(){
        self::$_db = new mysqli(self::$_db_settings['DB_HOST,'],
            self::$_db_settings['DB_USER'],
            self::$_db_settings['DB_PASS'],
            self::$_db_settings['DB_NAME']);
    }

}