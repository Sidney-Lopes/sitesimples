<?php
require_once('config.php');
require_once('conexaoDB.php');

function v_pagina($pagina, $con){
    $sql = "select * from conteudo where alias = :pagina";
    $stmt = $con->prepare($sql);
    $stmt->bindValue("pagina", "$pagina");
    $stmt->execute();

    $conteudo = $stmt->fetch(PDO::FETCH_ASSOC);
    return $conteudo;
}

$pagina = ltrim($_SERVER['REQUEST_URI'], "/");
$pagina = (empty($pagina)) ? "home" : $pagina;
$conteudo = v_pagina($pagina, $con);

if(!empty($conteudo)){
    require_once('content.php');
}
elseif(file_exists($pagina.".php")){
    require_once('estatica.php');
}
else{
    require_once('404.php');
}
?>
