        {{-- Jquery JS --}}
        <script src="/jquery/jquery.min.js"></script>
        {{-- Pooper JS --}}
        <script src="/bootstrap/popper.min.js"></script>
        {{-- bootstrap JS --}}
        <script src="/bootstrap/bootstrap.min.js"></script>
        {{-- index JS --}}
        <script src="/js/index.js"></script>
        {{-- forms JS --}}
        <script src="/js/forms.js"></script>
        {{-- Sagreit --}}
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=61a5e6cb1bd25500123c9634&product=inline-share-buttons" async="async"></script>
        <!-- Summernote -->
        <script src="/summernote/summernote-lite.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            var blogDescription = $('#blogDescription');
            if (blogDescription) {
                blogDescription.summernote({
                    tabsize: 4,
                    height: 500
                });
            }

            <?php if(!empty($allBlogs)): ?>
                <?php foreach($allBlogs as $blog): ?>
                    <?php $id = empty($blog->id) ? 0 : $blog->id; ?>
                    var button = $('.add-blog-image-<?= $id; ?>');
                    if (button) {
                        button.click(function(event) {
                            if (confirm('Change Image?')) {
                                var id = $(this).attr('data-id');
                                var input = $('.blog-image-input-'+id);
                                var loader = $('.add-blog-image-loader-'+id);

                                input.trigger('click');
                                input.change(function(event) {
                                    loader.removeClass('d-none').fadeIn();
                                    var files = event.target.files
                                    var formData = new FormData();
                                    formData.append('image', files[0]);

                                    var request = $.ajax({
                                        method: 'post',
                                        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                                        url: input.attr('data-url'),
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        dataType: 'json'
                                    });

                                    request.done(function(response){
                                        if (response.status === 1) {
                                            var imagePreview = $('.blog-image-preview-'+id);
                                            imagePreview.file = files[0];    
                                            var reader = new FileReader();
                                            reader.onload = (function(picture) { 
                                                return (function(event) { 
                                                    picture.attr('src', event.target.result);
                                                    loader.addClass('d-none').fadeOut(); 
                                                });
                                            })(imagePreview);
                                            reader.readAsDataURL(files[0]);
                                        }else {
                                            loader.addClass('d-none').fadeOut();
                                            alert('You must upload a valid image and the size must be 10MB or less.');
                                        }
                                    });

                                    request.fail(function(response) {
                                        loader.addClass('d-none').fadeOut();
                                        alert('You must upload a valid image and the size must be 10MB or less.');
                                        // window.location.reload()
                                    });
                                });
                            }
                        });
                    }
                <?php endforeach; ?>
            <?php endif; ?>
        </script>
    </body>
</html>