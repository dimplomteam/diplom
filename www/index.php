<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 1:17
 */
ini_set("display_errors",true);
error_reporting(E_ALL);

define ('PATH', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
require_once(PATH."protected/includes/autoload.php");

App::run();