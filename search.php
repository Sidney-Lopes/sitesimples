<?php
if(empty($_POST['q'])){
    echo "<h3>Por favor digite o texto que deseja localizar.</h3>";
}
else{
    $sql = "select * from conteudo
    where corpo like :texto
    or titulo like :texto";

    $stmt = $con->prepare($sql);
    $stmt->bindValue("texto", "%{$_POST['q']}%");
    $stmt->execute();
    $conteudo = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>Localizar</h1>";
    echo "<h2>Texto Procurado => <i>'{$_POST['q']}'</i></h2>";
    if(!empty($conteudo)){
        foreach ($conteudo as $pagina){
           echo "<h3><a href=/{$pagina['alias']}>{$pagina['titulo']}</a></h3>";
           echo substr($pagina['corpo'], 0, 40) . " ...<br /><br />";
        }
    }
    else{
        echo "<h3>Nenhuma ocorrência encontrada ! </h3>";
    }
}
?>