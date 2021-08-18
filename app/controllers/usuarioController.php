<?php

    class usuarioController extends Controller{
        public function __construct(){
            validate_token();
            validate_token_admin();
        }

        public function index(){
            $title = "Usuario";

            View::render('usuario', compact('title'));
        }

        public function all(){
            try{
                $usuario      = new usuarioModel();
                $usuarios     = $usuario->all();
                
                json_output(json_build(201, $usuarios, 'Listado de Usuarios'));
            }catch(Exception $e){
                json_output(json_build(400, null, $e->getMessage()));
            }
        }

        public function sorteo(){
            try{
                $info_sorteo = array();
                $sorteados = array();

                $usuario      = new usuarioModel();
                $usuarios     = $usuario->all();

                foreach($usuarios as $info){
                    if($info["repetidos"] >= 8){
                        $info_sorteo[] = $info;
                    }
                }

                $positions = array_rand($info_sorteo, 2);
                $sorteados[] = $info_sorteo[$positions[0]];
                $sorteados[] = $info_sorteo[$positions[1]];

                json_output(json_build(201, $sorteados, 'Listado de Usuarios'));
            }catch(Exception $e){
                json_output(json_build(400, null, $e->getMessage()));
            }
        }
    }