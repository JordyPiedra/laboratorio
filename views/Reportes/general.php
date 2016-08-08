
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
                                        <?php
                                        if($this->data['T']==1)
                                        {
                                            echo ' <th>#</th>
                                            <th>CODIGO</th>
                                            <th>EXAMEN</th>
                                            <th>CANTIDAD</th>';
                                        }
                                         if($this->data['T']==2)
                                        {
                                            echo ' <th>#</th>
                                            <th>CIRCUITO</th>
                                            <th>CANTIDAD</th>
                                            <th>CODIGO</th>
                                            <th>EXAMEN</th>
                                            
                                            <th>DOCTOR</th>'
                                            ;
                                        }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody id ="examen">
                                    <?php
                                    if($this->data['T']==1)
                                        {
                                           foreach ($this->data['E'] as $key => $value) {
                                                                   echo '<tr>
                                            <td>'.($key+1).'</td>
                                            <td>'.$value[0].'</td>
                                            <td>'.$value[1].'</td>
                                            <td>'.$value[3].'</td>
                                       
                                            </tr>
                                            ';
                                        }
                                   
                                    }
                                     if($this->data['T']==2)
                                        {
                                           foreach ($this->data['E'] as $key => $value) {
                                                                   echo '<tr>
                                            <td>'.($key+1).'</td>
                                            <td>'.$value[4].'</td>
                                            <td>'.$value[0].'</td>
                                            <td>'.$value[1].'</td>
                                            <td>'.$value[3].'</td>
                                            <td>'.$value[5].'</td>
                                       
                                            </tr>
                                            ';
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
                




            </div>
            <!-- /.row -->

     

 <!-- /.Final -->
</div></div></div></body>
       <!-- /.scripts -->
        <script type="text/javascript">var URL='<?=  URL;?>';</script>
<script type="text/javascript" src="<?=URL?>public/js/globalajax.js"></script>

<script type="text/javascript" src="<?=URL?>public/js/valid.js"></script>

    <script>
     
    $(document).ready(function() {
       // cargar_circuito();

     $('#dataTables-example').DataTable({
                responsive: true
        });

    });


        
</script>
</body>

</html>

