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
        $this->view->data['DETALLE']=[];
        $this->view->render($this, "ingreso"); 
    }
   public function antender(){
        $this->loadModel('Circuito');
        $this->view->data['CIRCUITOS']=$this->model->select_all() ;
        $this->loadModel();
        
        $this->loadModel('Producto');
        $this->view->data['EXAMENES']=$this->model->select_all('E') ;
        $this->view->data['INSUMOS']=$this->model->select_all('I') ;
        $this->loadModel();
        $this->view->data['DETALLE']=[];

          if(isset($_POST['ORD']))
        {
            $this->view->data['ORDEN']=$this->model->selectbyCOD($_POST['ORD']); 
            $this->view->data['DETALLE']=$this->model->selectDETbyCOD($_POST['ORD']); 

        }
        $this->view->render($this, "ingreso",false); 
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
  public function response(){
      if(isset($_POST['E']) )
      {
        foreach ($_POST['E'] as $key => $value) {
            $UPDET=[];
          switch (substr($value['name'], 0, 1)) {
              case 'B':
                   $detalle=$this->model->updateDet(['NRB_PRO' => "'".$value['value']."'"],substr($value['name'], 1, count($value['name'])));
                  break;
              case 'S':
                   $detalle=$this->model->updateDet(['NRS_PRO' => "'".$value['value']."'"],substr($value['name'], 1, count($value['name'])));
                  break;
              case 'M':
                   $detalle=$this->model->updateDet(['NRM_PRO' => "'".$value['value']."'"],substr($value['name'], 1, count($value['name'])));
                  break;
              case 'N':
                   $detalle=$this->model->updateDet(['NRN_PRO' => "'".$value['value']."'"],substr($value['name'], 1, count($value['name'])));
                  break;
              default:
                  # code...
                  break;
          }
          if(isset($detalle['STATE']) && $detalle['STATE']==false )
          echo json_encode($detalle);

          $detalle=null;
        }
      }
      if(isset($_POST['R']) ){
           foreach ($_POST['R'] as $key => $value) {
           var_dump($value);
           
           }
      }
     
  }
    public function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
		return $variable;
		}

}