<?php require_once INCLUDES.'template_header.php'; ?>
<link href="<?php echo PLUGINS.'dropzone/dropzone.min.css' ?>" rel="stylesheet">

<style>
    #previews {
        padding: 15px;
        padding-top: 0px;
        padding-bottom: 0px;
        margin-top: 15px;
        min-height: 220px;
        background-color: #E9EAEA;
    }
    
    .dropzone-here {
        text-align: center;
        padding-top: 60px;
        width: 100%;
        position: absolute;
        font-size: 18px;
        font-weight: bold;
        top: 50px;
    }
    
    #previews .file-row .delete {
        display: none;
    }
    
    #previews .file-row.dz-success .start,
    #previews .file-row.dz-success .cancel {
        display: none;
    }
    
    #previews .file-row.dz-success .delete {
        display: block;
    }
    
    .dz-image-preview {
        border: 1px solid #d6d4d4;
        padding-top: 15px;
        padding-bottom: 15px;
        margin-bottom: 15px;
    }
    
    .preview {
        position: relative;
        background: #fff;
        border: 1px solid #dadada;
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }
    
    .preview img {
        cursor: pointer;
    }
    
    .progress {
        border: 1px solid #ccc;
        position: relative;
        display: block;
        height: 22px;
        padding: 0;
        min-width: 200px;
        margin:4px 0;
        background: #DEDEDE;
        background: -webkit-gradient(linear, left top, left bottom, from(#ccc), to(#e9e9e9));
        background: -moz-linear-gradient(top, #ccc, #e9e9e9);
        filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#cccccc', endColorstr='#e9e9e9');
        -moz-box-shadow:0 1px 0 #fff;
        -webkit-box-shadow:0 1px 0 #fff;
        box-shadow:0 1px 0 #fff;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }
    
    .progress-bar {
        color: #ffffff;
        display: block;
        height: 20px;
        margin: 0;
        padding: 0;
        text-align:center;
        -moz-box-shadow:inset 0 1px 0 rgba(255,255,255,0.5);
        -webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,0.5);
        box-shadow:inset 0 1px 0 rgba(255,255,255,0.5);
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        border: 1px solid #0078a5;
        background-color: #5C9ADE;
        background: -moz-linear-gradient(top, #00adee 10%, #0078a5 90%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0.1, #00adee), color-stop(0.9, #0078a5));
    }
</style>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="card-title mb-0">CREAR PONENTE</h5>
                            </div>
                            <div class="col-2 d-flex flex-row-reverse">
                                <a href="<?php echo URL.'ponencias/create?token=' ?>" class="btn btn-primary" id="c_ponencia">Guardar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="font-bold form-label mt-4">Nombre Completo *</div>
                                    <input type="text" class="form-control mt-2" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <div class="font-bold form-label mt-4">Tipo Documento *</div>
                                    <select class="form-control" name="tipo_doc" id="tipo_doc">
                                        <option value="0">DNI</option>
                                        <option value="1">PASAPORTE</option>
                                        <option value="2">CARNET DE EXTRANJERIA</option>
                                        <option value="3">OTROS</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="font-bold form-label mt-4">Teléfono *</div>
                                    <input type="number" class="form-control mt-2" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <div class="font-bold form-label mt-4">Pais *</div>
                                    <select class="form-control" name="tipo_doc" id="tipo_doc">
                                        <option value="0">Perú</option>
                                        <option value="1">Argentina</option>
                                        <option value="2">Brazil</option>
                                        <option value="3">OTROS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <div class="font-bold form-label mt-4">Email *</div>
                                    <input type="email" class="form-control mt-2" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <div class="font-bold form-label mt-4">Número de Documento *</div>
                                    <input type="number" class="form-control mt-2" id="number" name="number">
                                </div>
                                <div class="form-group">
                                    <div class="font-bold form-label mt-4">Contacto *</div>
                                    <input type="text" class="form-control mt-2" id="link" name="link">
                                </div>
                            </div>
                        </div>

                        <br>
                        <form method="post" enctype="multipart/form-data">
                            <div class="fallback">
                                <input name="file" id="image" type="file" multiple />
                            </div>
                            <div id="actions" class="row">
                                <div class="col-lg-7">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Subir imagen ...</span>
                                    </span>
                                    <button type="submit" class="btn btn-primary start" style="display: none;">
                                        <i class="glyphicon glyphicon-upload"></i>
                                        <span>Start upload</span>
                                    </button>
                                    <button type="reset" class="btn btn-warning cancel" style="display: none;">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        <span>Cancel upload</span>
                                    </button>
                                </div>
                        
                                <div class="col-lg-5">
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process">
                                        <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        
                            <div class="table table-striped files" id="previews">
                                <div id="template" class="file-row row">
                                    <!-- This is used as the file preview template -->
                                    <div class="col-xs-12 col-lg-3">
                                        <span class="preview" style="width:160px;height:160px;">
                                            <img data-dz-thumbnail />
                                        </span>
                                        <br/>
                                        <button class="btn btn-primary start" style="display:none;" >
                                            <i class="glyphicon glyphicon-upload"></i>
                                            <span>Empezar</span>
                                        </button>
                                        <button data-dz-remove class="btn btn-warning cancel" style="background: #fcb92c">
                                            <i class="icon-ban-circle fa fa-ban-circle"></i> 
                                            <span>Cancelar</span>
                                        </button>
                                        <button data-dz-remove class="btn btn-danger delete" style="background: #dc3545">
                                            <i class="icon-trash fa fa-trash"></i> 
                                            <span>Eliminar</span>
                                        </button>
                                    </div>
                                    <div class="col-xs-12 col-lg-9">
                                        <p class="name" data-dz-name></p>
                                        <p class="size" data-dz-size></p>
                                        <div>
                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                        </div>
                                        <div>
                                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once INCLUDES.'template_footer.php'; ?>
<script src="<?php echo JS.'ponencia/create.js' ?>"></script>

<script>

    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);
    
    var myDropzone = new Dropzone(document.body, {
        url: "upload.php",
        paramName: "file",
        acceptedFiles: 'image/*',
        maxFilesize: 2,
        maxFiles: 1,
        thumbnailWidth: 160,
        thumbnailHeight: 160,
        thumbnailMethod: 'contain',
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: true,
        previewsContainer: "#previews",
        clickable: ".fileinput-button"
    });
    
    myDropzone.on("addedfile", function(file) {
        if(myDropzone.files.length == 1){
            var uri = document.getElementById("uri").value;
            var token = localStorage.getItem("token");

            $('.dropzone-here').hide();
            file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
            
            var formData = new FormData();
            formData.append('file', file);

            $.ajax({
                url: uri + '/ponencias/upload?token=' + token,
                type: 'post',
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function() {

                }
            }).done(function(res) {
                alertify.notify('Archivo Guardado','success', 4, null);
            }).fail( function( err ) {
                alertify.notify('No se pudo cargar','error', 4, null);
            }).always(function() {
                
            });
        } else {
            alertify.notify('Solo 1 imagen','error', 4, null);
        }
    });
    
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });
    
    myDropzone.on("sending", function(file) {
        document.querySelector("#total-progress").style.opacity = "1";
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });
    
    myDropzone.on("queuecomplete", function(progress) {

    });
    
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    };
    
    $('#previews').sortable({
        items:'.file-row',
        cursor: 'move',
        opacity: 0.5,
        containment: "parent",
        distance: 20,
        tolerance: 'pointer',
        update: function(e, ui){
    
        }
    });
</script>
