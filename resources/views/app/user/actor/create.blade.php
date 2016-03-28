@extends('theme.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Actores</h1>
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

                                {!! Form::open(['method' => 'POST', 'route' => 'user.actor.store' ]) !!}
                                    @include('app.user.design.fields.actor')
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
                            <table class="table table-striped">
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