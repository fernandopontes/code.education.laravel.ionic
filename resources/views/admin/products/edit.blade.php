@extends('app')

@section('content')
    <div class="container">
        <h3>Editar produto</h3>

        @include('errors._check')

        {!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'put']) !!}

        @include('admin.products.form')

        <div class="form-group">
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.products.index') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection