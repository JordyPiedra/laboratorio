function soloNumeros(e){

		var key = window.Event ? e.which : e.keyCode

		return (key >= 48 && key <= 57 || key >=0 && key <=32)

		}


		// Solo permite ingresar letras
		function soloLetras(e){

		var key = window.Event ? e.which : e.keyCode

		return (key >= 65 && key <= 255 || key >=0 && key <=32)

		}


	