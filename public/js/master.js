var editorContainer = $('#jsoneditor').get(0);

var editor = new JSONEditor(editorContainer, {});

$('.btn-game').click(function() {
    $('.btn-game').removeClass('list-group-item-info active-game');
    $(this).addClass('list-group-item-info active-game');

    $(editorContainer).show();
    $('#btn-save').show();

    editor.set(JSON.parse($(this).val()));
});

$('#btn-save').click(function() {
    var id = $('.active-game').attr('game-id');

    var settings = JSON.stringify(editor.get());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: URL.gameUpdate.replace('/id/', '/' + id + '/'),
        type: 'POST',
        data: {
            settings: settings
        },
        success: function(expense) {
            $('.active-game').val(settings);

            successAlert('Game settings successfuly updated');
        },
        error: function(response) {
            response = JSON.parse(response.responseText);

            if (response.errors) {
                $.each(response.errors, function(key, error) {
                    errorAlert('Error. ' + error);
                });

                return;
            }

            errorAlert('Error. Something went wrong!!!');
        }
    });
});

// put bootstrap alert box with success message on the page
function successAlert(message) {
    var alert = '<div class="alert alert-success">' + message + '</div>';

    makeAlert(alert);
}

// put bootstrap alert box with error message on the page
function errorAlert(message) {
    var alert = '<div class="alert alert-danger">' + message + '</div>';

    makeAlert(alert);
}

// make an alert
function makeAlert(alert) {
    $('#main-wrapper').prepend(alert);

    alertSlideUpAndRemove($('.alert'));
}

// slide up alert div and remove it after
function alertSlideUpAndRemove(alert) {
    $(alert).fadeTo(2000, 500).slideUp(400, function(){
        $(alert).slideUp();

        $(alert).remove();
    });
}
