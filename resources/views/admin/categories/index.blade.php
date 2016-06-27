@extends('app')

@section('content')
    <div class="container">
        <h3>Categorias</h3>

        <a class="btn btn-default" href="{{ route('admin.categories.create') }}">Nova categoria</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Ação</td>
            </tr>
            </thead>
            <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">Editar</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('admin.categories.destroy', ['id' => $category->id]) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">{!! $categories->render() !!}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection