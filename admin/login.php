<?php require_once('header.php');?>
<?php require_once('menu.php');?>

    <div class="container">

        <div class="starter-template">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Login - Area Administrativa</h3>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label for="inputUsuario" class="col-sm-2 control-label">Usuário</label>
                            <div class="col-sm-10">
                                <input type="text" name="usuario" class="form-control" id="inputUsuario" placeholder="Usuário">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
                            <div class="col-sm-10">
                                <input type="password" name="senha" class="form-control" id="inputSenha" placeholder="Senha">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Login</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="panel-footer">
                <?php if($_SESSION['conectado'] == 'FALSE'){echo "ERRO - Usuário e ou Senha Inválidos !";}?>
                </div>
            </div>
        </div>

    </div><!-- /.container -->

<?php require_once('footer.php');?>

<?php
$option = [
    'salt' => md5($_POST['usuario'])
];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT, $option);
$usuario = password_hash($_POST['usuario'], PASSWORD_DEFAULT, $option);

$sql = "select * from usuario where usuario = :usuario and senha = :senha";
$stmt = $con->prepare($sql);
$stmt->bindValue("usuario", $usuario);
$stmt->bindValue("senha", "$senha");
$stmt->execute();
$autenticado = $stmt->fetch(PDO::FETCH_ASSOC);

if(!empty($autenticado)){
    $_SESSION['conectado'] = 'TRUE';
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['id'] = $autenticado['id'];
    unset($_POST['senha']);
    unset($_POST['usuario']);
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='/admin/formcontent';
    </SCRIPT>");
}
else{
    $_SESSION['conectado'] = 'FALSE';
}
?>