jQuery(document).ready(function ($) {
    optionsChanger();

    $(document).on('change', '#type', function () { optionsChanger(); });

    function optionsChanger() {
        if ($('#type').find(':selected').data('allow-options')) {
            $('[data-options]').removeClass('d-none');
            $('[data-no-options]').addClass('d-none');
        } else {
            $('[data-options]').addClass('d-none');
            $('[data-no-options]').removeClass('d-none');
        }
    };

    $(document).on('click', '[data-option-add]', function () {
        var totalRows = $('table tbody tr').length;

        if (totalRows >= 2) {
            $('[data-options-empty]').addClass('d-none');
        }

        var $tr = $('[data-option-clone]').clone();

        $tr.removeClass('d-none').removeAttr('data-option-clone');

        $tr.find('input').each(function () {
            $(this).val('').attr('name', $(this).attr('name').replace(/(\d+)/, totalRows + 1)).prop('required', true);
        });

        $('table tbody').append($tr);
    });

    $(document).on('click', '[data-option-remove]', function () {
        $(this).closest('tr').remove();

        var totalRows = $('table tbody tr').length;

        if (totalRows === 2) {
            $('[data-options-empty]').removeClass('d-none');
        }
    });
});
