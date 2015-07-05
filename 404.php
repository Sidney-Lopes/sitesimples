<?php require_once('header.php');?>
<?php require_once('menu.php');?>

<div class="container">

    <div class="starter-template">
        <?php
        header('HTTP/1.0 404 Not Found');
        echo "<h1>404 Not Found</h1>";
        echo "A página que você tentou acessar não pode ser encontrada.";
        ?>
    </div>

</div><!-- /.container -->

<?php require_once('footer.php');?>