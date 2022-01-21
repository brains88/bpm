(function ($) {

	'use strict';

    $('.user-cancel-subscription').on('click', function() {
        handleAjax({that: $(this), button: 'cancel-subscription-button', spinner: 'cancel-subscription-spinner'});    
    });

    $('.user-activate-subscription').on('click', function() {
        handleAjax({that: $(this), button: 'activate-subscription-button', spinner: 'activate-subscription-spinner'});    
    });

})(jQuery);