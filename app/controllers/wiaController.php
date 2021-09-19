<?php

    class wiaController extends Controller{
        public function __construct(){
        }

        public function index(){
            $title = "Wia";
            View::render('index', compact('title'));
        }
    }