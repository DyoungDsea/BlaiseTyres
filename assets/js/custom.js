$(document).ready(function () {
    'use strict';
    
    /*---------------------------------------------------------
    Top bar 
    ---------------------------------------------------------*/
    $('.selector').on('click', function (e) {
        e.stopPropagation();
        $(this).siblings().children('.selector-dropdown').slideUp();
        $(this).children('.selector-dropdown').slideToggle();
    });
    
    $(document).on('click', function () {
        $('.selector-dropdown').slideUp();
    });
    
    /*==========================================================
		Navigation
	==========================================================*/
    function subToggle() {
        if($(window).width() > 991) {
            $('.dropdown').on('mouseover', function () {
                $(this).stop(true, true).addClass('open');
            }).on('mouseout', function () {
                $(this).stop(true, true).removeClass('open');
            });
        }
        
        if($(window).width() < 768) {
            $('#top-menu').css('display', 'none');
            $('#top-nav .selected').on('click', function (e) {
                e.stopPropagation();
                $(this).siblings('#top-menu').slideToggle(); 
            });
            
            $('.mega-menu .menu-items').css('display', 'none');
            $('.menu-title a').on('click', function (e) {
                e.preventDefault;
                $('.mega-menu .menu-items').slideUp();
                $(this).siblings('.menu-items').slideToggle();
            });
        } else {
            $('#top-menu').css('display', 'block');
            $('.mega-menu .menu-items').css('display', 'block');
        }
    }
    
    subToggle();
    
    /*==========================================================
		Sidebar Navigation
	==========================================================*/
    $('.grower').on('click', function () {
        $(this).siblings('.sub-menu').stop().slideToggle();
        $(this).toggleClass('opened');
    });
    
    /*---------------------------------------------------------
    Header Slider
    ---------------------------------------------------------*/
    $("#header-slider").owlCarousel({
        items: 1,
        loop: true,
        // lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 2000
    });

        // var owl = $(".owl-carousel");
        // owl.owlCarousel({
        //     loop: true,
        //     items: 3,
        //     autoplay: true,
        //     autoPlaySpeed: 5000,
        //     autoPlayTimeout: 5000,
        //     autoplayHoverPause: true
        // });
    

        // var owl = $('.owl-carousel');
        // owl.owlCarousel({
        //     items:1,
        //     loop:true,
        //     margin:10,
        //     autoplay:true,
        //     autoplayTimeout:1000,
        //     autoplayHoverPause:true
        // });
        // $('.play').on('click',function(){
        //     owl.trigger('play.owl.autoplay',[1000])
        // })
        // $('.stop').on('click',function(){
        //     owl.trigger('stop.owl.autoplay')
        // })
    
    /*---------------------------------------------------------
    Testimonial Slider
    ---------------------------------------------------------*/
    $("#testimonial-carousel").owlCarousel({
        responsive: {
            0 : {
                items: 1,
                slideBy: 1
            },
            768 : {
                items: 2,
                slideBy: 2
            }
        },
        margin: 230,
        loop: true,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplaySpeed: 2000
    });
    
    /*---------------------------------------------------------
    Ecommerce filter
    ---------------------------------------------------------*/
    $('.view-mode').on('click', function (e) {
        e.preventDefault();
        $('.view-mode').removeClass('active');
        $(this).addClass('active');
        $('#product-wrap').removeClass();
        $('#product-wrap').addClass($(this).data('mode'));
    });
    
    $('.input-rule select').on('change', function () {
        $(this).siblings('.input-style').text($(this).children('option:selected').text());
    });
    
    $('.input-rule input[type=checkbox]').on('change', function () {
        if ($(this).is(':checked')) {
            $(this).parent().addClass('selected');
        } else {
            $(this).parent().removeClass('selected');
        }
    });
    
    $('.input-rule input[type=radio]').on('change', function () {
        if ($(this).is(':checked')) {
            $(this).parent().siblings().removeClass('selected');
            $(this).parent().addClass('selected');
        }
    });
    
    $('input[name=color]').on('click', function () {
        $(this).toggleClass('on');
    });
    
    $('input[name=color_order]').on('click', function () {
        $('input[name=color_order]').removeClass('on');
        $(this).addClass('on');
        $('#color_order_input').val($(this).val());
    });
    
    $('.ui-ranger').each(function () {
        var slideDiv = $(this);
        $(this).slider({
            range: true,
            min: slideDiv.data('min'),
            max: slideDiv.data('max'),
            step: 0.01,
            values: [slideDiv.data('min'), slideDiv.data('max')],
            slide: function (event, ui) {
                $(this).siblings('input').val('$' + ui.values[0] + ' - $' + ui.values[1]);
            }
        });
        $(this).siblings('input').val("$" + $(this).slider("values", 0) + ".00 - $" + $(this).slider("values", 1) + ".00");
    });
    
    $(window).on('resize orientationchange', function () {
        subToggle(); 
    });

});