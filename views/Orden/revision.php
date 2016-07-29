
 <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Exámenes Pendientes<i onclick ="location.reload();" class="fa  fa-refresh fa-fw"></i></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
    
         
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>N. ORDEN</th>
                                            <th>CEDULA</th>
                                            <th>PACIENTE</th>
                                            <th>FECHA ATENCIÓN</th>
                                            <th>ATENDER</th>
                                        </tr>
                                    </thead>
                                    <tbody id ="examen">
                                    <?php
                                    foreach ($this->data['ORDEN'] as $key => $value) {
                                        if($value[4]=='A')
                                        $fila = '<button type="button"  onClick="orden('.$value[0].',1);" class="btn btn-success"><i class="fa fa-flask"></i>Ver resultado</button>';
                                        else 
                                        $fila= '<button type="button"  onClick="orden('.$value[0].',0);" class="btn btn-danger"><i class="fa fa-flask"></i>Sin resultado</button>';
                                        
                                     echo '<tr>
                                            <td>'.($key+1).'</td>
                                            <td>'.$value[1].'</td>
                                            <td>'.$value[12].'</td>
                                            <td>'.$value[11].'</td>
                                            <td>'.date($value[6]).'</td>
                                            <td>'.$fila.'</td>
                                            </tr>
                                     ';
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
                
<form action="<?= (isset($this->data['url_']))? URL.'Orden/atender':URL.'Orden/generadas'?>" method="POST" id="rr" target="_blank" style="display:none;">
<input type="text" value='' name="ORD"  id="ORD"/>
<input type="submit">
</form>
<form action="<?=URL.'Orden/resultado'?>" method="POST" id="rr1" target="_blank" style="display:none;">
<input type="text" value='' name="ORD"  id="ORD1"/>
<input type="submit">
</form>





            </div>
            <!-- /.row -->

     

 <!-- /.Final -->
</div></div></div></body>
       <!-- /.scripts -->
        <script type="text/javascript">var URL='<?=  URL;?>';</script>
<script type="text/javascript" src="<?=URL?>public/js/globalajax.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/orden_controller.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/valid.js"></script>

    <script>
     
    $(document).ready(function() {
       // cargar_circuito();

    

    });


        
</script>
</body>

</html>

