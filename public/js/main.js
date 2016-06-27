$(document).ready(function() {

    var url_base = 'http://' + window.location.host;

    $('#btn-add-product').click(function(event) {
        event.preventDefault();
        var i = parseInt($('#quant-product-item').val()) + 1;
        $('#quant-product-item').val(i);
        var item = '<tr id="box-product-item_' + i + '">';
        item += '<td><select name="products[]" class="form-control" id="select-products_' + i + '">';

        $.ajax({
            url: url_base + '/admin/productslists',
            dataType: 'json',
            type: 'GET',
            success: function(data, textStatus)
            {
                var total_registros = data.length;

                if(total_registros > 0)
                {
                    var option = '<option value="">Selecione um produto</option>';

                    $.each(data, function (z, obj)
                    {
                        if(z < total_registros)
                        {
                            option += '<option value="' + obj.id + '">' + obj.name + '</option>';
                        }
                    });

                    $('#select-products_' + i).html(option);
                }
                else
                {
                    $('#select-products_' + i).html('<option value="">Não há subcategoria cadastrada para esta categoria</option>');
                }
            },
            error: function(xhr, er) {
                $('#select-products_' + i).html('<option>Erro: ' + xhr.status + ' - ' + xhr.statusText + '<br> Tipo do erro: ' + er + '</option>');
            }
        });

        item += '</select></td>';
        item += '<td><input type="text" name="price[]" class="form-control" id="product-price_' + i + '" readonly="readonly"></td>';
        item += '<td><input type="text" name="quant[]" class="form-control" id="product-quant_' + i + '" value="1"></td>';
        item += '<td><a class="btn btn-danger" id="btn-product-item-retirar_' + i + '"><b class="icon-minus icon-white"></b> Retirar item</a></td>';
        item += '</tr>';

        $('table#table-list-product tbody').append(item);
    });

    $("body").on("change", 'select[id ^= "select-products_"]', function(event){

        var indice_campo = this.id.split("_")[1];
        var option_value = $('#' + this.id).val();

        $.ajax({
            url: url_base + '/admin/productprice/' + option_value,
            dataType: 'json',
            type: 'GET',
            success: function(data, textStatus)
            {
                $('#product-price_' + indice_campo).val(data.price);
                $('#select-products_' + indice_campo).valor_total();
            },
            error: function(xhr, er) {
                $('#product-price_' + indice_campo).val('Erro: ' + xhr.status + ' - ' + xhr.statusText + '<br> Tipo do erro: ' + er);
            }
        });
    });

    $("body").on("change", 'input[id ^= "product-quant_"]', function(event){

        var indice_campo = this.id.split("_")[1];

        $('#product-quant_' + indice_campo).valor_total();

    });

    $("body").on("change", 'input[id ^= "product-price_"]', function(event){

        var indice_campo = this.id.split("_")[1];

        $('#product-price_' + indice_campo).valor_total();

    });

    $("body").on("click", 'a[id ^= "btn-product-item-retirar_"]', function(event){
        event.preventDefault();

        var id = this.id.split('_')[1];
        $('#box-product-item_' + id).fadeOut(500, function() {
            $('#box-product-item_' + id).remove();
            var i = parseInt($('#quant-product-item').val()) - 1;
            $('#quant-product-item').val(i);

            // ALTERA A SEQUENCIA DE IDS
            var z = 1;
            $('tr[id ^= "box-product-item_"]').each(function ()
            {
                $('#' + this.id).attr('id', 'box-product-item_' + z);
                z++;
            });

            var z = 1;
            $('select[id ^= "select-products_"]').each(function ()
            {
                $('#' + this.id).attr('id', 'select-products_' + z);
                z++;
            });

            var z = 1;
            $('input[id ^= "product-price_"]').each(function ()
            {
                $('#' + this.id).attr('id', 'product-price_' + z);
                z++;
            });

            var z = 1;
            $('input[id ^= "product-quant_"]').each(function ()
            {
                $('#' + this.id).attr('id', 'product-quant_' + z);
                z++;
            });

            var z = 1;
            $('a[id ^= "btn-product-item-retirar_"]').each(function ()
            {
                $('#' + this.id).attr('id', 'btn-product-item-retirar_' + z);
                z++;
            });

            $('#box-product-item_' + id).valor_total();
        });
    });

});

// Funções internas
jQuery.prototype.extend({

    valor_total: function()
    {
        var total = 0;
        var item_quant = $('#quant-product-item').val();

        for(var i = 0, z = i + 1; i < item_quant; i++, z++)
        {
            total += parseFloat($('#product-price_' + z).val()) * parseInt($('#product-quant_' + z).val());
        }

        $('#order-price-total').val(total);
    }
});