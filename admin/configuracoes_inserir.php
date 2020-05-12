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
<?php if($_GET['inserir'] == 'funcionario'){ ?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page">
      <a href="configuracoes.php?lista=funcionarios"><i class="fa fa-arrow-circle-left" style="color: #000099"></i></i></a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Inserir Funcionário</li>
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
<!--======================================
> FORMULÁRIO - Inserir Funcionário
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_funcionario" enctype='multipart/form-data'>

  <!-- CAMPO: Nome da Obra -->
  <div class="form-group">
    <label for="nome_funcionario"><strong>Nome do Funcionário: <span style="color: #F00;"> * </span></strong></label>
    <input type="text" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="nome_funcionario" name="nome_funcionario">
    <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
    . $nameError .     
    '</div>' ?></span>
  </div>
  <!-- CAMPO: Data de Nascimento -->
  <div class="form-group">
    <label for="data_nascimento"><strong>Data de Nascimento: <span style="color: #F00;"> * </span></strong></label>
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
  </div>
    <!-- CAMPO: Cliente, Tipo Obra e Orçamento-->
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="email"><strong>Email:</strong></label>
          <input type="text" class="form-control" id="email" name="email" autocomplete="off" maxlength="50">
        </div>
      </div>
      <div class="col-3">
        <div class="form-group">
        <label for="login"><strong>Login:</strong></label>
          <input type="text" class="form-control <?php if (isset($loginError)) echo 'is-invalid' ?>"  id="login" name="login" autocomplete="off" maxlength="50">
          <?php if (isset($loginError)) echo '<div class="invalid-feedback">'
          . $loginError .     
        '</div>' ?></span>
        </div>
      </div>
      <div class="col-3">
         <div class="form-group">
           <label for="password"><strong>Password:</strong></label>
           <input type="text" class="form-control <?php if (isset($passwordError)) echo 'is-invalid' ?>"  id="password" name="password" autocomplete="off">
           <?php if (isset($passwordError)) echo '<div class="invalid-feedback">'
          . $passwordError .     
        '</div>' ?></span>
        </div>
        </div>
      </div>
      <!-- Categoria da Mão de Obra -->
      <div class="form-group">
        <label for="nome_obra"><strong>Cargo:</strong></label>
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
    <!-- CAMPOS: Imagem da Obra -->
    <div class="form-group">
     <label for="img_funcionario"><strong>Imagem do Funcionário:</strong></label>
     <input type="file" class="form-control" id="img_funcionario" name="img_funcionario">
    </div>

    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=funcionarios"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_funcionario" value="Inserir Funcionário" />
  </form>
  </div>
</div>

<?php } ?>



<!--======================================================================
#########################  3. MÃO DE OBRA  ##########################
=======================================================================-->
<?php if($_GET['inserir'] == 'mao_obra'){ ?>
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
        <h4>Formulário - Inserir Mão de Obra</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - Inserir Mão de Obra
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_mao_obra">
    <!-- CAMPO: Designação da Mão de Obra -->
    <div class="form-group">
      <label for="mao_obra"><strong>Descrição Mão de Obra: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="descricao_mao_obra" name="descricao_mao_obra" autocomplete="off" maxlength="50">
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
    <input type="submit" class="btn btn-success" id="inserir_mao_obra" name="inserir_mao_obra" value="Inserir Mão Obra" />

    </form>
  </div>
<?php } ?>

<!--======================================================================
######################  3.1 CATEGORIA MÃO DE OBRA  #######################
=======================================================================-->
<?php if($_GET['inserir'] == 'categoria_mao_obra'){ ?>
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
        <h4>Formulário - Inserir Categoria Mão de Obra</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - Inserir Categoria Mão de Obra
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_mao_obra_categoria">
    <!-- CAMPO: Designação da Mão de Obra -->
    <div class="form-group">
      <label for="categoria_mao_obra"><strong>Categoria Mão de Obra: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="categoria_mao_obra" name="categoria_mao_obra" autocomplete="off" maxlength="50">
      <p class="erros" style="color: #F00;"></p>
    </div>


    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=mao_obra"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_mao_obra_categoria" value="Inserir Categoria Mão Obra" />

    </form>
  </div>
</div>
<?php } ?>


<!--======================================================================
#########################  4. EQUIPAMENTOS  ##########################
=======================================================================-->
<?php if($_GET['inserir'] == 'equipamento'){ ?>
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
        <h4>Formulário - Inserir Equipamento</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - Inserir Equipamento
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_equipamento">
    <!-- CAMPO: Designação da Equipamento -->
    <div class="form-group">
      <label for="nome_equipamento"><strong>Nome Equipamento: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="nome_equipamento" name="nome_equipamento" autocomplete="off" maxlength="50">
      <p class="erros" style="color: #F00;"></p>
    </div>


    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=equipamentos"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_equipamento" value="Inserir Equipamento" />

    </form>
  </div>
</div>

<?php } ?>

<!--======================================================================
#########################  5. VEÍCULOS  ##########################
=======================================================================-->
<?php if($_GET['inserir'] == 'veiculo'){ ?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Inserir Veículo</li>
  </ol>
</nav>
<!--======================================
> FORMULÁRIO - Header
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formulário - Inserir Veículo</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - Inserir Funcionário
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_veiculo" enctype='multipart/form-data'>
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
      <input type="text" class="form-control" id="designacao_veiculo" name="designacao_veiculo" autocomplete="off" maxlength="50">
    </div>

    <!-- CAMPO: Marca Veículo -->
    <div class="form-group">
      <label for="marca_veiculo"><strong>Marca Veículo: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="marca" name="marca" autocomplete="off" maxlength="50">
    </div>

    <!-- CAMPOS: Modelo Veículo-->
    <div class="form-group">
      <label for="modelo"><strong>Modelo Veículo: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="modelo" name="modelo" autocomplete="off" maxlength="50">
    </div>

    <!-- CAMPOS: Imagem Veículo-->
    <div class="form-group">
      <label for="img_veiculo"><strong>Imagem Veículo:</strong></label>
      <input type="file" class="form-control" id="img_veiculo" name="img_veiculo">
    </div>

    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=veiculos"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_veiculo" value="Inserir Veículo" />

    </form>
  </div>
</div>

<?php } ?>

<!--======================================================================
#########################  6. TAREFAS  ##########################
=======================================================================-->
<?php if($_GET['inserir'] == 'tarefa'){ ?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Inserir Tarfa</li>
  </ol>
</nav>
<!--======================================
> FORMULÁRIO - Header Ocorrência
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formulário - Inserir Tarefa</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - Inserir Funcionário
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_veiculo">
  
  <!-- CAMPO: Tipo de Ocorrência -->
      <div class="form-group">
        <label for="nome_tarefa"><strong>Nome da Tarefa: <span style="color: #F00;"> * </span></strong></label>
        <input type="text" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="nome_tarefa" name="nome_tarefa">
   
        <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
          . $nameError .     
        '</div>' ?></span>

      </div>

    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=tarefas"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_tarefa" value="Inserir Tarefa" />
    </form>
  </div>
</div>

<?php } ?>

<!--======================================================================
#########################  7. OCORRÊNCIAS  ##########################
=======================================================================-->
<?php if($_GET['inserir'] == 'ocorrencia'){ ?>
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
        <h4>Formulário - Inserir Ocorrência</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMULÁRIO - Inserir Funcionário
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_veiculo" enctype='multipart/form-data'>
  
  <!-- CAMPO: Tipo de Ocorrência -->
      <div class="form-group">
        <label for="tipo_ocorrencia"><strong>Tipo de Ocorrência: <span style="color: #F00;"> * </span></strong></label>
        <input type="text" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="tipo_ocorrencia" name="tipo_ocorrencia">
   
        <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
          . $nameError .     
        '</div>' ?></span>

      </div>

    <!-- Botão: Cancelar -->    
    <a href="configuracoes.php?lista=ocorrencias"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Botão: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_ocorrencia" value="Inserir Ocorrência" />
    </form>
  </div>
</div>


<?php } ?>