<?php

    class postmasterController extends Controller{
        public function __construct(){
        }

        public function index(){
            $title = "Postmaster";
            View::render('postmaster', compact('title'));
        }
    }