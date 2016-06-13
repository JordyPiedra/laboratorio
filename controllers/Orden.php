<?php

class Orden extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function ingreso(){
        $this->loadModel('Circuito');
        $this->view->data['CIRCUITOS']=$this->model->select_all() ;
        $this->loadModel();
        $this->loadModel('Producto');
        $this->view->data['EXAMENES']=$this->model->select_all('E') ;
        $this->loadModel();
          if(isset($_POST['ORD']))
        {
            $this->view->data['ORDEN']=$this->model->selectbyCOD($_POST['ORD']); 
            $this->view->data['DETALLE']=$this->model->selectDETbyCOD($_POST['ORD']); 
           

        }
        $this->view->render($this, "ingreso"); 
    }
  
  public function insert(){
        if(isset($_POST['FECHAO']) && !empty($_POST['FECHAO']) && isset($_POST['CED']) && isset($_POST['CIR']))
            {
        $this->loadModel('Paciente');
       $IDper=$this->model->selectbyCED($_POST['CED']) ;
        $this->loadModel();
                if(count($IDper)>0)
            {
                 
                    $ORDEN=[
                    'FECMUE_ORD' => "'".$_POST['FECHAO']."'",    
                    'COD_CIR'=> "'".$_POST['CIR']."'",
                    'COD_PER' => $IDper[0][13]
                    ];  
                    $KARDEX['OBS_ORD'] = (isset($_POST['OBS']))? "'".$this->Mayus($_POST['OBS'])."'" :"''";
                    $POST=$_POST;
                    $DETALLE=[];
                    
                    foreach ($POST as $key => $value) {
                    if(substr($key,1,3)=='chk')
                    array_push($DETALLE,$value);
                    }
                    if(count($DETALLE)>0)
                    {
                    $RESULTCAB= $this->model->setCabeceraOrden($ORDEN);// Ingreso de orden
                        if($RESULTCAB['STATE'])
                        {
                            $this->model->setDetalleOrden($DETALLE,$RESULTCAB['COD']);
                           echo json_encode($RESULTCAB); 
                        }else
                        echo json_encode($RESULTCAB);
                    }else
                    {
                        echo json_encode(['STATE'=>false,"MSG"=>"Seleccione al menos un exámen"]);
                    }
               }

            }else
            echo json_encode(['STATE'=>false,"MSG"=>"Datos incompletos"]);
    }

        public function revision(){
        $this->view->data['ORDEN']=$this->model->select_all('P') ;
        $this->view->render($this, "revision"); 
    }

    public function orden(){
        if(isset($_POST['ORD']))
        {
            $this->view->data['ORDEN']=$this->model->selectbyCOD($_POST['ORD']); 
            $this->view->data['DETALLE']=$this->model->selectDETbyCOD($_POST['ORD']); 
            $this->view->render($this, "resultado"); 

        }
    }
  
    public function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
		return $variable;
		}

}