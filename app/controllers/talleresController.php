<?php

    class talleresController extends Controller{
        public function __construct(){
        }

        public function index(){
            View::render('talleres');
        }
    }