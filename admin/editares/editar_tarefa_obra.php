<?php include('../functions.php');
headers();

// Ligação a Base de Dados
include '../ligacao_bd.php';
?>


<!--==============================
> FORM VALIDATION - PHP 
===============================-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // primary validate function
  function validate($str) {
    return trim(htmlspecialchars($str));
  }

  if (empty($_POST['tipo_ocorrencia'])) {
    $nameError = 'Preencha o tipo de ocorrência!';
  } else {
    $id_ocorrencia = $_POST['id_ocorrencia'];
    $tipo_ocorrencia = validate($_POST['tipo_ocorrencia']);

    $sql_insert = "SELECT tipo_ocorrencia FROM ocorrencias WHERE tipo_ocorrencia = '$tipo_ocorrencia'";
    $result_select = $conn->query($sql_insert);

    if (!preg_match('/^[a-zA-Z\s]+$/', $tipo_ocorrencia)) {
      $nameError = 'Só pode conter letras e espaços em branco';
    } else if ($result_select->num_rows > 0){
      $nameError = 'Esse registo já existe, insira outro.';
    }
  }


  if (empty($nameError)) {
    $sql = "UPDATE ocorrencias SET tipo_ocorrencia='$tipo_ocorrencia' WHERE id_ocorrencia='$id_ocorrencia'";

    if ($conn->query($sql) === TRUE) {
      echo '<div class="row d-flex justify-content-center">
            <div class="card text-center mt-10 border-0">      
              <div class="card-body">
                <h2 class="card-title"><i class="fa fa-check-circle text-success"></i> Registo Editado com Sucesso!</h5>
                
                <div class="spinner-border mt-5" style="width: 8rem; height: 8rem;" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
            </div>
          </div>';

    // great form filling
    echo "<script type='text/javascript'>";
    echo "setTimeout(function(){
            window.location.href = 'http://localhost:90/projeto/admin/ocorrencias.php';
         }, 2000);";
    echo "</script>";
    exit(); // terminates the script
  } else {
            echo "Erro! Registo não foi inserido. " . $conn->error;
    }
  }

  if (!empty($nameError)) {
    $ocorrencia_atual = $id_ocorrencia;
  }

}
?>

<!--==========================================================================================
##############################################################################################
===========================================================================================-->
<!--==============================
> BREADCRUMBS
===============================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="../tarefas.php?id_obra=$id_obra">Tarefas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Tarefa</a></li>
  </ol>
</nav>

<!--=============================
> PAINEL INFORMAÇÃO
===============================-->
<div class="card shadow-sm shadow-hover">
  <div class="card-header bg-primary border-bottom p-3">
    <h5 class="mb-0 text-primary">Formulário - Editar Tarefa</h5>
  </div>

<!--=============================
> FORMULÁRIO - Adicionar Ocorrência
===============================-->
  <div class="card-body">


<!--==============================
> Obter Dados - PHP 
===============================-->
<?php if(isset($_GET['cod_tarefa'])){
    $cod_tarefa = $_GET['cod_tarefa'];
    $sql = "SELECT * FROM tarefas_obra, obras, tarefas WHERE tarefas_obra.cod_tarefa = $cod_tarefa AND tarefas_obra.id_tarefa = tarefas.id_tarefa AND  tarefas_obra.id_obra=obras.id_obra";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
}
?>
      <!-- CAMPO: ID de Ocorrência -->
            <div class="form-group">
        <label for="id_ocorrencia"><strong>Nome da Obra:</strong></label>
        <input type="text" class="form-control" value="<?php echo $row['nome_obra']; ?>" readonly>
      </div>


      <div class="form-group">
        <label for="id_ocorrencia"><strong>Nome da Tarefa:</strong></label>
        <input type="text" class="form-control" value="<?php echo $row['nome_tarefa']; ?>" readonly>
      </div>


    <form action="" method="POST" class="needs-validation" novalidate>
      <input type="hidden" id="id_ocorrencia" name="id_ocorrencia" value="<?php echo $row['id_ocorrencia']; ?>">
      

      <!-- CAMPO: Tipo de Ocorrência -->
      <div class="form-group">
        <label for="tarefa_inicio"><strong>Data Inicio: <span style="color: #F00;"> * </span></strong></label>
        <input type="date" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="tarefa_inicio" name="tarefa_inicio" value="<?php echo $row['tarefa_inicio']; ?>">
   
        <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
          . $nameError .     
        '</div>' ?></span>
      </div>


      <!-- CAMPO: Tipo de Ocorrência -->
      <div class="form-group">
        <label for="tarefa_fim"><strong>Data Fim: <span style="color: #F00;"> * </span></strong></label>
        <input type="date" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="tarefa_fim" name="tarefa_fim" value="<?php echo $row['tarefa_fim']; ?>">
   
        <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
          . $nameError .     
        '</div>' ?></span>
      </div>

      <!-- CAMPO: Tipo de Ocorrência -->
      <div class="form-group">
        <input type="hidden" class="form-control" id="id_ocorrencia" name="id_ocorrencia" value="<?php echo $row['id_ocorrencia']; ?>">
        <label for="percentagem"><strong>Percentagem: <span style="color: #F00;"> * </span></strong></label>
        <input type="text" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="percentagem" name="percentagem" value="<?php echo $row['percentagem']; ?>">
   
        <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
          . $nameError .     
        '</div>' ?></span>
      </div>

      <!-- BOTÃO: Cancelar -->    
      <a href="../ocorrencias.php"><button type="button" class="btn btn-link">Cancelar</button></a>
      <!-- BOTÃO: Confirmar -->
      <input type="submit" class="btn btn-success" name="editar_ocorrencia" id="editar_ocorrencia" value="Editar Ocorrência" />
    </form>
  </div>
</div>