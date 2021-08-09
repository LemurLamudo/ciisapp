<?php require_once INCLUDES.'template_header.php'; ?>

<link href="<?php echo CSS.'certificado.css' ?>" rel="stylesheet">

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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Certificado - Postmaster</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <img src="<?php echo IMAGES.'banner.jpg' ?>" class="img-fluid" alt="" />
                            </div>
                            <div class="col-4">
                                <h4 class="card-title mt-4 text-center"><b>XVIII POSTMASTER</b></h4>
                                <h5 class="card-title text-center"><b>Encuentro de egresados</b></h5>
                                
                                <!-- <img class="card-img-top mt-2" src="<?php echo IMAGES.'banner.jpg' ?>" alt="Unsplash"> -->
                                <h4 class="card-title mt-4"><b>Destinatario del certificado:</b></h4>
                                <div class="nav-item">
                                    <a class="nav-link d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                        <img src="<?php echo IMAGES.'avatar.png' ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark" id="name"></span>
                                    </a>
                                </div>
                                <div class="container mt-2">
                                    <button class="btn btn-light">Descarga</button>
                                    <button class="btn btn-light">Compartir</button>
                                </div>

                                <h4 class="card-title mt-5 text-center"><b><a href="">Actualiza tu certificado</a> con tu nombre correcto, recuerda que solo lo podrás hacer una vez.</b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once INCLUDES.'template_footer.php'; ?>
<script src="<?php echo JS.'certificado/index.js' ?>"></script>
