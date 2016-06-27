 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Registro Exámen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Datos del Exámen
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="frmproducto">
                                       
                                        <div class="form-group col-lg-3" id="TIPsection">
                                            <label>TIPO DE EXÁMEN</label>
                                            <select id="TIP"  name="TIP"  class="form-control">
                                                <option value="H"> HERMATOLÓGICO</option>
                                                <option value="U"> UROANÁLISIS</option>
                                                <option value="C"> COPROLÓGICO</option>
                                                <option value="Q"> QUÍMICO SANGUÍNEO</option>
                                                <option value="S"> SEROLOGÍA</option>
                                                <option value="B"> BACTEROLOGÍA</option>
                                                <option value="O"> OTROS</option>

                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>CÓDIGO</label>
                                            <input id="COD"  name="COD"  onkeypress="" class="form-control" placeholder="Código">
                                            
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>NOMBRE</label>
                                            <input id="NOM"  name="NOM"  onkeypress="return soloLetras(event)" class="form-control" placeholder="Nombre de Exámen">
                                            
                                        </div>
                                       
                                        <div class="form-group col-lg-12">
                                        <div class="btn btn-primary" data-dismiss="modal" id="btn_guardar" onclick="save_producto();">
                                                Guardar
                                            </div>   
                                         <div class="btn btn-primary" onclick="">
                                                Cancelar
                                            </div> 
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
               
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->



  </div>    
  
  
  
 <!-- /.Final -->
</div></div></div></body>
       <!-- /.scripts -->
        <script type="text/javascript">var URL='<?=  URL;?>';</script>
<script type="text/javascript" src="<?=URL?>public/js/globalajax.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/examen_controller.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/valid.js"></script>

    <script>
     
    $(document).ready(function() {
       // cargar_circuito();

    

    });


        
</script>
</body>

</html>
