
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Registro Usuario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Datos del Usuario
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="frmuser">
                                        <div class="form-group col-lg-2">
                                            <label>Cédula</label>
                                            <input required id="CED"  name="CED"  maxlength="10" onkeypress="return soloNumeros(event)" class="form-control" placeholder="Cédula">
                                            
                                        </div>
                                        
                                        <div class="form-group col-lg-3">
                                            <label>Primer Nombre*</label>
                                            <input  required id= "NOM1"    name= "NOM1"    onkeypress="return soloLetras(event)" class="form-control" placeholder="Apellidos completos">
                                            
                                        
                                        </div>
                                         <div class="form-group col-lg-3">
                                            <label>Segundo Nombre</label>
                                            <input   id= "NOM2"    name= "NOM2"    onkeypress="return soloLetras(event)" class="form-control" placeholder="Apellidos completos">
                                            
                                        
                                        </div>
                                         <div class="form-group col-lg-3">
                                            <label>Primer Apellido</label>
                                            <input  required id= "APE1"    name= "APE1"    onkeypress="return soloLetras(event)" class="form-control" placeholder="Apellidos completos">
                                            
                                        
                                        </div>
                                         <div class="form-group col-lg-3">
                                            <label>Segundo Apellido</label>
                                            <input  id= "APE2"    name= "APE2"    onkeypress="return soloLetras(event)" class="form-control" placeholder="Apellidos completos">
                                            
                                        
                                        </div>
                                        
                                        <div class="form-group col-lg-4">
                                            <label>PASSWORD</label>
                                            <input required  maxlength="16" type="password" name="PASS" id="PASS" class="form-control" placeholder="Contraseña ">
                                            
                                        </div>

                                         <div class="form-group col-lg-4">
                                            <label>Tipo</label>
                                            <select required id="TIP" name="TIP" class="form-control">
                                            <option value="A">ADMINISTRADOR</option>
	                                        <option value="E">ESTADISTICO</option>
                                            <option value="M">MEDICO</option>
                                            <option value="L">LABORATORISTA</option>
                                            </select>
                                        </div>
 
                                        <div class="form-group col-lg-4">
                                            <label>Estado</label>
                                            <select required id="ESTA" name="ESTA" class="form-control"><option value="1">Activo</option>
                                                <option value ="0">Inactivo</option>
                                            </select>
                                        </div>
  <div class="form-group col-lg-12">
   <div class="btn btn-primary" data-dismiss="modal" id="btn_guardar" onclick="save_usuario();">
                                                Guardar
                                            </div>   
                                         <div class="btn btn-primary"  data-dismiss="modal" onclick="">
                                                Cancelar
                                            </div> 
                                            <input type="submit" style="display:none;">
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

