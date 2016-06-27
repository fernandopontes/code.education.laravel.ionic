@extends('app')

@section('content')
    <div class="container">
        <h3>Editar categoria</h3>

        @include('errors._check')

        {!! Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'put']) !!}

        @include('admin.categories.form')

        <div class="form-group">
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.categories.index') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection