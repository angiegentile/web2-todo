<?php
require_once 'tasks.php';
require_once 'db.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']. dirname($_SERVER['PHP_SELF']).'/');


if(!empty($_GET['action'])){
    $action = $_GET['action'];
}
else{
    $action = 'home';
}

$parametros = explode('/', $action);


switch($parametros[0]){
    case 'home';
        showHome();
        break;

    default;
        echo('404 page not found'); 
} 

