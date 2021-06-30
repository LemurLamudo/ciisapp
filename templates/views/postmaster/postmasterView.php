<?php require_once INCLUDES.'inc_header.php'; ?>

<main>
  <section class="register-today section hero-sec">
      <img class="img-src" src="<?php echo IMAGES."postmaster/portada.png"?>" alt="#" style="">
  </section>
  
  <section class="about-centered">
      <div class=" container">
  
          <div class="row">
              <div class="col-lg-12 col-md-12 col-12">
                  <div class="text-justify">
                      <h2 class="text-left title-sub"> ¿Qué es el POSTMASTER?</h2>
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
  </section>
  
  <section class="page-section">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 col-md-12 col-12">
                  <div class="text-content text-justify">
                      <h2 class="text-left text-white"> CONVERSATORIO Y DEBATE: Situación actual y trabajo virtual</h2>
                      <p> Terminaremos el ciclo de conferencias con un debate sobre cómo nuestros
                          egresados de la carrera de Ingeniería en Informática y Sistemas enfrentaron en sus trabajos la
                          actual situación del aislamiento social que vivimos debido a la pandemia del Covid-19 que afecta
                          al mundo.
                      </p>
                  </div>
              </div>
              <div class="col-lg-6 col-md-12 col-12 text-center">
                  <div class="row btn-list">
                      <div class="btn btn-rounded text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="50" fill="#fff"><title>Logo Facebook</title><path d="M480 257.35c0-123.7-100.3-224-224-224s-224 100.3-224 224c0 111.8 81.9 204.47 189 221.29V322.12h-56.89v-64.77H221V208c0-56.13 33.45-87.16 84.61-87.16 24.51 0 50.15 4.38 50.15 4.38v55.13H327.5c-27.81 0-36.51 17.26-36.51 35v42h62.12l-9.92 64.77H291v156.54c107.1-16.81 189-109.48 189-221.31z" fill-rule="evenodd"/></svg>
                          <div class="text-center mt-4">
                              <!-- Enlace para Registrarse -->
                              <a class="white primary"
                                  href="https://www.facebook.com/watch/live/?v=623288185050733&ref=notif&notif_id=1599854339227909&notif_t=live_video"
                                  target="_black">Ver por Facebook</a>
                          </div>
                      </div>
                      <div class="btn btn-rounded text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="50" fill="#fff"><title>Logo Youtube</title><path d="M508.64 148.79c0-45-33.1-81.2-74-81.2C379.24 65 322.74 64 265 64h-18c-57.6 0-114.2 1-169.6 3.6C36.6 67.6 3.5 104 3.5 149 1 184.59-.06 220.19 0 255.79q-.15 53.4 3.4 106.9c0 45 33.1 81.5 73.9 81.5 58.2 2.7 117.9 3.9 178.6 3.8q91.2.3 178.6-3.8c40.9 0 74-36.5 74-81.5 2.4-35.7 3.5-71.3 3.4-107q.34-53.4-3.26-106.9zM207 353.89v-196.5l145 98.2z"/></svg>
                          <div class="text-center mt-4">
                              <!-- Enlace para Registrarse -->
                              <a class="white primary" href="https://www.youtube.com/watch?v=y3LRGF4D_eE"
                              target="_black">Ver por Youtube</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
  
  <section class="schedule-section">
      <div class="container">
          <h2 class="text-left section-title">CRONOGRAMA</h2>
          <div class="schedule">
            <div class="schedule__event">
                <div class="schedule__event--time">
                    <div class="schedule__event--time-start"> 11:00 am</div>
                    <div class="schedule__event--time-dash"></div>
                    <div class="schedule__event--time-end"> 12:00 am</div>
                </div>
                <div class="schedule__event--info">
                    <div class="schedule__event--info-title"> INAGURACIÓN</div>
                </div>
            </div>
            <?php foreach([1,1,1,1,1,1] as $data){ ?>
            <div class="schedule__event">
                    <div class="schedule__event--time">
                        <div class="schedule__event--time-start"> 11:00 am</div>
                        <div class="schedule__event--time-dash"></div>
                        <div class="schedule__event--time-end"> 12:00 am</div>
                    </div>
                    <div class="schedule__event--info">
                            <div class="schedule__event--info-title">MBA. Claudia Mitacc</div>
                            <div class="schedule__event--info-sub">Cargo: Technical Leader - BCP</div>
                    </div>
                    <div class="schedule__event--extra">
                            <a class="btn btn-outline" href="<?php echo UPLOADS.'PDF/Claudia Mitacc.pdf'?>"
                                target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="35"><title>Download</title><path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M176 272l80 80 80-80M256 48v288"/></svg><span>Descargar presentación</span></a>
                    </div>
            </div>
            <?php } ?>
          </div>
      </div>
  </section>
  
  <section class="courses section" style="background: #fff">
      <div class="container">
          <h2 class="text-left section-title">PONENTES</h2>
          <div class="row">
              <div class="col-12 pl-5 pr-5">
                  <div class="card-list">
                      <!-- Single Course -->
                      <?php foreach([1,1,1,1] as $data){ ?>
                      <div class="card mb-3">
                          <!-- Course Head -->
                          <div class="card-header">
                              <img src="<?php echo IMAGES.'postmaster/ponentes/AngelSMRospigliosi.png' ?>" alt="#">
                          </div>
                          <!-- Course Body -->
                          <div class="card-body">
                              <div class="name-price text-right">
                                  <div class="teacher-info ">
                                      <img src="<?php echo IMAGES.'paises/peru.jpg' ?>" alt="country-flag" class="card-icon">
                                  </div>
                              </div>
                              <div class="">
                                  <h3 class="c-title mb-1">Ing. Angel Santa María Rospigliosi</h3>
                                  <p class="c-description">Control Gubernamental - Poder Judicial</p>
                              </div>
                              <div class="card-footer"><a href="<?php echo URL.'postmaster/ponentes' ?> /#AngelSMRospigliosi" class="btn-link">Ver más <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><polyline points="268 112 412 256 268 400" style="fill:none;stroke:#3f4ce7;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/><line x1="392" y1="256" x2="100" y2="256" style="fill:none;stroke:#3f4ce7;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/></svg></a></div>
                          </div>
                      </div>
                      <?php } ?>
                  </div>
              </div>
          </div>
      </div>
  </section>
</main>

<?php require_once INCLUDES.'inc_footer.php'; ?>
<?php require_once INCLUDES.'inc_scripts.php'; ?>
<script src="<?php echo JS.'postmaster.js' ?>"></script>
