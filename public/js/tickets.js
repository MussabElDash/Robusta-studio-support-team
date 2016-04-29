// DELETE AJAX
$(document).on('click', "[id$='destroy']", function (e) {
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
$(document).on('click', "[id$='show']", function (e) {
    if ($("#show-ticket-modal-" + $(this)[0].dataset["id"]).length == 0) {
        $.ajax({
            url: $(this)[0].dataset["route"],
            type: "get",
            success: function (data) {
                $("#modals").append(data['html']);
                $("#show-ticket-modal-" + data['id']).modal("show");
                $("#comment-form-" + data['id']).submit(function (e) {

                    e.preventDefault();
                    if ( $("#comment-form-" + data['id']).find('input[type=text]')
                            .filter(':visible:first').val() == ""){
                        return;
                    }
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
$(document).on('click', "[id$='edit']", function (e) {
    if ($("#edit-ticket-modal-" + $(this)[0].dataset["id"]).length == 0) {
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

                            if ($("#show-ticket-modal-" + data["id"]).length > 0) {
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

$(document).on('click', "[id$='claim']", function (e) {
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')}
    });

    $.ajax({
        url: $(this)[0].dataset["route"],
        type: "post",
        context: $("#ticket-" + $(this)[0].dataset["id"]),
        success: function (data) {
            this.fadeOut(300, function () {
                $(this).remove();
            });
            e.preventDefault();
        },
        error: function (data) {
            console.log("Not Authorized");
        }
    });
});

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
$(function () {
    $(document).on('click', '.fa-ticket', function (e) {
        var modal = $("#create-ticket-from-feed-modal");
        modal.find("#customer_twitter_id").val($(this).data('customer-twitter-id'));
        modal.find("#customer_profile_image_path").val($(this).data('customer-profile-image-path'));
        modal.find("#customer_name").val($(this).data('customer-name'));
        modal.find("#tweet_text").val($(this).data('tweet-text').replace('@robusta_team1', ''));
    });
    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();
        var controlForm = $('#dynamic-fields');
        var currentEntry = $(this).parents('.entry:first');
        var newEntry = $(currentEntry.clone()).appendTo(controlForm);
        newEntry.find('option[value=' + currentEntry.find(':selected').val() + ']').remove();
        if (newEntry.find('option').length == 1) {
            newEntry.find('.btn-add').hide();
        }
        controlForm.find('.entry:not(:last) .btn-add').removeClass('btn-add').addClass('btn-remove').removeClass('btn-success').addClass('btn-danger').html('<span class="glyphicon glyphicon-minus"></span>');


    }).on('click', '.btn-remove', function (e) {
        var deleted = $(this).parents('.entry:first').find(':selected');
        console.log(deleted.val())
        $(this).parents('.entry').nextAll().map(function () {
            $(this).children('select').first().append(deleted);
            $(this).find('.btn-add').show();

        });
        $(this).parents('.entry:first').remove();
        e.preventDefault();
        return false;
    });
    $('.feed').submit(function (e) {
        e.preventDefault();
        var empty = $(this).find('input').filter(function () {
            console.log($(this).val());
            return $(this).val().length == 0;
        });
        if (empty.length == 0) {
            $.ajaxSetup({
                header: $('meta[name="_token"]').attr('content')
            });
            $.ajax({

                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {

                }
            });
            $('#create-ticket-from-feed-modal').modal('toggle');
        } else {
            empty.css('background', '#D43F3A');
        }
    });
});