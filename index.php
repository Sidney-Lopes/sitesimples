<!DOCTYPE html>
<html lang="en">
  <?php require_once('header.php');?>

  <body>

	<?php require_once('menu.php');?>

    <div class="container">

	<div class="starter-template">
		<?php 
			// se o arquivo não existir, será direcionado para Home
			$p = ( isset($_GET['p']) && file_exists($_GET['p']) ) ? $_GET['p'] : "home.php"; 
			require_once($p);
		?>
    </div>

    </div><!-- /.container -->

	<?php require_once('footer.php');?>
  </body>
</html>