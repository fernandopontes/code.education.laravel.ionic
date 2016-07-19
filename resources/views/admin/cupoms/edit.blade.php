@extends('app')

@section('content')
    <div class="container">
        <h3>Editar cupom</h3>

        @include('errors._check')

        {!! Form::model($cupom, ['route' => ['admin.cupoms.update', $cupom->id], 'method' => 'put']) !!}

        @include('admin.cupoms.form')

        <div class="form-group">
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.cupoms.index') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection