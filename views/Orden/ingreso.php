
<?php include 'menu_orden.php'; ?>
  </div>    
  
  
  
<!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Exámenes</h4>
                </div>
                <div class="modal-body">
                <div class="checkbox">
            

                                               
                                          
              
              <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#H" data-toggle="tab" aria-expanded="true">HERMATOLÓGICO</a>
                                </li>
                                <li class=""><a href="#U" data-toggle="tab" aria-expanded="true">UROANÁLISIS</a>
                                </li>
                                <li class=""><a href="#C" data-toggle="tab" aria-expanded="true">COPROLÓGICO</a>
                                </li>
                                <li class=""><a href="#Q" data-toggle="tab" aria-expanded="true">QUÍMICO SANGUÍNEO</a>
                                </li>
                                <li class=""><a href="#S" data-toggle="tab" aria-expanded="true">SEROLOGÍA</a>
                                </li>
                                <li class=""><a href="#B" data-toggle="tab" aria-expanded="true">BACTEROLOGÍA</a>
                                </li>
                                <li class=""><a href="#O" data-toggle="tab" aria-expanded="true">OTROS</a>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                               <?php
                               $E=['H' =>'','U'=>'',
                                    'C' =>'','Q'=>'',
                                    'S' =>'','B'=>'',
                                    'O'=>''];
	                                foreach ($this->data['EXAMENES'] as $key => $value) {
                                        switch ($value[6]) {
                                            case 'H':
                                                $E['H'].=' <p><input tbs="'.$value[2].'" type="checkbox" id="Hchk'.$value[0].'" name="Hchk'.$value[0].'"  value="'.$value[0].'">'.$value[2].' </p>';
                                                break;
                                            case 'U':
                                                $E['U'].=' <p><input tbs="'.$value[2].'" type="checkbox" id="Uchk'.$value[0].'" name="Uchk'.$value[0].'" value="'.$value[0].'">'.$value[2].' </p>';
                                                break;
                                            case 'C':
                                                $E['C'].=' <p><input tbs="'.$value[2].'" type="checkbox" id="Cchk'.$value[0].'" name="Cchk'.$value[0].'" value="'.$value[0].'">'.$value[2].' </p>';
                                                break;
                                            case 'Q':
                                                $E['Q'].=' <p><input tbs="'.$value[2].'" type="checkbox" id="Qchk'.$value[0].'" name="Qchk'.$value[0].'" value="'.$value[0].'">'.$value[2].' </p>';
                                                break;
                                            case 'S':
                                                $E['S'].=' <p><input tbs="'.$value[2].'" type="checkbox" id="Schk'.$value[0].'" name="Schk'.$value[0].'" value="'.$value[0].'">'.$value[2].' </p>';
                                                break;
                                             case 'B':
                                                $E['B'].=' <p><input tbs="'.$value[2].'" type="checkbox" id="Bchk'.$value[0].'" name="Bchk'.$value[0].'" value="'.$value[0].'">'.$value[2].' </p>';
                                                break;
                                            case 'O':
                                                $E['O'].=' <p><input tbs="'.$value[2].'" type="checkbox" id="Ochk'.$value[0].'" name="Ochk'.$value[0].'" value="'.$value[0].'">'.$value[2].' </p>';
                                                break;
                                            default:
                                                # code...
                                                break;
                                        }
                                      
                                    }?>
                            <div class="tab-content" id="frmordenexamen">
                                <div class="tab-pane fade active in" id="H">
                                <?=$E['H'];?>
                                </div>
                                <div class="tab-pane fade" id="U">
                                <?=$E['U'];?>
                                </div>
                                <div class="tab-pane fade" id="C">
                                <?=$E['C'];?>
                                </div>
                                <div class="tab-pane fade " id="Q">
                                <?=$E['Q'];?>
                                </div>
                                <div class="tab-pane fade" id="S">
                                <?=$E['S'];?>
                                </div>
                                <div class="tab-pane fade" id="U">
                                <?=$E['B'];?>
                                </div>
                                <div class="tab-pane fade" id="C">
                                <?=$E['O'];?>
                                </div>
                            </div>
                            
                        </div>
                         <div class="btn btn-primary" data-dismiss="modal" id="btn_guardar" onclick="add_examen();">
                                                Guardar
                                            </div>   
                                            <div class="btn btn-primary" data-dismiss="modal" onclick="">
                                                Cancelar
                                            </div>     
                </div>


                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  
<!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Exámenes</h4>
                </div>
                <div class="modal-body">
                <div class="checkbox">
                <div class="panel-body">
                <!-- Nav tabs -->
                <h4>Seguro desea registrar la orden de exámen</h4>

                </div>
                <div class="btn btn-primary" data-dismiss="modal" id="btn_guardar" onclick="insert_orden();">
                Guardar
                </div>   
                <div class="btn btn-primary" data-dismiss="modal" onclick="">
                Cancelar
                </div>     
                </div>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


<!-- Modal -->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Resultado</h4>
                </div>
                <div class="modal-body">
                <div class="checkbox">
                <div class="panel-body">
                <!-- Nav tabs -->
                <h4>Seguro desea guardar la respuesta</h4>

                </div>
                <div class="btn btn-primary" data-dismiss="modal" id="btn_guardar" onclick="respond_orden();">
                Guardar
                </div>   
                <div class="btn btn-primary" data-dismiss="modal" onclick="">
                Cancelar
                </div>     
                </div>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


 <!-- /.Final -->
</div></div></div></body>
       <!-- /.scripts -->
       <script type="text/javascript">var Xxcd='<?=  (isset($this->data['ORDEN']))?$this->data['ORDEN'][0][0]:false;?>';</script>
        <script type="text/javascript">var Xx='<?=  (isset($this->data['ORDEN']))?true:false;?>';</script>
        <script type="text/javascript">var REQUEST=<?= (isset($this->data['ORDEN']))?"JSON.parse('".$this->data['ORDEN'][0][13]."')":false;?>;</script>
        <script type="text/javascript">var URL='<?=  URL;?>';</script>
<script type="text/javascript" src="<?=URL?>public/js/globalajax.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/paciente_controller.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/orden_controller.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/valid.js"></script>

    <script>
     
    $(document).ready(function() {
       // cargar_circuito();

    if(REQUEST!=false)
    {
        EXAMresponse();
    }

    });


        
</script>
</body>

</html>
