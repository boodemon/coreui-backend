(function ($) {

    function frmuser() {
        this.clearInput = function () {
            $('#frm-user').attr('action', _base + '/data/service-code/import');
            $('input[type="file"]').val(null);
            $('input[name="_method"]').val('POST');
        }
        this.edit = function (id) {
            $('#frm-user').attr('action', _base + '/user/' + id);
        }

        this.delete = function (id) {
            $.ajax({
                url: _base + '/user/' + id,
                method: 'POST',
                data: { _token: $('input[name="_token"]').val(), _method: 'DELETE' },
                success: function (data) {

                },
                error: function (e) {
                    console.log(e);
                }
            });
        }




    }


    var frm = new frmuser();
    $('#btn-import').on('click', function () {
        //alert('model');
        frm.clearInput();
        $('#modal-import').modal('show');
    });

    $('input[name="username"]').on('change', function (e) {
        frm.checkuser($(this));
    });

    $('input[name="email"]').on('change', function (e) {
        frm.checkuser($(this));
    });

    $('.onEdit').on('click', function () {
        frm.edit($(this).attr('data-id'));
        $('#modal-user').modal('show');
    });

    $('.onDelete').on('click', function (e) {
        e.preventDefault();
        var row = $(this).closest('tr');
        if (confirm('Please confirm delete this')) {
            var id = $(this).attr('data-id');
            frm.delete(id);
            row.remove();
        }
    });

    $('.btn-delete').on('click', function (e) {
        var ids = [];
        if (!confirm('Please confirm delete this selected'))
            return false;
        $('.checkboxAll').each(function (index, val) {
            var row = $(this).closest('tr');
            if ($(this).is(':checked')) {
                ids.push($(this).val());
                row.remove();
            }
        });
        frm.delete(ids.join('-'));
    });

    $('form').on('submit', function (e) {
        frm.validate();
        if ($('.text-require').length > 0) {
            $('.text-require').each(function (i, v) {
                console.log('i : ', i);
                if (i == 0) {
                    var inp = $(this).closest('div');
                    inp.find('input').focus();
                }
            });
            return false;
        }

    });
}(jQuery));