/**
 * Created by SHAMIM on 02-Mar-17.
 */
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $invoice_table =  $('#invoice_items');
    var item_remove = $('#item-remove');
    var blank_add = $('#blank-add');
    var sub_total = $('#sub_total');



    function calculateTotal() {
        var sum = 0;

        $invoice_table.find('.lvtotal').each(function (index, elem) {
            var val = parseFloat($(elem).val());
            if (!isNaN(val)) {
                sum += val;
            }
        });

        sum = parseFloat( parseFloat( sum ).toFixed(2) );

        sub_total.text( sum );
    }


    function start_focus( $this ) {

        var $quanltity = $this.find('.qty'),
            $item_price = $this.find('.item_price'),
            $tax = $this.find('.tax'),
            $discount = $this.find('.discount'),
            $rowTotal = $this.find('.lvtotal');

        $this.find('.qty, .item_price, .tax, .discount').off("keyup").on("keyup", function(){
            var u_price = parseFloat( $item_price.val() ),
                u_qty = parseInt( $quanltity.val() ),
                u_taxed = parseFloat( $tax.val() ),
                u_discount = parseFloat( $discount.val() );

            if (isNaN(u_price)) { u_price = 0 }
            if (isNaN(u_qty)) { u_qty = 0 }
            if (isNaN(u_taxed)) { u_taxed = 0 }
            if (isNaN(u_discount)) { u_discount = 0 }

            var w_ltotal = u_qty * u_price,
                wt_ltotal = ( w_ltotal * u_taxed ) / 100,
                discount = ( w_ltotal * u_discount ) / 100,
                n_ltotal = parseFloat( parseFloat( ((w_ltotal+wt_ltotal)-discount).toFixed(2) ) );
                if(n_ltotal > 0) $rowTotal.val(n_ltotal); else $rowTotal.val(0);
            calculateTotal();
        });

    }

    item_remove.on('click', function () {

        var rowCount=$('#invoice_items tbody tr').length;
        $invoice_table.find('tr.info').fadeOut(300, function () {
            $(this).remove();
            calculateTotal();
        });
        
        if(rowCount ==2)
        {
            item_remove.hide();
        }

    });
    // $("#phoneScreen").on('keyup',item_price ,function(event) {
    // });
    
    $(document).on('keyup','.item_price, .qty',function(event) {
        if(event.key == "-")
        {
            $(this).val("");
        }
    });
    // blank_add.keyup('click', function () {

    blank_add.on('click', function () {
        $invoice_table.find('tbody').append(
            '<tr>'+
            '<td data-label="Item Name"><input type="text" class="form-control item_name" name="desc[]" value=""></td>'+
            '<td data-label="Price"><input type="number" min="0" class="form-control item_price" name="amount[]" value="" autocomplete="off" oninput="validity.valid||(value=" ")" step="0.01"></td>'+
            '<td data-label="Qty"><input type="number"  min="0" class="form-control qty" value="" name="qty[]"  autocomplete="off" oninput="validity.valid||(value=" ")"></td>'+
            '<td data-label="Tax"><input type="number" class="form-control tax" name="taxed[]" value="" step="0.01" max="99"> </td>'+
            '<td data-label="Discount"><input type="number" class="form-control discount" name="discount[]" value="" step="0.01" max="99"> </td>'+
            '<td data-label="Per Item Total" class="ltotal"><input type="text" class="form-control lvtotal" readonly name="ltotal[]"></td>'+
            '</tr>'
        );

        $invoice_table.find('tr:last').trigger('click').find('td:first input').focus();

    });

    item_remove.hide();

    $invoice_table.find('tbody').on('click', 'tr', function () {

        $(this).addClass("info").siblings("tr").removeClass("info").data("focuson", false);

        if ( $(this).data('focuson') != true ) {
            $(this).data('focuson', true);
            start_focus( $(this) );
        }

        item_remove.show();
    });

});