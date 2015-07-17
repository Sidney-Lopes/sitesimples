<?php
if(isset($segments['2'])){
    $sql = "select * from conteudo where id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindValue("id", $segments['2']);
    $stmt->execute();
    $artigo = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

        <h1><?php echo (isset($artigo['id'])) ? "Editar Artigo <b><i>'{$artigo['titulo']}'</i></b>" : "Novo  Artigo"; ?></h1>
        <form method="post" action="" >
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">Titulo</span>
                <input name="titulo" value="<?php if(isset($artigo['titulo'])){echo $artigo['titulo'];}?>" type="text" class="form-control" placeholder="Titulo" aria-describedby="sizing-addon2">
            </div>

            <span class="input-group-addon" id="basic-addon4">Corpo</span>
            <textarea name="corpo" id="editor1" rows="10" cols="80">
            <?php if(isset($artigo['corpo'])){echo $artigo['corpo'];}?>
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>

            <button type="submit" id="bt-salvar" class="btn btn-default">Salvar</button>
        </form>


<?php
if(isset($_POST['titulo']) && isset($_POST['corpo'])) {
    $alias = strtolower(preg_replace("/[^a-zA-Z0-9-]/", "-", strtr(utf8_decode(trim($_POST['titulo'])),
        utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));

    if (isset($artigo['id'])) {
        $sql_salvar = "update conteudo set titulo = '{$_POST['titulo']}', corpo = '{$_POST['corpo']}', alias = '{$alias}', usuario_id = '{$_SESSION['id']}'
        where id = {$artigo['id']}";
    } else {
        $sql_salvar = "insert into conteudo (titulo, corpo, alias, usuario_id) VALUES ('{$_POST['titulo']}', '{$_POST['corpo']}', '{$alias}', '{$_SESSION['id']}')";
    }

    $stmt = $con->prepare($sql_salvar);
    $stmt->execute();

    echo $sql_salvar;
    unset($_POST['titulo']);
    unset($_POST['corpo']);
    unset($segments['2']);
    header("Location: /$alias");
}
?>
