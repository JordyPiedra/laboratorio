function save_paciente()
{ 
        
 fajax($('#frmpaciente').serialize(),URL+'Paciente/insert',save_paciente_response);  
}

function save_paciente_response(response){
           var data = JSON.parse(response);
        toastr.info(data['MSG']);
}

 $( "#CED" ).focusout(function() {
   cargar_paciente();
});

function cargar_paciente()
{          
          fajax($('#frmpaciente').serialize(),URL+'Paciente/getPaciente',cargar_paciente_response);  
}
function cargar_paciente_response(response){
        var data = JSON.parse(response);
        console.log(data);
        if(data.length>=1)
        {
                 $('#CED').val(data[0][0]);
      $('#HIST').val(data[0][1]);
      $('#NOM1').val(data[0][2]);
      $('#NOM2').val(data[0][3]);
      $('#APE1').val(data[0][4]);
      $('#APE2').val(data[0][5]);
      $('#NAC').val(data[0][6]);
      $('#DIR').val(data[0][7]);
      $('#CEL').val(data[0][8]);
      $('#TEL').val(data[0][9]);
      if(data[0][10]=='H')
      $('#SEXH').prop("checked",true) ;
      else
      $('#SEXM').prop("checked",true) ;
      
      if(data[0][11]=='S')
      $('#DISCS').prop("checked",true) ;
      else
      $('#DISCSN').prop("checked",true) ;
      
      $('#CIR').val(data[0][12]);
      toastr.info('Paciente cédula '+data[0][0]+' Existente!.');
}
    
        
}


function update_table(datos){

    var data = JSON.parse(datos);
    
    $("#pacientes_v").empty();          
     
    $.each( data, function( key, value) {
        
     var fila='<tr class="odd gradeX"><td>'+(key+1)+'</td><td>'+value["CED_PER"]+'</td><td>'+value["NOM_PER"]+'</td><td>'+value["APE_PER"]+'</td><td>'+value["DIR_PER"]+'</td><td>'+value["TEL_PER"]+'</td><td>'+value["NOM_CIR"]+'</td><td align="center" class="center"><button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal" onClick="buscar('+value["COD_PER"]+');" ><i class="fa fa-list"></i></button>&nbsp;<button type="button"  onClick="eliminar('+value["COD_PER"]+');" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></td></tr>';

  
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
     
