<?php require_once INCLUDES.'template_header.php'; ?>

<main class="content">
    <div class="container-fluid p-0 pt-1 pb-5">
        <div class="row">
            <div class="col-12">
<<<<<<< HEAD
                <div class="card">
                    <div class="row">
                        <div class="col-10">
                            <div class="card-header">
                                <h5 class="card-title mb-0">XXII CONGRESO INTERNACIONAL DE INFORMÁTICA Y SISTEMAS</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-0">Del 8 al 12 de noviembre</h5>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary">Administración</a>
                            </div>
                        </div>
                    </div>
                </div>
=======
              <h1 class="title mb-0 fw-bold">XXII Congreso Internacional de Informatica y Sistemas</h1>
              <h4 class="title mb-0 mt-2">Del 8 al 12 de noviembre</h4>
>>>>>>> c4890c1abaaf9d2012339b4d97230b5f726a3bf3
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-section-header">
                        <h5 class="card-title mb-0 card-section-title">Asistencia</h5>
                    </div>
                    <div class="card-body pt-0">
                      <div class="card shadow-none">
                      <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                          <li class="nav-item">
                            <a class="nav-link active" href="#">Hoy</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Mañana</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body">
                      <div class="row">
                            <?php 
                                foreach([1,0,0,0] as $data){ 
                                    if($data == 1) { ?>
                                    <div class="col-12 mb-4 mb-md-0">
                                        <div class="card mb-3 shadow-none">
                                          <div class="row g-0">
                                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <div class="d-flex" style="width:100px;height:100px;border-radius:50%;overflow:hidden;"><img class="card-img-top" src="<?php echo IMAGES.'postmaster/ponentes/AngelSMRospigliosi.png' ?>" alt="Unsplash"></div>
                                            </div>
                                            <div class="col-md-8">
                                              <div class="card-body text-left">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                              </div>
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-center align-items-center"><a href="#" class="btn btn-primary">Marcar asistencia</a></div>
                                          </div>
                                        </div>
                                    </div>
                            <?php   } else { ?>
                                      <div class="col-12 mb-4 mb-md-0" style="opacity:0.5"> 
                                        <div class="card mb-3 shadow-none">
                                          <div class="row g-0">
                                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <div class="d-flex" style="width:100px;height:100px;border-radius:50%;overflow:hidden;"><img class="card-img-top" src="<?php echo IMAGES.'postmaster/ponentes/AngelSMRospigliosi.png' ?>" alt="Unsplash"></div>
                                            </div>
                                            <div class="col-md-8">
                                              <div class="card-body text-left">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                              </div>
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-center align-items-center"><a href="#" class="btn btn-primary">Marcar asistencia</a></div>
                                          </div>
                                        </div>
                                    </div>
                            <?php   }
                                } ?>
                        </div>
                      </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-section-header">
                        <h5 class="card-title card-section-title mb-0">Horario</h5>
                    </div>
                    <div class="card-body">
                      <div class="timetable-wrapper" style="overflow-x:auto">
                        <?php require_once INCLUDES.'inc_timetable.php'; ?>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once INCLUDES.'template_footer.php'; ?>
