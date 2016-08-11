$(document).ready(function(){
  //$('input').attr('disabled',true);  
 
     // $('input[name=CAT]').attr('disabled',false); 
$("#frmkardex input").attr('disabled',true);  
});


    $("#NOM").change(function(){

if(this.val() != "")
$("#frmkardex input").attr('disabled',false);  

    });
function kardex(x){
    if(x==1)
     {
         $('#frmkardex input').attr('disabled',false);
         detalle_movimiento()
     }
     else
     {
         $('#frmkardex input').attr('disabled',true);
     }
      
     
   
}

function detalle_movimiento(){
   fajax("IDPRO="+$('#COD').attr('byid'),URL+'Inventario/historial',detalle_movimiento_response);  
  
}
function detalle_movimiento_response(response) 
{
console.log(response);
 var data = JSON.parse(response);
 $("#kardex_hist").empty();
  var fila=""
 $.each( data, function( key, value) {
        if(value[1]=="I")
        movimiento ="INGRESO";
        else
        movimiento ="EGRESO";
     fila +='<tr class="odd gradeX"><td>'+(key+1)+'</td>';
     fila+='<td>'+movimiento+'</td><td>'+value[2]+'</td>';
     fila+='<td>'+value[6]+'</td><td>'+value[5]+'</td>';
     fila+='<td>'+value[4]+'</td>';

    $("#kardex_hist").append(fila);
    fila ="";
     });
}

function verificarform(){
if(onclick_('#frmkardex'))
{
    $('#btn_guardar_').trigger('click');
}
}

function savekardex(){
    if($('#CATI').prop('checked'))
    var RR="I";
     if($('#CATR').prop('checked'))
      var RR="R";
     fajax($('#frmkardex').serialize()+"&IDPRO="+$('#COD').attr("byID")+"&CAT="+RR+"&"+$('#frmproducto').serialize(),URL+'Inventario/insert',savekardex_response);  
}

function savekardex_response(response){
          var data = JSON.parse(response);
        toastr.info(data['MSG']);   
        if(data['STATE'])
        {
        $('#COD').blur();
        }
}

