@extends('theme.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Despachos</h1>
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
                            <div class="col-lg-6">
                                @include('app.information.design.partials.messages')

                                @if (Session::has('message'))
                                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                                @endif

                                {!! Form::open(['method' => 'POST', 'route' => 'info.office.store' ]) !!}
                                    @include('app.information.design.fields.office')
                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle fa-lg"></i> Añadir Nuevo</button>
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
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descriscion</th>
                                    <th>Especialidad</th>
                                    <th>localizacion</th>
                                    <th>Accions <i class="fa fa-refresh fa-spin fa-lg"> </i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{ $result->id }}</td>
                                        <td>{{ $result->description }}</td>
                                        <td>{{ $result->speciality->description }}</td>
                                        <td>{{ $result->location->description }}</td>
                                        <td><a class="btn btn-info btn-sm" href="{{ route('info.office.edit', $result)  }}">Editar <i class="fa fa-pencil fa-lg"></i> o <i class="fa fa-trash fa-lg"></i> Eliminar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Descriscion</th>
                                    <th>Especialidad</th>
                                    <th>localizacion</th>
                                    <th>Accions <i class="fa fa-refresh fa-spin fa-lg"> </i></th>
                                </tr>
                                </tfoot>
                            </table>
                            <div align="right">{!! $results->render() !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection