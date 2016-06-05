$(document).ready(function(){
  $('input').attr('disabled',true);  
 
      $('input[name=CAT]').attr('disabled',false); 

});

    $("#CED_PER").click(function(){

cargar_categorias();

    });
function save_producto()
{ 

   fajax($('#frmproducto').serialize(),URL+'Producto/insert',save_producto_response);  

}
function save_producto_response(response){
          var data = JSON.parse(response);
        toastr.info(data['MSG']);   
}

function exameneslist(){
         $("#EXA").empty();
        console.log($('#TIP').val());
          var data = JSON.parse(EXAM);
   $.each(data , function( key, value) {
        
        if(value[6]==$('#TIP').val())
    $("#EXA").append('<option value="'+value[0]+'">'+value[2]+'</option>');
     });
  
}