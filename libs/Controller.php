 <?php

Class Controller{
       public function __construct(){
               Session::init();
               $this->view = new View();
               $this->loadModel();

       }

       public function loadModel($clase= null){
       $model = !isset($clase) ? get_class($this) : $clase;
       $model .="_model";
               $path  = "model/".$model.".php";

               if(file_exists($path)){
                       require_once $path;
                       $this->model = new $model();
               }
       }
       
 }

?>