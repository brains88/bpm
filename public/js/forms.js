(function ($) {

	'use strict';

    $('.individual-signup-form').submit(function(event){
        event.preventDefault();
        handleForm({form: $(this), button: 'individual-signup-button', spinner: 'individual-signup-spinner', message: 'individual-signup-message'});
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

})(jQuery);
