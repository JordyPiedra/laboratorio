
function save_usuario()
{ 
   if( onclick_('#frmuser'))
   {
          if(cedulax($( "#CED" ).val())==true)
          {

             
           fajax($('#frmuser').serialize(),URL+'User/insert',function(response){
           console.log(response);
                var data = JSON.parse(response);
        toastr.info(data['MSG']);   
        
   });
    } else {
       $('input').val('');
    }
   }
     
}

 $( "#CED" ).focusout(function() {
if(cedulax($( "#CED" ).val())==true)
   cargar_usuaruio();
         });

function cargar_usuaruio()
{          
          fajax({'CEDUSU':$( "#CED" ).val()},URL+'User/buscar',function(response){
var data = JSON.parse(response);
$( "#NOM1" ).val(data[0][2]);
$( "#NOM2" ).val(data[0][3]);
$( "#APE1" ).val(data[0][4]);
$( "#APE2" ).val(data[0][5]);
$( "#TIP" ).val(data[0][6]);
if(data[0][7]=='H')
$( "#ESTA" ).val(1);
else
$( "#ESTA" ).val(0);

          });  
}        