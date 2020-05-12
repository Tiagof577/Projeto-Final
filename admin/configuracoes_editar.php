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
<?php if(isset($_GET['id_empresa']) && $_GET['editar'] == 'dados_empresa'){
        $id_empresa = $_GET['id_empresa'];
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
      <form action="configuracoes_editar_bd.php" method="POST" name="editar_dados_empresa" enctype="multipart/form-data">

      
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
        <a href="configuracoes.php?lista=dados_empresa"><button type="button" class="btn btn-link">Cancelar</button></a>
      </form>
    </div>
  </div>
</div>    

<?php } ?>



<!--======================================================================
###########################  2. FUNCIONÁRIOS  ############################
=======================================================================-->
<?php if(isset($_GET['id_funcionario']) && $_GET['editar'] == 'funcionario'){
    $id_funcionario = $_GET['id_funcionario'];
    $sql = "SELECT * FROM funcionarios WHERE id_funcionario = $id_funcionario";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page">
      <a href="configuracoes.php?lista=funcionarios"><i class="fa fa-arrow-circle-left" style="color: #000099"></i></i></a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">editar Funcionário</li>
  </ol>
</nav>
<!--======================================
> FORMULÁRIO - Header Funcionário
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

     <input type="submit" class="btn btn-dark" name="editar_funcionario" value="Editar Funcionário" />
    
    </form>
</div>
</div>

<?php } ?>



<!--======================================================================
#########################  3. MÃO DE OBRA  ##########################
=======================================================================-->
<?php if(isset($_GET['id_mao_obra']) && $_GET['editar'] == 'mao_obra'){
        $id_mao_obra = $_GET['id_mao_obra'];
        $sql = "SELECT * FROM mao_obra WHERE id_mao_obra = $id_mao_obra";
   		$res = $conn->query($sql);
    	$row = $res->fetch_assoc();
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Empresa</li>
  </ol>
</nav>
<!--======================================
> FORMULÁRIO - Header Mão de Obra
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formulário - editar Mão de Obra</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - editar Mão de Obra
========================================--> 
  <div class="card-body">
  <form action="configuracoes_editar_bd.php" method="POST" name="editar_mao_obra">
    <!-- CAMPO: Designação da Mão de Obra -->
    <div class="form-group">
      <label for="mao_obra"><strong>Descrição Mão de Obra: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="descricao_mao_obra" name="descricao_mao_obra" autocomplete="off" maxlength="50" value="<?php echo $row['descricao'] ?>">
      <p class="erros" style="color: #F00;"></p>
    </div>

    <!-- CAMPOS: Categoria Mão de Obra-->
    <div class="form-group">
      <label for="nome_obra"><strong>Categoria Mão de Obra:</strong></label>

      <?php 
        // procura categorias disponíveis
        $sql = "SELECT * FROM mao_obra_categorias;";
        $consulta = $conn->query($sql);   
      ?>
      <select class="custom-select" name="id_categoria_mao_obra">
      <?php 
        while ($mostrar = $consulta->fetch_assoc()) {
        echo "<option value=" . $mostrar['id_categoria_mao_obra'] . ">  " . $mostrar['categoria_mao_obra'] . "</option>";
        }
      ?>
        </select>
    </div>

    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=mao_obra"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" id="editar_mao_obra" name="editar_mao_obra" value="editar Mão Obra" />

    </form>
  </div>
<?php } ?>

<!--======================================================================
######################  3.1 CATEGORIA MÃO DE OBRA  #######################
=======================================================================-->
<?php if(isset($_GET['id_categoria_mao_obra']) && $_GET['editar'] == 'categoria_mao_obra'){
        $id_categoria_mao_obra = $_GET['id_categoria_mao_obra'];
        $sql = "SELECT * FROM mao_obra_categorias WHERE id_categoria_mao_obra = $id_categoria_mao_obra";
   		$res = $conn->query($sql);
    	$row = $res->fetch_assoc();
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Empresa</li>
  </ol>
</nav>
<!--======================================
> FORMULÁRIO - Header Categoria Mão de Obra
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formulário - editar Categoria Mão de Obra</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - editar Categoria Mão de Obra
========================================--> 
  <div class="card-body">
  <form action="configuracoes_editar_bd.php" method="POST" name="editar_mao_obra_categoria">
    <!-- CAMPO: Designação da Mão de Obra -->
    <div class="form-group">
      <label for="categoria_mao_obra"><strong>Categoria Mão de Obra: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="categoria_mao_obra" name="categoria_mao_obra" autocomplete="off" maxlength="50" value="<?php echo $row['categoria_mao_obra'] ?>">
      <p class="erros" style="color: #F00;"></p>
    </div>


    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=mao_obra"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="editar_mao_obra_categoria" value="editar Categoria Mão Obra" />

    </form>
  </div>
</div>
<?php } ?>


<!--======================================================================
###########################  4. EQUIPAMENTOS  ############################
=======================================================================-->
<?php if(isset($_GET['id_equipamento']) && $_GET['editar'] == 'equipamento'){
        $id_equipamento = $_GET['id_equipamento'];
        $sql = "SELECT * FROM equipamentos WHERE id_equipamento = $id_equipamento";
   		$res = $conn->query($sql);
    	$row = $res->fetch_assoc();
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Empresa</li>
  </ol>
</nav>
<!--======================================
> FORMULÁRIO - Header Equipamento
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formulário - editar Equipamento</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - editar Equipamento
========================================--> 
  <div class="card-body">
  <form action="configuracoes_editar_bd.php" method="POST" name="editar_equipamento">
    <!-- CAMPO: Designação da Equipamento -->
    <div class="form-group">
      <label for="nome_equipamento"><strong>Nome Equipamento: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="nome_equipamento" name="nome_equipamento" autocomplete="off" maxlength="50" value="<?php echo $row['nome_equipamento'] ?>">
      <p class="erros" style="color: #F00;"></p>
    </div>


    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=equipamentos"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="editar_equipamento" value="editar Equipamento" />

    </form>
  </div>
</div>

<?php } ?>

<!--======================================================================
#########################  5. VEICULOS  ##########################
=======================================================================-->
<?php if(isset($_GET['id_veiculo']) && $_GET['editar'] == 'veiculo'){
        $id_veiculo = $_GET['id_veiculo'];
        $sql = "SELECT * FROM veiculos WHERE id_veiculo = $id_veiculo";
   		$res = $conn->query($sql);
    	$row = $res->fetch_assoc();
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">editar Veículo</li>
  </ol>
</nav>
<!--======================================
> FORMULÁRIO - Header
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formulário - editar Veículo</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - editar Funcionário
========================================--> 
  <div class="card-body">
  <form action="configuracoes_editar_bd.php" method="POST" name="editar_veiculo" enctype='multipart/form-data'>
    <!-- CAMPOS: Categoria Mão de Obra-->
    <div class="form-group">
      <label for="categoria_veiculo"><strong>Categoria do Veículo:</strong></label>

      <?php 
        // procura categorias disponíveis
        $sql = "SELECT * FROM veiculos_categoria;";
        $consulta = $conn->query($sql);   
      ?>
      <select class="custom-select" name="id_categoria_veiculo">
      <?php 
        while ($mostrar = $consulta->fetch_assoc()) {
        echo "<option value=" . $mostrar['categoria_abreviada'] . ">  " . $mostrar['categoria_veiculo'] . "</option>";
        }
      ?>
        </select>
    </div>

    <!-- CAMPOS: ID Veículo-->
    <div class="form-group">
      <label for="id_veiculo"><strong>Designação Veículo: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="designacao_veiculo" name="designacao_veiculo" autocomplete="off" maxlength="50" value="<?php echo $row['designacao_veiculo'] ?>">
    </div>

    <!-- CAMPO: Marca Veículo -->
    <div class="form-group">
      <label for="marca_veiculo"><strong>Marca Veículo: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="marca" name="marca" autocomplete="off" maxlength="50" value="<?php echo $row['marca'] ?>">
    </div>

    <!-- CAMPOS: Modelo Veículo-->
    <div class="form-group">
      <label for="modelo"><strong>Modelo Veículo: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="modelo" name="modelo" autocomplete="off" maxlength="50" value="<?php echo $row['modelo'] ?>">
    </div>

    <!-- CAMPOS: Imagem Veículo-->
    <div class="form-group">
      <label for="img_veiculo"><strong>Imagem Veículo:</strong></label>
      <input type="file" class="form-control" id="img_veiculo" name="img_veiculo">
    </div>

    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=veiculos"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="editar_veiculo" value="editar Veículo" />

    </form>
  </div>
</div>

<?php } ?>

<!--======================================================================
#########################  6. TAREFAS  ##########################
=======================================================================-->
<?php if(isset($_GET['id_tarefa']) && $_GET['editar'] == 'tarefa'){
        $id_tarefa = $_GET['id_tarefa'];
        $sql = "SELECT * FROM tarefas WHERE id_tarefa = $id_tarefa";
   		$res = $conn->query($sql);
    	$row = $res->fetch_assoc();
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">editar Tarfa</li>
  </ol>
</nav>
<!--======================================
> FORMULÁRIO - Header Ocorrência
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formulário - editar Tarefa</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - editar Funcionário
========================================--> 
  <div class="card-body">
  <form action="configuracoes_editar_bd.php" method="POST" name="editar_veiculo">
  
  <!-- CAMPO: Tipo de Ocorrência -->
      <div class="form-group">
        <label for="nome_tarefa"><strong>Nome da Tarefa: <span style="color: #F00;"> * </span></strong></label>
        <input type="text" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="nome_tarefa" name="nome_tarefa" value="<?php echo $row['nome_tarefa']; ?>">
   
        <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
          . $nameError .     
        '</div>' ?></span>

      </div>

    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=tarefas"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="editar_tarefa" value="editar Tarefa" />
    </form>
  </div>
</div>

<?php } ?>


<!--======================================================================
#########################  7. OCORRÊNCIAS  ##########################
=======================================================================-->
<?php if(isset($_GET['id_ocorrencia']) && $_GET['editar'] == 'ocorrencia'){
    $id_ocorrencia = $_GET['id_ocorrencia'];
    $sql = "SELECT * FROM ocorrencias WHERE id_ocorrencia = $id_ocorrencia";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Empresa</li>
  </ol>
</nav>
<!--======================================
> FORMULÁRIO - Header Ocorrência
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formulário - editar Ocorrência</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - Editar Ocorrência
========================================--> 
  <div class="card-body">
  <form action="configuracoes_editar_bd.php" method="POST" name="editar_veiculo" enctype='multipart/form-data'>
  
  <!-- CAMPO: Tipo de Ocorrência -->
      <div class="form-group">
        <label for="tipo_ocorrencia"><strong>Tipo de Ocorrência: <span style="color: #F00;"> * </span></strong></label>
        <input type="text" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="tipo_ocorrencia" name="tipo_ocorrencia" value="<?php echo $row['tipo_ocorrencia']; ?>">
   
        <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
          . $nameError .     
        '</div>' ?></span>

      </div>

    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=ocorrencias"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="editar_ocorrencia" value="Editar Ocorrência" />
    </form>
  </div>
</div>


<?php } ?>
