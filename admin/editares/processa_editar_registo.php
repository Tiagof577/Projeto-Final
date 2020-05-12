<?php
// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<!--========================================================================================================
                                        EDITAR - 
=========================================================================================================-->
<?php 


if(isset($_REQUEST['inserir_equipamento_relatorio'])) {
    $id_registo = $_POST['id_registo'];
    $id_equipamento = $_POST['id_equipamento'];
        
    echo $id_registo;
    echo $id_equipamento;

    /*$sql = "INSERT INTO registo_diario_equipamentos(id_registo, id_equipamento)
           VALUES ('$id_registo', '$id_equipamento')";

    if ($conn->query($sql) === TRUE) {
        header("Location: editar_relatorio.php?id_registo=".$id_registo);
    } else {
        echo "Erro! Registo não foi inserido." . $conn->error;
    }
    $conn->close();*/
    }
?>