<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

    <script>
      // Initialize CKEditor 5 with CKFinder configuration for Laravel File Manager
      ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}' // Laravel File Manager upload URL
                },
                toolbar: [
                    'heading', '|', 
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 
                    'imageUpload', 'mediaEmbed', 'undo', 'redo'
                ]
            })
            .then(editor => {
                console.log('CKEditor 5 berhasil diinisialisasi:', editor);
            })
            .catch(error => {
                console.error('Terjadi kesalahan saat inisialisasi CKEditor 5:', error);
            });
    </script>
