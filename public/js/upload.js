
function upload(button, input, loader, preview) {
	button.click(function(event) {
        if (confirm('Change Image?')) {
            console.log(input, preview, loader);
            var id = $(this).attr('data-id');
            var input = $('.'+input+id);
            var loader = $('.'+loader+id);

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
                        var imagePreview = $('.'+preview+id);
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
