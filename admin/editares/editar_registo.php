<?php include('../functions.php');
headers();

// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<!--========================================================================================================
                              FORMULÁRIO - INSERIR Equipamento
=========================================================================================================-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<!--=======================================================
                        BREADCRUMBS
========================================================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page">
      <a href="../equipamentos.php"><i class="fa fa-arrow-circle-left" style="color: #000099"></i></i></a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Relatório XX</li>
  </ol>
</nav>

<!--========================================================================================================
                                        EDITAR CONFIG RELATÓRIO
=========================================================================================================-->
<?php
        $id_registo = $_GET["id_registo"];
        $sql = "SELECT * FROM registos_diarios WHERE id_registo=$id_registo;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $obra_atual = $row['id_obra'];

        $registo_atual = $id_registo;
?>

<!--========================================================================================================
                                        CONTAINER RELATÓRIO OBRA
=========================================================================================================-->

<!--======================================
          FORMULÁRIO - editar obra 
========================================--> 
<div class="container">

  <p> Informações do Relatório </p>

  <div class="card">
    <div class="card-header bg-dark text-warning">
      Detalhes do Relatório
    </div>
    <div class="card-body">
      

<?php
        $sql_dados_obra = "SELECT * FROM obras, registos_diarios WHERE registos_diarios.id_obra = obras.id_obra;";
        $result_dados_obra = $conn->query($sql_dados_obra);
        $row_dados_obra = $result_dados_obra->fetch_assoc();
?>


<div class="container">
  <div class="row">
    <div class="col-lg-8 border">
       <div class="row border">1</div>
       <div class="row border">1</div>
       <div class="row border">1</div>
       <div class="row border">Registo Diário de Obra</div>
       <div class="row border">
         <div class="col border border-primary">Obra:</div>
         <div class="col border border-primary"><?php echo $row_dados_obra['nome_obra'];?></div>
       </div>
       <div class="row border">
         <div class="col border border-primary">Endereço</div>
         <div class="col border border-primary"><?php echo $row_dados_obra['endereco'];?></div>
       </div>
       <div class="row border">
         <div class="col border border-primary">Cliente:</div>
         <div class="col border border-primary"><?php echo $row_dados_obra['cliente'];?></div>
       </div>
    </div>
    <div class="col-lg-2 border">
      <div class="row border">Relatório Nº:</div>
      <div class="row border">Código do Contrato:</div>
      <div class="row border">Prazo Contratual:</div>
      <div class="row border">Prazo Decorrido:</div>
      <div class="row border">Prazo a Vencer:</div>
      <div class="row border">Data do Reatório:</div>
      <div class="row border">Dia da Semana:</div>
    </div>
     <div class="col-lg-2 border">
      <div class="row border">1</div>
      <div class="row border">2</div>
      <div class="row border">3</div>
      <div class="row border">4</div>
      <div class="row border">5</div>
      <div class="row border">6</div>
      <div class="row border">7</div>
    </div>
  </div>
</div>

    </div>
  </div>



  

  <!-- PARA OS EQUIPAMENTOS -->

  <form action="processa_editar_registo.php" method="POST" name="inserir_relatorio_obra" enctype='multipart/form-data'>

<?php  
    $sql = "SELECT * FROM obras_config_relatorio WHERE id_obra = $obra_atual";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc()
?>


    <br> 
    <!-- ===== Horário de Trabalho -->
    <?php if($row['m_horario_trabalho'] == 1){ ?>
    <div class="card">
      <div class="card-header bg-dark text-warning">
        <b>Horário de Trabalho</b>
      </div>
      <div class="card-body">
       
        <form>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="hora_entrada">Hora Entrada:</label>
              <input type="text" class="form-control" id="hora_entrada" placeholder="hh:mm">
            </div>
            <div class="form-group col-md-3">
              <label for="hora_saida">Hora Saída:</label>
              <input type="text" class="form-control" id="hora_saida" placeholder="hh:mm">
            </div>
          </div>
       </form>

      </div>
    </div>
    <br> <?php } ?>

    <!-- ===== Condição Climática -->
    <?php if($row['m_condicao_climatica'] == 1){ ?>
    <div class="card-header bg-dark text-warning">
      <div class="card-header">
        <b>Condição Climática</b>
      </div>
      <div class="card-body">
        <p class="card-text">Nenhum item adicionado!</p>
      </div>
    </div>
    <br> <?php } ?>

    <!-- ===== MÂO DE OBRA ===== -->
    <?php if($row['m_mao_obra'] == 1){ ?>
    <div class="card">
      <div class="card-header bg-dark text-warning">
        <b>Mão de Obra</b>
        <button type="button" class="btn btn-warning btn-sm float-right">+ Adicionar</button>
      </div>
      <div class="card-body">
        <p class="card-text">Nenhum item adicionado!</p>
      </div>
    </div>
    <br> <?php } ?>





<!--========================================================================================================
                      MODAL - adicionar EQUIPAMENTOS
=========================================================================================================-->
    <?php if($row['m_equipamentos'] == 1){ ?>

      <?php 
            $sql = "SELECT * FROM registo_diario_equipamentos WHERE id_registo = $id_registo";
            $res_eq = $conn->query($sql);
        ?>

    <div class="card">
      <div class="card-header bg-dark text-warning">
        <b>Equipamentos (<?php echo $res_eq->num_rows; ?>)</b>
        <a data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id_obra']?>">
            <button type="button" class="btn btn-warning btn-sm float-right">
              + Adicionar em Modal
            </button>
          </a>
      </div>

      <div class="card-body">

    
    <form class="form inline" action="processa_editar_registo.php" method="POST" name="inserir_equipamento_relatorio">
      <input type="hidden" name="id_registo" value="<?php echo $_GET['id_registo']; ?>">
    <!-- ===================== LISTA DE EQUIPAMENTOS ==================-->
        <div class="form-group">
          <label for="equipamentos"><strong>Equipamentos:</strong></label>
            <?php 
            // procura categorias disponíveis
            $sql = "SELECT * FROM equipamentos;";
            $consulta = $conn->query($sql);   
            ?>
            <!-- criar seleção dos autores -->
            <select class="form-control " name="id_equipamento">  
            <?php 
            while ($mostrar = $consulta->fetch_assoc()) {
            echo "<option value=" . $mostrar['id_equipamento'] . ">  " . $mostrar['nome_equipamento'] . "</option>";
            }
            ?>
          </select>
        </div>

    <div class="form-group">
      <label for="qntd_equipamento"><strong>Quantidade: <span style="color: #F00;"> * </span></strong></label>
      <input type="number" class="form-control" id="qntd_equipamento" name="qntd_equipamento">
    </div>

        </div>
    
        <input type="submit" class="btn btn-primary w-25" name="inserir_equipamento_relatorio" id="inserir_equipamento_relatorio" value="Inserir Equipamento" />
      </form>


        <br>

        <?php if($res_eq->num_rows == 0){ ?>
          <p class="card-text">Nenhum item adicionado!</p>
        <?php } else {
        ?>
            <?php while($row_eq = $res_eq->fetch_assoc()) { ?>    
              <?php echo $row_eq['id_equipamento']?>
              <p> Falta nome - quantidade e remover </p> 
            <?php } ?>
       <?php } ?>


      </div>
    </div>
    <br> <?php } ?>
<!--=======================================
MODAL - adicionar EQUIPAMENTOS
========================================-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <?php $sel_query=mysqli_query($conn, "select * from registos_diarios where id_registo='$id_registo'")or die(mysql_error($conn)); $selrow=mysqli_fetch_array($sel_query);?>

    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Adicionar Equipamento </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        

      <div class="panel panel-info" style="text-align:center;">
         

     
</div>
  </div>
</div>

<!-- MODAL CONTENT (FECHO) -->



















    <!-- ===== XXXXX -->
    <?php if($row['m_atividades'] == 1){ ?>
    <div class="card">
      <div class="card-header bg-dark text-warning">
        <b>Atividades / Tarefas</b>
        <button type="button" class="btn btn-warning btn-sm float-right">+ Adicionar</button>
      </div>
      <div class="card-body">
        <p class="card-text">Nenhum item adicionado!</p>
        <hr>
        <p> <b>avulsa ou da lista de atividades</b> </p>
        <p>descricao <span class="float-right"> 100% - Concluída &nbsp; edit x</span></p>
      </div>
    </div>
    <!-- ===== XXXXX -->
    <br> <?php } ?>
 

    <!-- ===== XXXXX -->
    <?php if($row['m_ocorrencias'] == 1){ ?>
    <div class="card">
      <div class="card-header bg-dark text-warning">
        <b>Ocorrências / Observações</b>
        <button type="button" class="btn btn-warning btn-sm float-right">+ Adicionar</button>
      </div>
      <div class="card-body">
        <p class="card-text">Nenhum item adicionado!</p>
        <hr>
        <p> Descricao <span style="float: right;">edit x</span></p>
        <p> Tags com tipos de ocorrencia (acidente - ...)
      </div>
    </div>
    <!-- ===== XXXXX -->
    <br> <?php } ?>
    

    <!-- ===== XXXXX -->
    <?php if($row['m_materiais'] == 1){ ?>
    <div class="card">
      <div class="card-header bg-dark text-warning">
        <b>Materiais</b>
        <button type="button" class="btn btn-warning btn-sm float-right">+ Adicionar</button>
      </div>
      <div class="card-body">
        <p class="card-text">Nenhum item adicionado!</p>
      </div>
    </div>
    <!-- ===== XXXXX -->
    <br> <?php } ?>

    <!-- ===== XXXXX -->
    <?php if($row['m_comentarios'] == 1){ ?>
    <div class="card">
      <div class="card-header bg-dark text-warning">
        <b>Comentários</b>
        <button type="button" class="btn btn-warning btn-sm float-right">+ Adicionar</button>
      </div>
      <div class="card-body">
        <p class="card-text">Nenhum item adicionado!</p>
        <hr>
        <p> Quem Fez? Rui</p>
        <p> Comentario do areaqw eq</p>
      </div>
    </div>
    <!-- ===== XXXXX -->
    <br> <?php } ?>

    <!-- ===== XXXXX -->
    <?php if($row['m_fotos'] == 1){ ?>
    <div class="card">
      <div class="card-header bg-dark text-warning">
        <b>Fotos</b>
        <button type="button" class="btn btn-warning btn-sm float-right">+ Adicionar</button>
      </div>
      <div class="card-body">
        <p class="card-text">Nenhum item adicionado!</p>
        <hr>
        <p> aparece imagem e input para descricao </p>
      </div>
    </div>
    <!-- ===== XXXXX -->
    <br> <?php } ?>

    <!-- ===== XXXXX -->
    <?php if($row['m_anexos'] == 1){ ?>
    <div class="card">
      <div class="card-header bg-dark text-warning">
        <b>Anexos</b>
        <button type="button" class="btn btn-warning btn-sm float-right">+ Adicionar</button>
      </div>
      <div class="card-body">
        <p class="card-text">Nenhum item adicionado!</p>
        <hr>
        <p> nome ficheiro <span style="float: right;">10bytes | icon descarregar   x </span>
      </div>
    </div>
    <!-- ===== XXXXX -->
    <br> <?php } ?>

    <!-- ===== XXXXX -->
    <div class="card">
      <div class="card-header bg-dark text-warning">
        <b>Status do Relatório</b>
      </div>
      <div class="card-body">
       <p class="card-text">Nenhum item adicionado!</p>
      </div>
    </div>
    <!-- ===== XXXXX -->

    <br>

    <!-- BOTÕES - Confirmar Inserir e Cancelar -->    
    <input type="submit" class="btn btn-primary" name="inserir_obra" id="inserir_obra" value="Guardar" />
    <input type="submit" class="btn btn-primary" name="inserir_obra" id="inserir_obra" value="Imprimir" />
    
    </form>
</div>
   

  </main>
<!--=====================================================================================================-->
<!--=====================================================================================================-->




















