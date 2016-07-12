<div class="col-lg-12">
    <h1 class="page-header">Lista de Productos y Exámenes</h1>
</div>


<div class="col-lg-12">
    
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Productos registrados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody id ="circuito_v">
<?php 
foreach ($this->data['PRODUCTO'] as $key => $value) {
      echo '<tr class="odd gradeX">
                    <td>'.($key+1).'</td>
                    <td>'.$value[1].'</td>
                    <td>'.$value[2].'</td>
                    <td>'.$value[3].'</td>
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
      
            <!-- /.row -->
</div>


       
       <!-- /.Final -->
</div></div></div></body>


        <!-- /.scripts -->
<script type="text/javascript" src="<?=URL?>public/js/globalajax.js"></script>

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