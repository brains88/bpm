(function($) {

    'use strict';

    $('.hanburger-icon').on('click', function() {
        $('.navbar-menu').toggleClass('navbar-toggle');
        $('.hanburger-icon').toggleClass('slide');
    });

    var backendSidebar = $('.backend-sidebar');
    if (backendSidebar) {
        var backendNavigationMenuCloseIcon = $('.backend-navigation-menu-close-icon');
        var backendNavigationMenuIcon = $('.backend-navigation-menu-icon');
        if (backendNavigationMenuIcon) {
            backendNavigationMenuIcon.on('click', function() {
                backendSidebar.removeClass('d-none').addClass('backend-sidebar-toggle');
            });
        }

        if (backendNavigationMenuCloseIcon) {
            backendNavigationMenuCloseIcon.on('click', function() {
                backendSidebar.removeClass('backend-sidebar-toggle').addClass('d-none');
            });
        }
    }

    function getRandomRgba(a = 1) {
        var nummber = Math.round(0xffffff * Math.random());
        var r = nummber >> 16;
        var g = nummber >> 8 & 255;
        var b = nummber & 255;
        return 'rgba(' + r + ', ' + g + ', ' + b + ', ' + a ? a : 1 + ')';
    }

    var logoutLink = document.querySelector('.logout-link');
    if(logoutLink) {
        const timeout = (900000/3);// 900000 ms = 15minutes : Logout @ 5minutes of inactivity
        var idleTimer = null;
        $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function () {
            clearTimeout(idleTimer);
            idleTimer = setTimeout(function () {
                logoutLink.click();
            }, timeout);
        });

        $('body').trigger('mousemove');
    }

    $('.dropdown-menu').click(function (event) {
        event.stopPropagation();
    });

    var url = document.location.toString();
    if (url.match('#')) {
        var tabLink = url.split('#')[1];
        $(`.signup-tabs a[href="#${tabLink}"]`).tab('show');
        window.location.href = url;
    } 

    // Change hash for page-reload
    $('.signup-tabs a').on('shown', function (e) {
        window.location.hash = e.target.hash;
    });

    var collapsible = $('#properties-form-home-search');
    ($(window).width() <= 575.98) ? collapsible.collapse('hide') : collapsible.collapse('show');

})(jQuery);

function handleButton(button, spinner) {
    button.attr('disabled', false);
    spinner.addClass('d-none');
}

function handleErrors(errors) {
    $.each(errors, function(field, message) {
        var element = $('.'+field);
        var span = $('.'+field+'-error');
        element.addClass('is-invalid');
        span.html(message);
        element.focus(function() {
            element.removeClass('is-invalid');
            span.html('');
        });
    });
}

function handleForm(info = {}) {
    var form = info.form;
    var button = $('.'+info.button);
    var spinner = $('.'+info.spinner);
    var message = $('.'+info.message);
    button.attr('disabled', true);
    spinner.removeClass('d-none');
    message.hasClass('d-none') ? '' : message.fadeOut();

    $.ajax({
        method: form.attr('method'),
        url: form.attr('data-action'),
        data: form.serializeArray(),
        dataType: 'json',

        success: function(response) {
            if (response.status === 0) {
                if($.isEmptyObject(response.error)){
                    handleButton(button, spinner);
                    message.removeClass('d-none alert-success').addClass('alert-danger');
                    message.html(response.info).fadeIn();
                }else{
                    handleErrors(response.error);
                    handleButton(button, spinner);
                }
            }else if(response.status === 1) {
                handleButton(button, spinner);
                message.removeClass('d-none alert-danger').addClass('alert-success');
                message.html(response.info).fadeIn();
                console.log(response.redirect);
                return window.location.href = response.redirect;

            }else {
                handleButton(button, spinner);
                alert('Network error. Try again.');
            }
        },

        error: function() {
            handleButton(button, spinner);
            alert('Network error. Try again.');
        },
    });
}

function handleAjax(info = {}) {
    if (confirm('Very sure?')) {
        var button = $('.'+info.button);
        var spinner = $('.'+info.spinner);
        button.attr('disabled', true);
        spinner.removeClass('d-none');
        $.ajax({
            method: 'post',
            url: info.that.attr('data-url'),
            dataType: 'json',

            success: function(response) {
                if (response.status === 0) {
                    alert(response.info);
                    handleButton(button, spinner)
                }else if(response.status === 1) {
                    alert(response.info);
                    spinner.addClass('d-none');
                    return window.location.href = response.redirect;
                }else {
                    handleButton(button, spinner)
                    alert('Network error. Try again.');
                }
            },

            error: function() {
                handleButton(button, spinner)
                alert('Network error. Try again.');
            },
        });
    }
}

