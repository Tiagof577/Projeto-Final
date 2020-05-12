<?php include('functions.php');
headers();

// Ligação a Base de Dados
include '../ligacao_bd.php';
?>


<!--***************************************
          SQL - SELECT ocorrencias
****************************************-->
<?php 
  $sql = "SELECT * FROM dados_empresa";
  $res = $conn->query($sql);
  $row = $res->fetch_assoc();
?>

<!--==========================================================================================
##############################################################################################
===========================================================================================-->
<!--==============================
> BREADCRUMBS
===============================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Empresa</li>
  </ol>
</nav>

<!--=============================
> PAINEL INFORMAÇÃO + ADICIONAR
===============================-->
<div class="card-header bg-white border-bottom p-3">
  <div class="row">
    <div class="col-md-10">
      <h5 class="mb-0 text-primary"><i class="fa fa-exclamation-circle lead mr-2"></i> Dados da Empresa</h5>
    </div>
    <div class="col-md-2 float-right">
       <a href="editares/editar_empresa.php">
        <span class="badge badge-warning align-self-center">Editar <i class="fa fa-edit ml-2"></i></span>
      </a>
    </div>
  </div>
</div>


<!--=======================================
          LISTA - Dados Empresa
========================================-->
<ul class="list-group">
   <input type="hidden" name="id_ocorrencia" value="<?php echo $row["id_empresa"]; ?>">
   <li class="list-group-item"> <img src="<?php echo $row["url_imagem"]; ?>" width="100" height="100"> </li>
  <li class="list-group-item"> <h5>Nome:</h5> <?php echo $row["nome_empresa"]; ?> </li>
  <li class="list-group-item"> 
    <h5>Morada:</h5> <?php echo $row["morada_rua"]; ?>
    <br>
    <span class="small"><?php echo $row["morada_cod_postal"]; ?> - <?php echo $row["morada_localidade"]; ?></span>
  </li>
  <li class="list-group-item"> <h5>Telefone:</h5> <?php echo $row["telefone"]; ?> </li>
  <li class="list-group-item"> <h5>Email:</h5> <?php echo $row["email"]; ?> </li>
  <li class="list-group-item"> <h5>NIF:</h5> <?php echo $row["nif"]; ?> </li>
</ul>

<!--==========================================================================================
##############################################################################################
===========================================================================================-->

</body>
</html>