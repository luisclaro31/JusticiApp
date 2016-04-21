@extends('theme.layout')
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Inicio</h1>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista De Movimientos
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Radicado</th>
                                                <th>Fecha de Vencimiento</th>
                                                <th>Tipo de Notificacion</th>
                                                <th>Partes</th>
                                                <th>Abogados</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($process_movements as $process_movement)
                                                @if( $process_movement->expiration_date <= \Carbon\Carbon::now()->addDay(1)->toDateString() )
                                                    <tr class="danger">
                                                        <td>{{ $process_movement->id }}</td>
                                                        <td>{{ $process_movement->process->identification }}</td>
                                                        <td>{{ $process_movement->expiration_date }}</td>
                                                        <td>{{ $process_movement->notification->description }}</td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @elseif(  $process_movement->expiration_date <= \Carbon\Carbon::now()->addDay(3)->toDateString() )
                                                    <tr class="warning">
                                                        <td>{{ $process_movement->id }}</td>
                                                        <td>{{ $process_movement->process->identification }}</td>
                                                        <td>{{ $process_movement->expiration_date }}</td>
                                                        <td>{{ $process_movement->notification->description }}</td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @elseif(   $process_movement->expiration_date >= \Carbon\Carbon::now()->addDay(4)->toDateString() )
                                                    <tr class="success">
                                                        <td>{{ $process_movement->id }}</td>
                                                        <td>{{ $process_movement->process->identification }}</td>
                                                        <td>{{ $process_movement->expiration_date }}</td>
                                                        <td>{{ $process_movement->notification->description }}</td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_movement->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista De Audiencias
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Radicado</th>
                                                <th>Fecha de Audiencias</th>
                                                <th>Hora de la Audiencia</th>
                                                <th>Partes</th>
                                                <th>Abogados</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($process_audiences as $process_audience)
                                                @if($process_audience->date <= \Carbon\Carbon::now()->addDay(1)->toDateString() )
                                                    <tr class="danger">
                                                        <td>{{ $process_audience->id }}</td>
                                                        <td>{{ $process_audience->process->identification }}</td>
                                                        <td>{{ $process_audience->date }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($process_audience->time)->format('h:i A')}}</td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @elseif(  $process_audience->date <= \Carbon\Carbon::now()->addDay(3)->toDateString() )
                                                    <tr class="warning">
                                                        <td>{{ $process_audience->id }}</td>
                                                        <td>{{ $process_audience->process->identification }}</td>
                                                        <td>{{ $process_audience->date }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($process_audience->time)->format('h:i A')}}</td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @elseif(   $process_audience->date >= \Carbon\Carbon::now()->addDay(4)->toDateString() )
                                                    <tr class="success">
                                                        <td>{{ $process_audience->id }}</td>
                                                        <td>{{ $process_audience->process->identification }}</td>
                                                        <td>{{ $process_audience->date }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($process_audience->time)->format('h:i A')}}</td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul><strong>Demandantes</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <ul><strong>Demandados</strong>
                                                                @foreach($process_audience->process->processactors as $ProcessActors)
                                                                    @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 2)
                                                                        <li>{{ $ProcessActors->user->full_name }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection