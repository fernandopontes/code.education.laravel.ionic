@extends('app')

@section('content')
    <div class="container">
        <h3>Novo cupom</h3>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.cupoms.store']) !!}

        @include('admin.cupoms.form')

        <div class="form-group">
            {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.cupoms.index') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection