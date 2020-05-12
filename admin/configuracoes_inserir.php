<?php include('functions.php');
headers();

// Liga��o a Base de Dados
include '../ligacao_bd.php';
?>

<!--====================
# Indice - Inserir:
========================
# 2. Funcion�rios
# 3. M�o de Obra
# 4. Equipamentos
# 5. Ve�culos
# 6. Tarefas
# 7. Ocorr�ncias
=====================-->

<!--======================================================================
#########################  2. FUNCION�RIOS  ##########################
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
    <li class="breadcrumb-item active" aria-current="page">Inserir Funcion�rio</li>
  </ol>
</nav>
<!--======================================
> FORMUL�RIO - Header Funcion�rio
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formul�rio - Inserir Funcion�rio</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMUL�RIO - Inserir Funcion�rio
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_funcionario" enctype='multipart/form-data'>

  <!-- CAMPO: Nome da Obra -->
  <div class="form-group">
    <label for="nome_funcionario"><strong>Nome do Funcion�rio: <span style="color: #F00;"> * </span></strong></label>
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
    <!-- CAMPO: Cliente, Tipo Obra e Or�amento-->
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
      <!-- Categoria da M�o de Obra -->
      <div class="form-group">
        <label for="nome_obra"><strong>Cargo:</strong></label>
          <?php 
          // procura categorias dispon�veis
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
     <label for="img_funcionario"><strong>Imagem do Funcion�rio:</strong></label>
     <input type="file" class="form-control" id="img_funcionario" name="img_funcionario">
    </div>

    <!-- Bot�o: Cancelar -->    
    <a href="configuracoes.php?lista=funcionarios"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Bot�o: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_funcionario" value="Inserir Funcion�rio" />
  </form>
  </div>
</div>

<?php } ?>



<!--======================================================================
#########################  3. M�O DE OBRA  ##########################
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
> FORMUL�RIO - Header M�o de Obra
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formul�rio - Inserir M�o de Obra</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMUL�RIO - Inserir M�o de Obra
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_mao_obra">
    <!-- CAMPO: Designa��o da M�o de Obra -->
    <div class="form-group">
      <label for="mao_obra"><strong>Descri��o M�o de Obra: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="descricao_mao_obra" name="descricao_mao_obra" autocomplete="off" maxlength="50">
      <p class="erros" style="color: #F00;"></p>
    </div>

    <!-- CAMPOS: Categoria M�o de Obra-->
    <div class="form-group">
      <label for="nome_obra"><strong>Categoria M�o de Obra:</strong></label>

      <?php 
        // procura categorias dispon�veis
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

    <!-- Bot�o: Cancelar -->    
    <a href="configuracoes.php?lista=mao_obra"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Bot�o: Submeter -->
    <input type="submit" class="btn btn-success" id="inserir_mao_obra" name="inserir_mao_obra" value="Inserir M�o Obra" />

    </form>
  </div>
<?php } ?>

<!--======================================================================
######################  3.1 CATEGORIA M�O DE OBRA  #######################
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
> FORMUL�RIO - Header Categoria M�o de Obra
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formul�rio - Inserir Categoria M�o de Obra</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMUL�RIO - Inserir Categoria M�o de Obra
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_mao_obra_categoria">
    <!-- CAMPO: Designa��o da M�o de Obra -->
    <div class="form-group">
      <label for="categoria_mao_obra"><strong>Categoria M�o de Obra: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="categoria_mao_obra" name="categoria_mao_obra" autocomplete="off" maxlength="50">
      <p class="erros" style="color: #F00;"></p>
    </div>


    <!-- Bot�o: Cancelar -->    
    <a href="configuracoes.php?lista=mao_obra"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Bot�o: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_mao_obra_categoria" value="Inserir Categoria M�o Obra" />

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
> FORMUL�RIO - Header Equipamento
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formul�rio - Inserir Equipamento</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMUL�RIO - Inserir Equipamento
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_equipamento">
    <!-- CAMPO: Designa��o da Equipamento -->
    <div class="form-group">
      <label for="nome_equipamento"><strong>Nome Equipamento: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="nome_equipamento" name="nome_equipamento" autocomplete="off" maxlength="50">
      <p class="erros" style="color: #F00;"></p>
    </div>


    <!-- Bot�o: Cancelar -->    
    <a href="configuracoes.php?lista=equipamentos"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Bot�o: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_equipamento" value="Inserir Equipamento" />

    </form>
  </div>
</div>

<?php } ?>

<!--======================================================================
#########################  5. VE�CULOS  ##########################
=======================================================================-->
<?php if($_GET['inserir'] == 'veiculo'){ ?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Inserir Ve�culo</li>
  </ol>
</nav>
<!--======================================
> FORMUL�RIO - Header
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formul�rio - Inserir Ve�culo</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMUL�RIO - Inserir Funcion�rio
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_veiculo" enctype='multipart/form-data'>
    <!-- CAMPOS: Categoria M�o de Obra-->
    <div class="form-group">
      <label for="categoria_veiculo"><strong>Categoria do Ve�culo:</strong></label>

      <?php 
        // procura categorias dispon�veis
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

    <!-- CAMPOS: ID Ve�culo-->
    <div class="form-group">
      <label for="id_veiculo"><strong>Designa��o Ve�culo: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="designacao_veiculo" name="designacao_veiculo" autocomplete="off" maxlength="50">
    </div>

    <!-- CAMPO: Marca Ve�culo -->
    <div class="form-group">
      <label for="marca_veiculo"><strong>Marca Ve�culo: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="marca" name="marca" autocomplete="off" maxlength="50">
    </div>

    <!-- CAMPOS: Modelo Ve�culo-->
    <div class="form-group">
      <label for="modelo"><strong>Modelo Ve�culo: <span style="color: #F00;"> * </span></strong></label>
      <input type="text" class="form-control" id="modelo" name="modelo" autocomplete="off" maxlength="50">
    </div>

    <!-- CAMPOS: Imagem Ve�culo-->
    <div class="form-group">
      <label for="img_veiculo"><strong>Imagem Ve�culo:</strong></label>
      <input type="file" class="form-control" id="img_veiculo" name="img_veiculo">
    </div>

    <!-- Bot�o: Cancelar -->    
    <a href="configuracoes.php?lista=veiculos"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Bot�o: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_veiculo" value="Inserir Ve�culo" />

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
> FORMUL�RIO - Header Ocorr�ncia
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formul�rio - Inserir Tarefa</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMUL�RIO - Inserir Funcion�rio
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_veiculo">
  
  <!-- CAMPO: Tipo de Ocorr�ncia -->
      <div class="form-group">
        <label for="nome_tarefa"><strong>Nome da Tarefa: <span style="color: #F00;"> * </span></strong></label>
        <input type="text" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="nome_tarefa" name="nome_tarefa">
   
        <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
          . $nameError .     
        '</div>' ?></span>

      </div>

    <!-- Bot�o: Cancelar -->    
    <a href="configuracoes.php?lista=tarefas"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Bot�o: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_tarefa" value="Inserir Tarefa" />
    </form>
  </div>
</div>

<?php } ?>

<!--======================================================================
#########################  7. OCORR�NCIAS  ##########################
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
> FORMUL�RIO - Header Ocorr�ncia
========================================--> 
<div class="card shadow mb-5 rounded">
  <div class="card-header bg-primary">
    <div class="row">
      <div class="col mt-1">
        <h4>Formul�rio - Inserir Ocorr�ncia</h4>
      </div>
    </div>
  </div>
<!--======================================
> FORMUL�RIO - Inserir Funcion�rio
========================================--> 
  <div class="card-body">
  <form action="configuracoes_inserir_bd.php" method="POST" name="inserir_veiculo" enctype='multipart/form-data'>
  
  <!-- CAMPO: Tipo de Ocorr�ncia -->
      <div class="form-group">
        <label for="tipo_ocorrencia"><strong>Tipo de Ocorr�ncia: <span style="color: #F00;"> * </span></strong></label>
        <input type="text" class="form-control <?php if (isset($nameError)) echo 'is-invalid' ?>" id="tipo_ocorrencia" name="tipo_ocorrencia">
   
        <?php if (isset($nameError)) echo '<div class="invalid-feedback">'
          . $nameError .     
        '</div>' ?></span>

      </div>

    <!-- Bot�o: Cancelar -->    
    <a href="configuracoes.php?lista=ocorrencias"><button type="button" class="btn btn-link">Cancelar</button></a>
    <!-- Bot�o: Submeter -->
    <input type="submit" class="btn btn-success" name="inserir_ocorrencia" value="Inserir Ocorr�ncia" />
    </form>
  </div>
</div>


<?php } ?>