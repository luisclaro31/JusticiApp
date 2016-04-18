@extends('theme.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tipos de Usuarios</h1>
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
                            <div class="col-lg-6">
                                @include('app.user.design.partials.messages')

                                @if (Session::has('message'))
                                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                                @endif

                                {!! Form::model($result,  ['route' => ['user.type.update', $result], 'method' => 'PUT']) !!}
                                    @include('app.user.design.fields.description')
                                    <button type="submit" onclick="return confirm('Se actualizara a {{  $result->description }}')" class="btn btn-warning"><i class="fa fa-pencil fa-lg"></i> Actualizar</button>
                                {!! Form::close() !!}

                                {!! Form::open(['route' => ['user.type.destroy', $result], 'method' => 'DELETE' ]) !!}
                                    <br>
                                    <button type="submit" onclick="return confirm('Seguro que desea Eliminar a {{  $result->description }}')" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Eliminar</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Striped Rows
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                @include('app.user.design.partials.description_table')
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection