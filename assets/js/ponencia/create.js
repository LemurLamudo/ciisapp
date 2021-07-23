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

myDropzone.on("addedfile", async function(file) {
    if(myDropzone.files.length == 1){

        $('.dropzone-here').hide();
        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
        
        var formData = new FormData();
        formData.append('file', file);

        $data = await add_type('ponencias/upload', formData);

        if($data != null){
            
            $('#photo').val($data.msg+'.png');
            
            alertify.notify('Archivo Guardado','success', 4, null);
        }

    } else {
        alertify.notify('Solo 1 imagen','error', 4, null);
    }
});

myDropzone.on("removedfile", function(name) {
    $('#photo').val('');
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

$(async function () {
    $data = await get_type('ajax/get_all_paises');
    $documento = $('#documento');

    if($data) {
        let htmlOptions = '';

        $data.data.forEach(pais => {
            htmlOptions += `<option value="${pais.id}">${pais.name}</option>`;
        });

        $documento.html(htmlOptions);
    }

    $('.bee_add_ponencia').on('submit' , bee_add_ponencia);

    async function bee_add_ponencia(event){
        event.preventDefault();

        var form = $('.bee_add_ponencia'), data = new FormData(form.get(0));
        
        $data = await add_type('ponencias/create_ponente', data);

        if($data != null){

            $('#photo').val('');
            $('#name').val('');
            $('#tipo_doc').val('');
            $('#phone').val('');
            $('#documento').val('');
            $('#email').val('');
            $('#number').val('');
            $('#link').val('');

            myDropzone.removeAllFiles(true); 
            alertify.notify('Ponente Guardado','success', 4, null);
        }
    }
});