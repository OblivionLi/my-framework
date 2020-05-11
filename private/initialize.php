<?php

// start output buffering and sessions
ob_start();
session_start();

// retrict access variables
define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_PATH', dirname(PRIVATE_PATH));
define('PUBLIC_PATH', PROJECT_PATH . '/public');
define('SHARED_PATH', PRIVATE_PATH . '/includes');

// define the /public url root
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define('WWW_ROOT', $doc_root);

// require config/functions.php file 
// file containing functions that can be used everywhere in the project
require_once ('config/functions.php');

// find pathnames for all inside models/ files folder
foreach (glob('models/*.php') as $file) {
    require_once ('$file');
}

// create my_autoload function that loads all models classes
function my_autoload($class) {
    if (preg_match('/\A\w+\Z/', $class)) {
        include ('models/' . $class . '.php');
    }
}

// register my_autoload function
spl_autoload_register('my_autoload');

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();