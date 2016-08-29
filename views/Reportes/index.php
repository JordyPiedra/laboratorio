       <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Módulo de Reportes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Reportes
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                  
                                 <form role="form" id="frmuser" action="<?=URL.'Reportes/general'?>" method="POST"  target="_blank" >
                                        <div class="form-group col-lg-2">
                                            <label>Fecha Inicial</label>
                                            <input required id="FINI_"  name="FINI_" required type="date" class="form-control" placeholder="Nombres Completos">
                                            
                                        </div>
                                       <div class="form-group col-lg-2">
                                            <label>Fecha Final</label>
                                            <input required id="FFIN_"  name="FFIN_" required type="date" class="form-control" placeholder="Nombres Completos">
                                            
                                        </div>
                                       
                                        <div class="form-group col-lg-4">
                                            <label>Reporte</label>
                                            <select  id="TIP_" name="TIP_" class="form-control">
                                            <option value="2">Por Profesional</option>
                                            <option value ="1">Por Exámen</option>
                                            <option value ="3">Por Circuito</option>
                                            </select>
                                        </div>
  <div class="form-group col-lg-12">
   <div class="btn btn-primary" data-dismiss="modal" id="btn_guardar" onclick="consultar();">
                                                Consultar
                                            </div>   
                                            <input type="submit" id="btn001" style="display:none;">
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
  
<form role="form"  style="display:none;" id="frmuser_" action="<?=URL.'Reportes/general'?>" method="POST"  target="_blank" >
<input required id="FINI"  name="FINI" required type="date" class="form-control" placeholder="Nombres Completos">
<input required id="FFIN"  name="FFIN" required type="date" class="form-control" placeholder="Nombres Completos">
<select  id="TIP" name="TIP" class="form-control">
<option value="2">Por Profesional</option>
<option value ="1">Por Exámen</option>
<option value ="3">Por Circuito</option>

<input type="submit" id="btn001">

</form>

  
 <!-- /.Final -->
</div></div></div></body>
       <!-- /.scripts -->
        <script type="text/javascript">var URL='<?=  URL;?>';var Xx=0;</script>
<script type="text/javascript" src="<?=URL?>public/js/globalajax.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/valid.js"></script>

    <script>
     
    $(document).ready(function() {
       // cargar_circuito();

    

    });
function consultar(){
    if(onclick_('#frmuser'))
    {
        $('#FINI').val($('#FINI_').val());
        $('#FFIN').val($('#FFIN_').val());
        $('#TIP').val($('#TIP_').val());
        $('#frmuser_').trigger('submit');
    }
   

}
        
</script>
</body>

</html>
