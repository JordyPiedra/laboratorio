$(document).ready(function(){
  $('#frmproducto input').attr('disabled',true);  
 
      $('input[name=COD]').attr('disabled',false); 

});

    $("#CED_PER").click(function(){

cargar_categorias();

    });
function save_producto()
{ 
     if( onclick_('#frmproducto'))
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

$( "#COD" ).focusout(function() {
     if($( "#COD" ).val().length>0)
     {
         get_producto();
        $('#COD').addClass("has-error");
      $('#COD').removeClass("has-success");
        
     }
  
});


function get_producto(){
    fajax($('#frmproducto').serialize(),URL+'Producto/get_producto',get_producto_response);  
     
}

function get_producto_response(response){
        console.log(response);
        var data = JSON.parse(response);
        if(data.length>0)
        {
        $('#COD').attr("byID",data[0][0]);        
        $('#NOM').val(data[0][2]);
        $('#DESC').val(data[0][4]);
         $('#TIP').val(data[0][6]);
           $('#CANT').val(data[0][3]);
           if(data[0][5]=='R')
           {
                   $('#CATR').trigger('click');
                   $('#CATI').attr('checked',false);
                   $('#CATR').attr('checked',true);
           }
           else
           {
                    $('#CATI').attr('checked',true);
                    $('#CATR').attr('checked',false);
                   $('#CATI').trigger('click');
           }
           if($('#kar').html()=="1")
              kardex(1); 
        }else{
            var  cod =$('#COD').val();   
            $('#frmproducto input:text').val('');
            $('#COD').val(cod);    
            if($('#kar').html()=="1")
            {
               kardex(0);     
            }else
            $('#frmproducto input').attr('disabled',false);  
        }  
}