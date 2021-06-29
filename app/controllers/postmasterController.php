<?php

    class PostmasterController extends Controller{
        public function __construct(){
        }

        public function index(){
            View::render('postmaster');
        }
    }