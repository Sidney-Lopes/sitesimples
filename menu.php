    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Projeto Macarrone</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if($pagina == "home"):    ?>class="active"<?php endif;?>><a href="home">Home</a></li>
            <li <?php if($pagina == "empresa"): ?>class="active"<?php endif;?>><a href="empresa">Empresa</a></li>
            <li <?php if($pagina == "produtos"):?>class="active"<?php endif;?>><a href="produtos">Produtos</a></li>
            <li <?php if($pagina == "servicos"):?>class="active"<?php endif;?>><a href="servicos">Serviços</a></li>
            <li <?php if($pagina == "contato"): ?>class="active"<?php endif;?>><a href="contato">Contato</a></li>
          </ul>

            <form method="post" class="navbar-form navbar-left" role="search" action="/search">
                <div class="form-group">
                    <input name="q" type="text" class="form-control" placeholder="Localizar">
                </div>
                <button type="submit" class="btn btn-default">Vai !</button>
            </form>



        </div><!--/.nav-collapse -->
      </div>
    </nav>