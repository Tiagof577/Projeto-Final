<?php include('../functions.php');
headers();

// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<!--=======================================================
                        BREADCRUMBS
========================================================-->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li class="breadcrumb-item">Configurações</li>
      <li class="breadcrumb-item active" aria-current="page">Dados da Empresa</li>
      <li class="breadcrumb-item active" aria-current="page">Editar Dados da Empresa</li>
    </ol>
  </nav>
</div>
<!--================= FIM - BREADCRUMBS ================-->

<!--========================================================================================================
                              FORMULÁRIO - EDITAR MÃO DE OBRA
=========================================================================================================-->
<?php 
    $sql = "SELECT * FROM dados_empresa WHERE id_empresa = 1";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc()
?>

<div class="container">
  <!-- ===== CARD =====-->
  <div class="card">
    <div class="card-header bg-primary">
      Editar Dados da Empresa
    </div>
  <div class="card-body">
      <form action="processa_editar_empresa.php" method="POST" name="editar_dados_empresa" enctype="multipart/form-data">
      
        <input type="hidden" class="form-control" id="id_empresa" name="id_empresa" value="<?php echo $row['id_empresa']; ?>">

        <div class="form-group">
          <label for="nome_empresa"><strong>Nome Empresa: <span style="color: #F00;"> * </span></strong></label>
          <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" value="<?php echo $row['nome_empresa']; ?>" autocomplete="off" maxlength="50">
        </div>

        <div class="form-group">
          <label for="morada_rua"><strong>Morada: <span style="color: #F00;"> * </span></strong></label>
          <input type="text" class="form-control" id="morada_rua" name="morada_rua" value="<?php echo $row['morada_rua']; ?>" autocomplete="off" maxlength="50">
        </div>

          <div class="form-row">
    <div class="col-md-4 mb-3">
    <label for="morada_cod_postal"><strong>Código-Postal: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="morada_cod_postal" name="morada_cod_postal" value="<?php echo $row['morada_cod_postal']; ?>" autocomplete="off" maxlength="50">
    </div>
    <div class="col-md-4 mb-3">
      <label for="morada"><strong>Localidade: <span style="color: #F00;"> * </span></strong></label>
       <input type="text" class="form-control" id="morada_localidade" name="morada_localidade" value="<?php echo $row['morada_localidade']; ?>" autocomplete="off" maxlength="50">
    </div>
  </div>

  



        <div class="form-group">
          <label for="telefone"><strong>Telefone: <span style="color: #F00;"> * </span></strong></label>
          <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>" autocomplete="off" maxlength="50">
        </div>

        <div class="form-group">
          <label for="email"><strong>Email: <span style="color: #F00;"> * </span></strong></label>
          <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" autocomplete="off" maxlength="50">
        </div>

        <div class="form-group">
          <label for="nif"><strong>NIF: <span style="color: #F00;"> * </span></strong></label>
          <input type="text" class="form-control" id="nif" name="nif" value="<?php echo $row['nif']; ?>" autocomplete="off" maxlength="50">
        </div>


        <!-- CAMPOS: Imagem -->
           <!-- CAMPOS: Imagem -->
          <div class="form-group">
              <label for="img_empresa"><strong>Alterar Imagem:</strong></label>
              <input type="file" class="form-control" id="img_empresa" name="img_empresa">
          </div>
          
          <hr>
          <img width="100" height="100" src="../<?php echo $row['url_imagem']; ?>">
          
          <br>
    
        <input type="submit" class="btn btn-dark"  name="editar_dados_empresa" id="editar_dados_empresa" value="Editar Dados">
        <a href="../empresa.php"><button type="button" class="btn btn-link">Cancelar</button></a>
      </form>
    </div>
  </div>
</div>    

<!--=====================================================================================================-->
<!--=====================================================================================================-->
