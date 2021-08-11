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
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-section-header">
                        <h5 class="card-title mb-0 card-section-title">Actualizar mi perfil</h5>
                    </div>
                    <div class="card-body pt-0">
                      <div class="card shadow-none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label >Entidad de procedencia</label>
                                        <input type="text" class="form-control mt-2" placeholder="Ej. Universidad Nacional Jorge Basadre Grohmann">
                                    </div>
                                    <div class="col-6">
                                        <label >Nivel de estudios</label>
                                        <select class="form-select mt-2" aria-label="Default select example">
                                            <option value="Estudiante">Estudiante</option>
                                            <option value="Egresado">Egresado</option>
                                            <option value="Bachiller">Bachiller</option>
                                            <option value="Profesional">Profesional</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once INCLUDES.'template_footer.php'; ?>
<script src="<?php echo JS.'panel/profile.js' ?>"></script>
