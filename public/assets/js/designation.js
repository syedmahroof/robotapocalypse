$(document).ready(function() {
    $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        stateSave: true,
        ajax: $('body').attr('get-all-designation'),
        columns: [{
                data: 'designation',
                name: 'designation'
            },

            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ],
    })
    /*For Delete client*/
    $("body").delegate(".cdelete", "click", function(e) {
        e.preventDefault();
        var id = this.id;

        $.confirm({
            title: 'Warning!',
            content: 'Are You Sure? You want delete this?',
            buttons: {
                confirm: function() {
                    var _url = $("#_url").val();
                    window.location.href = _url + "/designation/delete-designation/" + id;
                },
                cancel: function() {},

            }
        });
    });
});


