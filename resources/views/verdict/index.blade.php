@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Diario Judicial</div>

                    <div class="panel-body">
                        {!! Form::model($query, ['route' => 'diario.verdict.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('identification', null, ['class' => 'form-control', 'placeholder' => 'Radicado o Enunciado']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::select('municipality', ['' => 'Municipios', 'Selecionar' => $municipalities,], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::select('speciality', ['' => 'Especialidades', 'Selecionar' => $specialities,], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::select('office', ['' => 'Despachos', 'Selecionar' => $offices,], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::date('date', null, ['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!! Form::close() !!}
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Radicado o Enunciado</th>
                                <th>Demandante</th>
                                <th>Demandado</th>
                                <th>Actuacion</th>
                                <th>Fecha</th>
                            </tr>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $result->id }}</td>
                                    <td>{{ $result->identification }}</td>
                                    <td>{{ $result->applicants }}</td>
                                    <td>{{ $result->defendants }}</td>
                                    <td>{{ $result->performance }}</td>
                                    <td>{{ $result->date }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection