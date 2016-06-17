<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Incio de sesión</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="frmlogin">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Cédula" min="1" max="9" name="CED" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="PAS" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recordarme
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="javascript:();"  onclick ="login();" class="btn btn-lg btn-success btn-block">Ingresar</a>
                                <input type="submit" style="display:none;">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	 <!-- /.Final -->
</div></div></div></body>
       <!-- /.scripts -->
       
        <script type="text/javascript">var URL='<?=  URL;?>';</script>
<script type="text/javascript" src="<?=URL?>public/js/globalajax.js"></script>

<script type="text/javascript" src="<?=URL?>public/js/valid.js"></script>

    <script>
    function login(){
       if( onclick_('#frmlogin'))
       {
           console.log($('#frmlogin').serialize());
           fajax($('#frmlogin').serialize(),URL+'Acceso/auth_login',function(response){
                 var data = JSON.parse(response);
                    toastr.info(data['MSG']);
                    if(data['STATE'])
                    {
                    setTimeout(function() {
                    window.location.href = URL+"Laboratorio/index"
                    }, 1800);
                    }
           });  
   
       }
    }
     
    $(document).ready(function() {
       // cargar_circuito();

    

    });


        
</script>
</body>

</html>