<div class="col-lg-12">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('identification', 'Radicado') !!}
            {!! Form::text('identification', null,['class' => 'form-control', 'placeholder' => 'Radicado']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('state_id', 'Estado') !!}
            {!! Form::select('state_id', ['' => 'Selecionar', 'Estados' => $states,], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('stage_id', 'Etapa') !!}
            {!! Form::select('stage_id', ['' => 'Selecionar', 'Etapas' => $stages,], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">$</span>
            {!! Form::text('quantity', null,['class' => 'form-control', 'placeholder' => 'Cuantia']) !!}
            <span class="input-group-addon">.00</span>
        </div>
        <div class="form-group">
            {!! Form::label('objective', 'Pretenciones') !!}
            {!! Form::textarea('objective', null,['class' => 'form-control', 'placeholder' => 'Pretenciones']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('action_id', 'Tipo de Acciones') !!}
            {!! Form::select('action_id', ['' => 'Selecionar', 'Acciones' => $actions,], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null,['class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('travel_id', 'Recorrido') !!}
            {!! Form::select('travel_id', ['' => 'Selecionar', 'Recorridos' => $travels,], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('municipality_id', 'Municipio') !!}
            {!! Form::select('municipality_id', ['' => 'Selecionar', 'Municipios' => $municipalities,], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('details', 'Detalles') !!}
            {!! Form::textarea('details', null,['class' => 'form-control', 'placeholder' => 'Detalles']) !!}
        </div>
    </div>
</div>