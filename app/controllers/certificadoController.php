<?php

    class certificadoController extends Controller{
        public function __construct(){
            validate_token();
        }

        public function index(){
            $data =
            [
                'title' => 'Nuami Framework',
                'bg'    =>  'dark'
            ];
            View::render('certificado', $data);
        }

    }
