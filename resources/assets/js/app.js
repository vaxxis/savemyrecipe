$(document).ready(function(){
    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });

    // enable wysiwyg editor
    $('.wysiwyg').summernote({
        placeholder: 'Write here...',
        dialogsFade: true,
        height: 250,
        disableDragAndDrop: true,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'strikethrough']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['misc', ['clear']],
            ['misc1', ['link']],
            ['misc2', ['undo', 'redo']],
            ['misc3', ['fullscreen', 'codeview']],
            ['misc4', ['help']]
        ]
    });

    // enable bootstrap tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
});