
 <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Exámenes Pendientes</h1>
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
                                    foreach ($this->data['DETALLE'] as $key => $value) {
                                     echo '<tr>
                                            <td>'.($key+1).'</td>
                                            <td>'.$value[1].'</td>
                                            <td>'.$value[2].'</td>
                                            <td>'.$value[3].'</td>
                                            <td>'.date($value[0]).'</td>
                                            <td><button type="button"  class="btn  btn-primary btn-circle" onClick="orden('.$value[0].'); " ><i class="fa fa-flask"></i></button></td>
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
                
<form action="<?=URL.'Orden/orden'?>" method="POST" id="rr" target="_blank" style="display:none;">
<input type="text" value='' name="ORD"  id="ORD"/>
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

