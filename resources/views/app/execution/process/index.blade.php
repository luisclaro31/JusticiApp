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
                        Lista De Procesos
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Radicado</th>
                                        <th>Action</th>
                                        <th>Detalles</th>
                                        <th>Editar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($results as $result)
                                            <tr>
                                                <td>{{ $result->id }}</td>
                                                <td>{{ $result->identification }}</td>
                                                <td>{{ $result->action->description }}</td>
                                                <td>{{ $result->details }}</td>
                                                <td><a class="btn btn-info btn-sm" href="{{ route('execution.process.show', $result)  }}">Editar <i class="fa fa-pencil fa-lg"></i></a></td>
                                            </tr>
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
@endsection