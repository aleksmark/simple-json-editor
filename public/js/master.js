var editorContainer = $('#jsoneditor').get(0);

var editor = new JSONEditor(editorContainer, {});

$('.btn-game').click(function() {
    $('.btn-game').removeClass('list-group-item-info');
    $(this).addClass('list-group-item-info');

    $(editorContainer).show();
    $('#btn-save').show();

    editor.set(JSON.parse($(this).val()));
});

$('#btn-save').click(function() {
    alert('Save ' + JSON.stringify(editor.get()));
});
