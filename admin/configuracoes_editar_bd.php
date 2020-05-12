<?php include('functions.php');
headers();

// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<!--====================
# Indice - Editar:
========================
# 1. Dados da Empresa
# 2. Funcionários
# 3. Mão de Obra
# 4. Equipamentos
# 5. Veículos
# 6. Tarefas
# 7. Ocorrências
=====================-->

<!--======================================================================
#########################  1. DADOS DA EMPRESA  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['editar_dados_empresa'])) { 
        $id_empresa     =   $_POST['id_empresa'];
        $nome_empresa   =   $_POST['nome_empresa'];
        $morada_rua          =   $_POST['morada_rua'];
        $morada_cod_postal   =   $_POST['morada_cod_postal'];
        $morada_localidade   =   $_POST['morada_localidade'];
        $telefone       =   $_POST['telefone'];
        $email          =   $_POST['email'];
        $nif            =   $_POST['nif'];
        $img_empresa    =   $_FILES['img_empresa'];


        if(isset($_FILES["img_empresa"]) && $_FILES["img_empresa"]["error"] == 0){
        
        $filename = $_FILES["img_empresa"]["name"];
        $target_dir = "img/";

        move_uploaded_file($_FILES["img_empresa"]["tmp_name"], "$target_dir" . $filename);
        
        $sql = "UPDATE dados_empresa SET nome_empresa = '$nome_empresa', morada_rua = '$morada_rua', morada_cod_postal = '$morada_cod_postal', morada_localidade = '$morada_localidade', telefone = '$telefone', email = '$email', nif = '$nif', url_imagem = 'img/$filename' WHERE id_empresa=$id_empresa";
        
        } else {

        $sql = "UPDATE dados_empresa SET nome_empresa = '$nome_empresa', morada_rua = '$morada_rua', morada_cod_postal = '$morada_cod_postal', morada_localidade = '$morada_localidade', telefone = '$telefone', email = '$email', nif = '$nif' WHERE id_empresa=$id_empresa";
}

        if ($conn->query($sql) === TRUE) {
        echo '<div class="row d-flex justify-content-center">
            <div class="card text-center mt-10 border-0">      
              <div class="card-body">
                <h2 class="card-title"><i class="fa fa-check-circle text-success"></i> Registo Editadp com Sucesso!</h5>
                
                <div class="spinner-border mt-5" style="width: 8rem; height: 8rem;" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
            </div>
          </div>';

    // great form filling
    echo "<script type='text/javascript'>";
    echo "setTimeout(function(){
            window.location.href = 'http://localhost:90/projeto/admin/configuracoes.php?lista=dados_empresa';
         }, 2000);";
    echo "</script>";
    exit(); // terminates the script
    } else {
            echo "Erro! Registo não foi Editado. " . $conn->error;
        }
        $conn->close();
    } 
  ?>

<!--======================================================================
#########################  2. FUNCIONÁRIOS  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['editar_funcionario'])) { 
  $nome_funcionario = $_POST['nome_funcionario'];
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

<!--======================================================================
#########################  3. MÃO DE OBRA  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['editar_mao_obra'])) { 
    $descricao_mao_obra =   $_POST['descricao_mao_obra'];
    $id_mao_obra    =   $_POST['id_mao_obra'];

    $sql = "UPDATE mao_obra SET descricao='$descricao_mao_obra' WHERE id_mao_obra='$id_mao_obra'";

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
            window.location.href = 'http://localhost:90/projeto/admin/configuracoes.php?lista=mao_obra';
         }, 2000);";
    echo "</script>";
    exit(); // terminates the script
    } else {
        echo "Erro! Registo não foi Editado. " . $conn->error;
    }
    $conn->close();
} ?>
<!--======================================================================
#####################  3.1. CATEGORIA MÃO DE OBRA   ######################
=======================================================================-->
<?php if(isset($_REQUEST['editar_mao_obra_categoria'])) { 
    $categoria_mao_obra    =   $_POST['categoria_mao_obra'];

    $descricao_mao_obra =   $_POST['descricao_mao_obra'];
    $id_mao_obra    =   $_POST['id_mao_obra'];

    $sql = "UPDATE mao_obra SET categoria_mao_obra='$categoria_mao_obra' WHERE id_mao_obra='$id_mao_obra'";

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
            window.location.href = 'http://localhost:90/projeto/admin/configuracoes.php?lista=mao_obra';
         }, 2000);";
    echo "</script>";
    exit(); // terminates the script
    } else {
        echo "Erro! Registo não foi Editado. " . $conn->error;
    }
    $conn->close();
} ?>


<!--======================================================================
#########################  4. EQUIPAMENTOS  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['editar_equipamento'])) { 
    $nome_equipamento    =   $_POST['nome_equipamento'];
    
    $sql = "INSERT INTO equipamentos(nome_equipamento)
           VALUES ('$nome_equipamento')";

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
            window.location.href = 'http://localhost:90/projeto/admin/configuracoes.php?lista=equipamentos';
         }, 2000);";
    echo "</script>";
    exit(); // terminates the script
    } else {
        echo "Erro! Registo não foi Editado. " . $conn->error;
    }
    $conn->close();
} ?>

<!--======================================================================
#########################  5. VEÍCULOS  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['editar_veiculo'])) { 
    $designacao_veiculo   =   $_POST['designacao_veiculo'];
    $marca_veiculo    =   $_POST['marca'];
    $modelo_veiculo   =   $_POST['modelo'];

    $sql = "INSERT INTO veiculos(designacao_veiculo ,marca, modelo)
           VALUES ('$designacao_veiculo', '$marca_veiculo', '$modelo_veiculo')";

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
            window.location.href = 'http://localhost:90/projeto/admin/configuracoes.php?lista=veiculos';
         }, 2000);";
    echo "</script>";
    exit(); // terminates the script
    } else {
        echo "Erro! Registo não foi Editado. " . $conn->error;
    }
    $conn->close();
} ?>

<!--======================================================================
#########################  6. TAREFAS  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['editar_tarefa'])) { 
    $nome_tarefa   =   $_POST['nome_tarefa'];

    $sql = "INSERT INTO tarefas(nome_tarefa)
           VALUES ('$nome_tarefa')";

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
            window.location.href = 'http://localhost:90/projeto/admin/configuracoes.php?lista=tarefas';
         }, 2000);";
    echo "</script>";
    exit(); // terminates the script
    } else {
        echo "Erro! Registo não foi Editado. " . $conn->error;
    }
    $conn->close();
} ?>

<!--======================================================================
#########################  7. OCORRÊNCIAS  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['editar_ocorrencia'])) {
      $tipo_ocorrencia   =   $_POST['tipo_ocorrencia'];

    $sql = "INSERT INTO ocorrencias(tipo_ocorrencia)
           VALUES ('$tipo_ocorrencia')";

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
            window.location.href = 'http://localhost:90/projeto/admin/configuracoes.php?lista=ocorrencias';
         }, 2000);";
    echo "</script>";
    exit(); // terminates the script
    } else {
        echo "Erro! Registo não foi Editado. " . $conn->error;
    }
    $conn->close();
} ?>