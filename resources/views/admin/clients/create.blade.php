@extends('app')

@section('content')
    <div class="container">
        <h3>Novo cliente</h3>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.clients.store']) !!}

        @include('admin.clients.form')

        <div class="form-group">
            {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.clients.index') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection