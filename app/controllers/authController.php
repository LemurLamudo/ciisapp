<?php

    class authController extends Controller{
        public function __construct(){
        }

        public function index(){
            $title = "Iniciar sesión";
            View::render('login', compact('title'));
        }

        public function register(){
            $title = "Registrate";
            View::render('register', compact('title'));
        }
    }
