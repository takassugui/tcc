<!DOCTYPE html>
<html>
<head>
	<title>GymFit - Instrutores</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.js"></script>
	<script>
		function confirma_apagar(id){
			var resposta = confirm("Você realmente quer excluir esse registro?");
			
			if(resposta == true){
				window.location = "del_avaliacao.php?id="+id;
			}
		}
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
  <p><a href="cad_avaliacao.php">cadastrar avaliação</a></p>
<table class="ui-responsive table-stroke" id="table-column-toggle"  data-mode="columntoggle">
     <thead>
       <tr>
         <th data-priority="1">Cliente</th>
         <th data-priority="2">Data</th>
         <th data-priority="3">Exibir</th>
         <th data-priority="4">Excluir</th>
       </tr>
     </thead>
     <tbody>

<?php
	include 'dados.php';
		
	$con = mysqli_connect($db['host'],$db['usuario'],$db['senha']);		
	if($con){

		mysqli_select_db($con,'gymfit');
		// Perform query
		$query = "SELECT avaliacao.pk_id_avaliacao, cliente.nome, avaliacao.data_avaliacao FROM `avaliacao` LEFT JOIN `cliente` ON  cliente.pk_matricula = avaliacao.fk_id_usuario";
		$result = mysqli_query($con, $query); 
	
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			//print_r($row);
?>
	 
       <tr>
         <td><?=$row['nome']?></td>
         <td><?=$row['data_avaliacao']?></td>
         <td><a href="ver_avaliacao.php?id=<?=$row['pk_id_avaliacao']?>">exibir</a></td>
         <td><a href="javascript:confirma_apagar('<?=$row['pk_id_avaliacao']?>');">excluir</a></td>
       </tr>

<?php 
			}
	}

?>
	   
     </tbody>
   </table> </div>
 <!-- /content -->
</div>
<!--/pagina-1 -->

<div data-role="page" id="pagina-2">
 <div role="main" class="ui-content">
  <p>Conteúdo página 2.</p>
  <a data-role="button" data-inline="true" href="#pagina-1">Ir para página 1</a>
 </div>
 <!-- /content -->
</div>
<!-- /pagina-2 -->



</body>
</html>