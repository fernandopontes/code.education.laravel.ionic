@extends('app')

@section('content')
    <div class="container">
        <h3>Pedidos</h3>

        <a class="btn btn-default" href="{{ route('admin.orders.create') }}">Novo pedido</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Cliente</td>
                <td>Entregador</td>
                <td>Status</td>
                <td>Data</td>
                <td>Ação</td>
            </tr>
            </thead>
            <tbody>

                @foreach($orders as $order)
                    <?php
                        $cliente = \CodeDelivery\Models\User::userClient($order->client->user_id);
                        $data = new DateTime($order->created_at);

                        switch($order->status)
                        {
                            case 1:
                                $status = 'Novo pedido';
                                break;
                            case 2:
                                $status = 'Pedido em andamento';
                                break;
                            case 3:
                                $status = 'Pedido sendo entregue';
                                break;
                            case 4:
                                $status = 'Pedido finalizado';
                                break;
                            default:
                                $status = "Sem status";
                        }
                    ?>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $cliente[0]->name }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $status }}</td>
                        <td>{{ $data->format('d/m/Y H:i') }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.orders.edit', ['id' => $order->id]) }}">Editar</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('admin.orders.destroy', ['id' => $order->id]) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">{!! $orders->render() !!}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection