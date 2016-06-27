@extends('app')

@section('content')
    <div class="container">
        <h3>Novo pedido</h3>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.orders.store']) !!}

        @include('admin.orders.form')

        <div class="form-group">
            {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.orders.index') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection