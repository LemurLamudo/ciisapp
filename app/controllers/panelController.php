<?php 
    
    class panelController extends Controller {


        public function __construct(){
            validate_token();
        }

        public function index(){
            View::render('home');
        }

        public function profile(){
            View::render('profile');
        }

        public function get_asistencia(){
            try{
                // $this->valdiate_csrf();
                $info = validate_token();

                $asistencia          = new asistenciaModel();
                $asistencia->user_id = $info->data->id;
                $list_asistencia     = $asistencia->all();
                json_output(json_build(201, $list_asistencia));

            }catch(Exception $e){
                json_output(json_build(400, null, $e->getMessage()));
            }
            
        }

        public function asistencia(){
            try{
                // $this->valdiate_csrf();
                $info = validate_token();
                date_default_timezone_set("America/Lima");

                $postmaster = new postmasterModel();

                $postmaster->id = $_POST["ponencia_id"];
                $postmaster->code = $_POST["code"];
                
                if(!$postmaster->one()) json_output(json_build(400, null, "Error de Asistencia!"));

                $asistencia          = new asistenciaModel();
                $asistencia->user_id = $info->data->id;
                $asistencia->ponencia_id = $_POST["ponencia_id"];
                $asistencia->fecha = date('Y-m-d');
                $asistencia->hora = date('H:i:s');

                $data     = $asistencia->asistencia();
                json_output(json_build(201, $data));

            }catch(Exception $e){
                json_output(json_build(400, null, $e->getMessage()));
            }
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