
function save_usuario()
{ 
   if( onclick_('#frmuser'))
   {
           fajax($('#frmuser').serialize(),URL+'User/insert',function(response){
           console.log(response);
                var data = JSON.parse(response);
        toastr.info(data['MSG']);   
   });
   }
     
}


// obtener datos paciente en tabla jaz
function getAllValues(){
    var NOM_USU= $('#NOM_USU').val();
    var APE_USU= $('#APE_USU').val();
    var NICK_USU= $('#NICK_USU').val();
    var PASS_USU= $('#PASS_USU').val();
    var ESTA_USU= $('#ESTA_USU').val();
    
    var parametros={
        "NOM_USU":NOM_USU,
        "APE_USU":APE_USU,
        "NICK_USU":NICK_USU,
        "PASS_USU":PASS_USU,
        "ESTA_USU":ESTA_USU
        
    };
    return parametros;
}
     function buscar(id){

var parametros={"METODO" : "BUSCAR",
               "COD_USU" : id};
          
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_usuario.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                           var data = JSON.parse(response);
                          

                            $('#NOM_USU').val(data["NOM_USU"]);
                            $('#APE_USU').val(data["APE_USU"]);
                            $('#NICK_USU').val(data["NICK_USU"]);
                            $('#PASS_USU').val(data["PASS_USU"]);
                            $('#ESTA_USU').val(data["ESTA_USU"]);
                            
                            $("#btn_guardar").attr("onclick","actualizar("+data["COD_USU"]+");");
                            

                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });


}
//Actualizar circuito
function actualizar(id){

            var parametros=getAllValues();
            var parametro2={"COD_USU":id,
                            "METODO" : "EDITAR"};
            $.extend(true, parametros, parametro2);
              
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_usuario.php',
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

            
            var parametros={"COD_USU":id,
                            "METODO" : "ELIMINAR"};
           
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_usuario.php',
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
function cargar_usuario()
{          
            var parametros={"METODO" : "GETALL"};
            
            
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_usuario.php',
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
    
    $("#usuarios_v").empty();          
     
    $.each( data, function( key, value) {
        
     var fila='<tr class="odd gradeX"><td>'+(key+1)+'</td><td>'+value["NOM_USU"]+'</td><td>'+value["APE_USU"]+'</td><td>'+value["NICK_USU"]+'</td><td>'+value["ESTA_USU"]+'</td><td align="center" class="center"><button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal" onClick="buscar('+value["COD_USU"]+');" ><i class="fa fa-list"></i></button>&nbsp;<button type="button"  onClick="eliminar('+value["COD_USU"]+');" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></td></tr>';

  
    $("#usuarios_v").append(fila);
     });
  
    }