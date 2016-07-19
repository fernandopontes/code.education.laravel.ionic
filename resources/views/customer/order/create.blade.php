@extends('app')

@section('content')
    <div class="container">
        <h3>Novo pedido</h3>

        @include('errors._check')

        {!! Form::open(['route' => 'customer.order.store']) !!}

        @include('customer.order.form')

        <div class="form-group">
            {!! Form::submit('Cadastrar pedido', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

@section('post-script')
    <script>
        $("#btnNewItem").click(function()
        {
            var row = $('table tbody > tr:last');
            var newRow = row.clone();
            var length = $('table tbody tr').length;

            newRow.find('td').each(function()
            {
                var td = $(this);
                var input = td.find('input,select');
                var name = input.attr('name');

                input.attr('name', name.replace((length - 1) + "", length + ""));

            });

            newRow.find('input').val(1);
            newRow.insertAfter(row);
            calculateTotal();
        });

        $(document.body).on('click', 'select', function() {
            calculateTotal();
        });

        $(document.body).on('blur', 'input', function() {
            calculateTotal();
        })

        function calculateTotal()
        {
            var total = 0;
            var trLen = $('table tbody tr').length;
            var tr = null;
            var price;
            var qtd;

            for(var i=0; i<trLen; i++)
            {
                tr = $('table tbody tr').eq(i);
                price = tr.find(':selected').data('price');
                qtd = tr.find('input').val();
                total += price * qtd;
            }

            $('#total').html(total);
        }
    </script>
@endsection