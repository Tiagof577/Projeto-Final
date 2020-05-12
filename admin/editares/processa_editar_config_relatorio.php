<?php
// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<!--========================================================================================================
                                EDITAR CONFIG RELATÓRIO
=========================================================================================================-->
<?php 
        $id_obra = $_POST['id_obra'];
        $m_equipamentos = $_POST['m_equipamentos'];
        $m_horario_trabalho = $_POST['m_horario_trabalho'];

        $sql = "UPDATE obras_config_relatorio SET m_equipamentos = '$m_equipamentos', m_horario_trabalho = '$m_horario_trabalho'  WHERE id_obra=$id_obra";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../ver_obra.php?id_obra=".$id_obra);
        } else {
            echo "Erro! Registo não foi inserido. " . $conn->error;
        }
        $conn->close();
    
?>
