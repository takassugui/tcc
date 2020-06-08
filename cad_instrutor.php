<?php
	include 'dados.php';
	if($_POST){
		
		$msg = '';
		$erro = false;
		
		if($_POST['nome'] == ''){
			$msg = 'Preencha o nome.';
			$erro = true;
		}
		elseif($_POST['cpf'] == ''){
			$msg = 'Preencha o CPF.';
			$erro = true;
		}
		elseif($_POST['rg'] == ''){
			$msg = 'Preencha o RG.';
			$erro = true;
		}
		elseif($_POST['tipo_aula'] == ''){
			$msg = 'Preencha o tipo de aula.';
			$erro = true;
		}
		
		if($erro == false){
			$con = mysqli_connect($db['host'],$db['usuario'],$db['senha']);		
			if($con){
				$nome = mysqli_real_escape_string($con, $_POST['nome']);
				$cpf = mysqli_real_escape_string($con, $_POST['cpf']);
				$rg = mysqli_real_escape_string($con, $_POST['rg']);
				$tipo_aula = mysqli_real_escape_string($con, $_POST['tipo_aula']);

				mysqli_select_db($con,'gymfit');
				// Perform query
				$query = "INSERT INTO `usuario` 
							(`pk_id_usuario`, `nome`, `cpf`, `rg`, `tipo_aula`, `cargo`) 
							VALUES 
							(NULL, '".$nome."', '".$cpf."', '".$rg."', '".$tipo_aula."', 'instrutor')";
				echo $query;			
				if ($result = mysqli_query($con, $query)) {
						mysqli_free_result($result);
						header("Location: list_instrutor.php");
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
	<title>Cadastro de Instrutor</title>

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
<div data-role="page" id="pagina-1">
 <div role="main" class="ui-content">
  <form action="cad_instrutor.php" method="post" id="form">
  <p> <h1>GymFit - Cadastro de Instrutor</h1> </p>
  <p><a href="list_instrutor.php">instrutores</a></p>
  <label for="text-basic">Nome:</label>
  <input type="text" name="nome" id="nome" value="<?=@$_POST['nome']?>">
  <label for="text-basic">CPF:</label>
  <input type="text" name="cpf" id="cpf" value="<?=@$_POST['cpf']?>">
  <label for="text-basic">RG:</label>
  <input type="text" name="rg" id="rg" value="<?=@$_POST['rg']?>">
  <label for="text-basic">Tipo de Aula:</label>
  <input type="text" name="tipo_aula" id="tipo_aula" value="<?=@$_POST['tipo_aula']?>">
  <p>&nbsp;</p>
  <a data-role="button" href="javascript:document.getElementById('form').submit();">Cadastrar</a>
  </form>
 </div>
 <!-- /content -->
</div>
<!--/pagina-1 -->
</body>
</html>