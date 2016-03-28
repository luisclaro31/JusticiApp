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
        <li>
            <a href="{{ url('/') }}"><i class="fa fa-home fa-fw"></i> Inicio</a>
        </li>
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
        <li>
            <a href="#"><i class="fa fa-tasks fa-fw"></i> Proceso<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('/execution/process/create') }}">Crear Proceso</a>
                </li>
                <li>
                    <a href="{{ url('/execution/process') }}">Lista De Procesos</a>
                </li>
            </ul>
        </li>
    </ul>
</div>