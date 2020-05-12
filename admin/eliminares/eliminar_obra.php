<?php 
// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<!--========================================================================================================
                                    ELIMINAR OBRA
=========================================================================================================-->
<?php   

        $id_obra = $_GET['id_obra'];

        $sql = "DELETE FROM obras WHERE id_obra = $id_obra";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../obras.php');
        } else {
            echo "Erro! Registo não foi eliminado. " . $conn->error;
        }
        $conn->close();
?>

