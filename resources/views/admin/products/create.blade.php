@extends('app')

@section('content')
    <div class="container">
        <h3>Novo produto</h3>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.products.store']) !!}

        @include('admin.products.form')

        <div class="form-group">
            {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.products.index') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection