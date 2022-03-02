        <header-pushbar>
          <nav class="navbar-header" id="nav">

                <img data-pushbar-target="pushbar-menu-left" height="50px" id="lineas-b" src="{{ asset('img/menu-logo/lineas-n.png') }}" width="50px"/>

                <span>

                </span>

            </nav>


            <img data-pushbar-target="pushbar-menu-left" height="50px" id="lineas-n" src="{{ asset('img/menu-logo/lineas-n.png') }}" width="50px"/>


            <!-- ---------------------MENU LEFT----------------------- -->

            <div class="pushbar from_left pushbar-menu-left" data-pushbar-id="pushbar-menu-left">

                <span class="pushbar-span" data-pushbar-close="" name="" type="text">

                    X

                </span>

                <img alt="" class="pushbar-logo" src="{{ asset('img/logo/menu.png') }}" style="padding: 5px; padding-top: 20px; padding-left: 20px;" width="230px"/>

                <ul class="pushbar-menu-padre-left">

                    <!--

                    <li data-pushbar-target="pushbar-menu-left-10" id="metas">

                        <img height="40px" src="../images/menu-icono/bc.png"/>

                        <span class="pushbar-nombre-left">

                            Metas

                        </span>

                    </li>

                    -->

                    <li style="margin-top: 20px;">

                        <a href="../form/dashboard.php">

                            <img height="40px" src="{{ asset('img/menu-icono/homee.png') }}"/>

                        </a>

                        <a class="pushbar-nombre-left" href="{{ route('dashboard') }}" style="padding: 15px 130px 15px 27px;">

                            Inicio

                        </a>

                    </li>

                    <li  id="usuarios">

                        <img height="40px" src="{{ asset('img/menu-icono/clientess.png') }}"/>

                        <a class="pushbar-nombre-left" href="{{ route('consulta') }}" >

                            Usuarios

                        </a>

                    </li>

                    <li data-pushbar-target="pushbar-menu-left-0" id="produccion">

                        <img height="40px" src="{{ asset('img/menu-icono/produccionn.png') }}"/>

                        <span class="pushbar-nombre-left">

                            Producción

                        </span>

                    </li>

                    <li data-pushbar-target="pushbar-menu-left-1" id="mantenimiento">

                        <img height="40px" src="{{ asset('img/menu-icono/logistica.png') }}"/>

                        <span class="pushbar-nombre-left">

                            Mantenimiento

                        </span>

                    </li>


                    <li>

                        <a href="#">

                            <img height="40px" src="{{ asset('img/menu-icono/salirr.png') }}"/>

                        </a>

                        <a class="pushbar-nombre-left" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="padding: 15px 130px 15px 27px;">

                            Logout

                        </a>

                    </li>

                </ul>

            </div>


            <!-----------------------MENU PRODUCCION-------------------------->

            <div class="pushbar from_left pushbar-menu-left" data-pushbar-id="pushbar-menu-left-0">

                <span class="pushbar-span" data-pushbar-close="" name="" type="text">

                    X

                </span>

                <img alt="" class="pushbar-logo" src="{{ asset('img/logo/menu.png') }}" style="padding: 5px; padding-top: 40px; padding-left: 20px;" width="230px"/>

                <ul class="pushbar-menu-padre-left">

                    <a class="menos" href="#" id="">

                        <li data-pushbar-target="pushbar-menu-left-01" id="catalogos">

                            <img alt="" height="40px" src="#"/>

                            Mis Catalogos

                        </li>

                    </a>


                    <li data-pushbar-target="pushbar-menu-left">

                        <img height="30px" src="{{ asset('img/menu-icono/regresarr.png') }}" style="float: right; padding-right: 15px; padding-top: 5px;" width="40px"/>

                    </li>

                </ul>

            </div>

            <div class="pushbar from_left pushbar-menu-left" data-pushbar-id="pushbar-menu-left-01">

                <span class="pushbar-span" data-pushbar-close="" name="" type="text">

                    X

                </span>

                <img alt="" class="pushbar-logo" src="{{ asset('img/logo/menu.png') }}" style="padding: 5px; padding-top: 40px; padding-left: 20px;" width="230px"/>

                <ul class="pushbar-menu-padre-left">

                    <a class="menos" href="{{ route('consultaPefil') }}" id="perfiles">

                        <li>

                            <img alt="" height="40px" src="#"/>

                            Perfiles

                        </li>

                    </a>

                    <a class="menos" href="#" id="">

                        <li>

                            <img alt="" height="40px" src="#"/>

                            Estatus

                        </li>

                    </a>



                    <li data-pushbar-target="pushbar-menu-left">

                        <img height="30px" src="{{ asset('img/menu-icono/regresarr.png') }}" style="float: right; padding-right: 15px; padding-top: 5px;" width="40px"/>

                    </li>

                </ul>

            </div>

        </header-pushbar>

