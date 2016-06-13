<?php

class Inventario extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function ingreso(){
        
        $this->view->render($this, "ingreso"); 
    }
        
    public function ingreso_E(){
       
        $this->view->render($this, "ingreso_E"); 
    }
    
    public function insert(){
        if(isset($_POST['MOV']) && isset($_POST['FORD'])
            && isset($_POST['KDES']) && isset($_POST['KCAN'])
            && isset($_POST['COD']) && isset($_POST['IDPRO']) && isset($_POST['CAT']))
            {
            $KARDEX=[
            'COD_PROD' => "'".$_POST['IDPRO']."'",    
            'EST_KARPRO'=>"'".$this->Mayus($_POST['MOV'])."'",
            'FECORD_KARPRO'=> "'".$_POST['FORD']."'",
            'SAL_KARPRO'=> 0,
            'CAN_KARPRO'=>$_POST['KCAN'],
            'DES_KARPRO'=>"'".$this->Mayus($_POST['KDES'])."'"
            ];  
            $KARDEX['EST_KARPRO'] = ($_POST['MOV']=='I')? "'I'" :"'E'";
            if($_POST['CAT']=="R" )
            {
                if(isset($_POST['FCAD']))
                 $KARDEX['FECCAD_KARPRO'] ="'".$_POST['FCAD']."'";
                 else{
                  echo json_encode(['STATE'=>false,"MSG"=>"Datos incompletos!"]);
                  return;   
                 }
                  
            }
            else
             $KARDEX['FECCAD_KARPRO'] ="NOW()";
            echo json_encode($this->model->setKardex($KARDEX));
       }else
             echo json_encode(['STATE'=>false,"MSG"=>"Datos incompletos"]);
    }
   public function historial(){
    if(isset($_POST['IDPRO']))
    echo json_encode($this->model->get_productoHist($_POST['IDPRO']));    
    }
    
    public function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
		return $variable;
		}

}