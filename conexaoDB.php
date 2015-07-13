<?php
$dsn = "{$DB['stringDB']}:dbname={$DB['banco']};host={$DB['host']};charset=utf8";
$user = $DB['usuario'];
$password = $DB['senha'];

try{
    $con = new \PDO($dsn, $user, $password);
}
catch(\PDOException $e){
    die("Falha na conexão com o banco de dados <br />"
        ."código : ".$e->getCode()."<br />"
        ."Mensagem : ".$e->getMessage());
}
?>