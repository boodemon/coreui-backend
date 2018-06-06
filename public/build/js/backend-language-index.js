(function ($) {

    function frmlanguage() {
        this.clearInput = function () {
            $('#frm-language').attr('action', _base + '/setting/language');
            $('input[type="text"]').val('');
            $('input[name="id"]').val(0);
            $('input[name="_method"]').val('POST');
        }
        this.edit = function (id) {
            $('#frm-language').attr('action', _base + '/setting/language/' + id);
            $.ajax({
                url: _base + '/setting/language/' + id + '/edit',
                success: function (data) {
                    console.log('data', data);
                    if (data.code == 200) {
                        var res = data.data;
                        $('input[name="id"]').val(res.id);
                        $('input[name="code"]').val(res.code);
                        $('input[name="name"]').val(res.name);
                        $('input[name="lang_sort"]').val(res.lang_sort);
                        $('input[name="_method"]').val('PUT');

                    }
                }
            });
        }

        this.delete = function (id) {
            $.ajax({
                url: _base + '/setting/language/' + id,
                method: 'POST',
                data: { _token: $('input[name="_token"]').val(), _method: 'DELETE' },
                success: function (data) {

                },
                error: function (e) {
                    console.log(e);
                }
            });
        }

        this.checker = function ($input) {
            var frm = $input.closest('form');
            var inputName = $input.attr('name');
            $.ajax({
                url: _base + '/setting/language/checker',
                data: {
                    _token: $('input[name="_token"]').val(),
                    type: inputName,
                    text: $input.val()
                },
                type: 'POST',
                success: function (data) {
                    var no = data.trim();
                    var $require = $('.require-' + inputName);
                    if (no > 0) {

                        if (inputName == 'code') {
                            $require.html('<span class="text-require">* This code is already used.</span>');
                        }
                        $('input[name="' + inputName + '"]').focus();
                        return false;
                    } else {
                        $require.html('');
                    }
                }
            })
        }

        this.validate = function () {
            var id   = $('input[name="id"]');
            var code = $('input[name="code"]');
            var name = $('input[name="name"]');

                this.checker(code);
                if (code.val() == '' || code.val() === null) {
                    $('.require-code').html('<span class="text-require">* Please enter language code</span>');
                } else {
                    $('.require-code').html('');
                }

                if (name.val() == '' || name.val() === null) {
                    $('.require-name').html('<span class="text-require">* Please endter language name</span>');
                } else {
                    $('.require-name').html('');
                }
        }



    }


    var frm = new frmlanguage();
    $('#btn-new').on('click', function () {
        frm.clearInput();
        var count = $('.checkboxAll').length+1;
        $('input[name="lang_sort"]').val( count );
        $('#modal-language').modal('show');
    });

    $('input[name="code"]').on('change', function (e) {
        frm.checker($(this));
    });

    $('.onEdit').on('click', function () {
        frm.edit($(this).attr('data-id'));
        $('#modal-language').modal('show');
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