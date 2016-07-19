@extends('app')

@section('content')
    <div class="container">
        <h3>Meus Pedidos</h3>

        <a class="btn btn-default" href="{{ route('customer.order.create') }}">Nova pedido</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Total</td>
                <td>Status</td>
            </tr>
            </thead>
            <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">{!! $orders->render() !!}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection