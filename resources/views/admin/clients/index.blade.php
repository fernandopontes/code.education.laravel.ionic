@extends('app')

@section('content')
    <div class="container">
        <h3>Clientes</h3>

        <a class="btn btn-default" href="{{ route('admin.clients.create') }}">Novo cliente</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Ação</td>
            </tr>
            </thead>
            <tbody>

                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.clients.edit', ['id' => $client->id]) }}">Editar</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('admin.clients.destroy', ['id' => $client->id]) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">{!! $clients->render() !!}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection