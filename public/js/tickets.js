// DELETE AJAX

$(document).ready(function () {
    $("[id$='destroy']").click(function () {

        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')}
        });

        $.ajax({
            url: this.dataset["route"],
            type: "delete",
            context: $("#ticket-" + this.dataset["id"]),
            success: function (data) {
                this.fadeOut(300, function () {
                    $(this).remove();
                });
            }
        })
    });
});

$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getTickets(page);
        }
    }
});

$(document).ready(function() {
    $(document).on('click', '.pagination a', function (e) {
        getTickets($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });
});

function getTickets(page) {
    $.ajax({
        url : '?page=' + page,
        dataType: 'json'
    }).done(function (data) {
        $('#tickets-pool').html(data);
        location.hash = page;
    }).fail(function () {
        alert('Tickets could not be loaded.');
    });
}