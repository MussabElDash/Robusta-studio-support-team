// DELETE AJAX
$(document).on('click', "[id$='destroy']", function(e){
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')}
    });

    $.ajax({
        url: $(this)[0].dataset["route"],
        type: "delete",
        context: $("#ticket-" + $(this)[0].dataset["id"]),
        success: function (data) {
            this.fadeOut(300, function () {
                $(this).remove();
            });
        },
        error: function (data) {
            console.log("Not Authorized");
        }
    })
})

// SHOW modal AJAX
$(document).on('click',"[id$='show']" , function (e){
    if ($("#show-ticket-modal-" + $(this)[0].dataset["id"]).length == 0) {
        $.ajax({
            url: $(this)[0].dataset["route"],
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
                            $("#ticket-" + data['id'] + "-comments").append(data["html"]);
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
        $("#show-ticket-modal-" + $(this)[0].dataset["id"]).modal("show");
    }
})

// EDIT Modal AJAX
$(document).on('click', "[id$='edit']", function (e){
    if( $("#edit-ticket-modal-" + $(this)[0].dataset["id"]).length == 0){
        $.ajax({
            url: $(this)[0].dataset["route"],
            type: "get",
            success: function (data) {
                $("#modals").append(data['html']);
                $("#edit-ticket-modal-" + data['id']).modal("show");

                $("#ticket-form-" + data['id']).submit(function (e) {
                    e.preventDefault();

                    $.ajax({
                        url: this.action,
                        type: "put",
                        data: $(this).serialize(),
                        success: function (data) {
                            $("#ticket-" + data['id']).html(data["html"]);
                            $("#edit-ticket-modal-" + data["id"]).modal('hide');

                            if( $("#show-ticket-modal-" + data["id"]).length > 0 ){
                                $("#show-ticket-modal-" + data["id"]).remove();
                            }
                            e.preventDefault();
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
        $("#edit-ticket-modal-" + $(this)[0].dataset["id"]).modal("show");
    }
});

$(document).on('click', "[id$='claim']", function(e){
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')}
    });

    $.ajax({
        url: $(this)[0].dataset["route"],
        type: "post",
        context: $("#ticket-" + $(this)[0].dataset["id"]),
        success: function (data) {
            alert("claimed");
            this.fadeOut(300, function () {
                $(this).remove();
            });
            e.preventDefault();
        },
        error: function (data) {
            console.log("Not Authorized");
        }
    });
})

//$(window).on('hashchange', function () {
//    if (window.location.hash) {
//        var page = window.location.hash.replace('#', '');
//        if (page == Number.NaN || page <= 0) {
//            return false;
//        } else {
//            getTickets(page);
//        }
//    }
//});
//
//$(document).ready(function () {
//    $(document).on('click', '.pagination a', function (e) {
//        getTickets($(this).attr('href').split('page=')[1]);
//        e.preventDefault();
//    });
//});
//
//function getTickets(page) {
//    $.ajax({
//        url: '?page=' + page,
//        dataType: 'json'
//    }).done(function (data) {
//        $('#tickets-pool').html(data);
//        location.hash = page;
//    }).fail(function () {
//        alert('Tickets could not be loaded.');
//    });
//}