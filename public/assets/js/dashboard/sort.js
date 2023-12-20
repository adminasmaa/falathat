$('.sortable-list').sortable({
    connectWith: '.sortable-list',
    update: function (event, ui) {
        var order = $(this).sortable('toArray');
        var sortableListHolder = $('.sortable-list');
        var ids = sortableListHolder.data('ids').split(',');

        var positions = [];
        for (var i = 0; i < ids.length; i++) {
            positions.push({
                'id': order[i].replace('row-', ''),
                'position': ids[i]
            });
        }
        $.get(sortableListHolder.data('url'), {
            positions: positions,
            _token: $('meta[name="csrf-token"]').attr('content')
        });
    }
});
