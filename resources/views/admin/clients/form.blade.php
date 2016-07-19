<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <!--{--!! Form::text('user[name]', null, ['class' => 'form-control']) !!--}-->
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Senha:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password2', 'Repita a Senha:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone', 'Telefone:') !!}
    {!! Form::text('phone', (isset($client) && count($client) > 0) ? $client[0]->phone : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('address', 'Endereço:') !!}
    {!! Form::text('address', (isset($client) && count($client) > 0) ? $client[0]->address : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('city', 'Cidade:') !!}
    {!! Form::text('city', (isset($client) && count($client) > 0) ? $client[0]->city : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('state', 'Estado:') !!}
    {!! Form::text('state', (isset($client) && count($client) > 0) ? $client[0]->state : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('zipcode', 'CEP:') !!}
    {!! Form::text('zipcode', (isset($client) && count($client) > 0) ? $client[0]->zipcode : null, ['class' => 'form-control']) !!}
</div>