<?php

    class ponenciasController extends Controller{
        private $accepted_actions = ['add','get','load','update','delete'];
        private $required_params = ['hook','action'];

        function __construct()
        {
            
        }

        public function index(){
            validate_token();
            $title = "Postmaster";

            View::render('ponencias', compact('title'));
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
            $this->valdiate_csrf();

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

        public function create_ponente(){
            $this->valdiate_csrf();
            validate_token_admin();

            $usuario                   = new usuarioModel();
            $usuario->email            = $_POST['email'];
            $usuario->role             = 'ROLE_PONENTE';
            $usuario->name             = $_POST['name'];
            $usuario->type_document    = $_POST['type_document'];
            $usuario->number_document  = $_POST['number_document'];
            $usuario->phone            = $_POST['phone'];
            $usuario->photo            = $_POST['photo'];

            if(!$id = $usuario->add_complete()){
                json_output(json_build(400, null, "Hubo error al guardar el registro!"));
            }
            json_output(json_build(201, null, 'Usuario Guardado'));
        }

        public function valdiate_csrf(){
            foreach ($this->required_params as $param) {
                if(!isset($_POST[$param])) {
                    json_output(json_build(403));
                }
            }

            if(!in_array($_POST['action'] , $this->accepted_actions)) {
                json_output(json_build(403));
            }
        }
    }