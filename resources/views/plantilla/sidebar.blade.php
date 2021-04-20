<div class="sidebar elevation-2">
    <nav class="sidebar-nav">
        <ul class="nav">
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{url('home')}}" onclick="event.preventDefault(); document.getElementById('home-form').submit();"><i class="fa fa-list text-dark"></i> Dashbord</a>
                <form id="home-form" action="{{url('home')}}" method="GET" style="display: none;">
                {{csrf_field()}}
                </form>
            </li> --}}
            <li class="nav-title">
                Menú
            </li>
            @can('facturacion')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle " href="#">
                    <i class="fa fa-arrow-circle-o-down"></i>
                    Facturación
                </a>
                <ul class="nav-dropdown-items">
                    @can('cliente.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('cliente')}}" onclick="event.preventDefault(); document.getElementById('cliente-form').submit();"><i class="fa fa-user-circle-o text-dark"></i> Clientes</a>
                        <form id="cliente-form" action="{{url('cliente')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                    @endcan
                    @can('megresos.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('megresos')}}" onclick="event.preventDefault(); document.getElementById('megresos-form').submit();"><i class="fa fa-bar-chart text-dark"></i> Movimientos</a>
                        <form id="megresos-form" action="{{url('megresos')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                    @endcan
                    @can('venta.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('venta')}}" onclick="event.preventDefault(); document.getElementById('venta-form').submit();"><i class="fa fa-file-o text-dark"></i></i> Facturar</a>
                        <form id="venta-form" action="{{url('venta')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>
                    @endcan
                    @can('producto.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('producto')}}" onclick="event.preventDefault(); document.getElementById('producto-form').submit();"><i class="fa fa-file-text-o text-dark"></i> Servicios</a>
                        <form id="producto-form" action="{{url('producto')}}" method="GET" style="display: none;">
                        {{csrf_field()}}
                        </form>
                    </li>
                    @endcan
                    @can('saldo.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('saldo')}}" onclick="event.preventDefault(); document.getElementById('saldo-form').submit();"><i class="fa fa-ravelry text-dark"></i> Saldo</a>
                        <form id="saldo-form" action="{{url('saldo')}}" method="GET" style="display: none;">
                        {{csrf_field()}}
                        </form>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('organizacion')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle " href="#">
                    <i class="fa fa-sitemap"></i>
                    Organización
                </a>
                <ul class="nav-dropdown-items">
                    @can('cargo.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('cargo')}}" onclick="event.preventDefault(); document.getElementById('cargo-form').submit();"><i class="fa fa-check text-dark"></i> Cargo</a>
                        <form id="cargo-form" action="{{url('cargo')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                    @endcan
                    @can('dpto.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('dpto')}}" onclick="event.preventDefault(); document.getElementById('dpto-form').submit();"><i class="fa fa-suitcase text-dark"></i> Departamentos</a>
                        <form id="dpto-form" action="{{url('dpto')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="{{url('reports')}}" onclick="event.preventDefault(); document.getElementById('reports-form').submit();"><i class="fa fa-file-pdf-o text-dark"></i> Reportes</a>
                <form id="reports-form" action="{{url('reports')}}" method="GET" style="display: none;">
                    {{csrf_field()}}
                 </form>
            </li>
            @can('configuracion')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle " href="#">
                <i class="fa fa-cogs"></i>
                    Configuración
                </a>
                <ul class="nav-dropdown-items">
                    @can('conceptos.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('conceptos')}}" onclick="event.preventDefault(); document.getElementById('conceptos-form').submit();"><i class="fa fa-list text-dark"></i> Conceptos</a>
                        <form id="conceptos-form" action="{{url('conceptos')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                    @endcan
                    @can('cpotes.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('cpotes')}}" onclick="event.preventDefault(); document.getElementById('cpotes-form').submit();"><i class="fa fa-book text-dark"></i> Cuentas</a>
                        <form id="cpotes-form" action="{{url('cpotes')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                    @endcan
                    @can('fpago.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('fpago')}}" onclick="event.preventDefault(); document.getElementById('fpago-form').submit();"><i class="fa fa-credit-card-alt text-dark"></i> Forma de pago</a>
                        <form id="fpago-form" action="{{url('fpago')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>
                    @endcan
                    @can('nacionalidad.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('nacionalidad')}}" onclick="event.preventDefault(); document.getElementById('nacionalidad-form').submit();"><i class="fa fa-map text-dark"></i> Nacionalidad</a>
                        <form id="nacionalidad-form" action="{{url('nacionalidad')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                    @endcan
                    {{-- @can('tcliente.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('tcliente')}}" onclick="event.preventDefault(); document.getElementById('tcliente-form').submit();"><i class="fa fa-list text-dark"></i> Tipo cliente</a>
                        <form id="tcliente-form" action="{{url('tcliente')}}" method="GET" style="display: none;">
                        {{csrf_field()}}
                        </form>
                    </li>
                    @endcan --}}
                    @can('empresa.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('empresa')}}" onclick="event.preventDefault(); document.getElementById('empresa-form').submit();"><i class="fa fa-building"></i> Empresa</a>
                        <form id="empresa-form" action="{{url('empresa')}}" method="GET" style="display: none;">
                        {{csrf_field()}}
                        </form>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('seguridad')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle " href="#">
                    <i class="fa fa-lock"></i>
                    Seguridad
                </a>
                <ul class="nav-dropdown-items">
                    @can('user.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('user')}}" onclick="event.preventDefault(); document.getElementById('user-form').submit();"><i class="fa fa-users text-dark"></i> Usuarios</a>
                        <form id="user-form" action="{{url('user')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </li>
                    @endcan
                    @can('roles.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('roles')}}" onclick="event.preventDefault(); document.getElementById('roles-form').submit();"><i class="fa fa-check text-dark"></i> Roles</a>
                        <form id="roles-form" action="{{url('roles')}}" method="GET" style="display: none;">
                            {{csrf_field()}}
                         </form>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
