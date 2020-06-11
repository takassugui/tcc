<?php
	include 'dados.php';
	$con = mysqli_connect($db['host'],$db['usuario'],$db['senha']);
	mysqli_select_db($con,'gymfit');
	
	if($_GET){		
		if($con){	
			
			$pk_id_avaliacao = mysqli_real_escape_string($con, $_GET['id']);
			
			$query = "SELECT avaliacao.*, cliente.nome FROM `avaliacao` LEFT JOIN `cliente` ON  cliente.pk_matricula = avaliacao.fk_id_usuario WHERE `pk_id_avaliacao` = $pk_id_avaliacao";
			$result = mysqli_query($con, $query); 
		
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$nome = $row['nome'];
				$analise = $row['analise'];
				$cutanea = $row['cutanea'];
				$exame_ergometrico = $row['exame_ergometrico'];
				$data_avaliacao = $row['data_avaliacao'];
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Avaliação</title>

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
  <p> <h1>GymFit - Avaliações</h1> </p>
  <p><a href="list_avaliacoes.php">avaliações</a></p>
  <label for="text-basic">Nome: <?=@$nome?></label>
  <label for="text-basic">Análise: <?=@$analise?></label> 
  <label for="text-basic">Cutânea: <?=@$cutanea?></label> 
  <label for="text-basic">Exame Ergonêtrico: <?=@$exame_ergometrico?></label> 
  <label for="text-basic">Data da avaliação: <?=@$data_avaliacao?></label> 
  <label for="text-basic">Imagem: </label> 
  <img src="uploads/<?=$_GET['id']?>.jpg" width="350" height="350">


 </div>
 <!-- /content -->
</div>
<!--/pagina-1 -->
</body>
</html>