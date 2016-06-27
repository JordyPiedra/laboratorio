<?php

class Laboratorio extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    //Cargamos la vista login
    public function index(){
       
        $this->view->render($this, "index"); 
    }

}