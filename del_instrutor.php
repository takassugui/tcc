<?php
	if($_GET){		
	
		include 'dados.php';
		$con = mysqli_connect($db['host'],$db['usuario'],$db['senha']);
		mysqli_select_db($con,'gymfit');

		if($con){	
			
			$pk_id_usuario = mysqli_real_escape_string($con, $_GET['id']);
			
			$query = "DELETE FROM `usuario` WHERE `pk_id_usuario` = $pk_id_usuario";
			$result = mysqli_query($con, $query); 
			header("Location: list_instrutor.php");
		}
	}
?>