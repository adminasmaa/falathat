// add csrf token as header for every ajax request.

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Delete item.
var delete_route;
var item_id;
var bulk_ids;
var reload_page;

$('.delete-button').on('click', function () {
    delete_route = $(this).data('url');
    item_id = $(this).data('item-id');
    reload_page = $(this).data('reload');
});

$('.delete-users-button').on('click', function () {
    delete_route = $(this).data('url');
    bulk_ids = $("#bulk-actions input:checkbox:checked").map(function () {
        if ($(this).val() !== 'on')
            return parseInt($(this).val());
    }).get();
    reload_page = true;
});

$(document).on('click', '#delete-button', function () {
    $(this).text('deleting ...').prop('disabled', true);
    $.post(delete_route, {_method: 'delete', bulk_ids: bulk_ids}).done(function () {
        $('#delete_modal').modal('toggle');
        if (reload_page) {
            location.reload();
        } else {
            $('#row-' + item_id).fadeOut();
            $('#delete-button').text('Yes').prop('disabled', false);
        }
    });
});
