<?php 
// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<!--========================================================================================================
                                    ELIMINAR OBRA
=========================================================================================================-->
<?php   

        $id_mao_obra = $_GET['id_mao_obra'];

        $sql = "DELETE FROM mao_obra WHERE id_mao_obra = $id_mao_obra";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../mao_obra.php');
        } else {
            echo "Erro! Registo não foi eliminado. " . $conn->error;
        }
        $conn->close();
?>

