@extends('theme.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Proceso Radicado# {{ $result->identification }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-info fa-fw"></i> Informacion Proceso
                        <div class="pull-right">
                            <a class="btn btn-info btn-xs" href="{{ route('execution.process.edit', $result)  }}">Editar <i class="fa fa-pencil fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <dl class="dl-horizontal">
                                    <dt>Radicado: </dt>
                                    <dd>{{ $result->identification }}</dd>
                                    <dt>Radicado de 2da Instancia: </dt>
                                    <dd>{{ $result->identification_two }}</dd>
                                    <dt>Estado: </dt>
                                    <dd>{{ $result->state->description }}</dd>
                                    <dt>Etapa: </dt>
                                    <dd>{{ $result->stage->description }}</dd>
                                    <dt>Cuantia: </dt>
                                    <dd>@if($result->quantity != "")
                                            $ {{ number_format($result->quantity, 2, ',', '.') }}
                                        @endif</dd>
                                    <dt>Objetivo: </dt>
                                    <dd>{{ $result->objective }}</dd>
                                </dl>
                            </div>
                            <div class="col-lg-6">
                                <dl class="dl-horizontal">
                                    <dt>Action: </dt>
                                    <dd>{{ $result->action->description }}</dd>
                                    <dt>Correo Electronico: </dt>
                                    <dd>{{ $result->email }}</dd>
                                    <dt>Recorrido: </dt>
                                    <dd>{{ $result->travel->description }}</dd>
                                    <dt>Municipio: </dt>
                                    <dd>{{ $result->municipality->description }} - {{ $result->municipality->department }}</dd>
                                    <dt>Detalles: </dt>
                                    <dd>{{ $result->details }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-user-md fa-fw"></i> Abogados del proceso
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($process_actors as $process_actor)
                                @if($process_actor->user->type_id == 2)
                                    {!! Form::open(['route' => ['execution.process_actors.destroy', $process_actor], 'method' => 'DELETE' ]) !!}
                                    <button type="submit" onclick="return confirm('Seguro que desea Eliminar El Actor {{  $process_actor->user->full_name }} de la Parte {{ $process_actor->part->description }}')" class="list-group-item">
                                        @if ($process_actor->part_id == 1 )
                                            <i class="fa fa-user fa-fw"></i>
                                        @endif
                                        @if ($process_actor->part_id == 2 )
                                            <i class="fa fa-user-secret fa-fw"></i>
                                        @elseif($process_actor->part_id > 2 )
                                            <i class="fa fa-question-circle fa-fw"></i>
                                        @endif
                                        {{ $process_actor->user->full_name }}
                                        <span class="pull-right text-muted small"><em>{{ $process_actor->part->description }}</em>
                                        </span>
                                    </button>
                                    {!! Form::close() !!}
                                @endif
                            @endforeach
                        </div>
                        <div class="input-group" align="center">
                            <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#add_lawyers"><i class="fa fa-plus-circle fa-lg"></i> Añadir Abogado</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> Partes del Proceso
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($process_actors as $process_actor)
                                @if($process_actor->user->type_id <> 2)
                                    {!! Form::open(['route' => ['execution.process_actors.destroy', $process_actor], 'method' => 'DELETE' ]) !!}
                                    <button type="submit" onclick="return confirm('Seguro que desea Eliminar El Actor {{  $process_actor->user->full_name }} de la Parte {{ $process_actor->part->description }}')" class="list-group-item">
                                        @if ($process_actor->part_id == 1 )
                                            <i class="fa fa-user fa-fw"></i>
                                        @endif
                                        @if ($process_actor->part_id == 2 )
                                            <i class="fa fa-user-secret fa-fw"></i>
                                        @elseif($process_actor->part_id > 2 )
                                            <i class="fa fa-question-circle fa-fw"></i>
                                        @endif
                                        {{ $process_actor->user->full_name }}
                                        <span class="pull-right text-muted small"><em>{{ $process_actor->part->description }}</em>
                                        </span>
                                    </button>
                                    {!! Form::close() !!}
                                @endif
                            @endforeach
                        </div>
                        <div class="input-group" align="center">
                            <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#add_actor"><i class="fa fa-plus-circle fa-lg"></i> Añadir Actor</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-building fa-fw"></i> Despachos del Proceso
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($process_offices as $process_office)
                                {!! Form::open(['route' => ['execution.process_offices.destroy', $process_office], 'method' => 'DELETE' ]) !!}
                                    <button type="submit" onclick="return confirm('Seguro que desea Eliminar El Despacho {{  $process_office->office->description }} Con Vinculacion {{ $process_office->stage->description }}')" class="list-group-item">
                                        <i class="fa fa-briefcase fa-fw"></i> {{ $process_office->office->description }}
                                        <span class="pull-right text-muted small"><em>{{ $process_office->stage->description }}</em> <em>{{ $process_office->date }}</em></span>
                                    </button>
                                {!! Form::close() !!}
                            @endforeach
                        </div>
                        {!! Form::model($query, ['route' => ['execution.process.show', $result], 'method' => 'GET', 'role' => 'search']) !!}
                            <div class="form-group input-group">
                                {!! Form::select('speciality', ['' => 'Selecionar', 'Especialidad' => $specialities], null, ['class' => 'form-control']) !!}
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-filter"></i></button>
                                </span>
                            </div>
                        {!! Form::close() !!}
                        <div class="input-group" align="center">
                            <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#add_office"><i class="fa fa-plus-circle fa-lg"></i> Añadir Despacho</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i> Movimientos
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="input-group" align="center">
                            <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#add_movement"><i class="fa fa-plus-circle fa-lg"></i> Añadir Movimiento</a>
                        </div>
                        <br>
                        <div class="panel-group" id="accordion">
                            @foreach($process_movements as $process_movement)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#{{ $process_movement->id }}">{{ $process_movement->notification->description }} | {{ \Carbon\Carbon::parse($process_movement->notification_date)->formatLocalized('%A %d %B %Y') }}</a>
                                        </h4>
                                    </div>
                                    <div id="{{ $process_movement->id }}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <dl>
                                                <dt>Fecha: </dt>
                                                <dd><p><small class="text-muted"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($process_movement->date)->formatLocalized('%A %d %B %Y') }}</small></dd>
                                                <dt>Fecha de notificacion: </dt>
                                                <dd><p><small class="text-muted"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($process_movement->notification_date)->formatLocalized('%A %d %B %Y') }}</small></dd>
                                                <dt>Tipo de Notificacion: </dt>
                                                <dd><p><small class="text-muted"><i class="fa fa-bell-o"></i> {{ $process_movement->notification->description }}</small></dd>
                                                <dt>Correo de Notificacion: </dt>
                                                <dd><p><small class="text-muted"><i class="fa fa-envelope-o"></i> {{ $process_movement->email }}</small></dd>
                                                <dt>Fecha Expiracion: </dt>
                                                <dd><p><small class="text-muted"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($process_movement->expiration_date)->formatLocalized('%A %d %B %Y') }}</small></dd>
                                                <dt>Despacho: </dt>
                                                <dd><p><small class="text-muted"><i class="fa fa-building"></i> {{ $process_movement->office->description }}</small></dd>
                                                <dt>Archivo: </dt>
                                                <dd><p><a href="{{ asset('files/process_movements/'.$result->id.'/'.$process_movement->file) }}"  target="_blank" ><small class="text-muted"><i class="fa fa-file-pdf-o"></i> Ver Archivo</small></a></dd>
                                                <dt>Desciccion: </dt>
                                                <dd><p><i class="fa fa-comment-o"></i> {{ $process_movement->description }}.</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="chat-panel panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-institution fa-fw"></i>Audiencias
                    </div>
                    <div class="panel-body">
                        <ul class="chat">
                            @foreach($process_audiences as $process_audience)

                               <li class="left clearfix">
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">{{ $process_audience->office->description }}</strong>
                                        </div>
                                        <p><i class="fa fa-calendar fa-fw"></i> {{ \Carbon\Carbon::parse($process_audience->date)->formatLocalized('%A %d %B %Y') }}</p>
                                        <p><i class="fa fa-clock-o fa-fw"></i> {{ \Carbon\Carbon::parse($process_audience->time)->format('h:i:s A')}}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.panel-body -->
                    <div class="panel-footer">
                        <div class="input-group">
                            <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#add_audience"><i class="fa fa-plus-circle fa-lg"></i> Añadir Audiencia</a>
                        </div>
                    </div>
                    <!-- /.panel-footer -->
                </div>
                <!-- /.panel .chat-panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
    </div>

    <div class="modal fade" id="add_lawyers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Añadir Abogado</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'execution.process_actors.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('process_id', 'Proceso #') !!}
                        {!! Form::text('process_id', $result->id ,['class' => 'form-control', 'placeholder' => 'Proceso','readonly']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('part_id', 'Parte') !!}
                        {!! Form::select('part_id', ['' => 'Selecionar', 'Partes' => $parts,], null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('user_id', 'Abogado') !!}
                        {!! Form::select('user_id', ['' => 'Selecionar', 'Abogados' => $lawyers,], null, ['class' => 'form-control']) !!}
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle fa-lg"></i> Añadir Nuevo</button>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_actor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Añadir Actor</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'execution.process_actors.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('process_id', 'Proceso #') !!}
                            {!! Form::text('process_id', $result->id ,['class' => 'form-control', 'placeholder' => 'Proceso','readonly']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('part_id', 'Parte') !!}
                            {!! Form::select('part_id', ['' => 'Selecionar', 'Partes' => $parts,], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('user_id', 'Actores') !!}
                            {!! Form::select('user_id', ['' => 'Selecionar', 'Actores' => $actors,], null, ['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle fa-lg"></i> Añadir Nuevo</button>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_office" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Añadir Despacho</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'execution.process_offices.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('process_id', 'Proceso #') !!}
                        {!! Form::text('process_id', $result->id ,['class' => 'form-control', 'placeholder' => 'Proceso','readonly']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('office_id', 'Despacho') !!}
                        {!! Form::select('office_id', ['' => 'Selecionar', 'Oficina' => $offices ], null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('stage_id', 'Etapa del Despacho') !!}
                        {!! Form::select('stage_id', ['' => 'Selecionar', 'Etapa' => $office_stages ], null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('date', 'Fecha Reparto') !!}
                        {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle fa-lg"></i> Añadir Nuevo</button>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_audience" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Añadir Audiencia</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model($origin_office, ['route' => 'execution.process_audiences.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('process_id', 'Proceso #') !!}
                        {!! Form::text('process_id', $result->id ,['class' => 'form-control', 'placeholder' => 'Proceso','readonly']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('date', 'Fecha') !!}
                        {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('time', 'Hora') !!}
                        {!! Form::time('time', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('office_id', 'Despacho') !!}
                        {!! Form::select('office_id', ['' => 'Selecionar', 'Oficina' => $offices ], null, ['class' => 'form-control']) !!}
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle fa-lg"></i> Añadir Nuevo</button>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_movement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myModalLabel">Añadir Movimiento</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model($origin_office, ['route' => 'execution.process_movements.store', 'method' => 'POST', 'files' => 'true' ]) !!}
                    <div class="form-group">
                        {!! Form::label('process_id', 'Proceso #') !!}
                        {!! Form::text('process_id', $result->id ,['class' => 'form-control', 'placeholder' => 'Proceso','readonly']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Descripcion') !!}
                        {!! Form::textarea('description', null,['class' => 'form-control', 'placeholder' => 'Descripcion']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('date', 'Fecha del auto') !!}
                        {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('notification_date', 'Notificacion Fecha') !!}
                        {!! Form::date('notification_date', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('notification_id', 'Notificacion') !!}
                        {!! Form::select('notification_id', ['' => 'Selecionar', 'Oficina' => $notifications ], null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('expiration_date', 'Expiracion Fecha') !!}
                        {!! Form::date('expiration_date', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('office_id', 'Despacho') !!}
                        {!! Form::select('office_id', ['' => 'Selecionar', 'Oficina' => $offices ], null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Correo Electronico para informar') !!}
                        {!! Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Correo Electronico para informar']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('file', 'Archivo') !!}
                        {!! Form::file('file', ['class' => 'form-control']) !!}
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle fa-lg"></i> Añadir Nuevo</button>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection