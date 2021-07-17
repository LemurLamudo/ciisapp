<?php

    class ponenciasController extends Controller{
        public function __construct(){
        }

        public function index(){
            View::render('ponencias');
        }
    }