(function ($) {

    function frm() {
        this.delete = function (id) {
            $.ajax({
                url: _base + '/products/content/' + id,
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


    var frm = new frm();
    $('#btn-new').on('click', function () {
        window.location.href= _base + '/products/content/create';
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

}(jQuery));
