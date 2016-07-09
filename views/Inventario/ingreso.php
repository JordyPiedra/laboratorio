  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Inventario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Datos del Producto
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="frmproducto">
                                        <label type="text" value="1" id="kar" name="kar"  style="display:none;">1</label>
                                        <div class="form-group col-lg-12">
                                           
                                                    <input type="radio" name="CAT" onclick="$('#TIPsection').hide();  $('#dfcad').hide();" id="CATI" value="I" disabled>Insumo
                                                    <input type="radio" name="CAT" onclick="$('#TIPsection').show(); $('#dfcad').show();" id="CATR" value="R" disabled>Reactivo
                                             
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>CÓDIGO</label>
                                            <input id="COD"  name="COD"  onkeypress="" class="form-control" placeholder="Código" required>
                                            
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>NOMBRE</label>
                                            <input id="NOM"  name="NOM"  onkeypress="return soloLetras(event)" class="form-control" required placeholder="Nombre de Producto" disabled>
                                        </div>
                                         <div class="form-group col-lg-4">
                                            <label>DESCRIPCION</label>
                                            <input  id="DESC" name="DESC"  required class="form-control" placeholder="Descripción del producto " disabled>
                                            
                                        </div>
                                     <div  id="TIPsection" style="display:none;">
                                        <div class="form-group col-lg-3">
                                            <label>TIPO REACTIVO</label>
                                            <select id="TIP"  onchange="exameneslist();" name="TIP"  class="form-control" disabled>
                                                <option value="H"> HERMATOLÓGICO</option>
                                                <option value="U"> UROANÁLISIS</option>
                                                <option value="C"> COPROLÓGICO</option>
                                                <option value="Q"> QUÍMICO SANGUÍNEO</option>
                                                <option value="S"> SEROLOGÍA</option>
                                                <option value="B"> BACTEROLOGÍA</option>
                                                <option value="O"> OTROS</option>

                                            </select>
                                        </div>
                                       
                                      
                                     </div>
                                        <div class="form-group col-lg-1"  id="CANTsection" >
                                            <label>CANTIDAD</label>
                                            <input id="CANT" value="0" name="CANT"  onkeypress="return soloNumeros(event)" class="form-control" placeholder="Cifras enteras" disabled>
                                            
                                        </div>
                                        <input type="submit" style="display:none;">
                 
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
                           Ingreso/Egreso
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="frmkardex">
                                         <div class="form-group col-lg-2">
                                            <label>MOVIMIENTO</label>
                                            <select id="MOV" name="MOV"  class="form-control">
                                                <option value="I"> INGRESO</option>
                                                <option value="E"> EGRESO</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>F. ORDEN</label>
                                            <input id="FORD"  name="FORD" type="date"  onkeypress="" class="form-control" placeholder="Código" required>
                                            
                                        </div>
                                         <div class="form-group col-lg-2" id="dfcad">
                                            <label>F. CADUCIDAD</label>
                                            <input id="FCAD"  name="FCAD" type="date"  onkeypress="" class="form-control" placeholder="Código" required>
                                            
                                        </div>
                                       
                                         <div class="form-group col-lg-5">
                                            <label>DESCRIPCION</label>
                                            <input  id="KDES" name="KDES"  class="form-control" required placeholder="Descripción del movimiento ">
                                            
                                        </div>
                                     
                                        <div class="form-group col-lg-1"  id="CANTsection" >
                                            <label>CANTIDAD</label>
                                            <input id="KCAN" value="0" name="KCAN" required onkeypress="return soloNumeros(event)" class="form-control" placeholder="Cifras enteras">
                                            
                                        </div>
                                        <div class="form-group col-lg-12" >
                                    <div class="btn btn-primary" data-dismiss="modal" id="btn_guardar" onclick="savekardex();">
                                                Guardar
                                            </div>   
                                            <div class="btn btn-primary" data-dismiss="modal" onclick="">
                                                Cancelar
                                            </div>
                                            </div>   
                                              <input type="submit" style="display:none;">
                 
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detalle de movimientos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>MOVIMIENTO</th>
                                            <th>FECHA DE ORDEN</th>
                                            <th>DESCRIPCION</th>
                                            <th>CANTIDAD</th>
                                             <th>SALDO</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody id ="kardex_hist">

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
        </div>
        <!-- /#page-wrapper -->



 <!-- /.Final -->
</div></div></div></body>
       <!-- /.scripts -->
        <script type="text/javascript">var URL='<?=  URL;?>';</script>
<script type="text/javascript" src="<?=URL?>public/js/globalajax.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/producto_controller.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/inventario_controller.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/valid.js"></script>

    <script>
     
    $(document).ready(function() {
       // cargar_circuito();

    

    });


        
</script>
</body>

</html>
