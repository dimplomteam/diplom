<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 1:19
 */

function __autoload($class_name) {
    require_once (PATH."protected/core/".$class_name.".php");
}