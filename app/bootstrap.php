<?php
//Load config
require_once 'config/config.php';

//Autoloader
function my_autoloader($class_name) {
    require_once('libraries/' . $class_name . '.php');
}

spl_autoload_register('my_autoloader');