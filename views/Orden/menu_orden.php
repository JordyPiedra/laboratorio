<div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Registro Orden examen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Datos de orden
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="frmpaciente" id="frmpaciente" visual="si">
                                        <div class="form-group col-lg-3">
                                            <label>Número de orden</label>
                                            <input id="ORDEN"  onkeypress="return soloLetras(event)" class="form-control"  value="<?=(isset($this->data['ORDEN']))?$this->data['ORDEN'][0][1]:'';?>" disabled>
                                        </div>
                                           <div class="form-group col-lg-3">
                                            <label>Fecha de muestreo</label>
                                            <input  id= "FECHAO" name="FECHAO" type="date" value="<?php
                                            
if (isset($this->data['ORDEN']))
{
$date = $this->data['ORDEN'][0][6];

$createDate = new DateTime($date);

$strip = $createDate->format('Y-m-d');
  echo $strip;
}

                                          ?>" class="form-control" disabled>
                                        </div>                                        
                                          <div class="form-group col-lg-3  has-error" id="infoCED">
                                            <label>Cédula*</label>
                                          <input maxlength="10" value="<?=(isset($this->data['ORDEN']))?$this->data['ORDEN'][0][12]:'';?>" name="CED" id="CED" onkeypress="return soloNumeros(event)" class="form-control" placeholder="Ingrese Cédula">
                                        </div>
                                         
                                        <div class="form-group col-lg-3">
                                            <label>Historia Clínica*</label>
                                            <input maxlength="10"  name="HIST" id="HIST" onkeypress="return soloNumeros(event)" class="form-control" placeholder="Ingrese Historia Clínica">
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label>Primer Nombre*</label>
                                            <input  id= "NOM1" name= "NOM1" onkeypress="return soloLetras(event)" class="form-control" placeholder="Ingrese Primer Nombre">
                                        </div>
                                        
                                        <div class="form-group col-lg-3">
                                            <label>Segundo Nombre</label>
                                            <input  id= "NOM2" name= "NOM2" onkeypress="return soloLetras(event)" class="form-control" placeholder="Ingrese Segundo Nombre">
                                        </div>
                                        
                                        <div class="form-group col-lg-3">
                                            <label>Apellido Paterno*</label>
                                            <input id="APE1"  name="APE1" onkeypress="return soloLetras(event)" class="form-control" placeholder="Ingrese Apellido Paterno">
                                            
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Apellido Materno</label>
                                            <input id="APE2"  name="APE2" onkeypress="return soloLetras(event)" class="form-control" placeholder="Ingrese Apellido Materno">
                                            
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Fecha Nacimiento*</label>
                                            <input type="date" id="NAC" name="NAC" onkeypress="return soloNumeros(event)" class="form-control" placeholder="">
                                            
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Edad</label>
                                            <input  id="EDAD" name="EDAD" onkeypress="return soloNumeros(event)" class="form-control" placeholder="">
                                            
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Sexo</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="SEX" id="SEXH" value="H" >Hombre
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="SEX" id="SEXM" value="M">Mujer
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-lg-2">
                                            <label>Discapacidad</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="DISC" id="DISCS" value="S" >Si
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="DISC" id="DISCN" value="N" checked>No
                                                </label>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group col-lg-3">
                                            <label>Circuito</label>
                                            <select id="CIR" name="CIR" class="form-control">
<?php

foreach ($this->data['CIRCUITOS'] as $key => $value) {

echo '<option value="'.$value[0].'">'.$value[1].'</option>';
}
?>
                                            </select>
                                        </div>
                                                                           

                                     
                                        
                                     
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
         
         
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Exámenes
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                    <?php
                    if (!isset($this->data['ORDEN']))

{
   
    echo ' <div   id="btn_guardar" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
                                                Agregar exámen
                           </div> ';
}

                    ?>
                        
                         
                           <br><br>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>TIPO EXÁMEN</th>
                                            <th>NOMBRE EXÁMEN</th>
<?=(isset($this->data['ORDEN']))?'<th>BLANCO</th><th>ESTANDAR</th><th>REPETIDO</th><th>NORMAL</th>':'';?>
                                        </tr>
                                    </thead>
                                    <tbody id ="detalle_orden">
<?php
 foreach ($this->data['DETALLE'] as $key => $value) {

     foreach ($this->data['EXAMENES'] as $key1=> $value1) {
         if($value[2]==$value1[0])
         {
              $tipo="";
     switch ($value1[6]) {
                                            case 'H':
                                               $tipo="HERMATOLÓGICO";
                                                break;
                                            case 'U':
                                                $tipo="UROANÁLISIS";
                                                break;
                                            case 'C':
                                                $tipo="COPROLÓGICO";
                                                break;
                                            case 'Q':
                                             $tipo="QUIMÍCO SANGUÍNEO";
                                                break;
                                            case 'S':
                                             $tipo="SEROLOGÍA";
                                                break;
                                             case 'B':
                                              $tipo="BACTEROLOGÍA";
                                                break;
                                            case 'O':
                                             $tipo="OTROS";
                                                break;
                                            default:
                                                # code...
                                                break;
                                        
         }
          echo '<tr><td>'.($key+1).'</td><td>'.$tipo.'</td><td>'.$value[3].'</td>
          <td> <input type="number" id="BLAN" name="B'.$value[0].'" value="0"></td>
          <td> <input type="number" id="STAN" name="S'.$value[0].'" value="0"> </td>
          <td> <input type="number" id="MUES" name="M'.$value[0].'" value="0"></td>
          <td> <input type="number" id="NORM" name="N'.$value[0].'" value="0"></td><tr>';
     }
  
 }
 }                                           


                                          ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                


                <div class="col-lg-12">
                    <div class="panel panel-default">
                     
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                   <div class="form-group col-lg-12">
                                            <label>Observación</label> 
                                           <textarea name="" class="form-control" id="OBS" name="OBS" 
                                           <?=(isset($this->data['ORDEN']))?'disabled':'';?>
                                           >
                                           <?=(isset($this->data['ORDEN']))?$this->data['ORDEN'][0][5]:'';?>
                                           </textarea>  
                                        </div>
                        
                                    <?=(isset($this->data['ORDEN']))?'':'
                                    <div class="btn btn-primary" data-toggle="modal" data-target="#myModal2" id="btn_guardar" onclick="">
                                                Guardar
                                            </div>   
                                            <div class="btn btn-primary" data-dismiss="modal" onclick="cancelar_orden();">
                                                Cancelar
                                            </div>    
                                    ';?>
                                    
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>




             
 <?php if (isset($this->data['ORDEN'])) 
 {

echo'

<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Ingreso de materiales de tipo Insumo
</div>

<!-- /.panel-heading -->
<div class="panel-body">   
<input id="addinsumo" list="insumos">
<datalist id="insumos">
';
foreach ($this->data['INSUMOS'] as $key => $value) {
    echo '
    <option value="'.$value[2].'-'.$value[4].':'.$value[1].'">
    ';
}


echo '
</datalist>
 <br> 
  <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>INSUMO</th>
                                            <th>CANTIDAD</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id ="detalle_insumo">

                                       </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

</div></div></div>
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Resultado
</div>

<!-- /.panel-heading -->
<div class="panel-body">   
<input class="btn btn-primary"  name="ADJ" id="ADJ" type="file"> 
<br><div id="EXAM"> ';
         
 include_once('resultado.php');
 echo' </div></div></div></div>
 
 <div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
Por favor revise resultados, una vez guardados no existen cambios
</div>

<!-- /.panel-heading -->
<div class="panel-body">     <div class="btn btn-primary" data-toggle="modal" data-target="#myModal3" id="btn_guardar" onclick="save_result();">
Guardar
</div>  <br> 
</div></div></div>';

 
 }

 ?>
 

            </div>
            <!-- /.row -->





            </div>
            <!-- /.row -->

     
