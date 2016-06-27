@extends('app')

@section('content')
    <div class="container">
        <h3>Produtos</h3>

        <a class="btn btn-default" href="{{ route('admin.products.create') }}">Novo produto</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Categoria</td>
                <td>Ação</td>
            </tr>
            </thead>
            <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.products.edit', ['id' => $product->id]) }}">Editar</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('admin.products.destroy', ['id' => $product->id]) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">{!! $products->render() !!}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection