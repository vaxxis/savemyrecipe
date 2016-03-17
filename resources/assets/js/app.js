$(document).ready(function(){
    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-purple',
        radioClass: 'iradio_flat-purple'
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
            ['misc1', ['link']],
            ['misc2', ['undo', 'redo']],
            ['misc3', ['fullscreen', 'codeview']],
            ['misc4', ['help']]
        ]
    });

    // enable bootstrap tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
    });

    // ask confirm on recipe delete
    $('a.btn-ask-delete-confirm').on('click', function(event) {

        var $link = $(this);
        event.preventDefault();

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this recipe!",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Close",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                window.location = $link.attr('href');
                $link.addClass('disabled');
            } 
        });

    });
});
