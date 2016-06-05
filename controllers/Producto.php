<?php

class Producto extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function ingreso(){
        $this->view->data['E']= json_encode($this->model->select_all('E'));
        $this->view->render($this, "ingreso"); 
    }
    
    public function ingreso_E(){
       
        $this->view->render($this, "ingreso_E"); 
    }
    
    public function insert(){
        if(isset($_POST['CAT']) && isset($_POST['DESC'])
            && isset($_POST['CANT']) && isset($_POST['NOM'])
            && isset($_POST['COD']))
            {
            $PRODUCTO=[
            'CODREF_PRO' => "'".$_POST['COD']."'",    
            'NOM_PRO'=>"'".$this->Mayus($_POST['NOM'])."'",
            'CAN_PRO'=> $_POST['CANT'],
            'DES_PRO'=>"'".$this->Mayus($_POST['DESC'])."'"
            ];  
            $PRODUCTO['CAT_PRO'] = ($_POST['CAT']=='R' || $_POST['CAT']=='E')? "'".$_POST['CAT']."'" :"'I'";
            $PRODUCTO['TIP_PRO'] = (isset($_POST['TIP']) && $_POST['CAT']=='I')?"'O'":"'".$_POST['TIP']."'";
            if( $PRODUCTO['CAT_PRO']=="'R'" && isset($_POST['CANTE']) && isset($_POST['EXA']))
            {
                        $EQUIVALENCIA=['COD_EXA' =>$_POST['EXA'],
                                    'CODREF_PRO' => $PRODUCTO['CODREF_PRO'],
                                    'CAN_SER' => $_POST['CANTE']];
                    $RESULT=$this->model->setProducto($PRODUCTO);
                    if($RESULT['STATE'])
                    echo json_encode($this->model->setEquivalencia($EQUIVALENCIA));
                    else
                    echo json_encode($RESULT);
                               
            }else if($PRODUCTO['CAT_PRO']!="'R'")
            echo json_encode($this->model->setProducto($PRODUCTO));
            else
            echo json_encode(['STATE'=>false,"MSG"=>"Datos incompletos"]);
       }else
             echo json_encode(['STATE'=>false,"MSG"=>"Datos incompletos"]);
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
    

    public function delete(){
        if(isset($_POST['IDCIR']))
          echo json_encode($this->model->deleteCircuito($_POST['IDCIR']));
          
       
    }
    public function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
		return $variable;
		}

}