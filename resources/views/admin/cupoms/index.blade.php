@extends('app')

@section('content')
    <div class="container">
        <h3>Cupoms</h3>

        <a class="btn btn-default" href="{{ route('admin.cupoms.create') }}">Novo cupom</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Código</td>
                <td>Valor</td>
                <td>Usado</td>
                <td>Ação</td>
            </tr>
            </thead>
            <tbody>

                @foreach($cupoms as $cupom)
                    <tr>
                        <td>{{ $cupom->id }}</td>
                        <td>{{ $cupom->code }}</td>
                        <td>{{ $cupom->value }}</td>
                        <td> @if($cupom->used == 0) Novo @else Usado @endif</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.cupoms.edit', ['id' => $cupom->id]) }}">Editar</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('admin.cupoms.destroy', ['id' => $cupom->id]) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">{!! $cupoms->render() !!}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection