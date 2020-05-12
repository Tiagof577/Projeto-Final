<?php include('functions.php');
headers();

// Ligação a Base de Dados
include 'ligacao_bd.php';
?>

<!--========================================================================================================
                                        EDITAR MÃO OBRA
=========================================================================================================-->
<?php if(isset($_GET['id_mao_obra']) && $_GET['tipo'] == 'editar_mao_obra') { 
    $id_mao_obra = $_GET['id_mao_obra'];
    $sql = "SELECT * FROM mao_obra WHERE id_mao_obra = $id_mao_obra";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc()
?>
<div class="col-md-9">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Editar Mão de Obra</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
    <nav>
        <ol class="breadcrumb bg-dark">
          <li class="breadcrumb-item">
            <a href="dashboard.php" class="text-primary">Dashboard</a>
          </li>
          <li class="breadcrumb-item active text-white">Editar Mão de Obra</li>
        </ol>
      </nav>  
    </div>
  </div>
  <!-- Formulário para Editar Autor -->
  <div class="card border border-dark">
    <div class="card-header bg-primary" style="color:#FFF;"><strong>Formulário para Editar Mão de Obra:</strong></div>
    <div class="card-body">
      <form action="processa_editar.php" method="POST" name="editar_mao_obra>
        <div class="form-group">
        <label for="id_autor"><strong>ID Mão Obra:</strong></label>
        <input type="text" class="form-control" id="id_obra" name="id_obra" value="<?php echo $row['id_mao_obra']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="autor"><strong>Descrição Mão de Obra:</strong></label>
          <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $row['descricao']; ?>" autocomplete="off" maxlength="50">
        </div>

        <input type="submit" class="btn btn-primary"  name="editar_mao_obra" id="editar_mao_obra" value="Editar Mão Obra">
        <a href="mao_obra.php"><button type="button" class="btn btn-link">Cancelar</button></a>
      </form>
    </div>
  </div>
</div>    
<?php } ?>
<!--=====================================================================================================-->
<!--=====================================================================================================-->