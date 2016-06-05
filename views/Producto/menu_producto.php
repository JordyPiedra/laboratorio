 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Registro Producto</h1>
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
                                        <div class="form-group col-lg-12">
                                           
                                                    <input type="radio" name="CAT" onclick=" $('input').attr('disabled',false);  $('#TIPsection').hide();" id="CATI" value="I" >Insumo
                                                    <input type="radio" name="CAT" onclick="$('input').attr('disabled',false);   $('#TIPsection').show();" id="CATR" value="R" >Reactivo
                                             
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>CÓDIGO</label>
                                            <input id="COD"  name="COD"  onkeypress="" class="form-control" placeholder="Código" required>
                                            
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>NOMBRE</label>
                                            <input id="NOM"  name="NOM"  onkeypress="return soloLetras(event)" class="form-control" placeholder="Nombre de Producto">
                                            
                                        </div>
                                         <div class="form-group col-lg-6">
                                            <label>DESCRIPCION</label>
                                            <input  id="DESC" name="DESC"  class="form-control" placeholder="Descripción del producto ">
                                            
                                        </div>
                                     
                                        <div class="form-group col-lg-2"  id="CANTsection" >
                                            <label>CANTIDAD</label>
                                            <input id="CANT" value="0" name="CANT"  onkeypress="return soloNumeros(event)" class="form-control" placeholder="Cifras enteras">
                                            
                                        </div>
                                        <div  id="TIPsection" style="display:none;">
                                        <div class="form-group col-lg-3">
                                            <label>TIPO REACTIVO</label>
                                            <select id="TIP"  onchange="exameneslist();" name="TIP"  class="form-control">
                                                <option value="H"> HERMATOLÓGICO</option>
                                                <option value="U"> UROANÁLISIS</option>
                                                <option value="C"> COPROLÓGICO</option>
                                                <option value="Q"> QUÍMICO SANGUÍNEO</option>
                                                <option value="S"> SEROLOGÍA</option>
                                                <option value="B"> BACTEROLOGÍA</option>
                                                <option value="O"> OTROS</option>

                                            </select>
                                        </div>
                                       
                                        <div class="form-group col-lg-3" id="TIPsection">
                                            <label>EXÁMEN</label>
                                            <select id="EXA"  name="EXA"  class="form-control">
                                              
                                            </select>
                                        </div>
                                         <div class="form-group col-lg-2" id="TIPsection">
                                            <label>CAPACIDAD DE EXÁMENES</label>
                                            
                                             <input id="CANTE"  name="CANTE"  onkeypress="return soloNumeros(event)" class="form-control" placeholder="Cantidad" >
                                        </div>
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


