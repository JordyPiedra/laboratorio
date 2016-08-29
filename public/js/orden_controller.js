function add_examen(){
    console.log($('#frmordenexamen').serializeArray());
    $('#detalle_orden').empty();
    var detalle= $('#frmordenexamen input').serializeArray();
       $.each(detalle , function( key, value) {
           switch (value['name'].substring(0, 1)) {
                  case 'H':
                   TIPO='HEMATOLÓGICO';
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
         location.reload();
        }

function orden(id,aux){
    if(aux==1){
$('#ORD1').val(id);
$('#rr1 input').trigger('click');
    }else{
$('#ORD').val(id);
$('#rr input').trigger('click');
    }

}

function respond_orden(){
  if( onclick_('#frminsumos_'))
  {
   var ARRA = {'E': $('#detalle_orden input').serializeArray(),
            'I': $('#frminsumos_ input').serializeArray(),
                'R': $('#EXAM input').serializeArray(),
                'CC': Xxcd}
 fajax(ARRA,URL+'Orden/response',function(response){
  var data = JSON.parse(response);
     console.log(response);
         toastr.info(data['MSG']);
         if(data['STATE']){
             window.close();
         }

 });
  }

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
                var fila ="<tr id=fl"+cod+"><td>"+nom+'</td><td><input name ="ins'+cod+'" type="number" required></td>';
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
                var fila ="<tr id=fl"+cod+"><td>"+nom+'</td><td><input name ="ins'+cod+'" type="number" required></td>';
                fila+='<td><button type="button"  class="btn btn-warning btn-circle" onClick="'+"$('#fl"+cod+"').remove(); "+'" ><i class="fa fa-times"></i></button></td></tr>';
                $("#detalle_insumo").append(fila);
        }
    }
    
     //if(e.keyCode==13){}

});

function EXAMresponse(){
     $.each(REQUEST , function( key, value) {
var inputR= '#'+key;
    $(inputR).val(value);     
    
     });
   
}

function MaxMateriales(e,max){
console.log(e);
var idname=$(e).attr('name');
var IDN=idname.substring(1, idname.length);
in1='#BLAN';
in2='#STAN';
in3='#MUES';
in4='#NORM';
var n1= parseInt($(in1+IDN).val());
var n2= parseInt($(in2+IDN).val());
var n3= parseInt($(in3+IDN).val());
var n4= parseInt($(in4+IDN).val());
var sum = n1+n2+n3+n4;
console.log(sum);
if(sum>max)
{
 var dif =sum-parseInt(max);
    $(e).val(parseInt($(e).val())-dif);
   toastr.info('Materiales insuficientes'); 
}

}
function buscar_orden_byCED(){
    if(cedulax($( "#CED__" ).val())==true){
       $( "#CEDCLI" ).val($( "#CED__" ).val());
        
        $( "#frmbusced" ).trigger('submit');
    }
}

    //detalle_insumo
    //EXAM
    //detalle_orden
