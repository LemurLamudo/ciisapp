<?php

    class homeController extends Controller{
        public function __construct(){
        }

        public function index(){
            $data =
            [
                'title' => 'Nuami Framework',
                'bg'    =>  'dark'
            ];
            View::render('Nuami', $data);
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
