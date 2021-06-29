<?php require_once INCLUDES.'inc_header.php'; ?>

<section class="register-today section"
    style="padding-bottom:0 !important;padding-top:85px !important; background-color: #F7F7F7;text-align:center;">
    <img class="img-src" src="<?php echo IMAGES."postmaster/portada.png"?>" alt="#" style="">
</section>
    
<div class="clients" style="background-color: #F7F7F7">
    <div class=" container">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12" style="margin:4% 0%;">
                <div class="text-justify">
                    <p class="text-left title-sub" style="color:#006EB8"> ¿Qué es el POSTMASTER?</p>
                    <br>
                    <p>
                        Diferentes egresados de la carrera de Ingeniería en Informática y Sistemas, expondrán sus
                        experiencias desde que terminaron sus estudios en la UNJBG, nos contarán qué están haciendo
                        ahora, cuáles son sus especialidades y cómo llegaron hasta ahí, rescatando su paso por nuestra
                        universidad y brindando sus consejos, basados en su experiencia académica y profesional, para
                        enfrentar el competitivo mundo laboral que se aproxima.
                    </p>
                    <div class="text-center mt-4">
                        <!-- Enlace para Registrarse -->
                        <a class="btn black primary" href="#">Finalizó las Inscripciones</a>
                        <a class="btn black primary" href="#">Ponentes</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="clients" style="background-color: #1281E8;">
    <div class=" container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12" style="margin:4% 0%;">
                <div class="text-content text-justify">
                    <h4 class="text-left title-sub" style="color:white"> CONVERSATORIO Y DEBATE: Situación actual y trabajo virtual.</h4>
                    <br>
                    <p style="font-size: 16px"> Terminaremos el ciclo de conferencias con un debate sobre cómo nuestros
                        egresados de la carrera de Ingeniería en Informática y Sistemas enfrentaron en sus trabajos la
                        actual situación del aislamiento social que vivimos debido a la pandemia del Covid-19 que afecta
                        al mundo.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 text-center">
                <div class="row">
                    <div class="col-lg-4">
                    
                    </div>
                    <div class="col-lg-4">
                        <img src="<?php echo IMAGES.'postmaster/face.png' ?>" class="img-fluid rounded mt-4" style="width:80px;">
                        <div class="text-center mt-4">
                            <!-- Enlace para Registrarse -->
                            <a class="btn white primary"
                                href="https://www.facebook.com/watch/live/?v=623288185050733&ref=notif&notif_id=1599854339227909&notif_t=live_video"
                                target="_black">Enlace de transmisión - facebook</a>
                        </div>
                    </div>
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">
                        <img src="<?php echo IMAGES.'postmaster/youtube.png' ?>" class="img-fluid rounded mt-4" style="width:80px;">
                        <div class="text-center mt-4">
                            <!-- Enlace para Registrarse -->
                            <a class="btn white primary" href="https://www.youtube.com/watch?v=y3LRGF4D_eE"
                            target="_black">Enlace de transmisión - youtube</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="clients" style="background-color: #F7F7F7; margin-top: 5%">
    <div class=" container">
        <h4 class="text-left title-sub" style="color:#006EB8">CRONOGRAMA</h4>
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11 col-11 ">
                    <!-- Course Head -->
                    <div class="row">
                        <div class="course-head " style="width:160px;">
                            <img style="width:160px;" class="img-fluid rounded mt-4"
                                src="<?php echo IMAGES.'postmaster/RELOJ.png' ?>" alt="#">
                            <h5 class="text-center" style="color:#006EB8"> 10:00 am</h5>
                        </div>
                        <div class="align-self-center">
                            <div class="container" style="padding:10px;">
                                <h3 class="c-title" style="font-size: calc(1em + 1vw) !important;"> INAGURACIÓN</h3>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-bottom:0;" />
                </div>
            </div>
            <hr style="margin-bottom:0;" />
        </div>
        <?php foreach([1,1,1,1,1,1] as $data){ ?>
        <div class="col-lg-10 col-md-11 col-11 ">
            <div class="row">
                <div class="course-head " style="width:160px;">
                    <img class="img-fluid rounded mt-4" src="<?php echo IMAGES.'postmaster/RELOJ.png' ?>" alt="#">
                    <h5 class="text-center" style="color:#006EB8"> 11:00 am</h5>
                </div>
                <div class="align-self-center">
                    <div class="container" style="padding:10px;">
                        <h3 class="c-title" style="font-size: calc(1em + 1vw) !important;">MBA. Claudia Mitacc</h3>
                        <h5 style="color: #0056b2;font-size: calc(0.7em + 0.7vw) !important;">Cargo: Technical Leader - BCP</h5>
                    </div>
                    <br>
                    <div>
                        <a class="btn black primary" href="<?php echo UPLOADS.'PDF/Claudia Mitacc.pdf'?>"
                            target="_black">Descargar Presentación</a>
                    </div>
                </div>
            </div>
            <hr style="margin-bottom:0;" />
        </div>
        <?php } ?>
    </div>
</div>

<section class="courses section" style="background: #fff">
    <div class="container">
        <h4 class="text-left title-sub" style="color:#006EB8">PONENTES</h4>
        <div class="row">
            <div class="col-12 pl-5 pr-5">
                <div class="course-slider">
                    <!-- Single Course -->
                    <?php foreach([1,1,1,1,1,1] as $data){ ?>
                    <div class="single-course mb-3">
                        <!-- Course Head -->
                        <div class="course-head">
                            <img src="<?php echo IMAGES.'postmaster/ponentes/AngelSMRospigliosi.png' ?>" alt="#">
                            <a href="<?php echo URL.'postmaster/ponentes' ?> /#AngelSMRospigliosi" class="btn white primary">Ver más</a>
                        </div>
                        <!-- Course Body -->
                        <div class="course-body">
                            <div class="name-price text-right">
                                <div class="teacher-info " style="text-align:right;">
                                    <img src="<?php echo IMAGES.'paises/peru.jpg' ?>" alt="#">
                                </div>
                            </div>
                            <div class="text-center" style="height:4em;">
                                <h3 class="c-title mb-1 text-center">Ing. Angel Santa María Rospigliosi</h3>
                                <h6 style="color: #0056b2;">Control Gubernamental - Poder Judicial </h6>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus sunt dolorum ea at eius, expedita amet magni nesciunt aut sed, iste quo aliquid corporis reprehenderit. Totam earum optio nisi provident.</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once INCLUDES.'inc_footer.php'; ?>

<script src="<?php echo JS.'postmaster.js' ?>"></script>