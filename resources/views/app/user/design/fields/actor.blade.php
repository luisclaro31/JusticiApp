<div class="col-lg-12">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('identification', 'Identificacion o Nit') !!}
            {!! Form::text('identification', null,['class' => 'form-control', 'placeholder' => 'Identificacion o Nit']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('professional_card', 'Numero Tarjeta Profesional') !!}
            {!! Form::text('professional_card', null,['class' => 'form-control', 'placeholder' => 'Numero Tarjeta Profesional']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('full_name', 'Nombres y Apellios o  Razon Social') !!}
            {!! Form::text('full_name', null,['class' => 'form-control', 'placeholder' => 'Nombres y Apellios o  Razon Social']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone', 'Telefono o  Celular') !!}
            {!! Form::text('phone', null,['class' => 'form-control', 'placeholder' => 'Telefono o Celular']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('birth_date', 'Fecha de Nacimiento') !!}
            {!! Form::date('birth_date', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address', 'Direccion de Ubicacion') !!}
            {!! Form::text('address', null,['class' => 'form-control', 'placeholder' => 'Direccion de Ubicacion']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image', 'Foto') !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type_id', 'Tipo de Usuario') !!}
            {!! Form::select('type_id', ['' => 'Selecionar', 'Tipo de Usuario' => $types,], null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('details', 'Detalles') !!}
            {!! Form::textarea('details', null,['class' => 'form-control', 'placeholder' => 'Detalles']) !!}
        </div>
        <!--
        <div class="row">
            <div class="col-lg-12">
                <div class="well">
                    <h4>Campos solo para Usuario</h4>
                    <p>Los campos Correo <strong>Electrónico</strong> y <strong>Contraseña</strong> solo deben ser diligenciados, si la persona sera un Usuario del Sistema.</p>
                    <div class="form-group">
                        {!! Form::label('email', 'Correo Electronico') !!}
                        {!! Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Correo Electronico']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirmacion de Contraseña') !!}
                        {!! Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
</div>