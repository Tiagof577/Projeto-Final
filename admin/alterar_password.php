<!DOCTYPE html>
<html>
  <head>
    <meta charset=ISO8859-1">
    <title>Biblioteca</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="estilo.css">

    <!-- ICONS -->
    
</head>
<body>

<?php

  // Resolver Problemas de Acentuação 
  header("Content-Type: text/html; charset=ISO8859-1",true);

  // ligação à base de dados
  include '../ligacao_bd.php';
?>

<!-- SCRIPT EDITAR PASSWORD -->
<script type="text/javascript">
function validarFuncionarios() { 
  var password = document.forms["editar_funcionario"]["password"].value;
  var rep_password = document.forms["editar_funcionario"]["rep_password"].value;
  if (password == "") {
    $("#password").addClass("border border-danger");
    $(".erros6").text("Preencha a password!");  
    return false;
  } else if (/[^a-zA-Z0-9\-\.\ç]/.test(password)) {
    $("#password").addClass("border border-danger");
    $(".erros6").text("A password só pode conter letras, números, ponto(.) e hífen (-)!");  
    return false;
  }
  if (password != rep_password) {
    $("#password").addClass("border border-danger");
    $("#rep_password").addClass("border border-danger");
    $(".erros7").text("As password tem de ser iguais!");  
    return false;
  } 
}
</script>
<!--========================================================================================================
                                        EDITAR PASSWORD FUNCIONÁRIO
=========================================================================================================-->
<?php if(isset($_GET['id_funcionario'])) { 
    $id_funcionario = $_GET['id_funcionario'];
    $sql = "SELECT * FROM funcionarios WHERE id_funcionario = $id_funcionario";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc()
?>
<div class="col-md-9">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Alterar Password</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
    <nav>
        <ol class="breadcrumb bg-dark">
          <li class="breadcrumb-item">
            <a href="dashboard.php" class="text-primary">Dashboard</a>
          </li>
          <li class="breadcrumb-item active text-white">Editar Password</li>
        </ol>
      </nav>  
    </div>
  </div>
  <!-- Formulário para Editar Funcionário -->
  <div class="card border border-dark">
    <div class="card-header bg-primary" style="color:#FFF;"><strong>Formulário para Editar Password:</strong></div>
    <div class="card-body">
      <form action="processa_editar.php" method="POST" name="editar_funcionario" onsubmit="return validarFuncionarios()">
        <input type="hidden" id="id_funcionario" name="id_funcionario" value="<?php echo $row['id_funcionario']; ?>">
        <div class="form-group">
          <label for="password"><strong>Password:</strong></label>
          <input type="password" class="form-control" id="password" name="password" autocomplete="off" maxlength="20">
        </div>
        <p class="erros2" style="color: #F00;"></p>
        <div class="form-group">
          <label for="password"><strong>Repetir Password:</strong></label>
          <input type="password" class="form-control" id="rep_password" name="rep_password" autocomplete="off" maxlength="20">
        </div>
        <p class="erros3" style="color: #F00;"></p>
        <input type="submit" class="btn btn-primary" name="editar_funcionario" id="editar_funcionario" value="Alterar Password">
        <a href="dashboad.php"><button type="button" class="btn btn-link">Cancelar</button></a>
      </form>
    </div>
  </div>
</div>    
<?php } ?>
<!--=====================================================================================================-->
<!--=====================================================================================================-->


  </div>
  </div>
</body>
</html>