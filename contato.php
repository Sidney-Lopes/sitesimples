<h1>Contato</h1>

<form id="form1" name="form1" method="post" action="">
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Nome : </span>
		<input name="nome" type="text" class="form-control" placeholder="seu nome" aria-describedby="basic-addon1">
	</div>
		
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon2">Email : </span>
		<input name="email" type="text" class="form-control" placeholder="seu email" aria-describedby="basic-addon2">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon3">Assunto : </span>
		<input name="assunto" type="text" class="form-control" placeholder="assunto" aria-describedby="basic-addon3">
	</div>

	<div class="input-group">
		<span class="input-group-addon" id="basic-addon4">Mensagem : </span>
		<textarea name="msg" type="text" class="form-control" placeholder="mensagem" aria-describedby="basic-addon4"></textarea>
	</div>
	
	<button type="submit" class="btn btn-default">Enviar</button>

</form>

<?php

if ( !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['assunto']) && !empty($_POST['msg']) ){
$sucesso = <<< EOT
	Dados enviados com sucesso, abaixo seguem os dados que você enviou : <br />
	Nome : {$_POST['nome']} <br />
	Email : {$_POST['email']} <br />
	Assunto : {$_POST['assunto']} <br />
	Mensagem : {$_POST['msg']} <br />
EOT;
	echo $sucesso;	
}

?>