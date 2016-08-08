<?php

class Reportes extends Controller{
    
    public function __construct() {
        parent::__construct();
        if(!Session::getValue("CED_USU"))
        {
            header('Location: '.URL);
        }
        }

public function index(){
      $this->view->render($this, "index"); 
}
public function general(){
    if(isset($_POST['FINI']) && isset($_POST['FFIN']) && isset($_POST['TIP']))
    {
     if($_POST['TIP']==1)
     {
          //$this->data['E']= $this->model->topExamen($_POST['FINI'],$_POST['FFIN']);
           $this->view->data['T']=1;
          $this->view->data['E']= $this->model->topExamen('2016-01-01','2016-12-31');
          //echo '<pre>';
          //var_dump($this->view->data['E']);
     }
      if($_POST['TIP']==2)
     {
          //$this->data['E']= $this->model->topExamen($_POST['FINI'],$_POST['FFIN']);
           $this->view->data['T']=2;
          $this->view->data['E']= $this->model->examen_doctor('2016-01-01','2016-12-31');
          //echo '<pre>';
          //var_dump($this->view->data['E']);
     }
    
      $this->view->render($this, "general");
    }
     

}

}
