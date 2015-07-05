<?php
require_once('conexaoDB.php');

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

echo "========== FIXTURE - TABELA CONTEUDO ========== \n";
echo "\n=> 'DROPANDO' TABELA ...\n";
$con->query("DROP TABLE IF EXISTS conteudo;");

echo "=> CRIANDO TABELA ...\n";
$con->query("CREATE TABLE `conteudo`
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `corpo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias_UNIQUE` (`alias`)
);
");

echo "=> INSERINDO DADOS DE TESTE ...\n";
$con->query("INSERT INTO `conteudo` VALUES
(NULL,'Home','Texto do home {$lorem}','home'),
(NULL,'Empresa','Texto da empresa {$lorem}','empresa'),
(NULL,'Produtos','Texto do produto {$lorem}','produtos'),
(NULL,'Serviços','Texto do serviço {$lorem}','servicos');
");

echo "\n========== FIXTURE TERMINADA ! ================ \n";
?>