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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Radicado</th>
                                        <th>Partes</th>
                                        <th>Abogados</th>
                                        <th>Action</th>
                                        <th>Detalles</th>
                                        <th>Editar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($results as $result)
                                            <tr>
                                                <td>{{ $result->Process->id }}</td>
                                                <td>{{ $result->Process->identification }}</td>
                                                <td>
                                                    <ul><strong>Demandantes</strong>
                                                        @foreach($result->Process->processactors as $ProcessActors)
                                                            @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id > 4)
                                                                <li>{{ $ProcessActors->user->full_name }}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <ul><strong>Demandados</strong>
                                                        @foreach($result->Process->processactors as $ProcessActors)
                                                            @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id > 4)
                                                                <li>{{ $ProcessActors->user->full_name }}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul><strong>Demandantes</strong>
                                                        @foreach($result->Process->processactors as $ProcessActors)
                                                            @if($ProcessActors->part_id == 1 && $ProcessActors->user->type_id == 4)
                                                                <li>{{ $ProcessActors->user->full_name }}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <ul><strong>Demandados</strong>
                                                        @foreach($result->Process->processactors as $ProcessActors)
                                                            @if($ProcessActors->part_id == 2 && $ProcessActors->user->type_id == 4)
                                                                <li>{{ $ProcessActors->user->full_name }}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $result->Process->action->description }}</td>
                                                <td>{{ $result->Process->details }}</td>
                                                <td><a class="btn btn-info btn-sm" href="{{ route('execution.process.show', $result->Process)  }}">Ver <i class="fa fa-pencil fa-lg"></i></a></td>
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