<div class="form-group">
    {!! Form::label('description', 'Descripcion') !!}
    {!! Form::text('description', null,['class' => 'form-control', 'placeholder' => 'Descripcion']) !!}
</div>
<div class="form-group">
    {!! Form::label('speciality_id', 'Especialidadd') !!}
    {!! Form::select('speciality_id', ['' => 'Selecionar', 'Especialidad' => $speciality,], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('location_id', 'Localizacion') !!}
    {!! Form::select('location_id', ['' => 'Selecionar', 'Localizacion' => $location,], null, ['class' => 'form-control']) !!}
</div>
