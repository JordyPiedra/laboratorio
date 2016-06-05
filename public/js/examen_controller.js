$(document).ready(function(){
  //$('input').attr('disabled',true);  
 
      $('input[name=CAT]').attr('disabled',false); 

});

    $("#CED_PER").click(function(){

cargar_categorias();

    });
function save_producto()
{ 
   fajax($('#frmproducto').serialize()+'&CAT=E&DESC=EXAMEN&CANT=0',URL+'Producto/insert',save_producto_response);  
}
function save_producto_response(response){
          var data = JSON.parse(response);
        toastr.info(data['MSG']);   
}
