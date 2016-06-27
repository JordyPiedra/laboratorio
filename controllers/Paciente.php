<?php

class Paciente extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function ingreso(){
        $this->loadModel('Circuito');
       $this->view->data['CIRCUITOS']=$this->model->select_all() ;
        $this->loadModel();
        $this->view->render($this, "ingreso"); 
    }
  
  
    
    public function getPaciente(){
        if(isset($_POST['CED']))
        echo json_encode($this->model->selectbyCED($_POST['CED']));
    }
    
    public function insert(){
       if(isset($_POST['CED']) && isset($_POST['HIST'])
       && isset($_POST['NOM1']) && isset($_POST['APE1'])
        && isset($_POST['DIR']) && isset($_POST['NAC'])
        && isset($_POST['SEX']) && isset($_POST['DISC'])   
        && isset($_POST['CIR'])
       )
       {
           $paciente=['CED_PER' => "'".$_POST['CED']."'",
                      'HIS_PER' => "'".$_POST['HIST']."'",  
                      'PRINOM_PER' => "'".$this->Mayus($_POST['NOM1'])."'",
                      'PRIAPE_PER' => "'".$this->Mayus($_POST['APE1'])."'",
                      'FECNAC_PER' => "'".$_POST['NAC']."'",
                      'DIR_PER' => "'".$this->Mayus($_POST['DIR'])."'",
                      'COD_CIR' => "'".$_POST['CIR']."'",];
           if(isset($_POST['NOM2']))
           $paciente['SEGNOM_PER']="'".$this->Mayus($_POST['NOM2'])."'";
           
           if(isset($_POST['APE2']))
           $paciente['SEGAPE_PER']="'".$this->Mayus($_POST['APE2'])."'";
           
           if(isset($_POST['CEL']))
           $paciente['CEL_PER']="'".$_POST['CEL']."'";
           
           if(isset($_POST['TEL']))
           $paciente['TEL_PER']="'".$_POST['TEL']."'";
           
           $paciente['SEX_PER']= ($_POST['SEX']=='H')? "'H'" : "'M'";
           $paciente['ESTDIS_PER']= ($_POST['DISC']=='S')? "'S'" : "'N'";
           
           echo json_encode($this->model->setPaciente($paciente));
       }else
             	echo json_encode(['STATE'=>false,"MSG"=>"Datos incompletos"]);
       
    }
    public function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
		return $variable;
		}

}