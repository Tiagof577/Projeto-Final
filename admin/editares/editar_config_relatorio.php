<?php include('../functions.php');
headers();

// Liga��o a Base de Dados
include '../ligacao_bd.php';
?>


<!--======================================
          FORMUL�RIO - Inserir M�o de Obra 
========================================--> 
<?php
        $id_obra=$_GET["id_obra"];
        $sql = "SELECT * FROM obras WHERE id_obra=$id_obra;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $nome_obra = $row['nome_obra'];
?>

<!--========================================================================================================
                              FORMUL�RIO - EDITAR CONFIG RELAT�RIO
=========================================================================================================-->
<!--=======================================================
                        BREADCRUMBS
========================================================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page">
      <a href="ver_obra.php?id_obra=<?php echo $row['id_obra'];?>"><i class="fa fa-arrow-circle-left" style="color: #000099"></i></i></a>
    </li>
    <li class="breadcrumb-item" aria-current="page"><?php echo $nome_obra; ?></li>
    <li class="breadcrumb-item active" aria-current="page">Configurar Relat�rio</li>
  </ol>
</nav>
<!--=============== FIM - BREADCRUMBS ==================-->



<?php
    $id_obra = $_GET['id_obra'];
    $sql = "SELECT * FROM obras_config_relatorio WHERE id_obra = $id_obra";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
?>

<!--====================================================
          FORMUL�RIO - Configurar Relat�rio Obra 
=====================================================--> 

<form action="processa_editar_config_relatorio.php" method="POST" name="editar_config_obra">

  <input type="hidden" class="form-control" id="id_obra" name="id_obra" value="<?php echo $row['id_obra']; ?>" readonly>



<div class="card">
  <div class="card-header bg-dark text-warning">
    <b>Fotos</b>
  </div>
  <div class="card-body">
    <h6> Foto da empresa e/ou cliente </h6>
  </div>
</div>

<br>

<div class="card">
  <div class="card-header bg-dark text-warning">
    <b>Titulo do Relat�rio</b>
  </div>
  <div class="card-body">
    <label for="exampleInputEmail1"><b>Nome do Relat�rio</b></label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Relat�rio Di�rio de Obra (RDO)">
  </div>
</div>

<br>



<div class="card">
  <div class="card-header bg-dark text-warning">
    <b>M�dulos do Relat�rio</b>
  </div>
  <div class="card-body">


  <table class="table">
  <thead>
    <tr>
      <th scope="col">M�dulos</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Equipamentos</th>
      <!-- CAMPO: M�dulo Equipamentos --> 
      <td>
            <div class="form-check form-check-inline">
              <input type="radio" name="m_equipamentos" id="m_equipamentos" 
              <?php if($row['m_equipamentos']=="1") { 
                echo "checked";
              } ?>
              value="1">
              <label class="form-check-label" for="inlineRadio1">Ativado</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" 
              <?php if($row['m_equipamentos']=="0") { 
                echo "checked";
              } ?>
              value="0">
              <label class="form-check-label" for="inlineRadio2">Desativado</label>
            </div>
      </td>
    </tr>

    <tr>
      <th scope="row">Hor�rio de Trabalho</th>
        <td>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_horario_trabalho" id="m_horario_trabalho" 
              <?php if($row['m_horario_trabalho']=="1") { 
                echo "checked";
              } ?>
              value="1">
              <label class="form-check-label" for="inlineRadio1">Ativado</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_horario_trabalho" id="m_horario_trabalho" 
              <?php if($row['m_horario_trabalho']=="0") { 
                echo "checked";
              } ?>
              value="0">
              <label class="form-check-label" for="inlineRadio2">Desativado</label>
            </div>
      </td>
    </tr>
    




    <tr>
      <th scope="row">Meteorologia</th>
        <td>
          <label for="nome_obra"><strong> </label>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="1">
              <label class="form-check-label" for="inlineRadio1">Ativar</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="0">
              <label class="form-check-label" for="inlineRadio2">Desativar</label>
            </div>
      </td>

    <tr>
      <th scope="row">M�o-Obra</th>
        <td>
          <label for="nome_obra"><strong> </label>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="1">
              <label class="form-check-label" for="inlineRadio1">Ativar</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="0">
              <label class="form-check-label" for="inlineRadio2">Desativar</label>
            </div>
      </td>
 </tr>

    <tr>
      <th scope="row">Atividades</th>
        <td>
          <label for="nome_obra"><strong> </label>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="1">
              <label class="form-check-label" for="inlineRadio1">Ativar</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="0">
              <label class="form-check-label" for="inlineRadio2">Desativar</label>
            </div>
      </td>
 </tr>

    <tr>
      <th scope="row">Ocorr�ncias</th>
        <td>
          <label for="nome_obra"><strong> </label>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="1">
              <label class="form-check-label" for="inlineRadio1">Ativar</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="0">
              <label class="form-check-label" for="inlineRadio2">Desativar</label>
            </div>
      </td>
 </tr>

    <tr>
      <th scope="row">Controlo Material</th>
        <td>
          <label for="nome_obra"><strong> </label>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="1">
              <label class="form-check-label" for="inlineRadio1">Ativar</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="0">
              <label class="form-check-label" for="inlineRadio2">Desativar</label>
            </div>
      </td>
 </tr>

    <tr>
      <th scope="row">M�quinas - Veiculos</th>
        <td>
          <label for="nome_obra"><strong> </label>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="1">
              <label class="form-check-label" for="inlineRadio1">Ativar</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="0">
              <label class="form-check-label" for="inlineRadio2">Desativar</label>
            </div>
      </td>

    <tr>
      <th scope="row">Coment�rios</th>
        <td>
          <label for="nome_obra"><strong> </label>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="1">
              <label class="form-check-label" for="inlineRadio1">Ativar</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="0">
              <label class="form-check-label" for="inlineRadio2">Desativar</label>
            </div>
      </td>
      </tr>

       <tr>
      <th scope="row">Galeria Fotos</th>
        <td>
          <label for="nome_obra"><strong> </label>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="1">
              <label class="form-check-label" for="inlineRadio1">Ativar</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="0">
              <label class="form-check-label" for="inlineRadio2">Desativar</label>
            </div>
      </td>
      </tr>

       <tr>
      <th scope="row">Anexos</th>
        <td>
          <label for="nome_obra"><strong> </label>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="1">
              <label class="form-check-label" for="inlineRadio1">Ativar</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" id="customRadioInline1" name="m_equipamentos" id="m_equipamentos" value="0">
              <label class="form-check-label" for="inlineRadio2">Desativar</label>
            </div>
      </td>
      </tr>

  </tbody>
</table>

    <!-- BOT�ES - Confirmar Inserir e Cancelar -->    
    <input type="submit" class="btn btn-primary" name="editar_config_obra" id="editar_config_obra" value="Confirmar" />
    <a href="obras.php"><button type="button" class="btn btn-link">Cancelar</button></a>
    
    </form>

   

<div>
<?php  ?>


<br>

<!--
<div class="card">
  <div class="card-header bg-dark text-warning">
    <b>Tipo de M�o de Obra</b>
  </div>
  <div class="card-body">
    <p>Selecione uma das op��es abaixo para ser utilizado nos relat�rios</p>
    <p>Essa atualiza��o s� � v�lida para novos relat�rios, os j� criados n�o se alteram.</p>

    <p>
      <div class="custom-control custom-radio">
        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="customRadio1"><b>Padr�o:</b> Descri��o e Quantidade</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="customRadio2"><b>Personalizada:</b> Nome, Fun��o e Hor�rio</label>
      </div>
    </p>

    <p>
      Exemplo padr�o em tabela de como vai aparecer!
      <table class="table">
        <thead>
          <tr>
            <th scope="col" colspan="4">M�o de Obra</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Pedreiro <br> 2 </td>
            <td>Pedreiro <br> 2 </td>
            <td>Pedreiro <br> 2 </td>
            <td>Pedreiro <br> 2 </td>
          </tr>
        </tbody>
      </table>
    </p>

     ou

    <p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Fun��o</th>
            <th scope="col">Entrada / Sa�da</th>
            <th scope="col">Intervalo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Emily Lima</td>
            <td>Engenheiro</td>
            <td>08:00 - 17:00</td>
            <td>01:00</td>
          </tr>
          <tr>
            <td>Emily Lima</td>
            <td>Engenheiro</td>
            <td>08:00 - 17:00</td>
            <td>01:00</td>
          </tr>
          <tr>
            <td>Emily Lima</td>
            <td>Engenheiro</td>
            <td>08:00 - 17:00</td>
            <td>01:00</td>
          </tr>
        </tbody>
      </table>
    </p>


  </div>
</div>

<br>

<div class="card">
  <div class="card-header bg-dark text-warning">
    <b>Assinatura nos Relat�rios</b>
  </div>
  <div class="card-body">
    <p>Defina os respons�veis por assinar os relat�rios.</p>
    <p>Essa atualiza��o s� � v�lida para novos relat�rios, os j� criados n�o se alteram.</p>
  </div>

-->

<hr><hr><hr>

  <button class="btn btn-success" type="submit">Guardar</button>

    <button class="btn btn-primary">Pr�-Visualizar Relat�rio</button>


</div>



<!--=====================================================================================================-->
<!--=====================================================================================================-->