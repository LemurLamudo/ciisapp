<?php

    class homeController extends Controller{
        public function __construct(){
        }

        public function index(){
            $title = 'Inicio';
            View::render('Nuami', compact('title'));
        }

        function test(){
            $data =
            [
                'title' => 'Nuami Framework',
                'bg'    =>  'dark'
            ];
            View::render('test', $data);
        }

        function flash(){
            View::render('flash');
        }

    }
