$(document).ready(function(){
 
cargar_categorias();


});

    $("#CED_PER").click(function(){

cargar_categorias();

    });
function save_producto()
{ 

            var parametros=getAllValues();
            var parametro2={"METODO" : "CREAR"};
            $.extend(true, parametros, parametro2);
             
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_producto.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                    	
                            alert(response);
                            $('#NOM_PROD').val('');
                            $('#CANT_PROD').val('');
                            $('#DESC_PROD').val('');
                            $('#COD_CAT').val('');
                            

                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });

}

// obtener datos paciente en tabla jaz
function getAllValues(){
    var NOM_PROD= $('#NOM_PROD').val();
    var CANT_PROD= $('#CANT_PROD').val();
    var DESC_PROD= $('#DESC_PROD').val();
    var COD_CAT= $('#COD_CAT').val();
    
    var parametros={
        "NOM_PROD":NOM_PROD,
        "CANT_PROD":CANT_PROD,
        "DESC_PROD":DESC_PROD,
        "COD_CAT":COD_CAT
        
    };
    return parametros;
}

     function buscar(id){

var parametros={"METODO" : "BUSCAR",
               "COD_PROD" : id};
          
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_producto.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                           var data = JSON.parse(response);
                          

                            $('#NOM_PROD').val(data["NOM_PROD"]);
                            $('#APE_USU').val(data["APE_USU"]);
                            $('#CANT_PROD').val(data["CANT_PROD"]);
                            $('#DESC_PROD').val(data["DESC_PROD"]);
                            $('#COD_CAT').val(data["COD_CAT"]);
                            
                            $("#btn_guardar").attr("onclick","actualizar("+data["COD_PROD"]+");");
                            

                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });


}

//Actualizar circuito
function actualizar(id){

            var parametros=getAllValues();
            var parametro2={"COD_PROD":id,
                            "METODO" : "EDITAR"};
            $.extend(true, parametros, parametro2);
              
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_producto.php',
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

            
            var parametros={"COD_PROD":id,
                            "METODO" : "ELIMINAR"};
           
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_producto.php',
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

function cargar_producto()
{          
            var parametros={"METODO" : "GETALL"};
            
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_producto.php',
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

function cargar_categorias()
{          
            var parametros={"METODO" : "GETALL"};
            
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_categorias.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                        categorias(response);
                          
                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });

}
function update_table(datos){

    var data = JSON.parse(datos);
    
    $("#producto_v").empty();          
     
    $.each( data, function( key, value) {
        
     var fila='<tr class="odd gradeX"><td>'+(key+1)+'</td><td>'+value["NOM_PROD"]+'</td><td>'+value["CANT_PROD"]+'</td><td>'+value["NOM_CAT"]+'</td><td align="center" class="center"><button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal" onClick="buscar('+value["COD_PROD"]+');" ><i class="fa fa-list"></i></button>&nbsp;<button type="button"  onClick="eliminar('+value["COD_PROD"]+');" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></td></tr>';

  
    $("#producto_v").append(fila);
     });
  
    }
function categorias(datos){

    var data = JSON.parse(datos);
    
    $("#COD_CAT").empty();          
     var fila='<option selected="true" disabled="disabled" > Seleccione Categoria</option>';
    
    $("#COD_CAT").append(fila);

    $.each( data, function( key, value) {
        
     var fila='<option value="'+value["COD_CAT"]+'">'+value["NOM_CAT"]+'</option>';
    
    $("#COD_CAT").append(fila);
     });

                   
}