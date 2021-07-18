<?php

    class talleresController extends Controller{
        public function __construct(){
            validate_token();
        }

        public function index(){
            View::render('talleres');
        }
    }