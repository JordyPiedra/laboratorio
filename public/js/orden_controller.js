function add_examen(){
    console.log($('#frmordenexamen').serializeArray());
    $('#detalle_orden').empty();
    var detalle= $('#frmordenexamen input').serializeArray();
       $.each(detalle , function( key, value) {
           switch (value['name'].substring(0, 1)) {
                  case 'H':
                   TIPO='HERMATOLÓGICO';
                   break;
                   case 'U':
                   TIPO='UROANÁLISIS';
                   break;
                   case 'C':
                   TIPO='COPROLÓGICO';
                   break;
                   case 'Q':
                   TIPO='QUÍMICO SANGUÍNEO';
                   break;
                   case 'S':
                   TIPO='SEROLOGÍA';
                   break;
                   case 'B':
                   TIPO='BACTEROLOGÍA';
                   break;
                   case 'O':
                   TIPO='OTROS';
                   break;
           
               default:
                   break;
           }
           ide='#'+value['name'];
           console.log(ide);
           EXA=$(ide).attr('tbs');
           console.log(EXA);
         $('#detalle_orden').append('<tr><td>'+(key+1)+'</td><td>'+TIPO+'</td><td>'+EXA+'</td></tr>');
     });
  

}
  
function cancelar_orden(){
$('#frmpaciente input').val('');
  $('#detalle_orden').empty();  
  $('#OBS').val('');
  $('#frmordenexamen input').attr('checked',false);

}


function insert_orden(){
 fajax($('#frmpaciente').serialize()+'&'+$('#frmordenexamen input').serialize()+'&OBS='+$('#OBS').val(),URL+'Orden/insert',insert_orden_response);
}
function insert_orden_response(response){
        var data = JSON.parse(response);
        $('#ORDEN').val(data['COD']);
         toastr.info(data['MSG']);
        }

function orden(id){
$('#ORD').val(id);
$('#rr input').trigger('click');
}
