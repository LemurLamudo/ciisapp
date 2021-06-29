<?php

    class ajaxController extends Controller {

        private $accepted_actions = ['add','get','load','update','delete'];
        private $required_params = ['hook','action'];

        function __construct()
        {
            foreach ($this->required_params as $param) {
                if(!isset($_POST[$param])) {
                    json_output(json_build(403));
                }
            }

            if(!in_array($_POST['action'] , $this->accepted_actions)) {
                json_output(json_build(403));
            }
        }
        
        function index()
        {
            json_output(json_build(403));
        }

        function preinscripcion(){
            try{
                json_output(json_build(201, null));

                $usuario           = new usuarioModel();
                $usuario->email    = $_POST['email'];
                
                if(!$id = $usuario->add()){
                    json_output(json_build(400, null, "Hubo error al guardar el registro"));
                }

                json_output(json_build(201, null));

            }catch(Exception $e){
                json_output(json_build(400, null, $e->getMessage()));
            }
        }

        function get_ponentes_postmaster(){
            try{
                $postmaster         = new postmasterModel();
                $list_postmaster    = $postmaster->all();
                json_output(json_build(201, $list_postmaster));
            }catch(Exception $e){
                json_output(json_build(400, null, $e->getMessage()));
            }
        }
    }