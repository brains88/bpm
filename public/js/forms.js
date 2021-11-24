(function ($) {

	'use strict';

    $('.individual-signup-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'individual-signup-button', spinner: 'individual-signup-spinner', message: 'individual-signup-message'});
    });

})(jQuery);
