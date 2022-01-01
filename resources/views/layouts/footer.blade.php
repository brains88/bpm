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
        {{-- Uploader images --}}
        <script src="/js/upload.js"></script>
        {{-- Sagreit --}}
        {{-- <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=61a5e6cb1bd25500123c9634&product=inline-share-buttons" async="async"></script> --}}
        {{-- Chartjs --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- Chart loading script --}}
        <script src="js/charts.js"></script>
        {{-- Visitors Chart loading script --}}
        <script src="js/charts/visitors.js"></script>
        <!-- Summernote -->
        <script src="/summernote/summernote-lite.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            var description = $('#description');
            if (description) {
                description.summernote({
                    tabsize: 4,
                    height: 500
                });
            }

            <?php if(!empty($allBlogs)): ?>
                <?php foreach($allBlogs as $blog): ?>

                    <?php $id = empty($blog->id) ? 0 : $blog->id; ?>
                    var description = $('.blog-description-<?= $id; ?>');
                    if (description) {
                        description.summernote({
                            tabsize: 4,
                            height: 300
                        });
                    }

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

            <?php if(!empty($property)): ?>
                <?php $total = 3; ?>
                <?php for($key = 0; $key <= $total; $key++): ?>
                    <?php $imageid = $property->images[$key]->id ?? 'create-'.$key; ?>
                    var button = $('.add-other-property-image-<?= $imageid; ?>');

                    if (button) {
                    button.click(function(event) {
                        if (confirm('Change Image?')) {
                            var id = $(this).attr('data-id');
                            var input = $('.other-property-image-input-'+id);
                            var loader = $('.other-property-image-loader-'+id);

                            input.trigger('click');
                            input.change(function(event) {
                                loader.removeClass('d-none').fadeIn();
                                var files = event.target.files;
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
                                        var imagePreview = $('.other-property-image-preview-'+id);
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
                                    alert('Network error. Try again.');
                                    // window.location.reload()
                                });
                            });
                        }
                    });
                }

                <?php endfor; ?>

                var button = $('.add-main-property-image-<?= $property->id; ?>');
                if (button) {
                    button.click(function(event) {
                        if (confirm('Change Image?')) {
                            var id = $(this).attr('data-id');
                            var input = $('.main-property-image-input-'+id);
                            var loader = $('.main-property-image-loader-'+id);

                            input.trigger('click');
                            input.change(function(event) {
                                loader.removeClass('d-none').fadeIn();
                                var files = event.target.files;
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
                                        var imagePreview = $('.main-property-image-preview-'+id);
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
            <?php endif; ?>
        </script>
    </body>
</html>