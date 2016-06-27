<?php

class Circuito extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function ingreso(){
       
        $this->view->render($this, "ingreso"); 
    }
        public function lista(){
       $this->view->data= $this->model->select_all();
        $this->view->render($this, "lista"); 
    }
    
    public function getAll(){
      echo json_encode($this->model->select_all());
    }
    
    public function getCircuito(){
        if(isset($_POST['COD_CIR']))
        echo $this->model->selectbyID($_POST['COD_CIR']);
    }
    
    public function insert(){
        $CIRCUITO=[
            'NOM_CIR'=>"'".$this->Mayus($_POST['NOM_CIR']."'"),
            'DIR_CIR'=>"'".$this->Mayus($_POST['DIR_CIR']."'")
        ];
        if(isset($_POST['id']))
              echo json_encode($this->model->setCircuito($CIRCUITO,$_POST['id']));
        else
              echo json_encode($this->model->setCircuito($CIRCUITO));
    }
    public function delete(){
        if(isset($_POST['IDCIR']))
          echo json_encode($this->model->deleteCircuito($_POST['IDCIR']));
          
       
    }
    public function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
		return $variable;
		}

}