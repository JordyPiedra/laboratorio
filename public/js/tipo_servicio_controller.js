function save_tipo_servicio()
{           
            var parametros=getAllValues();
            var parametro2={"METODO" : "CREAR"};
            $.extend(true, parametros, parametro2);
              
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_tipo_servicio.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                            alert(response);
                            $('#NOM_TIP').val('');
                            $('#DESC_TIP').val('');

                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });

}
//Funcion obtiene valores del formulario Circuito
function getAllValues(){
    var NOM_TIP= $('#NOM_TIP').val();
    var DESC_TIP= $('#DESC_TIP').val();
    var parametros={
        "NOM_TIP":NOM_TIP,
        "DESC_TIP":DESC_TIP
    };
    return parametros;
}