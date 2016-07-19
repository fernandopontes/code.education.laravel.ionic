<div class="form-group">
    <label for="">Total:</label>
    <p id="total"></p>
    <a href="#" class="btn btn-default" id="btnNewItem">Novo Item</a>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="items[0][product_id]" id="" class="form-control">
                        @foreach($products as $p)
                            <option value="{{ $p->id }}" data-price="{{ $p->price }}">{{ $p->name }} -- {{ $p->price }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    {!! Form::text('items[0][qtd]', 1, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>