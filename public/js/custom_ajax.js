$('[name="btn-delete"]').click(function (event) {
    var alias = $(this).data("alias");
    if (!alias) {
        var message = "Вы действительно хотите удалить данный элемент?"
    }else {
        var message = "Удалить " + alias + "?";
    }

    if (confirm(message)) {
        runAjax(event, this);
    } else {
        event.preventDefault();
        return false;
    }
});

function runAjax(event, target) {
    event.preventDefault();
    var targetUrl = $(target).attr("href");
    $.ajax({
        url: targetUrl,
        type: 'POST',
        beforeSend: function(request) {
            return request.setRequestHeader("X-CSRF-Token", $("meta[name='token']").attr('content'));
        }
    }).done(function () {
        location.reload(true);
    }).fail(function (data) {
        console.log(data.responseJSON.result);
    });
}