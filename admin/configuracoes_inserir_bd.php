<?php include('functions.php');
headers();

// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<!--====================
# Indice - Inserir:
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
<?php if(isset($_REQUEST['inserir_funcionario'])) { 

   $nome_funcionario = $_POST['nome_funcionario'];
   $data_nascimento = $_POST['data_nascimento'];
   $email           = $_POST['email'];
   $login           = $_POST['login'];
   $password        = $_POST['password'];
   $img_funcionario = $_FILES['img_funcionario'];
   $id_cargo        = $_POST['id_cargo'];

   if($img_funcionario != ''){      
        $filename = $_FILES["img_funcionario"]["name"];
        $target_dir = "../img/";
    }

   $sql = "INSERT INTO funcionarios(nome_funcionario, data_nascimento, email, login, password, img_funcionario, id_cargo)
           VALUES ('$nome_funcionario', '$data_nascimento', '$email', '$login', '$password', 'img/funcionarios/$filename', '$id_cargo')";


    if ($conn->query($sql) === TRUE) {
        echo '<div class="row d-flex justify-content-center">
            <div class="card text-center mt-10 border-0">      
              <div class="card-body">
                <h2 class="card-title"><i class="fa fa-check-circle text-success"></i> Registo Inserido com Sucesso!</h5>
                
                <div class="spinner-border mt-5" style="width: 8rem; height: 8rem;" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
            </div>
          </div>';

    // great form filling
    echo "<script type='text/javascript'>";
    echo "setTimeout(function(){
            window.location.href = 'http://localhost:90/projeto/admin/configuracoes.php?lista=funcionarios';
         }, 2000);";
    echo "</script>";
    exit(); // terminates the script
    } else {
        echo "Erro! Registo não foi inserido. " . $conn->error;
    }
    $conn->close();
} ?>

<!--======================================================================
#########################  3. MÃO DE OBRA  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['inserir_mao_obra'])) { 
    $descricao_mao_obra       =   $_POST['descricao_mao_obra'];
    $id_categoria_mao_obra    =   $_POST['id_categoria_mao_obra'];

    $sql = "INSERT INTO mao_obra(descricao, id_categoria_mao_obra)
           VALUES ('$descricao_mao_obra', '$id_categoria_mao_obra')";

        if ($conn->query($sql) === TRUE) {
        echo '<div class="row d-flex justify-content-center">
            <div class="card text-center mt-10 border-0">      
              <div class="card-body">
                <h2 class="card-title"><i class="fa fa-check-circle text-success"></i> Registo Inserido com Sucesso!</h5>
                
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
        echo "Erro! Registo não foi inserido. " . $conn->error;
    }
    $conn->close();
} ?>
<!--======================================================================
#####################  3.1. CATEGORIA MÃO DE OBRA   ######################
=======================================================================-->
<?php if(isset($_REQUEST['inserir_mao_obra_categoria'])) { 
    $categoria_mao_obra    =   $_POST['categoria_mao_obra'];

    $sql = "INSERT INTO mao_obra_categorias(categoria_mao_obra)
           VALUES ('$categoria_mao_obra')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="row d-flex justify-content-center">
            <div class="card text-center mt-10 border-0">      
              <div class="card-body">
                <h2 class="card-title"><i class="fa fa-check-circle text-success"></i> Registo Inserido com Sucesso!</h5>
                
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
        echo "Erro! Registo não foi inserido. " . $conn->error;
    }
    $conn->close();
} ?>

<!--======================================================================
#########################  4. EQUIPAMENTOS  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['inserir_equipamento'])) { 
    $nome_equipamento    =   $_POST['nome_equipamento'];
    
    $sql = "INSERT INTO equipamentos(nome_equipamento)
           VALUES ('$nome_equipamento')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="row d-flex justify-content-center">
            <div class="card text-center mt-10 border-0">      
              <div class="card-body">
                <h2 class="card-title"><i class="fa fa-check-circle text-success"></i> Registo Inserido com Sucesso!</h5>
                
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
        echo "Erro! Registo não foi inserido. " . $conn->error;
    }
    $conn->close();
} ?>

<!--======================================================================
#########################  5. VEÍCULOS  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['inserir_veiculo'])) { 
    $designacao_veiculo   =   $_POST['designacao_veiculo'];
    $marca_veiculo    =   $_POST['marca'];
    $modelo_veiculo   =   $_POST['modelo'];

    $sql = "INSERT INTO veiculos(designacao_veiculo ,marca, modelo)
           VALUES ('$designacao_veiculo', '$marca_veiculo', '$modelo_veiculo')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="row d-flex justify-content-center">
            <div class="card text-center mt-10 border-0">      
              <div class="card-body">
                <h2 class="card-title"><i class="fa fa-check-circle text-success"></i> Registo Inserido com Sucesso!</h5>
                
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
        echo "Erro! Registo não foi inserido. " . $conn->error;
    }
    $conn->close();
} ?>

<!--======================================================================
#########################  6. TAREFAS  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['inserir_tarefa'])) { 
    $nome_tarefa   =   $_POST['nome_tarefa'];

    $sql = "INSERT INTO tarefas(nome_tarefa)
           VALUES ('$nome_tarefa')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="row d-flex justify-content-center">
            <div class="card text-center mt-10 border-0">      
              <div class="card-body">
                <h2 class="card-title"><i class="fa fa-check-circle text-success"></i> Registo Inserido com Sucesso!</h5>
                
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
        echo "Erro! Registo não foi inserido. " . $conn->error;
    }
    $conn->close();
} ?>

<!--======================================================================
#########################  7. OCORRÊNCIAS  ##########################
=======================================================================-->
<?php if(isset($_REQUEST['inserir_ocorrencia'])) {
      $tipo_ocorrencia   =   $_POST['tipo_ocorrencia'];

    $sql = "INSERT INTO ocorrencias(tipo_ocorrencia)
           VALUES ('$tipo_ocorrencia')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="row d-flex justify-content-center">
            <div class="card text-center mt-10 border-0">      
              <div class="card-body">
                <h2 class="card-title"><i class="fa fa-check-circle text-success"></i> Registo Inserido com Sucesso!</h5>
                
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
        echo "Erro! Registo não foi inserido. " . $conn->error;
    }
    $conn->close();
} ?>
} ?>