<?php include('functions.php');
headers();

// Ligação a Base de Dados
include '../ligacao_bd.php';
?>
<!--====================
# Indice:
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
#########################  1. DADOS da EMPRESA  ##########################
=======================================================================-->
<?php if($_GET['lista'] == 'dados_empresa'){ ?>
<!--====================
> PHP - Obter Dados 
=====================-->
<?php 
  $sql = "SELECT * FROM dados_empresa";
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
<!--====================
> Card Header 
=====================-->
<div class="card-header bg-white p-3">
  <div class="row">
    <div class="col-md-10">
      <h5 class="mb-0 text-primary"><i class="fa fa-building lead mr-2"></i> Dados da Empresa</h5>
    </div>
    <div class="col-md-2 float-right">
       <a href="configuracoes_editar.php?id_empresa=<?php echo $row["id_empresa"]; ?>&editar=dados_empresa">
        <span class="badge badge-warning align-self-center">Editar <i class="fa fa-edit ml-2"></i></span>
      </a>
    </div>
  </div>
</div>
<!--=========================
> Mostrar Dados da Empresa 
==========================-->
<ul class="list-group">
   <input type="hidden" name="id_ocorrencia" value="<?php echo $row["id_empresa"]; ?>">
   <li class="list-group-item"> <img src="<?php echo $row["url_imagem"]; ?>" width="100" height="100"> </li>
  <li class="list-group-item"> <h5>Nome:</h5> <?php echo $row["nome_empresa"]; ?> </li>
  <li class="list-group-item"> 
    <h5>Morada:</h5> <?php echo $row["morada_rua"]; ?>
    <br>
    <span class="small"><?php echo $row["morada_cod_postal"]; ?> - <?php echo $row["morada_localidade"]; ?></span>
  </li>
  <li class="list-group-item"> <h5>Telefone:</h5> <?php echo $row["telefone"]; ?> </li>
  <li class="list-group-item"> <h5>Email:</h5> <?php echo $row["email"]; ?> </li>
  <li class="list-group-item"> <h5>NIF:</h5> <?php echo $row["nif"]; ?> </li>
</ul>
<?php } ?>


<!--======================================================================
#########################  2. FUNCIONÁRIOS  ##########################
=======================================================================-->
<?php if($_GET['lista'] == 'funcionarios'){ ?>
<!--====================
> PHP - Obter Dados 
=====================-->
<?php 
  $sql = "SELECT * FROM funcionarios, mao_obra WHERE funcionarios.id_cargo = mao_obra.id_mao_obra";
  $res = $conn->query($sql);
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Funcionários</li>
  </ol>
</nav>
<!--====================
> Card Header 
=====================-->
<div class="card-header bg-white border-bottom p-3 py-3">
  <div class="row">
    <div class="col-md-10">
      <h5 class="mb-0 text-primary"><i class="fa fa-users lead mr-2"></i> Lista de Funcionários</h5>
    </div>
    <div class="col-md-2 float-right">
      <a href="configuracoes_inserir.php?inserir=funcionario">
        <span class="badge badge-warning align-self-center">Adicionar <i class="fa fa-plus ml-2"></i></span>
      </a>
    </div>
  </div>
</div>
<!--=========================
> Tabela - Dados Funcionários 
==========================-->
<section class="py-3">
<div class="row mb-3">
  <div class="col-xl-12 col-lg-12">
    <div class="table-responsive">
      <table id="tabela_funcionarios" class="table">
        <thead>
          <tr>
            <th></th>
            <th><small class="font-weight-bold">Nome</small></th>
            <th><small class="font-weight-bold">Data Nascimento</small></th>
            <th class="d-none d-sm-table-cell"><small class="font-weight-bold">Email</small></th>
            <th class="d-none d-sm-table-cell"><small class="font-weight-bold">Cargo</small></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- Gerar os dados PHP -->
          <?php while($row = $res->fetch_assoc()) { ?> 
            <input type="hidden" name="id_funcionario" value="<?php echo $row["id_funcionario"]; ?>">      
            <tr class="shadow-sm">
              <td><img src="<?php echo $row["img_funcionario"];?>" class="avatar rounded-circle"></td>

              <td><?php echo $row["nome_funcionario"]; ?></td>
              
              <td><span class="d-block"><?php echo date('d-m-Y', strtotime($row["data_nascimento"])); ?></span>

              <?php
                $datadonascimento = date('d-m-Y', strtotime($row["data_nascimento"]));
                // Separa em dia, mês e ano
                list($dia, $mes, $ano) = explode('-', $datadonascimento);

                // Descobre que dia é hoje e retorna a unix timestamp
                $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                // Descobre a unix timestamp da data de nascimento do fulano
                $diadonascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

                // Depois apenas fazemos o cálculo já citado :)
                $idade = floor((((($hoje - $diadonascimento) / 60) / 60) / 24) / 365.25);
              ?>
              <small class="text-muted"><?php echo $idade; ?> anos</small></td>

              <td class="text-center"><?php echo $row["email"]; ?></td>

              <td class="text-center"><?php echo $row["descricao"]; ?></td>


              <!-- Botão Editar -->
              <td class="align-middle">
                <a href="configuracoes_editar.php?id_funcionario=<?php echo $row['id_funcionario'];?>&editar=funcionario" class="badge badge-success text-white">Editar <i class="fa fa-times ml-1"></i>
                </a>
              <!-- Botão Eliminar -->
                <a href="configuracoes_eliminar.php?id_funcionario=<?php echo $row['id_funcionario'];?>&eliminar=funcionario" class="badge badge-danger text-white">Eliminar <i class="fa fa-times ml-1"></i>
                </a>
              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<!-- DataTables JS -->
<script>
$(document).ready(function() {
    $('#tabela_funcionarios').DataTable( {
      "order": [[ 1, "asc" ]],
      // Nãp Ordernar as Ações
      "columnDefs": [ { "orderable": false, "targets": [0,3,5] } ],
      // Mostra X Registos
      "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
      // Tradução
      // Icon Pesquisa
      "language": {
      "sEmptyTable":   "Não foi encontrado nenhum registo",
      "sLoadingRecords": "A carregar...",
      "sProcessing":   "A processar...",
      "sLengthMenu":   "Mostrar _MENU_ registos",
      "sZeroRecords":  "Não foram encontrados resultados",
      "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
      "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
      "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
      search: '<i class="fa fa-filter" aria-hidden="true"></i>',
      paginate: {
            first:    '«',
            previous: '‹',
            next:     '›',
            last:     '»'
        },
      },
      "oAria": {
        "SortAscending":  ": Ordenar colunas de forma ascendente",
        "SortDescending": ": Ordenar colunas de forma descendente"
      }    
    } );
} );
</script><!-- DataTables CSS -->
<style type="text/css">
.dataTables_wrapper .dataTables_length, .dataTables_filter, .dataTables_paginate, .dataTables_info {
  font-family: 'Muli', sans-serif;
  font-size: 0.9rem;
}

.dataTables_wrapper .dataTables_empty{
  font-weight: bold;
}
#tabela_funciona_filter{
  font-weight: bold;
}
#tabela_ocorrencias_filter input {
  width: 300px;
  border: 1px solid #000;
  text-indent: 0.5em;
}
</style>

<?php } ?>


<!--======================================================================
#########################  3. MÃO DE OBRA  ##########################
=======================================================================-->
<?php if($_GET['lista'] == 'mao_obra'){ ?>
<!--====================
> PHP - Obter Dados 
=====================-->
<?php 
  $sql = "SELECT * FROM mao_obra";
  $res = $conn->query($sql);
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Mão de Obra</li>
  </ol>
</nav>
<!--====================
> Card Header 
=====================-->
<div class="card-header bg-white border-bottom p-3 py-3">
  <div class="row">
    <div class="col-md-10">
      <h5 class="mb-0 text-primary"><i class="fa fa-hard-hat lead mr-2"></i> Lista de Mão de Obra</h5>
    </div>
    <div class="col-md-2 float-right">
       <a href="configuracoes_inserir.php?inserir=mao_obra">
        <span class="badge badge-warning align-self-center">Adicionar <i class="fa fa-plus ml-2"></i></span>
      </a>
    </div>
  </div>
</div>
<!--=========================
> Tabela - Dados Mão de Obra 
==========================-->
<section class="py-3">
<div class="row mb-3">
  <div class="col-xl-12 col-lg-12">
    <div class="table-responsive">
      <table id="tabela_mao_obra" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th><small class="font-weight-bold">Mão de Obra</small></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- Gerar os dados PHP -->
          <?php while($row = $res->fetch_assoc()) { ?>       
            <input type="hidden" name="id_funcionario" value="<?php echo $row_mao_obra["id_mao_obra"]; ?>"> 
            <tr class="shado  w-sm">
              <td><?php echo $row["id_mao_obra"]; ?></td>
              <td><?php echo $row["descricao"]; ?></td>

              <!-- Botão Editar -->
              <td class="align-middle">
                <a href="configuracoes_editar.php?id_mao_obra=<?php echo $row['id_mao_obra'];?>&editar=mao_obra" class="badge badge-success text-white">Editar <i class="fa fa-times ml-1"></i>
                </a>

              <!-- Botão Eliminar -->
                <a href="configuracoes_eliminar.php?id_mao_obra=<?php echo $row['id_mao_obra'];?>&eliminar=mao_obra" class="badge badge-danger text-white">Eliminar <i class="fa fa-times ml-1"></i>
                </a>
              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>



<hr>
<!-- ====== CATEGORIAS Mão de Obra ======-->
<!--====================
> PHP - Obter Dados 
=====================-->
<?php 
  $sql_cat = "SELECT * FROM mao_obra_categorias";
  $res_cat = $conn->query($sql_cat);
?>
<!--====================
> Card Header 
=====================-->
<div class="card-header bg-white border-bottom p-3 py-3">
  <div class="row">
    <div class="col-md-10">
      <h5 class="mb-0 text-primary"><i class="fa fa-hard-hat lead mr-2"></i> Lista de Mão de Obra</h5>
    </div>
    <div class="col-md-2 float-right">
       <a href="configuracoes_inserir.php?inserir=categoria_mao_obra">
        <span class="badge badge-warning align-self-center">Adicionar <i class="fa fa-plus ml-2"></i></span>
      </a>
    </div>
  </div>
</div>
<!--=========================
> Tabela - Dados Funcionários 
==========================-->
<section class="py-3">
<div class="row mb-3">
  <div class="col-xl-12 col-lg-12">
    <div class="table-responsive">
      <table id="tabela_categorias_mao_obra" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th><small class="font-weight-bold">Categoria Mão de Obra</small></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- Gerar os dados PHP -->
          <?php while($row_cat = $res_cat->fetch_assoc()) { ?>       
            <tr class="shadow-sm">
              <input type="hidden" name="id_funcionario" value="<?php echo $row_cat_mao_obra["id_categoria_mao_obra"]; ?>"> 
              <td><?php echo $row_cat["id_categoria_mao_obra"]; ?></td>
              <td><?php echo $row_cat["categoria_mao_obra"]; ?></td>

              <!-- Botão Editar -->
              <td class="align-middle">
                <a href="configuracoes_editar.php?id_categoria_mao_obra=<?php echo $row['id_categoria_mao_obra'];?>&editar=categoria_mao_obra" class="badge badge-success text-white">Editar <i class="fa fa-times ml-1"></i>
                </a>
              <!-- Botão Eliminar -->
                <a href="configuracoes_eliminar.php?id_categoria_mao_obra=<?php echo $row_cat['id_categoria_mao_obra'];?>&eliminar=categoria_mao_obra" class="badge badge-danger text-white">Eliminar <i class="fa fa-times ml-1"></i>
                </a>
              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>

<!-- DataTables JS -->
<script>
$(document).ready(function() {
    $('#tabela_mao_obra').DataTable( {
      "order": [[ 1, "asc" ]],
      // Nãp Ordernar as Ações
      "columnDefs": [ { "orderable": false, "targets": [0,2] } ],
      // Mostra X Registos
      "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
      // Tradução
      // Icon Pesquisa
      "language": {
      "sEmptyTable":   "Não foi encontrado nenhum registo",
      "sLoadingRecords": "A carregar...",
      "sProcessing":   "A processar...",
      "sLengthMenu":   "Mostrar _MENU_ registos",
      "sZeroRecords":  "Não foram encontrados resultados",
      "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
      "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
      "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
      search: '<i class="fa fa-filter" aria-hidden="true"></i>',
      paginate: {
            first:    '«',
            previous: '‹',
            next:     '›',
            last:     '»'
        },
      },
      "oAria": {
        "SortAscending":  ": Ordenar colunas de forma ascendente",
        "SortDescending": ": Ordenar colunas de forma descendente"
      }    
    } );
} );
</script><!-- DataTables CSS -->
<style type="text/css">
.dataTables_wrapper .dataTables_length, .dataTables_filter, .dataTables_paginate, .dataTables_info {
  font-family: 'Muli', sans-serif;
  font-size: 0.9rem;
}

.dataTables_wrapper .dataTables_empty{
  font-weight: bold;
}
#tabela_mao_obra_filter{
  font-weight: bold;
}
#tabela_mao_obra_filter input {
  width: 300px;
  border: 1px solid #000;
  text-indent: 0.5em;
}
</style>


<?php } ?>




<!--======================================================================
#########################  4. EQUIPAMENTOS  ##########################
=======================================================================-->
<?php if($_GET['lista'] == 'equipamentos'){ ?>
  <!--====================
> PHP - Obter Dados 
=====================-->
<?php 
  $sql = "SELECT * FROM equipamentos";
  $res = $conn->query($sql);
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Equipamentos</li>
  </ol>
</nav>
<!--====================
> Card Header 
=====================-->
<div class="card-header bg-white border-bottom p-3">
  <div class="row">
    <div class="col-md-10">
      <h5 class="mb-0 text-primary"><i class="fa fa-tools lead mr-2"></i> Lista de Equipamentos</h5>
    </div>
    <div class="col-md-2 float-right">
       <a href="configuracoes_inserir.php?inserir=equipamento">
        <span class="badge badge-warning align-self-center">Adicionar <i class="fa fa-plus ml-2"></i></span>
      </a>
    </div>
  </div>
</div>
<!--=========================
> Tabela - Dados Funcionários 
==========================-->
<section class="py-3">
<div class="row mb-3">
  <div class="col-xl-12 col-lg-12">
    <div class="table-responsive">
      <table id="tabela_equipamentos" class="table">
        <thead>
          <tr>
            <th class="text-center"><small class="font-weight-bold">ID</small></th>
            <th><small class="font-weight-bold">Tipo de Equipamento</small></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- Gerar os dados PHP -->
          <?php while($row = $res->fetch_assoc()) { ?> 
            <input type="hidden" name="id_equipamento" value="<?php echo $row["id_equipamento"]; ?>">      
            <tr class="shadow-sm">
              <td class="text-center"><?php echo $row["id_equipamento"]; ?></td>
              <td><span class="d-block"><?php echo $row["nome_equipamento"]; ?></span> <small class="text-muted">0 registos</small></td>
              
              <!-- Botão Editar -->
              <td class="align-middle">
                <a href="configuracoes_editar.php?id_equipamento=<?php echo $row['id_equipamento'];?>&editar=equipamento" class="badge badge-success text-white">Editar <i class="fa fa-times ml-1"></i>
                </a>
              <!-- Botão Eliminar -->
                <a href="configuracoes_eliminar.php?id_equipamento=<?php echo $row['id_equipamento'];?>&eliminar=equipamento" class="badge badge-danger text-white">Eliminar <i class="fa fa-times ml-1"></i>
                </a>
              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<!-- DataTables JS -->
<script>
$(document).ready(function() {
    $('#tabela_equipamentos').DataTable( {
      "order": [[ 1, "asc" ]],
      // Nãp Ordernar as Ações
      "columnDefs": [ { "orderable": false, "targets": [0,2] } ],
      // Mostra X Registos
      "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
      // Tradução
      // Icon Pesquisa
      "language": {
      "sEmptyTable":   "Não foi encontrado nenhum registo",
      "sLoadingRecords": "A carregar...",
      "sProcessing":   "A processar...",
      "sLengthMenu":   "Mostrar _MENU_ registos",
      "sZeroRecords":  "Não foram encontrados resultados",
      "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
      "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
      "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
      search: '<i class="fa fa-filter" aria-hidden="true"></i>',
      paginate: {
            first:    '«',
            previous: '‹',
            next:     '›',
            last:     '»'
        },
      },
      "oAria": {
        "SortAscending":  ": Ordenar colunas de forma ascendente",
        "SortDescending": ": Ordenar colunas de forma descendente"
      }    
    } );
} );
</script><!-- DataTables CSS -->
<style type="text/css">
.dataTables_wrapper .dataTables_length, .dataTables_filter, .dataTables_paginate, .dataTables_info {
  font-family: 'Muli', sans-serif;
  font-size: 0.9rem;
}

.dataTables_wrapper .dataTables_empty{
  font-weight: bold;
}
#tabela_equipamentos_filter{
  font-weight: bold;
}
#tabela_equipamentos_filter input {
  width: 300px;
  border: 1px solid #000;
  text-indent: 0.5em;
}
</style>


<?php } ?>


<!--======================================================================
#########################  5. VEÍCULOS  ##########################
=======================================================================-->
<?php if($_GET['lista'] == 'veiculos'){ ?>
<!--====================
> PHP - Obter Dados 
=====================-->
<?php 
  $sql = "SELECT * FROM veiculos";
  $res = $conn->query($sql);
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Veículos</li>
  </ol>
</nav>
<!--====================
> Card Header 
=====================-->
<div class="card-header bg-white border-bottom p-3">
  <div class="row">
    <div class="col-md-10">
      <h5 class="mb-0 text-primary"><i class="fa fa-truck-pickup lead mr-2"></i> Lista de Veículos</h5>
    </div>
    <div class="col-md-2 float-right">
      <a href="configuracoes_inserir.php?inserir=veiculo">
        <span class="badge badge-warning align-self-center">Adicionar <i class="fa fa-plus ml-2"></i></span>
      </a>
    </div>
  </div>
</div>
<!--=========================
> Tabela - Dados Veículos 
==========================-->
<section class="py-3">
<div class="row mb-3">
  <div class="col-xl-12 col-lg-12">
    <div class="table-responsive">
      <table id="tabela_veiculos" class="table">
        <thead>
          <tr>
            <th><small class="font-weight-bold">ID</small></th>
            <th></th>
            <th><small class="font-weight-bold">Marca</small></th>
            <th><small class="font-weight-bold">Modelo</small></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- Gerar os dados PHP -->
          <?php while($row = $res->fetch_assoc()) { ?> 
            <input type="hidden" name="id_equipamento" value="<?php echo $row["id_veiculo"]; ?>">  
            <tr class="shadow-sm">
              <td><?php echo $row["id_veiculo"]; ?></td>

              <td><img src="<?php echo $row["img_veiculo"];?>" class="avatar rounded-circle"></td>
      
              <td class="text-center"><?php echo $row["marca"]; ?></td>

              <td class="text-center"><?php echo $row["modelo"]; ?></td>

              <!-- Botão Editar -->
              <td class="align-middle">
                <a href="configuracoes_editar.php?id_veiculo=<?php echo $row['id_veiculo'];?>&editar=veiculo" class="badge badge-success text-white">Editar <i class="fa fa-times ml-1"></i>
                </a>
              <!-- Botão Eliminar -->
                <a href="configuracoes_eliminar.php?id_veiculo=<?php echo $row['id_veiculo'];?>&eliminar=veiculo" class="badge badge-danger text-white">Eliminar <i class="fa fa-times ml-1"></i>
                </a>
              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</div>

<!-- DataTables JS -->
<script>
$(document).ready(function() {
    $('#tabela_veiculos').DataTable( {
      "order": [[ 0, "asc" ]],
      // Nãp Ordernar as Ações
      "columnDefs": [ { "orderable": false, "targets": [1,4] } ],
      // Mostra X Registos
      "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
      // Tradução
      // Icon Pesquisa
      "language": {
      "sEmptyTable":   "Não foi encontrado nenhum registo",
      "sLoadingRecords": "A carregar...",
      "sProcessing":   "A processar...",
      "sLengthMenu":   "Mostrar _MENU_ registos",
      "sZeroRecords":  "Não foram encontrados resultados",
      "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
      "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
      "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
      search: '<i class="fa fa-filter" aria-hidden="true"></i>',
      paginate: {
            first:    '«',
            previous: '‹',
            next:     '›',
            last:     '»'
        },
      },
      "oAria": {
        "SortAscending":  ": Ordenar colunas de forma ascendente",
        "SortDescending": ": Ordenar colunas de forma descendente"
      }    
    } );
} );
</script><!-- DataTables CSS -->
<style type="text/css">
.dataTables_wrapper .dataTables_length, .dataTables_filter, .dataTables_paginate, .dataTables_info {
  font-family: 'Muli', sans-serif;
  font-size: 0.9rem;
}

.dataTables_wrapper .dataTables_empty{
  font-weight: bold;
}
#tabela_veiculos_filter{
  font-weight: bold;
}
#tabela_veiculos_filter input {
  width: 300px;
  border: 1px solid #000;
  text-indent: 0.5em;
}
</style>

<?php } ?>



<!--======================================================================
#########################  6. TAREFAS  ##########################
=======================================================================-->
<?php if($_GET['lista'] == 'tarefas'){ ?>
  <!--====================
> PHP - Obter Dados 
=====================-->
<?php 
  $sql = "SELECT * FROM tarefas";
  $res = $conn->query($sql);
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Tarefas</li>
  </ol>
</nav>
<!--====================
> Card Header 
=====================-->
<div class="card-header bg-white border-bottom p-3">
  <div class="row">
    <div class="col-md-10">
      <h5 class="mb-0 text-primary"><i class="fa fa-tasks lead mr-2"></i> Lista de Tarefas</h5>
    </div>
    <div class="col-md-2 float-right">
       <a href="configuracoes_inserir.php?inserir=tarefa">
        <span class="badge badge-warning align-self-center">Adicionar <i class="fa fa-plus ml-2"></i></span>
      </a>
    </div>
  </div>
</div>
<!--=========================
> Tabela - Dados Funcionários 
==========================-->
<section class="py-3">
<div class="row mb-3">
  <div class="col-xl-12 col-lg-12">
    <div class="table-responsive">
      <table id="tabela_tarefas" class="table">
        <thead>
          <tr>
            <th>#</th>
            <th><small class="font-weight-bold">Tarefa</small></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- Gerar os dados PHP -->
          <?php while($row = $res->fetch_assoc()) { ?> 
            <input type="hidden" name="id_veiculo" value="<?php echo $row["id_veiculo"]; ?>">      
            <tr class="shadow-sm">      
              <td><?php echo $row["id_tarefa"]; ?></td>

              <td><span class="d-block"><?php echo $row["nome_tarefa"]; ?></span>
              <small class="text-muted">Nº Subtarefas </small></td>

              <!-- Botão Editar -->
              <td class="align-middle">
                <a href="configuracoes_editar.php?id_tarefa=<?php echo $row['id_tarefa'];?>&editar=tarefa" class="badge badge-success text-white">Editar <i class="fa fa-times ml-1"></i>
                </a>
              <!-- Botão Eliminar -->
                <a href="configuracoes_eliminar.php?id_tarefa=<?php echo $row['id_tarefa'];?>&eliminar=tarefa" class="badge badge-danger text-white">Eliminar <i class="fa fa-times ml-1"></i>
                </a>
              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</div>

<!-- DataTables JS -->
<script>
$(document).ready(function() {
    $('#tabela_tarefas').DataTable( {
      "order": [[ 1, "asc" ]],
      // Nãp Ordernar as Ações
      "columnDefs": [ { "orderable": false, "targets": [0,2] } ],
      // Mostra X Registos
      "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
      // Tradução
      // Icon Pesquisa
      "language": {
      "sEmptyTable":   "Não foi encontrado nenhum registo",
      "sLoadingRecords": "A carregar...",
      "sProcessing":   "A processar...",
      "sLengthMenu":   "Mostrar _MENU_ registos",
      "sZeroRecords":  "Não foram encontrados resultados",
      "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
      "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
      "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
      search: '<i class="fa fa-filter" aria-hidden="true"></i>',
      paginate: {
            first:    '«',
            previous: '‹',
            next:     '›',
            last:     '»'
        },
      },
      "oAria": {
        "SortAscending":  ": Ordenar colunas de forma ascendente",
        "SortDescending": ": Ordenar colunas de forma descendente"
      }    
    } );
} );
</script><!-- DataTables CSS -->
<style type="text/css">
.dataTables_wrapper .dataTables_length, .dataTables_filter, .dataTables_paginate, .dataTables_info {
  font-family: 'Muli', sans-serif;
  font-size: 0.9rem;
}

.dataTables_wrapper .dataTables_empty{
  font-weight: bold;
}
#tabela_tarefas_filter{
  font-weight: bold;
}
#tabela_tarefas_filter input {
  width: 300px;
  border: 1px solid #000;
  text-indent: 0.5em;
}
</style>


<?php } ?>
<!--======================================================================
#########################  7. OCORRÊNCIAS  ##########################
=======================================================================-->
<?php if($_GET['lista'] == 'ocorrencias'){ ?>
  <!--====================
> PHP - Obter Dados 
=====================-->
<?php 
  $sql = "SELECT * FROM ocorrencias";
  $res = $conn->query($sql);
?>
<!--====================
> Breadcrumbs 
=====================-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">Ocorrências</li>
  </ol>
</nav>
<!--====================
> Card Header 
=====================-->
<div class="card-header bg-white border-bottom p-3">
  <div class="row">
    <div class="col-md-10">
      <h5 class="mb-0 text-primary"><i class="fa fa-exclamation-circle lead mr-2"></i> Tipos de Ocorências</h5>
    </div>
    <div class="col-md-2 float-right">
       <a href="configuracoes_inserir.php?inserir=ocorrencia">
        <span class="badge badge-warning align-self-center">Adicionar <i class="fa fa-plus ml-2"></i></span>
      </a>
    </div>
  </div>
</div>
<!--=========================
> Tabela - Dados Ocorrências
==========================-->
<section class="py-3">
<div class="row mb-3">
  <div class="col-xl-12 col-lg-12">
    <div class="table-responsive">
      <table id="tabela_ocorrencias" class="table">
        <thead>
          <tr>
            <th class="text-center"><small class="font-weight-bold">ID</small></th>
            <th><small class="font-weight-bold">Tipo de Ocorrência</small></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- Gerar os dados PHP -->
          <?php while($row = $res->fetch_assoc()) { ?> 
            <input type="hidden" name="id_ocorrencia" value="<?php echo $row["id_ocorrencia"]; ?>">      
            <tr class="shadow-sm">
              <td class="text-center"><?php echo $row["id_ocorrencia"]; ?></td>
              <td><span class="d-block"><?php echo $row["tipo_ocorrencia"]; ?></span> <small class="text-muted">0 registos</small></td>
              
              <!-- Botão Editar -->
              <td class="align-middle">
                <a href="configuracoes_editar.php?id_ocorrencia=<?php echo $row['id_ocorrencia'];?>&editar=ocorrencia" class="badge badge-success text-white">Editar <i class="fa fa-times ml-1"></i>
                </a>
              <!-- Botão Eliminar -->
                  <a href="eliminar.php?id_autor=<?php echo $row['id_autor'];?>&tipo=eliminar_autor">

                    <a href="configuracoes_eliminar.php?id_ocorrencia=<?php echo $row['id_ocorrencia'];?>&eliminar=ocorrencia" class="badge badge-danger text-white">Eliminar <i class="fa fa-times ml-1"></i>
                </a>
              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<!-- DataTables JS -->
<script>
$(document).ready(function() {
    $('#tabela_ocorrencias').DataTable( {
      "order": [[ 1, "asc" ]],
      // Nãp Ordernar as Ações
      "columnDefs": [ { "orderable": false, "targets": [0,2] } ],
      // Mostra X Registos
      "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
      // Tradução
      // Icon Pesquisa
      "language": {
      "sEmptyTable":   "Não foi encontrado nenhum registo",
      "sLoadingRecords": "A carregar...",
      "sProcessing":   "A processar...",
      "sLengthMenu":   "Mostrar _MENU_ registos",
      "sZeroRecords":  "Não foram encontrados resultados",
      "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
      "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
      "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
      search: '<i class="fa fa-filter" aria-hidden="true"></i>',
      paginate: {
            first:    '«',
            previous: '‹',
            next:     '›',
            last:     '»'
        },
      },
      "oAria": {
        "SortAscending":  ": Ordenar colunas de forma ascendente",
        "SortDescending": ": Ordenar colunas de forma descendente"
      }    
    } );
} );
</script><!-- DataTables CSS -->
<style type="text/css">
.dataTables_wrapper .dataTables_length, .dataTables_filter, .dataTables_paginate, .dataTables_info {
  font-family: 'Muli', sans-serif;
  font-size: 0.9rem;
}

.dataTables_wrapper .dataTables_empty{
  font-weight: bold;
}
#tabela_ocorrencias_filter{
  font-weight: bold;
}
#tabela_ocorrencias_filter input {
  width: 300px;
  border: 1px solid #000;
  text-indent: 0.5em;
}
</style>

<?php } ?>

</body>
</html>

























