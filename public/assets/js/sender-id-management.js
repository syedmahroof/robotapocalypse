/**
 * Created by SHAMIM on 02-Mar-17.
 */
$(document).ready(function () {

    $('.user-select2').select2({
        placeholder: "Select a user"
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change','.user-select2',function () {
       $('#search-form').submit();
    })

    $(".item-add").on("click", function () {

        var sTable = $("#sender_id_items");
        var RowAppend = ['<tr class="item-row">',
            '<td data-label="Sender ID"><input type="text" autocomplete="off" name="sender_id[]" pattern="[1]\\d{10}" title="Must start with 1 follwed by 10 digits" required class="form-control sender_id"></td>' +
            '<td data-label="Action"><button class="btn btn-danger btn-sm" id="RemoveITEM" type="button"><i class="fa fa-trash-o"></i> Remove</button></td>'
            , "</tr>"].join("");
        var sLookup = $(RowAppend);

        var sender_id = sLookup.find(".sender_id");
        $(".item-row:last", sTable).after(sLookup);
        $(sender_id).focus();

        sLookup.find("#RemoveITEM").on("click", function () {
            $(this).parents(".item-row").remove();
            if ($(".item-row").length < 2) $("#deleteRow").hide();
        });

        return false
    });

    $(document).on('change', '.defaultPhelement', function (e) {
        e.preventDefault();
        defaultPhelement = $(this);
        var senderid = defaultPhelement.attr("ph-id");
        var clientid = defaultPhelement.attr("client-id");
        var status = defaultPhelement.prop("checked");
        var clientname = defaultPhelement.attr("client-name");
        $.ajax({
            type: 'POST',
            url: $('.wrapper-bottom-sec').attr('set-default-phone-number'),
            data: {
                senderid: senderid,
                clientid: clientid,
                status: status,
            },
            success: function (result) {
                $('.alertify-logs').remove();
                if (result.status == "success") {
                    alertify.log(result.message, 'success');
                    if($('.' + clientname).length > 1){
                        this_checked = defaultPhelement.prop('checked');
                        if($('.' + clientname + ':checked').length != 0) {
                            $('.' + clientname).prop('checked', false);
                        }
                        if(this_checked == true) {
                            defaultPhelement.prop('checked', true);
                        } else {
                            defaultPhelement.prop('checked', false);
                        }
                        
                    }
                }
                else {
                    alertify.log(result.message, 'error');
                }
            }
        });

    });
    $(document).on('change', '#mobile_auto_renew', function (e) {
        e.preventDefault();
        element = $(this);
        var id = element.attr("ph-id");
        var status = element.prop("checked");
        $.ajax({
            type: 'POST',
            url: $('.wrapper-bottom-sec').attr('phone-number-auto-renew'),
            data: {
                id: id,
                status: status,
            },
            success: function (result) {
                $('.alert-dismissible').hide();
                $('.ajaxerror').html('');
                if (result.status == "success") {
                    var msg =
                        "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
                        result.message + "</div>";
                }
                else {
                    var msg =
                        "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" +
                        result.message + "</div>";
                }
                $('.ajaxerror').html(msg);
            }
        });
    });


});
