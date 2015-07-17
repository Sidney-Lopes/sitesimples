<?php
// Variável com lorem ipsum só para ter conteudo
$lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas consectetur augue nec porta volutpat.
Mauris mollis ipsum vel elit fringilla, porta rutrum tortor tempus. Proin condimentum ultrices nunc sit amet mollis.
Morbi erat libero, blandit a augue eget, interdum gravida elit. Donec at placerat mauris.In pharetra nunc nec rhoncus
scelerisque. Sed eu orci ac ante dignissim elementum. Pellentesque accumsan ex metus,vitae vestibulum orci consequat
sit amet. Aliquam faucibus nibh et nisl ornare, quis condimentum lorem rutrum.Vestibulum non justo ac urna tristique
tempor. Mauris vel nisi purus.Nulla pharetra, nibh vel ultricies elementum, sem nulla accumsan metus, at pellentesque
lacus justo nec urna.Quisque vitae elit imperdiet, commodo velit at, facilisis ex. Sed lobortis justo non lobortis
mattis. Nulla velaugue sed augue laoreet consequat. Integer viverra, diam quis pellentesque convallis, massa odio
porttitor risus,ut commodo libero enim eget dolor. Proin at urna suscipit, vulputate enim non, mattis nisi. Aenean
finibus sapien metus.Aliquam consectetur, tellus ut dictum fringilla, tortor tortor aliquet nunc, sit amet tincidunt
libero dui id nulla.Aliquam non aliquet elit. Integer egestas egestas sapien nec rhoncus. Nulla a lobortis magna,
sed volutpat nunc.";

// o SALT vai ser o md5 do próprio usuário, assim,  cada usuário vai ter um salt diferente.
$option = [
    'salt' => md5('admin')
];
$senha = password_hash("12345", PASSWORD_DEFAULT, $option);
$usuario = password_hash("admin", PASSWORD_DEFAULT, $option);

/************************** CONEXÃO ***********************/
require_once("config.php");
$user = $DB['usuario'];
$password = $DB['senha'];
$dsn = "{$DB['stringDB']}:host={$DB['host']};charset=utf8";
$conexao = new \PDO($dsn, $user, $password);
/*********************************************************/

echo "========== - INICIANDO FIXTURE - ========== \n\n";

echo "=> DELETANDO BANCO DE DADOS {$DB['banco']} ...\n";
$conexao->exec("DROP SCHEMA IF EXISTS {$DB['banco']}");

echo "=> CRIANDO BANCO DE DADOS {$DB['banco']} ...\n";
$conexao->exec("CREATE SCHEMA {$DB['banco']}");

echo "=> SELECIONANDO BANCO DE DADOS {$DB['banco']} ...\n";
$conexao->exec("USE {$DB['banco']}");

echo "=> CRIANDO TABELA CONTEUDO ...\n";
$conexao->query("CREATE TABLE `conteudo`
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `corpo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias_UNIQUE` (`alias`)
);
");

echo "=> CRIANDO TABELA USUARIO ...\n";
$conexao->query("CREATE TABLE `usuario`
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

echo "=> INSERINDO DADOS DE TESTE ...\n\n";
$conexao->query("INSERT INTO `usuario` VALUES (1,'{$usuario}','{$senha}','admin','admin@exemplo.com',1);");

$conexao->query("INSERT INTO `conteudo` VALUES
(NULL,'Home','Texto do home {$lorem}','home','1'),
(NULL,'Empresa','Texto da empresa {$lorem}','empresa','1'),
(NULL,'Produtos','Texto do produto {$lorem}','produtos','1'),
(NULL,'Serviços','Texto do serviço {$lorem}','servicos','1');
");


echo "========== - FIXTURE TERMINADA ! - ======== \n";
?>