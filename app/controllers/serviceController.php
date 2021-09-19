<?php

    class serviceController extends Controller{
        public function __construct(){
    
        }

        public function query(){
            $apimodel = new ApiModel();
            $input = file_get_contents('php://input');
            $json = json_decode($input);
            $apimodel->Apiquery($json);
            die();
        }

        public function create(){        
            validate_token();
            $apimodel = new ApiModel();
            $input = file_get_contents('php://input');
            $json = json_decode($input);
            $apimodel->ApiCreate($json);
            die();
        }

        public function update(){
            validate_token();
            $apimodel = new ApiModel();

            if(isset($_GET['id'])){
                $_id = $_GET["id"];

                if($_id != null){
                
                    $input = file_get_contents('php://input');
                    $json = json_decode($input);
                    $apimodel->ApiUpdate($json, $_id);
                    die();
                }else {
                    json_output(json_build(401, $apimodel->ClientResponse([], [["mensaje" => "Incluir parametros."]] ,500), "Query Builder!"));
    
                }
            }else {
                json_output(json_build(401, $apimodel->ClientResponse([], [["mensaje" => "Incluir parametros."]] ,500), "Query Builder!"));

            }
        }
    }