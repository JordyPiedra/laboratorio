function cargar_paciente()
{          
            var parametros={"METODO" : "GETALL"};
            
           fajax(parametros,'../clases/cls_paciente.php',cargar_paciente_response) ;
 }
 
function cargar_paciente_response(response){
 update_table(response);
                        $('#dataTables-example').DataTable({
                responsive: true
 });
}

function update_table(datos){

    var data = JSON.parse(datos);
    
    $("#pacientes_v").empty();          
     
    $.each( data, function( key, value) {
        
     var fila='<tr class="odd gradeX"><td>'+(key+1)+'</td><td>'+value["CED_PER"]+'</td><td>'+value["NOM_PER"]+'</td><td>'+value["APE_PER"]+'</td><td>'+value["DIR_PER"]+'</td><td>'+value["TEL_PER"]+'</td><td>'+value["NOM_CIR"]+'</td><td align="center" class="center"><button type="button" class="btn btn-primary btn-circle" onClick="window.location.href = '+"'orden.php?id="+value["COD_PER"]+"'"+';" ><i class="fa fa-list"></i></td></tr>';

  
    $("#pacientes_v").append(fila);
     });
  
    }

    

function circuitos(datos){

	var data = JSON.parse(datos);
	
	$("#COD_CIR").empty();			
	 var fila='<option selected="true" disabled="disabled" > Seleccione Circuito</option>';
    
   	$("#COD_CIR").append(fila);

  	$.each( data, function( key, value) {
  		
     var fila='<option value="'+value["COD_CIR"]+'">'+value["NOM_CIR"]+'</option>';
    
   	$("#COD_CIR").append(fila);
   	 });

                   
}



// obtener datos paciente en tabla jaz
function getAllValues(){
    var CED_PER= $('#CED_PER').val();
    var NOM_PER= $('#NOM_PER').val();
    var APE_PER= $('#APE_PER').val();
    var DIR_PER= $('#DIR_PER').val();
    var TEL_PER= $('#TEL_PER').val();
    var COD_CIR= $('#COD_CIR').val();
    var parametros={
        "CED_PER":CED_PER,
        "NOM_PER":NOM_PER,
        "APE_PER":APE_PER,
        "DIR_PER":DIR_PER,
        "TEL_PER":TEL_PER,
        "COD_CIR":COD_CIR
    };
    return parametros;
}
     
     //Crear paciente
function save_paciente()
{ 

            var parametros=getAllValues();
            var parametro2={"METODO" : "CREAR"};
            $.extend(true, parametros, parametro2);
             
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_paciente.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                    	
                            alert(response);
                            $('#CED_PER').val('');
                            $('#NOM_PER').val('');
                            $('#APE_PER').val('');
                            $('#DIR_PER').val('');
                            $('#TEL_PER').val('');
                            $('#COD_CIR').val('');

                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });

}
function buscar(id){

var parametros={"METODO" : "BUSCAR",
               "COD_PER" : id};
          
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_paciente.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                           var data = JSON.parse(response);
                          

                            $('#CED_PER').val(data["CED_PER"]);
                            $('#NOM_PER').val(data["NOM_PER"]);
                            $('#APE_PER').val(data["APE_PER"]);
                            $('#TEL_PER').val(data["TEL_PER"]);
                            $('#COD_CIR').val(data["NOM_CIR"]);

                            $("#btn_guardar").attr("onclick","actualizar("+data["COD_PER"]+");");
                            

                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });


}
//Actualizar circuito
function actualizar(id){

            var parametros=getAllValues();
            var parametro2={"COD_PER":id,
                            "METODO" : "EDITAR"};
            $.extend(true, parametros, parametro2);
              
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_paciente.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                       alert(response);   
                        location.reload();
                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });


}

function alerta_eliminar(id)
{
     $("#btn_eliminar").attr("onclick","eliminar("+id+");");
                            
}
function eliminar(id){

            
            var parametros={"COD_PER":id,
                            "METODO" : "ELIMINAR"};
           
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_paciente.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                        location.reload();
                      
                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });
}