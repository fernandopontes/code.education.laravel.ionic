@extends('app')

@section('content')
    <div class="container">
        <h3>Editar cliente</h3>

        @include('errors._check')

        {!! Form::model($order, ['route' => ['admin.orders.update', $order->id], 'method' => 'put']) !!}

        <input type="hidden" name="id" value="{{ $order->id }}">

        @include('admin.orders.form')

        <div class="form-group">
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.orders.index') }}">Voltar</a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection