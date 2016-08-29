<?php

class User extends Controller{
    
    public function __construct() {
        parent::__construct();
        if(!Session::getValue("CED_USU"))
        {
            header('Location: '.URL);
        }
    }

    public function ingreso(){
        
        $this->view->render($this, "ingreso"); 
    }

    public function insert(){
        if(isset($_POST['CED']) && isset($_POST['NOM1'])
         && isset($_POST['APE2']) && isset($_POST['NOM2'])
         && isset($_POST['APE1']) && isset($_POST['PASS']) 
          && isset($_POST['TIP']) && isset($_POST['ESTA']))
          {
              $USUARIO=['CED_USU' =>"'".$this->Mayus($_POST['CED']  )."'",
                        'PRINOM_USU' =>"'".$this->Mayus($_POST['NOM1'] ) ."'",
                        'PRIAPE_USU' =>"'". $this->Mayus($_POST['APE1'] )."'",
                        'SEGNOM_USU' =>"'".$this->Mayus($_POST['NOM2'] ) ."'",
                        'SEGAPE_USU' =>"'". $this->Mayus($_POST['APE2'] )."'",
                        'PAS_USU' =>"'".hash('sha256',$_POST['PASS']) ."'",
                        'TIP_USU' =>"'". $_POST['TIP'] ."'"];
             if($_POST['ESTA']=='1')
             $USUARIO['ESTA_USU'] = "'H'";
             else
             $USUARIO['ESTA_USU'] = "'D'";
              echo json_encode($this->model->setUser($USUARIO));    
          }
        
    }

    public function buscar(){
        	if(isset($_POST['CEDUSU']))
                {
echo json_encode($this->model->getUser($_POST['CEDUSU']));

                }
    }



    public function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
		return $variable;
		}
}