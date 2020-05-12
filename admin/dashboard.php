<?php include('functions.php');
headers();

// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<?php function dashboard_1() { ?>

    <section class="py-3">
      <div class="row mb-3">
        <!-- Card 1 -->
        <div class="col-xl-3 col-lg-6">
          <div class="card border-0 shadow-sm shadow-hover">
            <div class="card-body d-flex">
              <div>
                <div class="circle bg-primary rounded-circle d-flex align-self-center mr-3">
                  <i class="fa fa-caret-square-o-up text-primary align-self-center mx-auto lead"></i>
              </div>
            </div>
            <div class="">
              <h5 class="mb-0">0</h5>
              <small class="text-muted">Obras em Andamento</small>
          </div>
        </div>
      </div>
    </div>
    <!-- Card 2 -->
    <div class="col-xl-3 col-lg-6">
          <div class="card border-0 shadow-sm shadow-hover">
            <div class="card-body d-flex">
              <div>
                <div class="circle bg-primary rounded-circle d-flex align-self-center mr-3">
                  <i class="fa fa-caret-square-o-up text-primary align-self-center mx-auto lead"></i>
              </div>
            </div>
            <div class="">
              <h5 class="mb-0">0</h5>
              <small class="text-muted">Obras para Iniciar</small>
          </div>
        </div>
      </div>
    </div>
    <!-- Card 3 -->
    <div class="col-xl-3 col-lg-6">
          <div class="card border-0 shadow-sm shadow-hover">
            <div class="card-body d-flex">
              <div>
                <div class="circle bg-primary rounded-circle d-flex align-self-center mr-3">
                  <i class="fa fa-caret-square-o-up text-primary align-self-center mx-auto lead"></i>
              </div>
            </div>
            <div class="">
              <h5 class="mb-0">3200</h5>
              <small class="text-muted">Total Obras</small>
          </div>
        </div>
      </div>
    </div>
    <!-- Card 4 -->
    <div class="col-xl-3 col-lg-6">
          <div class="card border-0 shadow-sm shadow-hover">
            <div class="card-body d-flex">
              <div>
                <div class="circle bg-primary rounded-circle d-flex align-self-center mr-3">
                  <i class="fa fa-caret-square-o-up text-primary align-self-center mx-auto lead"></i>
              </div>
            </div>
            <div class="">
              <h5 class="mb-0">3200</h5>
              <small class="text-muted">Orçamentos Pendentes</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-xl-7 col-lg-12">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th colspan="2"><small class="font-weight-bold">Utilizadores | Obras em Curso</small></th>
              <th><small class="font-weight-bold">Estado</small></th>
              <th><small class="font-weight-bold">Configuração</small></th>
            </tr>
          </thead>
          <tbody>
            <tr class="shadow-sm">
              <td><img src="foto1.jpg" class="avatar rounded-circle"></td>
              <td><span class="d-block">Cristina</span> <small class="text-muted">cristina@gmail.com</small></td>
              <td class="align-middle"><span class="badge badge-primary text-primary">Ativo</td>
              <td class="align-middle"><span class="badge badge-secondary">Adicionar Registo <i class="fa fa-edit"></i></span></td>
            </tr>
            <tr class="shadow-sm">
              <td><img src="foto2.jpg" class="avatar rounded-circle"></td>
              <td><span class="d-block">João</span> <small class="text-muted">joaoguerreiro@gmail.com</small></td>
              <td class="align-middle"><span class="badge badge-primary text-primary">Ativo</td>
              <td class="align-middle"><span class="badge badge-secondary">Editar <i class="fa fa-edit"></i></span></td>
            </tr>
            <tr class="shadow-sm">
              <td><img src="foto1.jpg" class="avatar rounded-circle"></td>
              <td><span class="d-block">Tatiana</span> <small class="text-muted">tatiana@gmail.com</small></td>
              <td class="align-middle"><span class="badge badge-primary text-primary">Ativo</span></td>
              <td class="align-middle"><span class="badge badge-secondary">Editar<i class="fa fa-edit"></i></span></td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>

    <div class="col-xl-5 col-lg-12">
      <div class="card mb-5 shadow-sm shadow-hover border-0">
        
        <div class="card-header bg-light border-0 pt-3 pb-0">
          <h6 class="mb-0">Mensagens</h6>
        </div>

        <div class="card-body">
          <div class="d-flex border-bottom py-3">
            <div class="mr-3">
              <img src="foto2.jpg" class="avatar rounded-circle">
            </div>
            <div>
              <div class="d-flex">
                <p class="mb-0">António Moreira</p>
                <small class="text-muted ml-auto">há 2 horas</small>
              </div>
                <small class="text-muted">Podes enviar o orçamento do Sr. Alberto para apreciação!</small>
              </div>
            </div>
            <div class="d-flex border-bottom py-3">
              <div class="mr-3">
                <img src="foto2.jpg" class="avatar rounded-circle">
              </div>
            <div>
              <div class="d-flex">
                <p class="mb-0">António Moreira</p>
                <small class="text-muted ml-auto">há 2 horas</small>
              </div>
                <small class="text-muted">Podes enviar o orçamento do Sr. Alberto para apreciação!</small>
              </div>
            </div>
            <div class="text-center pt-3">
              <a href=""><small>Ver todas as mensagens</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-lg-4">
        <div class="card w-100 shadow-sm shadow-hover">
          <div class="card-body">
            <h5 class="mb-0">Apresentação</h5>
            <small class="d-inline-block text-muted mb-2">xxxxxxxs</small>
            <div class="mb-4">
              <span class="badge badge-primary text-primary mr-1">XXXXXXXXXX</span>
              <span class="badge badge-primary text-primary">XXXXXXX</span>
            </div>
            <div class="d-flex">
              <div>
                <img src="foto1.jpg" class="avatar rounded-circle">
                <img src="foto2.jpg" class="avatar rounded-circle">
              </div>
            <div class="d-flex ml-auto">
              <span class="badge badge-secondary align-self-center">Assistir <i class="fa fa-home ml-2"></i></span>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card w-100 shadow-sm shadow-hover">
          <div class="card-body">
            <h5 class="mb-0">Apresentação</h5>
            <small class="d-inline-block text-muted mb-2">xxxxxxxs</small>
            <div class="mb-4">
              <span class="badge badge-primary text-primary mr-1">XXXXXXXXXX</span>
              <span class="badge badge-primary text-primary">XXXXXXX</span>
            </div>
            <div class="d-flex">
              <div>
                <img src="foto1.jpg" class="avatar rounded-circle">
                <img src="foto2.jpg" class="avatar rounded-circle">
              </div>
            <div class="d-flex ml-auto">
              <span class="badge badge-secondary align-self-center">Assistir <i class="fa fa-home ml-2"></i></span>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card w-100 shadow-sm shadow-hover">
          <div class="card-body">
            <h5 class="mb-0">Apresentação</h5>
            <small class="d-inline-block text-muted mb-2">xxxxxxxs</small>
            <div class="mb-4">
              <span class="badge badge-primary text-primary mr-1">XXXXXXXXXX</span>
              <span class="badge badge-primary text-primary">XXXXXXX</span>
            </div>
            <div class="d-flex">
              <div>
                <img src="foto1.jpg" class="avatar rounded-circle">
                <img src="foto2.jpg" class="avatar rounded-circle">
              </div>
            <div class="d-flex ml-auto">
              <span class="badge badge-secondary align-self-center">Assistir <i class="fa fa-home ml-2"></i></span>
            </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
</div>



  <?php } ?>



  <?php dashboard_2(); ?>




<?php function dashboard_2() { ?>

    <section class="py-3">
      <div class="row mb-3">
        <!-- Card 1 -->
        <div class="col-xl-3 col-lg-6">
          <div class="card border-0 shadow-sm shadow-hover">
            <div class="card-body d-flex">
              <div>
                <div class="circle bg-primary rounded-circle d-flex align-self-center mr-3">
                  <i class="fa fa-caret-square-o-up text-primary align-self-center mx-auto lead"></i>
              </div>
            </div>
            <div class="">
              <h5 class="mb-0">0</h5>
              <small class="text-muted">Obras em Andamento</small>
          </div>
        </div>
      </div>
    </div>
    <!-- Card 2 -->
    <div class="col-xl-3 col-lg-6">
          <div class="card border-0 shadow-sm shadow-hover">
            <div class="card-body d-flex">
              <div>
                <div class="circle bg-primary rounded-circle d-flex align-self-center mr-3">
                  <i class="fa fa-caret-square-o-up text-primary align-self-center mx-auto lead"></i>
              </div>
            </div>
            <div class="">
              <h5 class="mb-0">0</h5>
              <small class="text-muted">Obras para Iniciar</small>
          </div>
        </div>
      </div>
    </div>
    <!-- Card 3 -->
    <div class="col-xl-3 col-lg-6">
          <div class="card border-0 shadow-sm shadow-hover">
            <div class="card-body d-flex">
              <div>
                <div class="circle bg-primary rounded-circle d-flex align-self-center mr-3">
                  <i class="fa fa-caret-square-o-up text-primary align-self-center mx-auto lead"></i>
              </div>
            </div>
            <div class="">
              <h5 class="mb-0">3200</h5>
              <small class="text-muted">Total Obras</small>
          </div>
        </div>
      </div>
    </div>
    <!-- Card 4 -->
    <div class="col-xl-3 col-lg-6">
          <div class="card border-0 shadow-sm shadow-hover">
            <div class="card-body d-flex">
              <div>
                <div class="circle bg-primary rounded-circle d-flex align-self-center mr-3">
                  <i class="fa fa-caret-square-o-up text-primary align-self-center mx-auto lead"></i>
              </div>
            </div>
            <div class="">
              <h5 class="mb-0">3200</h5>
              <small class="text-muted">Orçamentos Pendentes</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-xl-7 col-lg-12">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th colspan="2"><small class="font-weight-bold">Utilizadores | Obras em Curso</small></th>
              <th><small class="font-weight-bold">Estado</small></th>
              <th><small class="font-weight-bold">Configuração</small></th>
            </tr>
          </thead>
          <tbody>
            <tr class="shadow-sm">
              <td><img src="foto1.jpg" class="avatar rounded-circle"></td>
              <td><span class="d-block">Cristina</span> <small class="text-muted">cristina@gmail.com</small></td>
              <td class="align-middle"><span class="badge badge-primary text-primary">Ativo</td>
              <td class="align-middle"><span class="badge badge-secondary">Adicionar Registo <i class="fa fa-edit"></i></span></td>
            </tr>
            <tr class="shadow-sm">
              <td><img src="foto2.jpg" class="avatar rounded-circle"></td>
              <td><span class="d-block">João</span> <small class="text-muted">joaoguerreiro@gmail.com</small></td>
              <td class="align-middle"><span class="badge badge-primary text-primary">Ativo</td>
              <td class="align-middle"><span class="badge badge-secondary">Editar <i class="fa fa-edit"></i></span></td>
            </tr>
            <tr class="shadow-sm">
              <td><img src="foto1.jpg" class="avatar rounded-circle"></td>
              <td><span class="d-block">Tatiana</span> <small class="text-muted">tatiana@gmail.com</small></td>
              <td class="align-middle"><span class="badge badge-primary text-primary">Ativo</span></td>
              <td class="align-middle"><span class="badge badge-secondary">Editar<i class="fa fa-edit"></i></span></td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>

    <div class="col-xl-5 col-lg-12">
      <div class="card mb-5 shadow-sm shadow-hover border-0">
        
        <div class="card-header bg-light border-0 pt-3 pb-0">
          <h6 class="mb-0">Mensagens</h6>
        </div>

        <div class="card-body">
          <div class="d-flex border-bottom py-3">
            <div class="mr-3">
              <img src="foto2.jpg" class="avatar rounded-circle">
            </div>
            <div>
              <div class="d-flex">
                <p class="mb-0">António Moreira</p>
                <small class="text-muted ml-auto">há 2 horas</small>
              </div>
                <small class="text-muted">Podes enviar o orçamento do Sr. Alberto para apreciação!</small>
              </div>
            </div>
            <div class="d-flex border-bottom py-3">
              <div class="mr-3">
                <img src="foto2.jpg" class="avatar rounded-circle">
              </div>
            <div>
              <div class="d-flex">
                <p class="mb-0">António Moreira</p>
                <small class="text-muted ml-auto">há 2 horas</small>
              </div>
                <small class="text-muted">Podes enviar o orçamento do Sr. Alberto para apreciação!</small>
              </div>
            </div>
            <div class="text-center pt-3">
              <a href=""><small>Ver todas as mensagens</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-lg-4">
        <div class="card w-100 shadow-sm shadow-hover">
          <div class="card-body">
            <h5 class="mb-0">Apresentação</h5>
            <small class="d-inline-block text-muted mb-2">xxxxxxxs</small>
            <div class="mb-4">
              <span class="badge badge-primary text-primary mr-1">XXXXXXXXXX</span>
              <span class="badge badge-primary text-primary">XXXXXXX</span>
            </div>
            <div class="d-flex">
              <div>
                <img src="foto1.jpg" class="avatar rounded-circle">
                <img src="foto2.jpg" class="avatar rounded-circle">
              </div>
            <div class="d-flex ml-auto">
              <span class="badge badge-secondary align-self-center">Assistir <i class="fa fa-home ml-2"></i></span>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card w-100 shadow-sm shadow-hover">
          <div class="card-body">
            <h5 class="mb-0">Apresentação</h5>
            <small class="d-inline-block text-muted mb-2">xxxxxxxs</small>
            <div class="mb-4">
              <span class="badge badge-primary text-primary mr-1">XXXXXXXXXX</span>
              <span class="badge badge-primary text-primary">XXXXXXX</span>
            </div>
            <div class="d-flex">
              <div>
                <img src="foto1.jpg" class="avatar rounded-circle">
                <img src="foto2.jpg" class="avatar rounded-circle">
              </div>
            <div class="d-flex ml-auto">
              <span class="badge badge-secondary align-self-center">Assistir <i class="fa fa-home ml-2"></i></span>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card w-100 shadow-sm shadow-hover">
          <div class="card-body">
            <h5 class="mb-0">Apresentação</h5>
            <small class="d-inline-block text-muted mb-2">xxxxxxxs</small>
            <div class="mb-4">
              <span class="badge badge-primary text-primary mr-1">XXXXXXXXXX</span>
              <span class="badge badge-primary text-primary">XXXXXXX</span>
            </div>
            <div class="d-flex">
              <div>
                <img src="foto1.jpg" class="avatar rounded-circle">
                <img src="foto2.jpg" class="avatar rounded-circle">
              </div>
            <div class="d-flex ml-auto">
              <span class="badge badge-secondary align-self-center">Assistir <i class="fa fa-home ml-2"></i></span>
            </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
</div>



  <?php } ?>


  </body>
</html>


 