<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 25.12.2014
 * Time: 1:17
 */

define ('PATH', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
require_once(PATH."protected/includes/autoload.php");

App::run();