<?php 
    
    class panelController extends Controller {
        public function __construct(){
            validate_token();
        }

        public function index(){
            View::render('home');
        }
    }