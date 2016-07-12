function soloNumeros(e){

		var key = window.Event ? e.which : e.keyCode

		return (key >= 48 && key <= 57 || key >=0 && key <=32)

		}


		// Solo permite ingresar letras
		function soloLetras(e){

		var key = window.Event ? e.which : e.keyCode

		return (key >= 65 && key <= 255 || key >=0 && key <=32)

		}


	   function onclick_ (form_id){
     $(form_id).submit(function(event){
        event.preventDefault();
      });
      //controllerAS.tab[0] = '';
      var form =$(form_id);
        console.log(form);
      if (!form[0].checkValidity()) {
         console.log(form[0].checkValidity());
        form.find(':submit').click();
        return false;
      }else return true;
}
   