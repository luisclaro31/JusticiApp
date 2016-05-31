@extends('report.layout')
    @section('content')
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

                </tr>
            @endif
            @endif
            @endforeach
            </tbody>
        </table>
    @endsection