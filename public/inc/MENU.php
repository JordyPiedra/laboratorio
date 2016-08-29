

<body>

    <div id="wrapper">

        <!-- Navigation -->
       
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=URL?>Laboratorio/index">Sistema de Inventario</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=URL?>Acceso/logouth"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <?php
                        
                        if(Session::getValue('TIP_USU')=='A')
                        {
                            echo '
                            <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Circuito<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="'.URL.'Circuito/ingreso">Crear</a>
                                </li>
                                 <li>
                                    <a href="'.URL.'Circuito/lista">Visualizar</a>
                                </li>
                                
                            </ul>
                            </li>
                            ';
                        }
                        if(Session::getValue('TIP_USU')=='A' || Session::getValue('TIP_USU')=='E' || Session::getValue('TIP_USU')=='M')
                        {
                            echo '
                            <li>
                            <a href="#"><i class="fa  fa-wheelchair fa-fw"></i> Pacientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                     <a href="'.URL.'Paciente/ingreso">Registrar</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                            </li>
                            ';
                        }
                        if(Session::getValue('TIP_USU')=='A' || Session::getValue('TIP_USU')=='L' )
                        {
                            echo '
                            
                          <li>
                            <a href="#"><i class="fa fa-shopping-cart  fa-fw"></i>Productos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="'.URL.'Producto/ingreso_E">Registrar Exámen <span class=""></span></a>
                                </li>
                                <li>
                                    <a href="'.URL.'Producto/ingreso">Registrar Producto <span class=""></span></a>
                                </li>
                                <li>
                                    <a href="'.URL.'Producto/visualizar">Lista<span class=""></span></a>
                                </li>
                            </ul>
                         <li>
                            <a href="#"><i class="fa fa-hospital-o  fa-fw"></i>Inventario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="'.URL.'Inventario/ingreso">Ingreso/Egreso <span class=""></span></a>
                                </li>
                            </ul>

                        </li>
                            ';
                        }
                        
                         if(Session::getValue('TIP_USU')=='A' || Session::getValue('TIP_USU')=='M' )
                        {
                            echo '
                            
                            <li>
                            <a href="#"><i class="fa fa-pencil-square-o  fa-fw "></i>Orden<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="'.URL.'Orden/ingreso">Ingreso</a>
                                </li>
                                 <li>
                                    <a href="'.URL.'Orden/lista">Lista</a>
                                </li>
                              
                            </ul>
                            </li>
                            ';
                        }
                        
                        if(Session::getValue('TIP_USU')=='A' || Session::getValue('TIP_USU')=='L' )
                        {
                            echo '
                            
                            <li>
                            <a href="#"><i class="fa fa-inbox  fa-fw "></i>Solicitudes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="'.URL.'Orden/revision">Pendientes</a>
                                </li>
                              
                            </ul>
                        </li>
                            ';
                        }
                          if(Session::getValue('TIP_USU')=='A')
                        {
                            echo '
                            
                             <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Usuario
                            <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                      <a href="'.URL.'User/ingreso">Ingreso</a>
                                </li>
                            </ul>
                        </li>
                      
                            ';
                        }
                        if(Session::getValue('TIP_USU')=='A' || Session::getValue('TIP_USU')=='L' )
                        {
                            echo '
                              <li>
                            <a href="'.URL.'Reportes/index"><i class="fa fa-files-o fa-fw"></i> Reportes<span class="fa arrow"></span></a>
                           
                            <!-- /.nav-second-level -->
                        </li>
                            ';
                        }

                        ?>
                        
                      
                        
                        
                        
                      
                       
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                 <!-- body -->
              
        