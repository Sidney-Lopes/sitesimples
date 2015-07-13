<?php
$sql = "select * from conteudo";
$stmt = $con->prepare($sql);
$stmt->execute();
$artigos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Artigos</div>

  <!-- Table -->
   <table id="t01" class="table">
       <tr>
           <th>ID</th>
           <th>TITULO</th>
           <th>ALIAS</th>
           <th>USUÁRIO ID</th>
       </tr>

       <?php foreach($artigos as $artigo): ?>
       <tr>
          <td><?php echo $artigo['id']; ?></td>
          <td><a href="/admin/formcontent/<?php echo $artigo['id']; ?>" ><?php echo $artigo['titulo']; ?></a></td>
          <td><?php echo $artigo['alias']; ?></td>
          <td><?php echo $artigo['usuario_id']; ?></td>
       </tr>
       <?php endforeach; ?>

   </table>
</div>