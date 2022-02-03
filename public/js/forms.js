(function ($) {

	'use strict';

    $('.resend-token-link-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'resend-token-link-button', spinner: 'resend-token-link-spinner', message: 'resend-token-link-message'});
    });

    $('.verify-phone-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'verify-phone-button', spinner: 'verify-phone-spinner', message: 'verify-phone-message'});
    });

    $('.renew-subscription-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'renew-subscription-button', spinner: 'renew-subscription-spinner', message: 'renew-subscription-message'});
    });

    $('.promote-property-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'promote-property-button', spinner: 'promote-property-spinner', message: 'promote-property-message'});
    });

    $('.membership-subscription-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'membership-subscription-button', spinner: 'membership-subscription-spinner', message: 'membership-subscription-message'});
    });

    $('.buy-credit-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'buy-credit-button', spinner: 'buy-credit-spinner', message: 'buy-credit-message'});
    });

    $('.add-category-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'add-category-button', spinner: 'add-category-spinner', message: 'add-category-message'});
    });

    $('.edit-category-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'edit-category-button', spinner: 'edit-category-spinner', message: 'edit-category-message'});
    });

    $('.add-subcategory-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'add-subcategory-button', spinner: 'add-subcategory-spinner', message: 'add-subcategory-message'});
    });

    $('.edit-subcategory-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'edit-subcategory-button', spinner: 'edit-subcategory-spinner', message: 'edit-subcategory-message'});
    });

    $('.add-blog-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'add-blog-button', spinner: 'add-blog-spinner', message: 'add-blog-message'});
    });

    $('.edit-blog-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'edit-blog-button', spinner: 'edit-blog-spinner', message: 'edit-blog-message'});
    });

    $('.add-property-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'add-property-button', spinner: 'add-property-spinner', message: 'add-property-message'});
    });

    $('.edit-property-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'edit-property-button', spinner: 'edit-property-spinner', message: 'edit-property-message'});
    });

    $('.add-skill-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'add-skill-button', spinner: 'add-skill-spinner', message: 'add-skill-message'});
    });

    $('.edit-skill-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'edit-skill-button', spinner: 'edit-skill-spinner', message: 'edit-skill-message'});
    });

    $('.add-plan-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'add-plan-button', spinner: 'add-plan-spinner', message: 'add-plan-message'});
    });

    $('.edit-plan-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'edit-plan-button', spinner: 'edit-plan-spinner', message: 'edit-plan-message'});
    });

    $('.change-property-action-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'change-property-action-button', spinner: 'change-property-action-spinner', message: 'change-property-action-message'});
    });

    $('.add-material-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'add-material-button', spinner: 'add-material-spinner', message: 'add-material-message'});
    });

    $('.edit-material-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'edit-material-button', spinner: 'edit-material-spinner', message: 'edit-material-message'});
    });

    $('.login-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'login-button', spinner: 'login-spinner', message: 'login-message'});
    });

    $('.signup-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'signup-button', spinner: 'signup-spinner', message: 'signup-message'});
    });

})(jQuery);
