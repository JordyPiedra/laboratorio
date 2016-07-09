//Crear un circuito
function save_categorias()
{           

            var parametros=getAllValues();
            var parametro2={"METODO" : "CREAR"};
            $.extend(true, parametros, parametro2);
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_categorias.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                            alert(response);
                            $('#NOM_CAT').val('');
                            $('#DESC_CAT').val('');

                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });

}
function actualizar(id){

            var parametros=getAllValues();
            var parametro2={"COD_CAT":id,
                            "METODO" : "EDITAR"};
            $.extend(true, parametros, parametro2);
              
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_categorias.php',
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
//Funcion obtiene valores del formulario Circuito
function getAllValues(){
    var NOM_CAT= $('#NOM_CAT').val();
    var DESC_CAT= $('#DESC_CAT').val();
    var parametros={
        "NOM_CAT":NOM_CAT,
        "DESC_CAT":DESC_CAT
    };
    return parametros;
}

     
//////////////////////////////////
    function cargar_categoria()
{          
            var parametros={"METODO" : "GETALL"};
            
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_categorias.php',
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
    
    $("#categoria_v").empty();          
     
    $.each( data, function( key, value) {
        
     var fila='<tr class="odd gradeX"><td>'+(key+1)+'</td><td>'+value["NOM_CAT"]+'</td><td>'+value["DESC_CAT"]+'</td><td align="center" class="center"><button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal" onClick="buscar('+value["COD_CAT"]+');" ><i class="fa fa-list"></i></button>&nbsp;<button type="button"  onClick="eliminar('+value["COD_CAT"]+');" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></td></tr>';


    
    $("#categoria_v").append(fila);
     });
  
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//buscar un circuito
function buscar(id){

var parametros={"METODO" : "BUSCAR",
               "COD_CAT" : id};
          
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_categorias.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                           var data = JSON.parse(response);
                          $('#COD_CAT').val(data["COD_CAT"]);
                            $('#NOM_CAT').val(data["NOM_CAT"]);
                            $('#DESC_CAT').val(data["DESC_CAT"]);
                            $("#btn_guardar").attr("onclick","actualizar("+data["COD_CAT"]+");");
                            

                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });


}
//Actualizar circuito


function alerta_eliminar(id)
{
     $("#btn_eliminar").attr("onclick","eliminar("+id+");");
                            
}
function eliminar(id){

            
            var parametros={"COD_CAT":id,
                            "METODO" : "ELIMINAR"};
           
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_categorias.php',
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
