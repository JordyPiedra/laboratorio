$(document).ready(function(){
 
cargar_servicio();


});

	$("#NOM_SER").click(function(){

cargar_servicio();

	});
//Cargar circuitos
function cargar_servicio()
{          
            var parametros={"METODO" : "GETALL"};
            
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_servicio.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                    	servicio(response);
                          
                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });

}
function servicio(datos){

	var data = JSON.parse(datos);
	
	$("#COD_TIP").empty();			
	 var fila='<option selected="true" disabled="disabled" > Seleccione Tipo</option>';
    
   	$("#COD_TIP").append(fila);

  	$.each( data, function( key, value) {
  		
     var fila='<option value="'+value["COD_TIP"]+'">'+value["NOM_TIP"]+'</option>';
    
   	$("#COD_TIP").append(fila);
   	 });

                   
}


// obtener datos paciente en tabla jaz
function getAllValues(){
    var NOM_SER= $('#NOM_SER').val();
    var DESC_SER= $('#DESC_SER').val();
    var COD_TIP= $('#COD_TIP').val();
    var parametros={
        "NOM_SER":NOM_SER,
        "DESC_SER":DESC_SER,
        "COD_TIP":COD_TIP
        
    };
    return parametros;
}
     
     //Crear paciente
function save_servicio()
{ 

            var parametros=getAllValues();
            var parametro2={"METODO" : "CREAR"};
            $.extend(true, parametros, parametro2);
             
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_servicio.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                    	
                            alert(response);
                            $('#NOM_SER').val('');
                            $('#DESC_SER').val('');
                            $('#COD_TIP').val('');
                            

                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });
        }

function cargar_cartera_servicio()
{          
            var parametros={"METODO" : "GETALL"};
            
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_tipo_servicio.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                        update_table(response);
                        $('#dataTables-example').DataTable({
                responsive: true
        });
                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });

}
function update_table(datos){

    var data = JSON.parse(datos);
    
    $("#servicio_v").empty();          
     
    $.each( data, function( key, value) {
        
     var fila='<tr class="odd gradeX"><td>'+(key+1)+'</td><td>'+value["NOM_SER"]+'</td><td>'+value["NOM_TIP"]+'</td><td align="center" class="center"><button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal" onClick="buscar('+value["COD_SER"]+');" ><i class="fa fa-list"></i></button>&nbsp;<button type="button"  onClick="eliminar('+value["COD_SER"]+');" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></td></tr>';

  
    $("#servicio_v").append(fila);
     });
  
    }

