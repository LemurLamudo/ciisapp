<?php require_once INCLUDES.'template_header.php'; ?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">XXII CONGRESO INTERNACIONAL DE INFORMÁTICA Y SISTEMAS</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-0">Del 8 al 12 de noviembre</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">ASISTENCIA</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php 
                                foreach([1,0,0,0] as $data){ 
                                    if($data == 1) { ?>
                                    <div class="col-12 col-md-3">
                                        <div class="card">
                                            <img class="card-img-top" src="<?php echo IMAGES.'postmaster/ponentes/AngelSMRospigliosi.png' ?>" alt="Unsplash">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Card with image and button</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Marcar Asistencia</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php   } else { ?>
                                    <div class="col-12 col-md-3">
                                        <div class="card" style="opacity: 0.5;">
                                            <img class="card-img-top" style="opacity: 0.5;" src="<?php echo IMAGES.'postmaster/ponentes/AngelSMRospigliosi.png' ?>" alt="Unsplash">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Card with image and button</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">No Disponible</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php   }
                                } ?>
                        </div>
                        <div>
                            
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
                    <div class="card-header">
                        <h5 class="card-title mb-0">Horario</h5>
                    </div>
                    <div class="card-body">
                      <?php require_once INCLUDES.'inc_timetable.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once INCLUDES.'template_footer.php'; ?>
