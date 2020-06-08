<?php
	include 'dados.php';
	$msg = '';
	if($_POST){
		
		if($_POST['email'] == '' || $_POST['senha'] == ''){
			$msg = 'Preencha todos os campos';
		}
		else{
			$con = mysqli_connect($db['host'],$db['usuario'],$db['senha']);		
			if($con){
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$senha = mysqli_real_escape_string($con, $_POST['senha']);

				mysqli_select_db($con,'gymfit');
				// Perform query
				if ($result = mysqli_query($con, "SELECT * FROM usuario WHERE email = '".$email."' AND senha = '".$senha."'")) {
					if(mysqli_num_rows($result) > 0){
						header("Location: list_instrutor.php");
					}
					else{
						$msg = 'Login inválido.';
					}
					// Free result set
					mysqli_free_result($result);
				}
				else
					$msg = $msg['erro_conexao'];
			}
			else
				$msg = $msg['erro_conexao'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- HTML 4 -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- HTML5 -->
	<meta charset="utf-8"/>
	
	<title>Gym Fit - Entrar</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.js"></script>
	<script>
		msg = '<?=$msg?>';
		if(msg != '')
			alert(msg);
	</script>
	<style>
		IMG.displayed {
			display: block;
			margin-left: auto;
			margin-right: auto 
		}
	</style>
</head>
<body>

<form action="login.php" method="post" id="form">
<div data-role="page" id="pagina-1">
 <div role="main" class="ui-content">
  <p> <img class="displayed" src="img/logo.png"> </p>
  <p>&nbsp;</p>
  <label for="text-basic">E-mail:</label>
  <input type="text" name="email" id="email" value="">
  <label for="password">Senha:</label>
  <input type="password" name="senha" id="senha" value="" autocomplete="off">
  <p>&nbsp;</p>
  <a data-role="button" href="javascript:document.getElementById('form').submit();">Entrar</a>
 </div>
 <!-- /content -->
</div>
<!--/pagina-1 -->
</form>
</body>
</html>