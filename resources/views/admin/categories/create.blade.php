@extends('app')

@section('content')
    <div class="container">
        <h3>Nova categoria</h3>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.categories.store']) !!}

        @include('admin.categories.form')

        <div class="form-group">
            {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.categories.index') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection