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
                        Añadir Nuevo
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @include('app.execution.design.partials.messages')

                                @if (Session::has('message'))
                                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                                @endif

                                {!! Form::open(['method' => 'POST', 'route' => 'execution.process.store' ]) !!}
                                    @include('app.execution.design.fields.start_process')
                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle fa-lg"></i> Añadir Nuevo</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection