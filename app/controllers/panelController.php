<?php 
    
    class panelController extends Controller {


        public function __construct(){
            validate_token();
        }

        public function index(){
            View::render('home');
        }

        public function profile(){
            $info = validate_token();

            $usuario = new usuarioModel();
            $usuario->email = $info->data->email;
            $data = $usuario->one();

            if($data["c_update"] == 0){
                View::render('profile');
            }

            View::render('home');
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

        public function update_user(){
            try{

                $info = validate_token();

                if(
                    $_POST["entidad"] == null || 
                    $_POST["nivel"] == null || 
                    $_POST["especialidad"] == null || 
                    $_POST["fecha_nacimiento"] == null || 
                    $_POST["number"] == null || 
                    $_POST["sugerencia"] == null || 
                    $_POST["email"] == null || 
                    $_POST["name"] == null){
                    
                    json_output(json_build(400, null, "Error en el registro 1"));
                }

                if( $_POST["number"] < 0 || $_POST["number"] > 10 ) 
                    json_output(json_build(400, null, "Error en el registro 2"));
                
                if(
                    strlen($_POST["entidad"]) > 2 &&
                    strlen($_POST["nivel"]) > 2 &&
                    strlen($_POST["especialidad"]) > 2 &&
                    strlen($_POST["fecha_nacimiento"]) > 2 &&
                    strlen($_POST["sugerencia"]) > 2 &&
                    strlen($_POST["email"]) > 2 &&
                    strlen($_POST["name"]) > 2
                ){

                    $usuario = new usuarioModel();

                    $usuario->id = $info->data->id;
                    $usuario->entidad = $_POST["entidad"];
                    $usuario->nivel = $_POST["nivel"];
                    $usuario->especialidad = $_POST["especialidad"];
                    $usuario->fecha_nacimiento = $_POST["fecha_nacimiento"];
                    $usuario->number = $_POST["number"];
                    $usuario->sugerencia = $_POST["sugerencia"];
                    $usuario->email = $_POST["email"];
                    $usuario->name = $_POST["name"];

                    if($info = $usuario->update_user()){
                        json_output(json_build(200, null, "Usuario " . $usuario->name . " actualizado!"));
                    }

                    json_output(json_build(400, null, "Error en el registro 4"));
                }else {
                    json_output(json_build(400, null, "Error en el registro 3"));
                }
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