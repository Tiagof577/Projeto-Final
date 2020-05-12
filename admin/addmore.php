<?php 

// Ligação a Base de Dados
include '../ligacao_bd.php';



if(!empty($_POST["name"])){


		foreach ($_POST["name"] as $key => $value) {
			$sql = "INSERT INTO registo_diario_equipamentos(quantidade) VALUES ('".$value."')";
			$mysqli->query($sql);
		}


		echo json_encode(['success'=>'Names Inserted successfully.']);
	}



?>