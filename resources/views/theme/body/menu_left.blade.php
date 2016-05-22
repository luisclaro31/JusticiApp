<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
            </div>
            <!-- /input-group -->
        </li>
        @if(Auth::user()->type_id <= 3)
            <li>
                <a href="{{ url('/home') }}"><i class="fa fa-home fa-fw"></i> Movimientos y Audiencias</a>
            </li>
        @endif
        @if(Auth::user()->type_id == 4)
            <li>
                <a href="{{ url('/lawyer/home') }}"><i class="fa fa-home fa-fw"></i> Movimientos y Audiencias</a>
            </li>
        @endif
        <li>
            <a href="#"><i class="fa fa-cog fa-spin"></i> Configuracion de Datos<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('/user/type/create') }}"><i class="fa fa-tags fa-fw"></i> Tipos Usuario</a>
                </li>
                <li>
                    <a href="{{ url('/info/state/create') }}"><i class="fa fa-list-ul fa-fw"></i> Estados</a>
                </li>
                <li>
                    <a href="{{ url('/info/stage/create') }}"><i class="fa fa-circle-o fa-fw"></i> Etapas</a>
                </li>
                <li>
                    <a href="{{ url('/info/action/create') }}"><i class="fa fa-circle-o fa-fw"></i> Acciones</a>
                </li>
                <li>
                    <a href="{{ url('/info/notification/create') }}"><i class="fa fa-bell-o fa-fw"></i> Notificaciones</a>
                </li>
                <li>
                    <a href="{{ url('/info/travel/create') }}"><i class="fa fa-paper-plane-o fa-fw"></i> Recorridos</a>
                </li>
                <li>
                    <a href="{{ url('/info/location/create') }}"><i class="fa fa-location-arrow fa-fw"></i> Ubicacion</a>
                </li>
                <li>
                    <a href="{{ url('/info/speciality/create') }}"><i class="fa fa-circle-o fa-fw"></i> Especialidad</a>
                </li>
                <li>
                    <a href="{{ url('/info/office/create') }}"><i class="fa fa-circle-o fa-fw"></i> Despacho</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ url('/user/actor/') }}"><i class="fa fa-users fa-fw"></i> Personas<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('/user/actor/create') }}"><i class="fa fa-user-plus fa-fw"></i> Crear</a>
                </li>
            </ul>
        </li>
        @if(Auth::user()->type_id <= 3)
            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Procesos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/execution/process') }}">Lista De Procesos</a>
                    </li>
                    <li>
                        <a href="{{ url('/execution/process/create') }}">Crear Proceso</a>
                    </li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->type_id == 4)
            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Mis Procesos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/lawyer/process') }}">Lista</a>
                    </li>
                    <li>
                        <a href="{{ url('/execution/process/create') }}">Crear Proceso</a>
                    </li>
                </ul>
            </li>
        @endif
        <li>
            <a href="http://app.softwarehh.com/diario/verdict" target="_blank"><i class="fa fa-flag"></i> Diario Judicial</a>
        </li>
        <li>
            <a href="{{ url('/') }}"><i class="fa fa-info"></i> Informacion de la App</a>
        </li>
        <!--
        <li>
            <a href="{{ url('/') }}"><i class="fa fa-life-ring"></i> Soporte de la app</a>
        </li>
        -->
    </ul>
</div>