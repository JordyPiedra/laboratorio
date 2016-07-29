<?php

class Orden extends Controller{
    
    public function __construct() {
        parent::__construct();
        if(!Session::getValue("CED_USU"))
        {
            header('Location: '.URL);
        }
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
   public function atender(){
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
            //var_dump ( $this->view->data['ORDEN']); 
           // $this->view->data['ORDEN'][13]=json_decode((array)$this->view->data['ORDEN'][13],true);
            $this->view->data['DETALLE']=$this->model->selectDETbyCOD($_POST['ORD']); 

        }

        $this->view->data['OP']=true;
        $this->view->render($this, "ingreso",false); 
    }
      public function generadas(){
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
            //var_dump ( $this->view->data['ORDEN']); 
           // $this->view->data['ORDEN'][13]=json_decode((array)$this->view->data['ORDEN'][13],true);
            $this->view->data['DETALLE']=$this->model->selectDETbyCOD($_POST['ORD']); 

        }

        $this->view->data['OP']=true;
        $this->view->data['BLOCK']=true;
        $this->view->render($this, "ingreso",false); 
    }

    public function resultado(){
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
            
            $this->view->data['ORDEN']=$this->model->selectbyCOD($_POST['ORD'],'A');
            //var_dump ( $this->view->data['ORDEN']); 
           // $this->view->data['ORDEN'][13]=json_decode((array)$this->view->data['ORDEN'][13],true);
            $this->view->data['DETALLE']=$this->model->selectDETbyCOD($_POST['ORD']); 

        }
        $this->view->data['OP']=false;
        $this->view->data['BLOCK']=true;
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
                    'COD_PER' => $IDper[0][13],
                    'COD_USUCRE' => Session::getValue('CED_USU')
                    ];  
                    $ORDEN['OBS_ORD'] = (isset($_POST['OBS']))? "'".trim($this->Mayus($_POST['OBS']))."'" :"''";
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
        $this->view->data['url_']='atender';
        $this->view->render($this, "revision"); 
    }

    public function lista(){
        $this->view->data['ORDEN']=$this->model->select_all('%',Session::getValue('CED_USU')) ;
        $this->view->render($this, "revision"); 
    }
    public function atendidas(){
        $this->view->data['ORDEN']=$this->model->select_all('R',Session::getValue('CED_USU')) ;
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
      if(isset($_POST['E']) &&  isset($_POST['R']) &&  
          isset($_POST['CC']))
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
        } 
          if(isset($detalle['STATE']) && $detalle['STATE']==false )
          echo json_encode($detalle);

          $detalle=null;

            $ArrayResult="{";
           foreach ($_POST['R'] as $key => $value) {
            
           if(empty($value['value']))
           $val = '""';
           else 
           $val = '"'.$value['value'].'"';
           $ArrayResult.='"'.$value['name'].'":'.$val.",";
           }
           $ArrayResult.='"E":"T" }';
           $this->model->updateOrd(['RES_ORD'=>"'".$ArrayResult."'",'EST_ORD' => "'A'",'FECRES_ORD'=>'NOW()','COD_USURES'=>"'".Session::getValue("CED_USU")."'"],$_POST['CC']);
           
           $this->processDescuento($_POST['CC']);

           //ARMAR KARDEZ PARA INSUMOS
           if(isset($_POST['I'])){
              foreach ($_POST['I'] as $key => $value) {
           $ISN_ID= substr($value['name'],3);
        
           $this->loadModel('Producto');
           $INSUMO=$this->model->get_productobyCOD($ISN_ID);
           
           $KARDEX=[
                    'COD_PROD' => "'".$INSUMO[0][0]."'",    
            	    'EST_KARPRO'=>"'E'",
            	    'FECORD_KARPRO'=> "NOW()",
            	    'SAL_KARPRO'=> 0,
            	    'CAN_KARPRO'=>$value['value'],
            	    'DES_KARPRO'=>"'SEGÚN EXAMEN NRO: '"
            	    ];  
           $this->loadModel('Inventario');
           $this->model->setKardex($KARDEX);
          $this->loadModel();
          $this->model->setInsumoOrden($INSUMO[0][0],$value['value'],$_POST['CC']);
           }
            }

            echo json_encode(['STATE'=>true,"MSG"=>"Ordern atendida correctamente"]);
     }else 
     echo json_encode(['STATE'=>false,"MSG"=>"Datos incompletos"]);
  }
  private function processDescuento($COD_ORD){
      $result = $this->model->selectDETbyCOD($COD_ORD);
       
      foreach ($result as $key => $value) {
          $total = $value[9]+$value[10];
         
          $this->loadModel('Producto');
          $material=$this->model->SelectEquivalencia($value[2]);
        
          foreach ($material as $keym => $valuem) {
              # code...

              //var_dump($this->model->SelectEquivalencia($value[2]));
          $material_info=$this->model->get_productobyCOD($valuem[2]);
          $material_equi=$valuem[3];
        
          $descuento=0;
          if($total>=$material_equi)
          {
              $descuento = floor($total/$material_equi);
          }
          $resta = $descuento*$material_equi;
          $total-=$resta;
            
          if($descuento>0)
          {
              $this->loadModel('Inventario');
              $KARDEX=[
            'COD_PROD' => "'".$material_info[0][0]."'",    
            'EST_KARPRO'=>"'E'",
            'FECORD_KARPRO'=> "NOW()",
            'SAL_KARPRO'=> 0,
            'CAN_KARPRO'=>$descuento,
            'DES_KARPRO'=>"'CONTABILIZACIÓN DE EXAMEN'"
              ];
          $result = $this->model->setKardex($KARDEX);
           
          }
          $this->loadModel();
          $this->model->setPorContabilizar($value[2],$total);
          }
          
          
      }
      
  }

    public function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
		return $variable;
		}

}