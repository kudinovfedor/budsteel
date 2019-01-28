(function ($) {
    "use strict";

    $(function () {
        console.info('The site developed by BRAIN WORKS digital agency');
        console.info('Сайт разработан маркетинговым агентством BRAIN WORKS');

        var html = $('html');
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

        if (isMobile) {
            html.addClass('is-mobile');
        }

        html.removeClass('no-js').addClass('js');

        scrollTop('.js-scroll-top');

        // stick footer
        var footerHeight = $('.footer').outerHeight() + 20;
        $('.page-wrapper').css('padding-bottom', footerHeight + 'px');
        // end stick footer

        // Hamburger Menu
        // hamburgerMenu('.js-menu', '.js-hamburger', '.js-menu-close');
        anotherHamburgerMenu('.js-menu', '.js-hamburger', '.js-menu-close');
        $(window).on("resize", function (e) {
            if (window.innerWidth >= 630) {
                removeAllStyles($(".js-menu"));
            }
        })
        // Buy one click
        var oneClick = $('.ordering-ru');
        if (oneClick.length) {
            oneClick.on('click', function () {
                $('[data-field-id="field13"]').val($('h1.page-name').text());
            });
        }
        // end buy one click

        // Buy one click
        var oneClick = $('.ordering-ua');
        if (oneClick.length) {
            oneClick.on('click', function () {
                $('[data-field-id="field13"]').val($('h1.page-name').text());
            });
        }
        // end buy one click

    });

    /**
     * Hamburger Menu
     *
     * @example
     * hamburgerMenu('.js-menu', '.js-hamburger', '.js-menu-close');
     * @author Fedor Kudinov <brothersrabbits@mail.ru>
     * @param {(string|Object)} menuElement - Selected menu
     * @param {(string|Object)} hamburgerElement - Trigger element for open/close menu
     * @param {(string|Object)} closeTrigger - Trigger element for close opened menu
     */
    function hamburgerMenu(menuElement, hamburgerElement, closeTrigger) {
        var menu = $(menuElement),
            close = $(closeTrigger),
            hamburger = $(hamburgerElement),
            menuAll = hamburger.add(menu);

        hamburger.add(close).on('click', function () {
            menu.toggleClass('is-active');
        });

        $(window).on('click', function (e) {
            if (!$(e.target).closest(menuAll).length) {
                menu.removeClass('is-active');
            }
        });
    }

    function anotherHamburgerMenu (menuElement, hamburgerElement, closeTrigger) {
        var Elements = {
            menu: $(menuElement),
            button: $(hamburgerElement),
            close: $(closeTrigger)
        }

        Elements.button.add(Elements.close).on('click', function (ev) {
            ev.preventDefault()
            ev.stopPropagation()
            Elements.menu.toggleClass('is-active');
        })
        var arrowOpener = function (parent) {
            return $("<button />")
                .addClass("menu-item-has-children-arrow")
                .html('<i class="fa fa-chevron-down"></i>')
                .click(function (ev) {
                    parent.children(".sub-menu").eq(0).slideToggle(300)
                    var i = $(this).find("i.fa")
                    if (i.hasClass("fa-chevron-down")) i.removeClass("fa-chevron-down").addClass("fa-chevron-up");
                    else i.removeClass("fa-chevron-up").addClass("fa-chevron-down");
                })
        }
        var items = Elements.menu.find('.menu-item-has-children, .sub-menu-item-has-children')
        for (var i = 0 ; i < items.length ; i++) {
            items.eq(i).append(arrowOpener(items.eq(i)))
        }
    }

    function removeAllStyles (elementParent) {
        elementParent.find(".sub-menu").removeAttr("style")
    }

    /**
     * Scroll Top
     *
     * @example
     * scrollTop('.js-scroll-top');
     * @author Fedor Kudinov <brothersrabbits@mail.ru>
     * @param {(string|Object)} element - selected element
     */
    function scrollTop(element) {
        var el = $(element);

        el.on('click touchend', function () {
            $('html, body').animate({scrollTop: 0}, 'slow');
            return false;
        });

        $(window).on('scroll', function () {
            var scrollPosition = $(this).scrollTop();
            if (scrollPosition > 200) {
                if (!el.hasClass('is-visible')) {
                    el.addClass('is-visible');
                }
            } else {
                el.removeClass('is-visible');
            }
        });
    }

})(jQuery);
