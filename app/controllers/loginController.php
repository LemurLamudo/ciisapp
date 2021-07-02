<?php

    class loginController extends Controller{
        public function __construct(){
        }

        public function index(){
            View::render('login');
        }
    }
