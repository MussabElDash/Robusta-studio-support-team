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