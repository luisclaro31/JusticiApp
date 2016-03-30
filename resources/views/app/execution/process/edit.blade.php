@extends('theme.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Procesos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar o Eliminar
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @include('app.user.design.partials.messages')

                                @if (Session::has('message'))
                                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                                @endif

                                {!! Form::model($result,  ['route' => ['execution.process.update', $result], 'method' => 'PUT']) !!}
                                    @include('app.execution.design.fields.start_process')
                                    <button type="submit" onclick="return confirm('Se actualizara a {{  $result->identification }}')" class="btn btn-warning"><i class="fa fa-pencil fa-lg"></i> Actualizar</button>
                                {!! Form::close() !!}

                                {!! Form::open(['route' => ['execution.process.destroy', $result], 'method' => 'DELETE' ]) !!}
                                    <br>
                                    <button type="submit" onclick="return confirm('Seguro que desea Eliminar a {{  $result->identification }}')" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Eliminar</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection