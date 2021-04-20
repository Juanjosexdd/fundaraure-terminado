<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('home')}}" onclick="event.preventDefault(); document.getElementById('home-form').submit();"><i class="fa fa-list"></i> Dashbord</a>
                <form id="home-form" action="{{url('home')}}" method="GET" style="display: none;">
                {{csrf_field()}}
                </form>
            </li>
            <li class="nav-title">
                Menú
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle " href="#">
                    <i class="fa fa-list"></i>
                    Facturación
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('cliente')}}" onclick="event.preventDefault(); document.getElementById('cliente-form').submit();"><i class="fa fa-users text-dark"></i> Clientes</a>
                        <form id="cliente-form" action="{{url('cliente')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('fpago')}}" onclick="event.preventDefault(); document.getElementById('fpago-form').submit();"><i class="fa fa-users"></i> Formapago</a>
                        <form id="fpago-form" action="{{url('fpago')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('venta')}}" onclick="event.preventDefault(); document.getElementById('venta-form').submit();"><i class="fa fa-suitcase"></i> Facturar</a>
                        <form id="venta-form" action="{{url('venta')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('producto')}}" onclick="event.preventDefault(); document.getElementById('producto-form').submit();"><i class="fa fa-list"></i> Servicios</a>
                        <form id="producto-form" action="{{url('producto')}}" method="GET" style="display: none;">
                        {{csrf_field()}}
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('tcliente')}}" onclick="event.preventDefault(); document.getElementById('tcliente-form').submit();"><i class="fa fa-list"></i> Tipo cliente</a>
                        <form id="tcliente-form" action="{{url('tcliente')}}" method="GET" style="display: none;">
                        {{csrf_field()}}
                        </form>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">

                <a class="nav-link  nav-dropdown-toggle " href="#">
                    <i class="fa fa-sitemap"></i>
                    Organización
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('cargo')}}" onclick="event.preventDefault(); document.getElementById('cargo-form').submit();"><i class="fa fa-users text-dark"></i> Cargo</a>
                        <form id="cargo-form" action="{{url('cargo')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('dpto')}}" onclick="event.preventDefault(); document.getElementById('dpto-form').submit();"><i class="fa fa-suitcase"></i> Departamentos</a>
                        <form id="dpto-form" action="{{url('dpto')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('categoria')}}" onclick="event.preventDefault(); document.getElementById('categoria-form').submit();"><i class="fa fa-list"></i> Empresa</a>
                        <form id="categoria-form" action="{{url('categoria')}}" method="GET" style="display: none;">
                        {{csrf_field()}}
                        </form>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle " href="#">
                    <i class="fa fa-lock"></i>
                    Seguridad
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('user')}}" onclick="event.preventDefault(); document.getElementById('user-form').submit();"> Usuarios</a>
                        <form id="user-form" action="{{url('user')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('roles')}}" onclick="event.preventDefault(); document.getElementById('roles-form').submit();"><i class="fa fa-list"></i> Roles</a>
                        <form id="roles-form" action="{{url('roles')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
