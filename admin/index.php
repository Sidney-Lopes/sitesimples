<?php
session_start();
require_once('../config.php');
require_once('../conexaoDB.php');

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pagina = ltrim($url, "/");
$segments = explode('/', $pagina);

$segments['1'] = isset($segments['1']) ? $segments['1'] : "list-artigo";

if($_SESSION['conectado'] != 'TRUE'){
    require_once('login.php');
}
else{
    if(file_exists($segments['1'].".php")){
        require_once('content.php');
    }
    else{
        require_once('../404.php');
    }
}
?>

