<?php require_once INCLUDES.'template_header.php'; ?>

<style>
    .alert {
        padding: 20px;
        background-color: #495057; /* Red */
        color: white;
        margin-bottom: 15px;
    }

    /* The close button */
    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    /* When moving the mouse over the close button */
    .closebtn:hover {
        color: black;
    }

</style>

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
                                <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                    Actualizar sus datos para obtener su certificado
                                </div>
                                <form class="bee_add_update_usuario">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mt-3">
                                            <label >Nombres y Apellidos</label>
                                            <input type="text" name="name" id="name" class="form-control mt-2" require>
                                        </div>
                                        <div class="col-md-6 col-12 mt-3">
                                            <label >Email</label>
                                            <input type="email" name="email" id="email" class="form-control mt-2" require>
                                        </div>
                                        <div class="col-md-6 col-12 mt-3">
                                            <label >Entidad de procedencia</label>
                                            <input type="text" name="entidad" class="form-control mt-2" placeholder="Ej. Universidad Nacional Jorge Basadre Grohmann" require>
                                        </div>
                                        <div class="col-md-6 col-12 mt-3">
                                            <label >Nivel de estudios</label>
                                            <select class="form-select mt-2" name="nivel" aria-label="Default select example" require>
                                                <option value="Estudiante">Estudiante</option>
                                                <option value="Egresado">Egresado</option>
                                                <option value="Bachiller">Bachiller</option>
                                                <option value="Profesional">Profesional</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12  mt-3">
                                            <label >Especialidad o areas de interés</label>
                                            <textarea name="especialidad" class="form-control mt-2" rows="3" require></textarea>
                                        </div>
                                        <div class="col-md-6 col-12  mt-3">
                                            <label >Sugerencias para los próximos eventos</label>
                                            <textarea name="sugerencia" class="form-control mt-2" rows="3" require></textarea>
                                        </div>
                                        <div class="col-md-6 col-12  mt-3">
                                            <label >Fecha de nacimiento</label>
                                            <input name="fecha_nacimiento" type="date" class="form-control mt-2" require>
                                        </div>
                                        <div class="col-md-6 col-12  mt-3">
                                            <label >¿Del 1 al 10 cuanto te gustó el evento?</label>
                                            <input name="number" type="range" min="0" max="10" class="form-control mt-2" require>
                                        </div>
                                        <div class="col-md-6 col-12  mt-3">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                        
                                    </div>
                                </form>
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
