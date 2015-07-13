    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Area Administrativa</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if($pagina == "home"): ?>class="active"<?php endif;?>><a href="/home">Home</a></li>
            <li <?php if($pagina == "formcontent"): ?>class="active"<?php endif;?>><a href="/admin/formcontent">Novo Artigo</a></li>
            <li <?php if($pagina == "list-artigo"): ?>class="active"<?php endif;?>><a href="/admin/list-artigo">Listar Artigos</a></li>
            <li <?php if($pagina == "logout"): ?>class="active"<?php endif;?>><a href="/admin/logout">Sair</a></li>
          </ul>
          <?php if(isset($_SESSION['usuario'])){
              echo "<p class='navbar-text'><b>Olá, {$_SESSION['usuario']}</b></p>";
          }
          ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>