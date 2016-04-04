@extends('theme.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Personas</h1>
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
                                @include('app.user.design.partials.messages')

                                @if (Session::has('message'))
                                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                                @endif

                                {!! Form::model($result,  ['route' => ['user.actor.update', $result], 'method' => 'PUT']) !!}
                                    @include('app.user.design.fields.actor')
                                    <button type="submit" onclick="return confirm('Se actualizara a {{  $result->full_name }}')" class="btn btn-warning"><i class="fa fa-pencil fa-lg"></i> Actualizar</button>
                                {!! Form::close() !!}

                                {!! Form::open(['route' => ['user.actor.destroy', $result], 'method' => 'DELETE' ]) !!}
                                <br>
                                <button type="submit" onclick="return confirm('Seguro que desea Eliminar a {{  $result->full_name }}')" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Eliminar</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                @include('app.user.design.partials.actor_table')
                            </table>
                            <div align="right">{!! $results->render() !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection