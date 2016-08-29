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
   

   function cedulax(numero)
      {
		  

        var cedula = numero;
        array = cedula.split( "" );
        num = array.length;

        if(num ==13){


        if ( num == 13 )
        {
        total = 0;
        digito = (array[9]*1);

        num=10;
        for( i=0; i < (num-1); i++ )
        {
        mult = 0;
        if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
        }
        else
        {
        mult = array[i] * 2;
        if ( mult > 9 )
        total = total + ( mult - 9 );
        else
        total = total + mult;
        }
        }
        decena = total / 10;
        decena = Math.floor( decena );
        decena = ( decena + 1 ) * 10;
        final = ( decena - total );
        if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
        toastr.info( "El Ruc ES v\xe1lido!!!" );
        return true;
        }
        else
        {
        toastr.info( "El Ruc NO es v\xe1lido!!!" );

        return false;
        }
        }
        else
        {
        toastr.info("La c\xe9dula no puede tener menos de 10 d\xedgitos");
        return false;
        }


        }
        if(num ==10){
        if ( num == 10 )
        {
        total = 0;
        digito = (array[9]*1);
        for( i=0; i < (num-1); i++ )
        {
        mult = 0;
        if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
        }
        else
        {
        mult = array[i] * 2;
        if ( mult > 9 )
        total = total + ( mult - 9 );
        else
        total = total + mult;
        }
        }
        decena = total / 10;
        decena = Math.floor( decena );
        decena = ( decena + 1 ) * 10;
        final = ( decena - total );
        if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
        //toastr.info( "CEDULA CORRECTA" );
        return true;
        }
        else
        {
        toastr.info( "CEDULA INCORRECTA" );
        //document.getElementById('cedula').value="";
        return false;
        }
        }
        else
        {
        toastr.info("La c\xe9dula no puede tener menos de 10 d\xedgitos");
        return false;
        }

        }
	  }