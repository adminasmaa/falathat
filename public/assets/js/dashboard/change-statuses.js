// add csrf token as header for every ajax request.
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var update_statuses_route;
var bulk_ids;
var id;

$('.update-statuses-button').on('click', function () {
    update_statuses_route = $(this).data('url');
    bulk_ids = $("#bulk-actions input:checkbox:checked").map(function () {
        if ($(this).val() !== 'on')
            return $(this).val();
    }).get();
    id = $(this).data('id');
    if (id)
        bulk_ids = [id];
});

$(document).on('click', '#update-status-button', function () {
    var vm = $(this);
    vm.text('updating ...').prop('disabled', true);
    $.post(update_statuses_route, {
        bulk_ids: bulk_ids,
        status: $('#status_id').val()
    }).done(function (response) {
        Swal.fire({
            text: response.data.message,
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {confirmButton: "btn btn-primary"}
        }).then(function () {
            // Release button
            vm.text('Yes').prop('disabled', false);
            $('#statuses_modal').modal('toggle');
            window.location.reload();
        });
    }).fail(function (error) {
        Swal.fire({
            text: "OOPS! " + error.responseJSON.message,
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {confirmButton: "btn btn-primary"}
        }).then(function () {
            // Release button
            vm.text('Yes').prop('disabled', false);
        });
    });
});


$(document).on('change', '#change-status', function () {
    let reload = $(this).data('reload');
    let reject = $(this).data('reject');
    let status = $(this).is(':checked') ? 1 : 0;
    if (reload) {
        if (reject)
            $.post($(this).data('url'), {bulk_ids: [$(this).data('id')], status: status, reject: 1}).done(function () {
                window.location.reload();
            });
        else
            $.post($(this).data('url'), {bulk_ids: [$(this).data('id')], status: status}).done(function () {
                window.location.reload();
            });
    } else {
        $.post($(this).data('url'), {bulk_ids: [$(this).data('id')], status: status});
    }
});
