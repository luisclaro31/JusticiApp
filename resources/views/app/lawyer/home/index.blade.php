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
                                                    <!--{{ $validator = 0 }}-->
                                                    @foreach($process_movement->process->processactors as $ActorsLawyers)
                                                        @if($validator == 0)
                                                            @if($ActorsLawyers->user_id == Auth::user()->id)
                                                                <!--{{ $validator = 1 }}-->
                                                            @else
                                                                <!--{{ $validator = 0 }}-->
                                                            @endif
                                                        @endif
                                                    @endforeach

                                                    @if($validator == 1)
                                                        <tr class="danger">
                                                            <td>{{ $process_movement->id }}</td>
                                                            <td>{{ $process_movement->process->identification }}</td>
                                                            <td>{{ $process_movement->expiration_date }}</td>
                                                            <td>{{ $process_movement->notification->description }}</td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @elseif(  $process_movement->expiration_date <= \Carbon\Carbon::now()->addDay(3)->toDateString() )
                                                    <!--{{ $validator = 0 }}-->
                                                    @foreach($process_movement->process->processactors as $ActorsLawyers)
                                                        @if($validator == 0)
                                                            @if($ActorsLawyers->user_id == Auth::user()->id)
                                                                <!--{{ $validator = 1 }}-->
                                                            @else
                                                                <!--{{ $validator = 0 }}-->
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    @if($validator == 1)
                                                        <tr class="warning">
                                                            <td>{{ $process_movement->id }}</td>
                                                            <td>{{ $process_movement->process->identification }}</td>
                                                            <td>{{ $process_movement->expiration_date }}</td>
                                                            <td>{{ $process_movement->notification->description }}</td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @elseif(   $process_movement->expiration_date >= \Carbon\Carbon::now()->addDay(4)->toDateString() )
                                                    <!--{{ $validator = 0 }}-->
                                                    @foreach($process_movement->process->processactors as $ActorsLawyers)
                                                        @if($validator == 0)
                                                            @if($ActorsLawyers->user_id == Auth::user()->id)
                                                                <!--{{ $validator = 1 }}-->
                                                            @else
                                                                <!--{{ $validator = 0 }}-->
                                                        @endif
                                                    @endif
                                                    @endforeach
                                                    @if($validator == 1)
                                                        <tr class="success">
                                                            <td>{{ $process_movement->id }}</td>
                                                            <td>{{ $process_movement->process->identification }}</td>
                                                            <td>{{ $process_movement->expiration_date }}</td>
                                                            <td>{{ $process_movement->notification->description }}</td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_movement->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endif
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
                                                <th>Despacho </th>
                                                <th>Partes</th>
                                                <th>Abogados</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($process_audiences as $process_audience)
                                                @if($process_audience->date <= \Carbon\Carbon::now()->addDay(1)->toDateString() )
                                                    <!--{{ $validator = 0 }}-->
                                                    @foreach($process_audience->process->processactors as $ActorsLawyers)
                                                        @if($validator == 0)
                                                            @if($ActorsLawyers->user_id == Auth::user()->id)
                                                                    <!--{{ $validator = 1 }}-->
                                                            @else
                                                                    <!--{{ $validator = 0 }}-->
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    @if($validator == 1)
                                                        <tr class="danger">
                                                            <td>{{ $process_audience->id }}</td>
                                                            <td>{{ $process_audience->process->identification }}</td>
                                                            <td>{{ $process_audience->date }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($process_audience->time)->format('h:i A')}}</td>
                                                            <td>{{ $process_audience->office->description }}</td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @elseif(  $process_audience->date <= \Carbon\Carbon::now()->addDay(3)->toDateString() )
                                                    <!--{{ $validator = 0 }}-->
                                                    @foreach($process_audience->process->processactors as $ActorsLawyers)
                                                        @if($validator == 0)
                                                            @if($ActorsLawyers->user_id == Auth::user()->id)
                                                                <!--{{ $validator = 1 }}-->
                                                            @else
                                                                <!--{{ $validator = 0 }}-->
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    @if($validator == 1)
                                                        <tr class="warning">
                                                            <td>{{ $process_audience->id }}</td>
                                                            <td>{{ $process_audience->process->identification }}</td>
                                                            <td>{{ $process_audience->date }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($process_audience->time)->format('h:i A')}}</td>
                                                            <td>{{ $process_audience->office->description }}</td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @elseif(   $process_audience->date >= \Carbon\Carbon::now()->addDay(4)->toDateString() )
                                                    <!--{{ $validator = 0 }}-->
                                                    @foreach($process_audience->process->processactors as $ActorsLawyers)
                                                        @if($validator == 0)
                                                            @if($ActorsLawyers->user_id == Auth::user()->id)
                                                                <!--{{ $validator = 1 }}-->
                                                            @else
                                                                <!--{{ $validator = 0 }}-->
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    @if($validator == 1)
                                                        <tr class="success">
                                                            <td>{{ $process_audience->id }}</td>
                                                            <td>{{ $process_audience->process->identification }}</td>
                                                            <td>{{ $process_audience->date }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($process_audience->time)->format('h:i A')}}</td>
                                                            <td>{{ $process_audience->office->description }}</td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul><strong>Demandantes</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                                <ul><strong>Demandados</strong>
                                                                    @foreach($process_audience->process->processactors as $ProcessActors)
                                                                        @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 4)
                                                                            <li>{{ $ProcessActors->user->full_name }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endif
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