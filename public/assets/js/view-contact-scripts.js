$(document).ready(function () {
    $('#add_note_button').click(function () {
        if($('#add_note_form').valid()){
            var contact_id = $('#contact_id').val();
            var text = $('#text').val();
            $.ajax({
                type: 'POST',
                url: $('.wrapper-bottom-sec').attr('contact-note-create'),
                data: {
                    '_token': $('input[name=_token]').val(),
                    'contact_id': contact_id,
                    'text': text
                },
                success: function (json) {
                    if (json.status == 'success') {
                        $('#add_note_form').trigger('reset');
                        $('#notes_form').modal('hide');
                        alertify.log(json.message, 'success');
                    } else {
                        alertify.log(json.message, 'error');
                    }
                }
            });
        }
    });

    $("body").delegate(".delete_note", "click", function (e) {
        var notes_id = $(this).attr('data-id');
        var _this = $(this);
        bootbox.confirm({
            title: "Are you sure?",
            message: "Are you sure you want to Delete? This cannot be undone.",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Yes'
                }
            },
            callback: function (delete_note) {
                if (delete_note) {
                    $.ajax({
                        type: 'POST',
                        url: $('.wrapper-bottom-sec').attr('contact-note-remove'),
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'notes_id': notes_id,
                        },
                        success: function (json) {
                            if (json.status == 'success') {
                                _this.parents('tr').remove();
                                if ($('.notes-list tbody tr').length == 0) {
                                    $('#view_contact_notes').modal('hide');
                                }
                                alertify.log(json.message, 'success');
                            } else {
                                alertify.log(json.message, 'error');
                            }
                        }
                    });
                }
            }
        });
    });

    $(document).on('click', '.clearform', function () {
        $('#add_note_form').trigger('reset');
    });
    $(document).on('click', '.notes-form', function () {
        var contactid = $(this).data('contactid');
        $('#contact_id').val(contactid);
        $('#notes_form').modal('show');
    });

    $(document).on('click', '.view-contact-notes', function () {
        var contactid = $(this).data('view_contactid');
        $.ajax({
            type: 'POST',
            url: $('.wrapper-bottom-sec').attr('contact-notes'),
            data: {
                'contact_id': contactid,
            },
            success: function (json) {
                if (json.notes.length > 0) {
                    tr_data = '';
                    j = 1;
                    for (i = 0; i < json.notes.length; i++) {
                        var note = json.notes[i].text;
                        var note_id = json.notes[i].id;
                        var note_date = json.notes[i].formated_date;
                        tr_data += '<tr>';
                        tr_data += '<td>' + j + '</td>';
                        tr_data += '<td>' + note + '</td>';
                        tr_data += '<td>' + note_date + '</td>';
                        tr_data += '<td><a class="delete_note" data-id="' + note_id + '"><i class="fa fa-trash"></i></a></td>';
                        tr_data += '</tr>';
                        j = j + 1;
                    }
                    $('#contact_notes_list').html(tr_data);

                } else {
                    $('#contact_notes_list').html('<tr><td align="center" colspan="4">No Notes Found</td></tr>');
                }
                $('#view_contact_notes').modal('show');
            }
        });

    });

    /*For Delete Group*/
    $("body").delegate(".cdelete", "click", function (e) {
        e.preventDefault();
        var id = this.id;

        bootbox.confirm({
            title: "Are you sure?",
            message: "Are you sure you want to Delete? This cannot be undone.",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Yes'
                }
            },
            callback: function (result) {
                if (result) {
                    var _url = $("#_url").val();
                    window.location.href = _url + "/user/delete-contact/" + id;
                }
            }
        });

    });
});