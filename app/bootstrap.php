<?php
//Load config
require_once 'config/config.php';
//Load Helpers Functions
require_once 'helpers/url_helper.php';

//Autoloader
function my_autoloader($class_name) {
    require_once('libraries/' . $class_name . '.php');
}

spl_autoload_register('my_autoloader');