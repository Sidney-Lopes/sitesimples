<?php
require_once('../config.php');
require_once('../conexaoDB.php');

echo "========== FIXTURE - TABELA USUÁRIO ========== \n\n";
echo "=> 'DROPANDO' TABELA ...\n";
$con->query("DROP TABLE IF EXISTS usuario;");

echo "=> CRIANDO TABELA ...\n";
$con->query("CREATE TABLE `usuario`
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL,

  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
);
");

$option = [
    'salt' => md5('admin')
];
$senha = password_hash("12345", PASSWORD_DEFAULT, $option);
$usuario = password_hash("admin", PASSWORD_DEFAULT, $option);

echo "=> INSERINDO USUÁRIO admin SENHA 12345 ...\n";
$con->query("INSERT INTO `usuario` VALUES (1,'{$usuario}','{$senha}','admin','admin@exemplo.com',1);");

echo "\n========== FIXTURE TERMINADA ! ================ \n";
?>