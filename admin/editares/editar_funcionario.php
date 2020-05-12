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
  $nameError = $dataError = "";

   $data_nascimento = $_POST['data_nascimento'];
   $email           = $_POST['email'];
   $login           = $_POST['nome_funcionario'];
   $password        = $_POST['password'];
   $img_funcionario = $_FILES['img_funcionario'];
   $id_cargo        = $_POST['id_cargo'];

   if($_FILES["img_funcionario"] != ''){
        $filename = $_FILES["img_funcionario"]["name"];
        $target_dir = "../img/funcionarios/";
        move_uploaded_file($_FILES["img_funcionario"]["tmp_name"], "$target_dir" . $filename);
    }

  // primary validate function
  function validate($str) {
    return trim(htmlspecialchars($str));
  }

  if (empty($_POST['nome_funcionario'])) {
    $nameError = 'Preencha o nome do funcionário!';
  } else {
    $nome_funcionario = validate($_POST['nome_funcionario']);

    $sql_insert = "SELECT nome_funcionario FROM funcionarios WHERE nome_funcionario = '$nome_funcionario'";
    $result_select = $conn->query($sql_insert);

    if (!preg_match('/^[a-zA-Z\s]+$/', $nome_funcionario)) {
      $nameError = 'Só pode conter letras e espaços em branco';
    } else if ($result_select->num_rows > 0){
      $nameError = 'Esse registo já existe, insira outro.';
    }
  }


  if (empty($_POST['data_nascimento'])) {
    $dataError = 'Preencha a Data de Nascimento!';
  }

  if (empty($_POST['login'])) {
    $loginError = 'Preencha o Login!';
  }

  if (empty($_POST['password'])) {
    $passwordError = 'Preencha a password!';
  }



   if(isset($_FILES["img_funcionario"]) && $_FILES["img_funcionario"]["error"] == 0){
        
        $filename = $_FILES["img_funcionario"]["name"];
        $target_dir = "../img/funcionarios/";

        move_uploaded_file($_FILES["img_funcionario"]["tmp_name"], "$target_dir" . $filename);
        
         $sql = "UPDATE funcionarios SET nome_funcionario='$nome_funcionario', data_nascimento='$data_nascimento', email='$email', login='$login', password='$password', url_imagem = 'img/$filename', id_cargo='$id_cargo' WHERE id_funcionario='$id_funcionario'";
        
        } else {


  if (empty($nameError | $dataError)) {

      $sql = "UPDATE funcionarios SET nome_funcionario='$nome_funcionario', data_nascimento='$data_nascimento', email='$email', login='$login', password='$password', id_cargo='$id_cargo' WHERE id_funcionario='$id_funcionario'";

            
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
            window.location.href = 'http://localhost:90/projeto/admin/funcionarios.php';
         }, 2000);";
    echo "</script>";
    exit(); // terminates the script
  } else {
            echo "Erro! Registo não foi inserido. " . $conn->error;
    }
  } 
}
?>



<!--========================================================================================================
                                        CONTAINER OBRAS
=========================================================================================================-->

<!--=======================================================
                        BREADCRUMBS
========================================================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page">
      <a href="../funcionarios.php"><i class="fa fa-arrow-circle-left" style="color: #000099"></i></i></a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Editar Funcionário</li>
  </ol>
</nav>
<!--=============== FIM - BREADCRUMBS ==================-->


<!--==============================
> Obter Dados - PHP 
===============================-->
<?php if(isset($_GET['id_funcionario'])){
    $id_funcionario = $_GET['id_funcionario'];
    $sql = "SELECT * FROM funcionarios WHERE id_funcionario = $id_funcionario";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
}
?>

<!--======================================
          FORMULÁRIO - Inserir Obra 
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formulário - Inserir Funcionário</h4>
      </div>
    </div>
  </div>

 <div class="card-body">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="inserir_funcionario" onsubmit="return validarFuncionarios()" enctype='multipart/form-data'>
    

    <!-- CAMPO: Nome da Obra -->
    <div class="form-group">
      <label for="nome_funcionario"><strong>Nome do Funcionário: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="nome_funcionario" name="nome_funcionario" value="<?php echo $row['nome_funcionario'] ?>">
   
        <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
          . $nameError .     
        '</div>' ?></span>
      </div>


    <!-- CAMPO: Data de Nascimento -->
    <div class="form-group">
      <label for="data_nascimento"><strong>Data de Nascimento: <span style="color: #F00;"> * </span></strong></label>
      <input type="date" class="form-control <?php if (isset($dataError)) echo 'is-invalid' ?>" id="data_nascimento" name="data_nascimento" autocomplete="off" value="<?php echo $row['data_nascimento'] ?>">

      <?php if (isset($dataError)) echo '<div class="invalid-feedback">'
          . $dataError .     
        '</div>' ?></span>
    </div>

    <!-- CAMPO: Cliente, Tipo Obra e Orçamento-->
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="email"><strong>Email:</strong></label>
          <input type="text" class="form-control" id="email" name="email" autocomplete="off" maxlength="50" value="<?php echo $row['email'] ?>">
        </div>
      </div>
      <div class="col-3">
        <div class="form-group">
        <label for="login"><strong>Login:</strong></label>
          <input type="text" class="form-control <?php if (isset($loginError)) echo 'is-invalid' ?>"  id="login" name="login" autocomplete="off" maxlength="50"value="<?php echo $row['nome_funcionario'] ?>" disabled>
          <?php if (isset($loginError)) echo '<div class="invalid-feedback">'
          . $loginError .     
        '</div>' ?></span>
        </div>
      </div>
      <div class="col-3">
         <div class="form-group">
           <label for="password"><strong>Password:</strong></label>
           <input type="text" class="form-control <?php if (isset($passwordError)) echo 'is-invalid' ?>"  id="password" name="password" autocomplete="off" value="<?php echo $row['password'] ?>">
           <?php if (isset($passwordError)) echo '<div class="invalid-feedback">'
          . $passwordError .     
        '</div>' ?></span>
        </div>
        </div>
      </div>



      <div class="form-group">
        <label for="nome_obra"><strong>Categoria Mão de Obra:</strong></label>

      <?php 
        // procura categorias disponíveis
        $sql = "SELECT * FROM mao_obra;";
        $consulta = $conn->query($sql);   
        ?>
        <select class="custom-select" name="id_cargo">
        <?php 
          while ($mostrar = $consulta->fetch_assoc()) {
          echo "<option value=" . $mostrar['id_mao_obra'] . ">  " . $mostrar['descricao'] . "</option>";
          }
        ?>
        </select>
      </div>

    <!-- CAMPOS: Imagem do Funcionario -->
    <div class="form-group">
     <label for="img_funcionario"><strong>Imagem do Funcionário:</strong></label>
     <input type="file" class="form-control" id="img_funcionario" name="img_funcionario">
    </div>
    <hr>
       <div id="image-holder"> </div>
    <hr>

    Imagem Atual:
    <img src="<?php echo "../" . $row['img_funcionario'] ?>" width=50 height=50>

    <hr>

    <!-- BOTÕES - Confirmar Inserir e Cancelar -->    
   
    <a href="../funcionarios.php"><button type="button" class="btn btn-link">Cancelar</button></a>

     <input type="submit" class="btn btn-dark" value="Editar Dados" />
    
    </form>
</div>
</div>
<!--=====================================================================================================-->
<!--=====================================================================================================-->

<!-- SCRIPT MOSTRAR IMAGEM -->
<script>
//*
$("#img_obra").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image",
                    "width": "100",
                    "height": "100"
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
//*
</script>