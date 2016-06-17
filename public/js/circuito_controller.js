  
    function optoast(){
       
    }
        
 
  function cargar_circuito()
{          
          fajax({},URL+'Circuito/getAll',cargar_circuito_response);  
}
function cargar_circuito_response(response){
        console.log(response);
              update_table(response);
                         
}

//Crear un circuito
  function save_circuito()
{          
        //console.log($('#formCircuito').serialize());
         if( onclick_('#formCircuito'))
          fajax($('#formCircuito').serialize(),URL+'Circuito/insert',save_circuito_response);  
}
function save_circuito_response(response){
        console.log(response);
        var data = JSON.parse(response);
optoast();
        toastr.info(data['MSG']);
   $('#NOM_CIR').val('');
  $('#DIR_CIR').val('');   
}

//Funcion obtiene valores del formulario Circuito
function getAllValues(){
    var NOM_CIR= $('#NOM_CIR').val();
    var DIR_CIR= $('#DIR_CIR').val();
    var parametros={
        "NOM_CIR":NOM_CIR,
        "DIR_CIR":DIR_CIR
    };
    return parametros;
}


     
//////////////////////////////////
  
    function update_table(datos){

    var data = JSON.parse(datos);
    
    $("#circuito_v").empty();          
     
    $.each( data, function( key, value) {
        
     var fila='<tr class="odd gradeX"><td>'+(key+1)+'</td><td>'+value[1]+'</td><td>'+value[2]+'</td><td align="center" class="center"><button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal" onClick="buscar('+value[0]+",'"+value[1]+"','"+value[2]+"'"+'"><i class="fa fa-list"></i></button>&nbsp;<button type="button"  onClick="eliminar('+value[0]+",'"+value[1]+"'"+'); " class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></td></tr>';


    
    $("#circuito_v").append(fila);
     });
  
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//buscar un circuito
function buscar(id,nom,det){
        $('#NOM_CIR').val(nom);
        $('#DIR_CIR').val(det);
        $('#btn_guardar').attr('onclick','update_circuito('+id+');');
        
}

function update_circuito(id){
        fajax($('#formCircuito').serialize()+'&id='+id,URL+'Circuito/insert',update_circuito_response);
}
//Actualizar circuito
function update_circuito_response(response){
          console.log(response);
        var data = JSON.parse(response);
        toastr.info(data['MSG']);
        cargar_circuito();
}




function alerta_eliminar(id)
{
     

     $("#btn_eliminar").attr("onclick","eliminar("+id+");");

                            
}
function eliminar(id,nomb){
            
toastr["warning"]('<div><h5>Seguro desesa eliminar el circuito '+nomb+'</h5></div><div><button type="button" id="okBtn" class="btn btn-primary">Cancelar</button><button type="button" id="surpriseBtn" onclick="eliminar_circuito('+id+');" class="btn" style="margin: 0 8px 0 8px">Eliminar</button></div>');
}

function eliminar_circuito(id){
        fajax({'IDCIR' : id},URL+'Circuito/delete', eliminar_circuito_response);
}

function eliminar_circuito_response(response){
         var data = JSON.parse(response);
         cargar_circuito();
         toastr.info(data['MSG']);
         toastr["error"](data['MSG']);
}