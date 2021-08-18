<?php require_once INCLUDES.'template_header.php'; ?>

<main class="content">
    <div class="container-fluid p-0 pt-1 pb-5">
      <div class="row">
          <div class="col-10">
            <h1 class="title mb-0 fw-bold">XXII Congreso Internacional de Informatica y Sistemas</h1>
          </div>
          <div class="col-2">
            <!-- <a href="#" class="btn btn-primary">Administración</a> -->
          </div>
      </div>
      <h4 class="title mb-0 mt-2">Del 8 al 12 de noviembre</h4>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Usuarios</h5>
                    </div>
                    <div class="row p-2" id="usuarios">

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3">
                <div class="card  w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Ganadores</h5>
                    </div>
                    <div class="row p-2" id="ganadores">
                    
                    </div>
                    <div class="card-body d-flex w-100">
                        <a href="javascript:void(0)" id="obtener_usuarios" class="btn btn-primary w-100">Sortear</a>
                    </div>
                </div>
            </div>
        </div>    
    </div>     
</main>

<?php require_once INCLUDES.'template_footer.php'; ?>
<script src="<?php echo JS.'usuario/index.js' ?>"></script>
