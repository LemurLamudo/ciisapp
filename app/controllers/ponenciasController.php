<?php

    class ponenciasController extends Controller{
        public function __construct(){

        }

        public function index(){
            validate_token();
            View::render('ponencias');
        }

        public function listar(){
            validate_token_admin();
            View::render('listar');
        }

        public function create(){
            validate_token_admin();
            View::render('create');
        }

        public function upload(){
            validate_token_admin();
            $name = gen_uuid();

            if (($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/gif")) {
                
                if (move_uploaded_file($_FILES["file"]["tmp_name"], "assets/images/ponentes/" . $name . '.png')) {
                    json_output(json_build(201, null, $name));
                } else {
                    json_output(json_build(400, null, "No se pudo guardar"));
                }
            }
            json_output(json_build(400, null, "No se pudo guardar"));
        }
    }