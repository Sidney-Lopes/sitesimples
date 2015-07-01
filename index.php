<?php
$rotas = [
    'home',
    'contato',
    'empresa',
    'produtos',
    'servicos'
];

function v_rota($path, $rotas){
    if(in_array($path, $rotas) && file_exists($path.".php")){
        return;
    }
    header('HTTP/1.0 404 Not Found');
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}

$path = ltrim($_SERVER['REQUEST_URI'], "/");
$path = (empty($path)) ? "home" : $path;
v_rota($path,$rotas);
$path .= ".php";
?>
<!DOCTYPE html>
<html lang="en">
  <?php require_once('header.php');?>

  <body>

	    <?php require_once('menu.php');?>

    <div class="container">

	<div class="starter-template">
		<?php require_once($path); ?>
    </div>

    </div><!-- /.container -->

	    <?php require_once('footer.php');?>
  </body>
</html>