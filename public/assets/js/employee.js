$(document).ready(function() {
    $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        stateSave: true,
        ajax: $('body').attr('get-all-employee'),
        columns: [{
                data: 'first_name',
                name: 'first_name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'mobile',
                name: 'mobile'
            },
            {
                data: 'gender',
                name: 'gender'
            },
            {
                data: 'resumeData',
                name: 'resumeData'
            },
            {
                data: 'status',
                name: 'status'
            },


            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ],
    });

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
                    window.location.href = _url + "/employee/delete-employee/" + id;
                },
                cancel: function() {},

            }
        });
    });

});


