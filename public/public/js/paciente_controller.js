$(document).ready(function() {
      
      if(Xx==1)
{
  $('#CED').focusout(); 
  $('#frmpaciente input').attr('disabled',true);
  $('#frmpaciente select').attr('disabled',true);    
}else
{
    $('#frmpaciente input').attr('disabled',true);  
      $('#CED').attr('disabled',false);   
    
      $('#FECHAO').attr('disabled',false);
}
    });
    
    
function save_paciente()
{ 
if(onclick_('#frmpaciente'))        
 fajax($('#frmpaciente').serialize(),URL+'Paciente/insert',save_paciente_response);  
}

function save_paciente_response(response){
           var data = JSON.parse(response);
        toastr.info(data['MSG']);
}

 $( "#CED" ).focusout(function() {
     
     if($( "#CED" ).val().length==10)
   cargar_paciente();
   else{
        $('input').attr('disabled',true);  
       $('#CED').attr('disabled',false);   
       var ced=$('#CED').val();
       $('input').val('');
       $('#CED').val(ced);
        $('#infoCED').addClass("has-error");
      $('#infoCED').removeClass("has-success");
   }
});

function cargar_paciente()
{          
          fajax($('#frmpaciente').serialize(),URL+'Paciente/getPaciente',cargar_paciente_response);  
}
function cargar_paciente_response(response){
        var data = JSON.parse(response);
        console.log(data);
        if(data.length>=1)
        {
                 $('#CED').val(data[0][0]);
      $('#HIST').val(data[0][1]);
      $('#NOM1').val(data[0][2]);
      $('#NOM2').val(data[0][3]);
      $('#APE1').val(data[0][4]);
      $('#APE2').val(data[0][5]);
      $('#NAC').val(data[0][6]);

    
      $('#EDAD').val(restaFechas(data[0][6]));
      $('#DIR').val(data[0][7]);
      $('#CEL').val(data[0][8]);
      $('#TEL').val(data[0][9]);
      if(data[0][10]=='H')
      $('#SEXH').prop("checked",true) ;
      else
      $('#SEXM').prop("checked",true) ;
      
      if(data[0][11]=='S')
      $('#DISCS').prop("checked",true) ;
      else
      $('#DISCSN').prop("checked",true) ;
      
      $('#CIR').val(data[0][12]);
      toastr.info('Paciente cédula '+data[0][0]+' Existente!.');
     
      $('#infoCED').removeClass("has-error");
      $('#infoCED').addClass("has-success");
}else
{
    toastr.info('Paciente no existente');
     var ced=$('#CED').val();
       $('input').val('');
       $('#CED').val(ced);
     
         toastr.info('Ingreso de paciente nuevo.');
}
       if($('#frmpaciente').attr('visual')!='si') 
       $('#frmpaciente input').attr('disabled',false);   
}

restaFechas = function(f2)
 {

 var birthday = new Date(f2);
var today = new Date();
var years = today.getFullYear() - birthday.getFullYear();

// Reset birthday to the current year.
birthday.setFullYear(today.getFullYear());

// If the user's birthday has not occurred yet this year, subtract 1.
if (today < birthday)
{
    years--;
}
return years;
 }