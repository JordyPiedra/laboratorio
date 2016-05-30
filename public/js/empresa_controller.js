

     //Crear paciente
function save_empresa()
{ 

            var parametros=getAllValues();
            var parametro2={"METODO" : "CREAR"};
            $.extend(true, parametros, parametro2);
             
            $.ajax({
                    data: parametros ,
                    url:   '../clases/cls_empresa.php',
                    type:  'POST',
                   // dataType:  'JSON',
                    success:  function (response) {
                    	
                            alert(response);
                            $('#NOM_EMP').val('');
                            $('#RAZ_EMP').val('');
                            $('#RUC_EMP').val('');
                            $('#DIR_EMP').val('');
    
                            
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                            alert(thrownError);
                    }
            });

}
// obtener datos paciente en tabla jaz
function getAllValues(){
    var NOM_EMP= $('#NOM_EMP').val();
    var RAZ_EMP= $('#RAZ_EMP').val();
    var RUC_EMP= $('#RUC_EMP').val();
    var DIR_EMP= $('#DIR_EMP').val();
    
    var parametros={
        "NOM_EMP":NOM_EMP,
        "RAZ_EMP":RAZ_EMP,
        "RUC_EMP":RUC_EMP,
        "DIR_EMP":DIR_EMP,
    
    };
    return parametros;
}
     