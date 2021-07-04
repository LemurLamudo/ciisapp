<?php

    class authController extends Controller{
        public function __construct(){
        }

        public function index(){
            View::render('login');
        }

        public function register(){
            View::render('register');
        }
    }
