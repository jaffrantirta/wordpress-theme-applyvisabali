/**
 * Apply Visa Bali - Custom JavaScript
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        // Smooth Scrolling for Anchor Links
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 800);
                    return false;
                }
            }
        });

        // Navbar Background Change on Scroll
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.navbar').addClass('shadow-lg');
            } else {
                $('.navbar').removeClass('shadow-lg');
            }
        });

        // Initialize Bootstrap Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Initialize Bootstrap Popovers
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });

        // Carousel Auto-play Configuration
        var heroCarousel = document.getElementById('heroCarousel');
        if (heroCarousel) {
            var carousel = new bootstrap.Carousel(heroCarousel, {
                interval: 5000,
                wrap: true,
                keyboard: true,
                pause: 'hover'
            });
        }

        // Add animation to elements when they come into view
        function animateOnScroll() {
            $('.card, .why-us-item').each(function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();

                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('animate-fade-in');
                }
            });
        }

        // Run animation on scroll
        $(window).on('scroll', function() {
            animateOnScroll();
        });

        // Run animation on page load
        animateOnScroll();

        // Form Validation Enhancement
        $('form').on('submit', function(e) {
            var form = $(this);
            if (form[0].checkValidity() === false) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.addClass('was-validated');
        });

        // WhatsApp Button Tooltip
        $('.whatsapp-float a').attr('data-bs-toggle', 'tooltip');
        $('.whatsapp-float a').attr('data-bs-placement', 'left');
        $('.whatsapp-float a').attr('title', 'Chat with us on WhatsApp');

        // Active Menu Item
        var url = window.location.href;
        $('.navbar-nav .nav-link').each(function() {
            if (this.href === url) {
                $(this).closest('li').addClass('active');
            }
        });

        // Mobile Menu Close on Click
        $('.navbar-nav .nav-link').on('click', function() {
            if ($(window).width() < 992) {
                $('.navbar-collapse').collapse('hide');
            }
        });

        // Back to Top Button (Optional)
        var backToTop = $('<a>', {
            id: 'back-to-top',
            href: '#',
            class: 'btn btn-primary position-fixed',
            css: {
                'bottom': '100px',
                'right': '30px',
                'display': 'none',
                'z-index': '999',
                'border-radius': '50%',
                'width': '50px',
                'height': '50px',
                'padding': '0',
                'line-height': '50px',
                'text-align': 'center'
            },
            html: '<i class="bi bi-arrow-up"></i>'
        });

        $('body').append(backToTop);

        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });

        $('#back-to-top').click(function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 600);
        });

        // Lazy Loading for Images (Optional Enhancement)
        if ('IntersectionObserver' in window) {
            let lazyImages = document.querySelectorAll('img[loading="lazy"]');
            let imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        let image = entry.target;
                        image.src = image.dataset.src || image.src;
                        image.classList.add('loaded');
                        imageObserver.unobserve(image);
                    }
                });
            });

            lazyImages.forEach(function(image) {
                imageObserver.observe(image);
            });
        }

        // Contact Form AJAX Submission (Optional Enhancement)
        $('.contact-form').on('submit', function(e) {
            var form = $(this);
            var submitBtn = form.find('button[type="submit"]');
            var originalText = submitBtn.html();

            if (form[0].checkValidity() !== false) {
                submitBtn.prop('disabled', true);
                submitBtn.html('<span class="spinner-border spinner-border-sm me-2"></span>Sending...');

                // You can add AJAX submission here
                // For now, let the form submit normally
                setTimeout(function() {
                    submitBtn.prop('disabled', false);
                    submitBtn.html(originalText);
                }, 2000);
            }
        });

        // Category Filter Active State
        $('.category-filter .btn').on('click', function() {
            $('.category-filter .btn').removeClass('active');
            $(this).addClass('active');
        });

        // Image Hover Effect for Service Cards
        $('.service-card').hover(
            function() {
                $(this).find('.card-img-top').css('transform', 'scale(1.05)');
            },
            function() {
                $(this).find('.card-img-top').css('transform', 'scale(1)');
            }
        );

        // Add transition to images
        $('.card-img-top').css('transition', 'transform 0.3s ease');

    });

    // Page Load Animation
    $(window).on('load', function() {
        $('body').addClass('loaded');
    });

})(jQuery);
