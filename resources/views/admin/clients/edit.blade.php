@extends('app')

@section('content')
    <div class="container">
        <h3>Editar cliente</h3>

        @include('errors._check')

        {!! Form::model($user, ['route' => ['admin.clients.update', $user->id], 'method' => 'put']) !!}

        <input type="hidden" name="id" value="{{ $user->id }}">

        @include('admin.clients.form')

        <div class="form-group">
            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="{{ route('admin.clients.index') }}">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection