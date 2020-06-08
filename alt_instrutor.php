<?php
	include 'dados.php';
	$con = mysqli_connect($db['host'],$db['usuario'],$db['senha']);
	mysqli_select_db($con,'gymfit');
	
	if($_POST){
		echo 'entrou';
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
			if($con){
				$nome = mysqli_real_escape_string($con, $_POST['nome']);
				$cpf = mysqli_real_escape_string($con, $_POST['cpf']);
				$rg = mysqli_real_escape_string($con, $_POST['rg']);
				$tipo_aula = mysqli_real_escape_string($con, $_POST['tipo_aula']);
				$pk_id_usuario = mysqli_real_escape_string($con, $_POST['pk_id_usuario']);

				// Perform query
				$query = "UPDATE `usuario` SET 
							`nome` = '".$nome."', 
							`tipo_aula` = '".$tipo_aula."', 
							`rg` = '".$rg."', 
							`cpf` = '".$cpf."' 
						WHERE `usuario`.`pk_id_usuario` = ".$pk_id_usuario." ;";
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
	if($_GET || $erro = true){		
		echo 'entrou';
		if($con){	
			if(!$erro)
				$pk_id_usuario = mysqli_real_escape_string($con, $_GET['id']);
			else
				$pk_id_usuario = mysqli_real_escape_string($con, $_POST['pk_id_usuario']);
			
			$query = "SELECT * FROM `usuario` WHERE `pk_id_usuario` = $pk_id_usuario";
			$result = mysqli_query($con, $query); 
		
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$nome = $row['nome'];
				$rg = $row['rg'];
				$cpf = $row['cpf'];
				$tipo_aula = $row['tipo_aula'];
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alteração de Instrutor</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.js"></script>
	<script>
		msg = '<?=@$msg?>';
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
<form action="alt_instrutor.php" method="post" id="form">
  <p> <h1>GymFit - Cadastro de Instrutor</h1> </p>
  <p><a href="list_instrutor.php">instrutores</a></p>
  <label for="text-basic">Nome:</label>
  <input type="text" name="nome" id="nome" value="<?=@$nome?>">
  <label for="text-basic">CPF:</label>
  <input type="text" name="cpf" id="cpf" value="<?=@$cpf?>">
  <label for="text-basic">RG:</label>
  <input type="text" name="rg" id="rg" value="<?=@$rg?>">
  <label for="text-basic">Tipo de Aula:</label>
  <input type="text" name="tipo_aula" id="tipo_aula" value="<?=@$tipo_aula?>">
  <p>&nbsp;</p>
  <a data-role="button" href="javascript:document.getElementById('form').submit();">Cadastrar</a>
	<input type="hidden" name="pk_id_usuario" id="pk_id_usuario" value="<?=@$pk_id_usuario?>">
	</form>
 </div>
 <!-- /content -->
</div>
<!--/pagina-1 -->
</body>
</html>