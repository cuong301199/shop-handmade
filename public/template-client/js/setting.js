(function($) {
    
	'use strict';

	/*======================================================
		WOW Initialize
	======================================================*/
	
    new WOW().init();
    
    /*======================================================
		Owl Carousel
	======================================================*/
	
	$('.owl-slider').owlCarousel({
		items: 1,
		loop: true,
		autoplay: true,
		nav: true,
		dots: false,
		navText: false
	});
	
	// Pref add class active to 1st thumbnail via js
	$('.thumbnail').eq(0).addClass('active');
	
	// When slider autoplay or drag is true 
	$('.owl-slider').on('changed.owl.carousel', function(event) {
		$('.thumbnail').removeClass('active');
		var sliders = 4;
		var currentItem = event.item.index - 2;
		if(currentItem >= sliders) {
			currentItem = 0;
		}
		$('.thumbnail').eq(currentItem).addClass('active');
	});
	
	// When thumbnail is clicked
	$('.thumbnail a').on("click", function(event){
		event.preventDefault();
		$('.thumbnail').removeClass('active');
		var index = $('.thumbnail a').index(this);
		$('.thumbnail').eq(index).addClass('active');
		$('.owl-slider').trigger('to.owl.carousel', [index, 300, true]);
	});
	
	/*======================================================
		Related Product Carousel
	======================================================*/

	$('.related-products-slider').owlCarousel({
		items: 4,
		loop: true,
		autoplay: true,
		nav: true,
		margin: 30,
		dots: false,
		navText: false,
		responsive: {
			0: {
				items: 1,
			},
			480: {
				items: 2,
			},
			768: {
				items: 3,
			},
			1200: {
				items: 4,
			}
		}
	});

	$(".thumbs").owlCarousel({
		items: 1,
		dots: false,
	});
	
	$('.prev').on("click",function(){
		$(this).parent().siblings('.thumbs, .single-quotation').trigger('prev.owl.carousel');
	});

	$('.next').on("click",function(){
		$(this).parent().siblings('.thumbs, .single-quotation').trigger('next.owl.carousel');
	});
	
	/*======================================================
		Client Carousel
	======================================================*/

    $(".client-carousel").owlCarousel({
        items: 5,
        dots: false,
        nav: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
            },
            480: {
                items: 3,
            },
            768: {
                items: 4,
            },
            1200: {
                items: 5,
            }
        }
    });
	
	/*======================================================
		Blog Carousel
	======================================================*/
	
	$('.quotation-blog-post').owlCarousel({
		items: 1,
		autoplay: true,
		nav: true,
		loop: true
	});
	
	/*======================================================
		Latest Item Carousel
	======================================================*/

    function custom_OwlCarousel(id) {
        $(id).owlCarousel({
            items: 4,
            pagination: false,
            margin: 30,
            dots: false,
            loop: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                480: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1200: {
                    items: 4,
                }
            }
        });

        $(id).addClass('owl-carousel');
		
		$('.trendify-prev').on("click",function(){
			$(id).trigger('prev.owl.carousel');
		});
		
        $('.trendify-next').on("click",function(){
            $(id).trigger('next.owl.carousel');
        });
    }

	$('.latest-items .trendify-tab-title ul li a').on("click",function(e) {

		var id = $(this).attr('href');

		var ids = $(".latest-items .trendify-tab-title ul a").map(function() {
			return $(this).attr('href');
		}).get();

		jQuery.each(ids, function(index, value) {
			var removeid = this;
			if (id != removeid) {
				$(removeid).removeClass('owl-carousel');
			}
		});

		custom_OwlCarousel(id);
		
	});
	
	/*======================================================
		Latest Item Carousel
	======================================================*/

	$('.zoom').magnificPopup({
		disableOn: 700,
		type: 'image',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});

    custom_OwlCarousel($('.latest-items .trendify-tab-title ul li:first-child a').attr('href'));

	/*======================================================
		Price Range
	======================================================*/
	
	$( "#slider-range" ).slider({
		range: true,
		min: 10,
		max: 500,
		values: [ 80, 196 ],
		slide: function( event, ui ) {
			$( ".minamount" ).val( '$ ' + ui.values[ 0 ] );
			$( ".maxamount" ).val( '$ ' + ui.values[ 1 ] );
		}
	});
		
	$( ".minamount" ).val( '$ ' + $( "#slider-range" ).slider( "values", 0 ));	
	$( ".maxamount" ).val( '$ ' + $( "#slider-range" ).slider( "values", 1 ));
		
	$.fn.spinner = function() {
		this.each(function() {
			var el = $(this);

			// add elements
			el.wrap('<span class="spinner"></span>');     
			el.before('<span class="sub">-</span>');
			el.after('<span class="add">+</span>');

			// substract
			el.parent().on('click', '.sub', function () {
				if (el.val() > parseInt(el.attr('min'),10))
					el.val( function(i, oldval) { return --oldval; });
			});

			// increment
			el.parent().on('click', '.add', function () {
				if (el.val() < parseInt(el.attr('max'),10))
					el.val( function(i, oldval) { return ++oldval; });
			});
		});
	};
	
	/*======================================================
		Direction Hover
	======================================================*/

	$('.boxed-content-container').directionalHover({
		overlay: "dh-overlay",
		easing: "linear"
	});
	
	/*======================================================
		Venobox
	======================================================*/
	
	$('.venobox').venobox({
		numeratio: true,
		infinigall: true 
	});
    
    /*======================================================
		Revolution Slider
	======================================================*/
	
	$('.slider_one').revolution({
		delay:5000,
		startwidth:1170,
		startheight:675,
		hideThumbs:10,
		fullWidth:"on",
		forceFullWidth:"on",
		touchenabled:"on",
		swipe_velocity:"0.7",
		swipe_max_touches:"1",
		swipe_min_touches:"1",
		drag_block_vertical:"false",

		navigationType:"bullet",
		navigationArrows:"solo",

		navigationStyle:"round",


		navigationHAlign:"left",
		navigationVAlign:"bottom",
		navigationHOffset:150,
		navigationVOffset:30,

		soloArrowLeftHalign:"left",
		soloArrowLeftValign:"bottom",
		soloArrowLeftHOffset:150,
		soloArrowLeftVOffset:60,

		soloArrowRightHalign:"left",
		soloArrowRightValign:"bottom",
		soloArrowRightHOffset:180,
		soloArrowRightVOffset:60
	});
    
	$('.slider_two').revolution({
		delay:5000,
		startwidth:1170,
		startheight:675,
		hideThumbs:10,
		fullWidth:"on",
		forceFullWidth:"on",
		touchenabled:"on",
		swipe_velocity:"0.7",
		swipe_max_touches:"1",
		swipe_min_touches:"1",
		drag_block_vertical:"false",

		navigationType:"bullet",
		navigationArrows:"solo",

		navigationStyle:"round",


		navigationHAlign:"right",
		navigationVAlign:"center",

		soloArrowLeftHalign:"left",
		soloArrowLeftValign:"bottom",
		soloArrowLeftHOffset:50,
		soloArrowLeftVOffset:25,

		soloArrowRightHalign:"left",
		soloArrowRightValign:"bottom",
		soloArrowRightHOffset:80,
		soloArrowRightVOffset:25
	}); 

})(jQuery);