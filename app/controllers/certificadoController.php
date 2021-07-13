<?php

    class certificadoController extends Controller{
        public function __construct(){
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
