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

function respond_orden(){
   var ARRA = {'E': $('#detalle_orden input').serializeArray(),
                'R': $('#EXAM input').serializeArray()}
 fajax(ARRA,URL+'Orden/response',function(response){
  var data = JSON.parse(response);
     console.log(response);
         toastr.info(data['MSG']);

 });
}
$("#addinsumo").on('input', function () {
    var val = this.value;
    if($('#insumos').find('option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        //send ajax request
        var examen= this.value;
    cod=examen.substring(examen.indexOf(":")+1, examen.length);
    nom=examen.substring(0,examen.indexOf(":")-1);
    //$(this).val('');
    if(cod != '' && nom != '')
    {
        if($('#fl'+cod).size()==0)
        {
                var fila ="<tr id=fl"+cod+"><td>"+nom+'</td><td><input name ="ins'+cod+'" type="number"></td>';
                fila+='<td><button type="button"  class="btn btn-warning btn-circle" onClick="'+"$('#fl"+cod+"').remove(); "+'" ><i class="fa fa-times"></i></button></td></tr>';
                $("#detalle_insumo").append(fila);
        }
    }
    }
});
$("#addinsumo").bind('focusout',function(e){
    console.log(this);
    
    var examen= $('#insumos').val();
     $(this).val(examen);
    console.log(examen);
    cod=examen.substring(examen.indexOf(":")+1, examen.length);
    nom=examen.substring(0,examen.indexOf(":")-1);
    //$(this).val('');
    if(cod != '' && nom != '')
    {
        if($('#fl'+cod).size()==0)
        {
                var fila ="<tr id=fl"+cod+"><td>"+nom+'</td><td><input name ="ins'+cod+'" type="number"></td>';
                fila+='<td><button type="button"  class="btn btn-warning btn-circle" onClick="'+"$('#fl"+cod+"').remove(); "+'" ><i class="fa fa-times"></i></button></td></tr>';
                $("#detalle_insumo").append(fila);
        }
    }
    
     //if(e.keyCode==13){}

});


    //detalle_insumo
    //EXAM
    //detalle_orden
