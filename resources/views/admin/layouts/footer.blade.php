<!-- Summernote -->
<script src="/summernote/summernote-lite.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var description = $('#blogDescription');
    if (description) {
        description.summernote({
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
                                    alert(response.info);
                                }
                            });

                            request.fail(function(response) {
                                loader.addClass('d-none').fadeOut();
                                alert('Network Error. Try Again');
                            });
                        });
                    }
                });
            }
        <?php endforeach; ?>
    <?php endif; ?>
</script>