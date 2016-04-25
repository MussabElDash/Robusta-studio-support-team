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
            },
            error: function (data) {
                console.log("Not Authorized");
            }
        })
    });


    $("[id$='show']").click(function () {
        if ($("#show-ticket-modal-" + this.dataset["id"]).length == 0) {
            $.ajax({
                url: this.dataset["route"],
                type: "get",
                success: function (data) {
                    $("#modals").append(data['html']);
                    $("#show-ticket-modal-" + data['id']).modal("show");
                    $("#comment-form-" + data['id']).submit(function (e) {
                        e.preventDefault();

                        $.ajax({
                            url: this.action,
                            type: "post",
                            data: $(this).serialize(),
                            success: function (data) {
                                $("#ticket-"+ data['id'] + "-comments").append(data["html"]);
                                $("#comment-form-" + data['id'])[0].reset();
                            },
                            error: function (data) {
                                console.log("Not Authorized");
                            }
                        });
                    });
                },
                error: function (data) {
                    alert("Not Authorized");
                }
            });

        } else {
            $("#show-ticket-modal-" + this.dataset["id"]).modal("show");
        }
    });

    $("[id$='edit']").click(function () {
        if ($("#edit-ticket-modal-" + this.dataset["id"]).length == 0) {
            $.ajax({
                url: this.dataset["route"],
                type: "get",
                success: function (data) {
                    $("#modals").append(data['html']);
                    $("#edit-ticket-modal-" + data['id']).modal("show");
                },
                error: function (data) {
                    alert("Not Authorized");
                }
            });

        } else {
            $("#edit-ticket-modal-" + this.dataset["id"]).modal("show");
        }
    });

});

//$(document).change(function (){
//
//})

$(window).on('hashchange', function () {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getTickets(page);
        }
    }
});

$(document).ready(function () {
    $(document).on('click', '.pagination a', function (e) {
        getTickets($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });
});

function getTickets(page) {
    $.ajax({
        url: '?page=' + page,
        dataType: 'json'
    }).done(function (data) {
        $('#tickets-pool').html(data);
        location.hash = page;
    }).fail(function () {
        alert('Tickets could not be loaded.');
    });
}