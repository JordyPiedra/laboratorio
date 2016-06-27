<div class="col-lg-12">
    <h1 class="page-header">Lista de Circuitos</h1>
</div>


<div class="col-lg-12">
    
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detalle circuitos de salud
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Direccion</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id ="circuito_v">
<?php 
foreach ($this->data as $key => $value) {
      echo '<tr class="odd gradeX">
                    <td>'.($key+1).'</td>
                    <td>'.$value[1].'</td>
                    <td>'.$value[2].'</td>
                    <td align="center" class="center"><button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal" onClick="buscar('.$value[0].",'".$value[1]."','".$value[2]."'".');" ><i class="fa fa-list"></i></button>&nbsp;
                    <button type="button"  class="btn btn-warning btn-circle" onClick="eliminar('.$value[0].",'".$value[1]."'".'); " ><i class="fa fa-times"></i></button></td></tr>';

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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
      
            <!-- /.row -->
</div>


       
       <!-- /.Final -->
</div></div></div></body>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editar Circuito</h4>
                </div>
                <div class="modal-body">
                <?php include 'menu_circuito.html'; ?>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Modal -->

        <!-- /.scripts -->
<script type="text/javascript" src="<?=URL?>public/js/globalajax.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/circuito_controller.js"></script>
 <script type="text/javascript">var URL='<?=  URL;?>';</script>
    <script>
     
    $(document).ready(function() {
       // cargar_circuito();

      $('#dataTables-example').DataTable({
                responsive: true
        });    

    });

    </script>
</html>