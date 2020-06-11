<?php
	include 'dados.php';
	$con = mysqli_connect($db['host'],$db['usuario'],$db['senha']);		
	$erro = false;
	
	if($_POST){
		
		$mensagem = '';
		
		if($_POST['cliente'] == ''){
			$mensagem = 'Selecione o aluno.';
			$erro = true;
		}
		elseif($_POST['analise'] == ''){
			$mensagem = 'Preencha a analise';
			$erro = true;
		}
		elseif($_POST['cutanea'] == ''){
			$mensagem = 'Preencha os dados da cutânea.';
			$erro = true;
		}
		elseif($_POST['exame_ergometrico'] == ''){
			$mensagem = 'Preencha o exame ergomêtrico.';
			$erro = true;
		}
		elseif($_POST['data_avaliacao'] == ''){
			$mensagem = 'Preencha a data de avaliação.';
			$erro = true;
		}
		elseif($_FILES['foto']['tmp_name'] == ''){
			$mensagem = 'Faça o upload da foto.';
			$erro = true;
		}
		
		if($erro == false){
			
			if($con){
				$fk_id_usuario = mysqli_real_escape_string($con, $_POST['cliente']);
				$analise = mysqli_real_escape_string($con, $_POST['analise']);
				$cutanea = mysqli_real_escape_string($con, $_POST['cutanea']);
				$exame_ergometrico = mysqli_real_escape_string($con, $_POST['exame_ergometrico']);
				$data_avaliacao = mysqli_real_escape_string($con, $_POST['data_avaliacao']);

				mysqli_select_db($con,'gymfit');
				// Perform query
				$query = "INSERT INTO `avaliacao` 
							(`pk_id_avaliacao`, `fk_id_usuario`, `analise`, `cutanea`, `exame_ergometrico`, `data_avaliacao`) 
							VALUES 
							(NULL, '".$fk_id_usuario."', '".$analise."', '".$cutanea."', '".$exame_ergometrico."', '".$data_avaliacao."')";
				//echo $query;			
				if ($result = mysqli_query($con, $query)) {
						$id_inserido = mysqli_insert_id($con);
						$uploadfile = 'uploads/'.$id_inserido.'.jpg';
						
						if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile))
							header("Location: list_avaliacoes.php");
						else
							$mensagem = $msg['erro_upload'];
				}
				else
					$mensagem = $msg['erro_conexao'];
			}
			else
				$mensagem = $msg['erro_conexao'];
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
		msg = '<?php if($erro){ echo $mensagem; } ?>';
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
  <form action="cad_avaliacao.php" enctype="multipart/form-data" method="post" id="form">
  <p> <h1>GymFit - Cadastro de Avaliação</h1> </p>
  <p><a href="list_avaliacoes.php">avaliações</a></p>
  <label for="text-basic">cliente:</label>
  <select name="cliente" id="cliente">
	<option value="">Selecione um cliente</option>
	
<?php
	if($con){
		mysqli_select_db($con,'gymfit');
		// Perform query
		$query = "SELECT `pk_matricula`, `nome` FROM `cliente` ORDER BY `nome` ASC";
		$result = mysqli_query($con, $query); 
	
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo '<option value="'.$row['pk_matricula'].'" ';
			if(isset($_POST['cliente'])){
				if($_POST['cliente'] ==  $row['pk_matricula']){
					echo ' selected ';
				}				
			}	
			echo '">'.$row['nome'].'</option>';
		}	
	}
?>	
  </select>
  <label for="text-basic">análise:</label>
  <input type="text" name="analise" id="analise" value="<?=@$_POST['analise']?>">
  <label for="text-basic">cutânea:</label>
  <input type="text" name="cutanea" id="cutanea" value="<?=@$_POST['cutanea']?>">
  <label for="text-basic">exame ergomêtrico:</label>
  <input type="text" name="exame_ergometrico" id="exame_ergometrico" value="<?=@$_POST['exame_ergometrico']?>">
  <label for="text-basic">data de avaliacao:</label>
  <input type="text" name="data_avaliacao" id="data_avaliacao" value="<?=@$_POST['data_avaliacao']?>">
  <label for="text-basic">foto:</label>
  <input type="file" name="foto" accept="image/*">
  <p>&nbsp;</p>
  <a data-role="button" href="javascript:document.getElementById('form').submit();">Cadastrar</a>
  </form>
 </div>
 <!-- /content -->
</div>
<!--/pagina-1 -->
</body>
</html>