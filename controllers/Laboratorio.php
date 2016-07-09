<?php

class Laboratorio extends Controller{
    
    public function __construct() {
        parent::__construct();
        if(!Session::getValue("CED_USU"))
        {
            header('Location: '.URL);
        }
    }

    //Cargamos la vista login
    public function index(){
       
        $this->view->render($this, "index"); 
    }

}