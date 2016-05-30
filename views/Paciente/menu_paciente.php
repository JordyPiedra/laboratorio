
   
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pacientes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Datos personales
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="frmpaciente" name="frmpaciente">
                                        <div class="form-group col-lg-3">
                                            <label>Cédula*</label>
                          
                                          <input maxlength="10"  name="CED" id="CED" onkeypress="return soloNumeros(event)" class="form-control" placeholder="Ingrese Cédula">
                            
                                        
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Historia Clínica*</label>
                                            <input maxlength="10"  name="HIST" id="HIST" onkeypress="return soloNumeros(event)" class="form-control" placeholder="Ingrese Historia Clínica">
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label>Primer Nombre*</label>
                                            <input  id= "NOM1" name= "NOM1" onkeypress="return soloLetras(event)" class="form-control" placeholder="Ingrese Primer Nombre">
                                        </div>
                                        
                                        <div class="form-group col-lg-3">
                                            <label>Segundo Nombre</label>
                                            <input  id= "NOM2" name= "NOM2" onkeypress="return soloLetras(event)" class="form-control" placeholder="Ingrese Segundo Nombre">
                                        </div>
                                        
                                        <div class="form-group col-lg-3">
                                            <label>Apellido Paterno*</label>
                                            <input id="APE1"  name="APE1" onkeypress="return soloLetras(event)" class="form-control" placeholder="Ingrese Apellido Paterno">
                                            
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Apellido Materno</label>
                                            <input id="APE2"  name="APE2" onkeypress="return soloLetras(event)" class="form-control" placeholder="Ingrese Apellido Materno">
                                            
                                        </div>


                                        <div class="form-group col-lg-6">
                                            <label>Dirección*</label>
                                            <input id="DIR"   name="DIR"   class="form-control" placeholder="Dirección - barrio urbanización - lote">
                                            
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label>Teléfono</label>
                                            <input maxlength="10" id="TEL"   name="TEL"   onkeypress="return soloNumeros(event)" class="form-control" placeholder="Convencional">
                                            
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Celular</label>
                                            <input maxlength="10" id="CEL" name="CEL" onkeypress="return soloNumeros(event)" class="form-control" placeholder="Celular">
                                            
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Fecha Nacimiento*</label>
                                            <input type="date" id="NAC" name="NAC" onkeypress="return soloNumeros(event)" class="form-control" placeholder="Celular - convencional">
                                            
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Sexo</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="SEX" id="SEXH" value="H" >Hombre
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="SEX" id="SEXM" value="M">Mujer
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-lg-2">
                                            <label>Discapacidad</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="DISC" id="DISCS" value="S" >Si
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="DISC" id="DISCN" value="N" checked>No
                                                </label>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group col-lg-2">
                                            <label>Circuito</label>
                                            <select id="CIR" name="CIR" class="form-control">
                                                <?php
                                                
                                                foreach ($this->data['CIRCUITOS'] as $key => $value) {
                                                    
                                                    echo '<option value="'.$value[0].'">'.$value[1].'</option>';
                                                }
                                                 ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12">
                                        <div class="btn btn-primary" data-dismiss="modal" id="btn_guardar" onclick="save_paciente();">
                                                Guardar
                                            </div>   
                                         <div class="btn btn-primary" onclick="locarion.reload();">
                                                Cancelar
                                            </div> </div> 
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

 

    <!-- /#wrapper -->
