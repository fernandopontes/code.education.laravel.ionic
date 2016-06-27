<div class="form-group">
    {!! Form::label('client', 'Cliente:') !!}
    {!! Form::select('client_id', $clients, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('user', 'Entregador:') !!}
    {!! Form::select('user_id', $deliverymans, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', array('1' => 'Novo pedido', '2' => 'Pedido em andamento', '3' => 'Pedido sendo entregue', '4' => 'Pedido finalizado'), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <a class="btn btn-success" id="btn-add-product">Adicionar produto</a>
    <input type="hidden" name="quant-product-item" id="quant-product-item" value="@if(isset($orderItens)) {{ count($orderItens) }} @else 0 @endif">
    <table class="table table-striped" id="table-list-product">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($orderItens))
                <?php
                $i = 1;
                ?>
                @foreach($orderItens as $item)
                    <tr id="box-product-item_{!! $i !!}">
                        <td>
                            <select name="products[]" class="form-control" id="select-products_{!! $i !!}">
                                <option value="">Selecione um produto</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" @if($product->id == $item->product_id) selected="selected" @endif >{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" name="price[]" class="form-control" id="product-price_{!! $i !!}" readonly="readonly" value="{{ $item->price }}"></td>
                        <td><input type="text" name="quant[]" class="form-control" id="product-quant_{!! $i !!}" value="{{ $item->qtd }}"></td>
                        <td><a class="btn btn-danger" id="btn-product-item-retirar_{!! $i !!}"><b class="icon-minus icon-white"></b> Retirar item</a></td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'order-price-total']) !!}
</div>