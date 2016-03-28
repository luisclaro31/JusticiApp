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
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <dl class="dl-horizontal">
                                    <dt>Radicado: </dt>
                                    <dd>{{ $result->identification }}</dd>
                                    <dt>Estado: </dt>
                                    <dd>{{ $result->state->description }}</dd>
                                    <dt>Etapa: </dt>
                                    <dd>{{ $result->stage->description }}</dd>
                                    <dt>Recorrido: </dt>
                                    <dd>{{ $result->travel->description }}</dd>
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
                                    <dt>Abogado: </dt>
                                    <dd>{{ $result->user->full_name }}</dd>
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
                        <i class="fa fa-users fa-fw"></i> Partes del Proceso
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($process_actors as $process_actor)
                                <a href="#" class="list-group-item">
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
                                </a>
                            @endforeach
                        </div>
                        <div class="input-group" align="center">
                            <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#add_actor"><i class="fa fa-plus-circle fa-lg"></i> Añadir Actor</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-building fa-fw"></i> Despachos del Proceso
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                        @foreach($process_offices as $process_office)
                            <a href="#" class="list-group-item">
                                <i class="fa fa-briefcase fa-fw"></i> {{ $process_office->office->description }}
                                <span class="pull-right text-muted small"><em>{{ $process_office->stage->description }}</em></span>
                            </a>
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
                        <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge"><i class="fa fa-check"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                        <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolorem quibusdam, tenetur commodi provident cumque magni voluptatem libero, quis rerum. Fugiat esse debitis optio, tempore. Animi officiis alias, officia repellendus.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis quidem delectus libero, omnis ut debitis!</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge info"><i class="fa fa-save"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus modi quam ipsum alias at est molestiae excepturi delectus nesciunt, quibusdam debitis amet, beatae consequuntur impedit nulla qui! Laborum, atque.</p>
                                        <hr>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-gear"></i>  <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Action</a>
                                                </li>
                                                <li><a href="#">Another action</a>
                                                </li>
                                                <li><a href="#">Something else here</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi fuga odio quibusdam. Iure expedita, incidunt unde quis nam! Quod, quisquam. Officia quam qui adipisci quas consequuntur nostrum sequi. Consequuntur, commodi.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati, quaerat tempore officia voluptas debitis consectetur culpa amet, accusamus dolorum fugiat, animi dicta aperiam, enim incidunt quisquam maxime neque eaque.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="chat-panel panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-comments fa-fw"></i>Audiencias
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
@endsection