<?php
	if($_GET){		
	
		include 'dados.php';
		$con = mysqli_connect($db['host'],$db['usuario'],$db['senha']);
		mysqli_select_db($con,'gymfit');

		if($con){	
			
			$pk_id_avaliacao = mysqli_real_escape_string($con, $_GET['id']);
			
			$query = "DELETE FROM `avaliacao` WHERE `pk_id_avaliacao` = $pk_id_avaliacao";
			$result = mysqli_query($con, $query); 
			header("Location: list_avaliacoes.php");
		}
	}
?>