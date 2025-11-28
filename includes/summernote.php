<link href="node_modules\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet">
<script src="..\node_modules\jquery\dist\jquery.min.js"></script>
<script src="..\node_modules\bootstrap\dist\js\bootstrap.min.js"></script>

<!-- include summernote css/js - Bootstrap 5 compatible -->
<link href="..\assets\summernote\summernote-bs5.min.css" rel="stylesheet">
<script src="..\assets\summernote\summernote-bs5.min.js"></script>

<script>
// Initialize all Summernote editors with proper toolbar
function initSummernotes() {
    console.log('Initializing Summernote editors...');
    console.log('$.summernote exists:', typeof $.summernote !== 'undefined');
    
    const summernoteConfig = {
        height: 300,
        minHeight: 200,
        maxHeight: 500,
        focus: true,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview', 'undo', 'redo']]
        ],
        callbacks: {
            onImageUpload: function(files) {
                for (let i = 0; i < files.length; i++) {
                    // Call uploadImage if it's defined on the page, otherwise handle generically
                    if (typeof uploadImage !== 'undefined') {
                        uploadImage(files[i], $(this));
                    }
                }
            }
        }
    };

    // Initialize all textareas with summernote class
    if ($('.summernote').length) {
        console.log('Found ' + $('.summernote').length + ' summernote class elements');
        $('.summernote').each(function() {
            if (!$(this).hasClass('note-editor')) {
                console.log('Initializing class-based editor');
                $(this).summernote(summernoteConfig);
            }
        });
    }

    // Initialize specific ID-based editors
    ['#article-editor', '#achievement-editor', '#event-editor', '#history', '#hymm'].forEach(function(id) {
        if ($(id).length && !$(id).hasClass('note-editor')) {
            console.log('Initializing ID-based editor: ' + id);
            $(id).summernote(summernoteConfig);
        }
    });
    
    console.log('Summernote initialization complete');
}

// Wait for DOM and Summernote library to be ready
$(document).ready(function() {
    console.log('DOM ready, checking for Summernote...');
    if (typeof $.summernote !== 'undefined') {
        console.log('Summernote library loaded, initializing...');
        initSummernotes();
    } else {
        console.warn('Summernote not loaded, retrying in 500ms...');
        // Try again after a delay if Summernote isn't loaded yet
        setTimeout(function() {
            if (typeof $.summernote !== 'undefined') {
                console.log('Summernote now available, initializing...');
                initSummernotes();
            } else {
                console.error('Summernote library failed to load after retry');
            }
        }, 500);
    }
});
</script>