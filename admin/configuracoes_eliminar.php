<?php 
// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<!--====================
# Indice - Eliminar:
========================
# 2. Funcionários
# 3. Mão de Obra
# 4. Equipamentos
# 5. Veículos
# 6. Tarefas
# 7. Ocorrências
=====================-->

<!--======================================================================
#########################  2. FUNCIONÁRIOS  ##########################
=======================================================================-->
<?php if(isset($_GET['id_funcionario']) && $_GET['eliminar'] == 'funcionario'){
        $id_funcionario = $_GET['id_funcionario'];

        $sql = "DELETE FROM funcionarios WHERE id_funcionario=$id_funcionario";

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost:90/projeto/admin/configuracoes.php?lista=funcionarios');
        } else {
            echo "Erro! Registo não foi eliminado. " . $conn->error;
        }
        $conn->close();
    }
?>

<!--======================================================================
#########################  3. MÃO DE OBRA  ##########################
=======================================================================-->
<?php if(isset($_GET['id_mao_obra']) && $_GET['eliminar'] == 'mao_obra'){
        $id_mao_obra = $_GET['id_mao_obra'];

        $sql = "DELETE FROM mao_obra WHERE id_mao_obra=$id_mao_obra";

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost:90/projeto/admin/configuracoes.php?lista=mao_obra');
        } else {
            echo "Erro! Registo não foi eliminado. " . $conn->error;
        }
        $conn->close();
    }
?>

<!--====== Categoria Mão de Obra =====-->
<?php if(isset($_GET['id_categoria_mao_obra']) && $_GET['eliminar'] == 'categoria_mao_obra'){
        $id_categoria_mao_obra = $_GET['id_categoria_mao_obra'];

        $sql = "DELETE FROM mao_obra_categorias WHERE id_categoria_mao_obra=$id_categoria_mao_obra";

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost:90/projeto/admin/configuracoes.php?lista=mao_obra');
        } else {
            echo "Erro! Registo não foi eliminado. " . $conn->error;
        }
        $conn->close();
    }
?>

<!--======================================================================
#########################  4. EQUIPAMENTOS  ##########################
=======================================================================-->
<?php if(isset($_GET['id_equipamento']) && $_GET['eliminar'] == 'equipamento'){
        $id_equipamento = $_GET['id_equipamento'];

        $sql = "DELETE FROM equipamentos WHERE id_equipamento=$id_equipamento";

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost:90/projeto/admin/configuracoes.php?lista=equipamentos');
        } else {
            echo "Erro! Registo não foi eliminado. " . $conn->error;
        }
        $conn->close();
    }
?>

<!--======================================================================
#########################  5. VEÍCULOS  ##########################
=======================================================================-->
<?php if(isset($_GET['id_veiculo']) && $_GET['eliminar'] == 'veiculo'){
        $id_veiculo = $_GET['id_veiculo'];

        $sql = "DELETE FROM veiculos WHERE id_veiculo=$id_veiculo";

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost:90/projeto/admin/configuracoes.php?lista=veiculos');
        } else {
            echo "Erro! Registo não foi eliminado. " . $conn->error;
        }
        $conn->close();
    }
?>

<!--======================================================================
#########################  6. TAREFAS  ##########################
=======================================================================-->
<?php if(isset($_GET['id_tarefa']) && $_GET['eliminar'] == 'tarefa'){
        $id_tarefa = $_GET['id_tarefa'];

        $sql = "DELETE FROM tarefas WHERE id_tarefa=$id_tarefa";

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost:90/projeto/admin/configuracoes.php?lista=tarefas');
        } else {
            echo "Erro! Registo não foi eliminado. " . $conn->error;
        }
        $conn->close();
    }
?>

<!--======================================================================
#########################  7. OCORRÊNCIAS  ##########################
=======================================================================-->
<?php if(isset($_GET['id_ocorrencia']) && $_GET['eliminar'] == 'ocorrencia'){
        $id_ocorrencia = $_GET['id_ocorrencia'];

        $sql = "DELETE FROM ocorrencias WHERE id_ocorrencia=$id_ocorrencia";

        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost:90/projeto/admin/configuracoes.php?lista=ocorrencias');
        } else {
            echo "Erro! Registo não foi eliminado. " . $conn->error;
        }
        $conn->close();
    }
?>
