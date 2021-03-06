$(document).ready(function() {
	
	$('.tabs_changer ul li').on('click', function() {
		if(!$(this).find('span')) {
			var curDataItem = $(this).attr('data-item');
			console.log(curDataItem);
			$(this).parent().find('li').removeClass('active');
			$(this).addClass('active');
			$(this).parent().parent().siblings('.tabs_changer--items').children('.tabs_changer--item').removeClass('active');
			$(this).parent().parent().siblings('.tabs_changer--items').children('.tabs_changer--item').each(function () {
				if ($(this).attr('data-item') == curDataItem) {
					$(this).addClass('active');
				}
			});
		}
	});

	$('.catalog_items_tabs ul li').on('click', function() {
		var curDataItem = $(this).attr('data-item');
		console.log(curDataItem);
		$(this).parent().find('li').removeClass('active');
		$(this).addClass('active');
		$('.catalog_items .catalog_item').removeClass('active');
		$('.catalog_items .catalog_item').each(function() {
			if($(this).attr('data-item') == curDataItem) {
				$(this).addClass('active');
			}
		});
	});

	const selectCustom = document.querySelector('.select_custom');
	if(selectCustom != null) {
		$('.select_custom').select2({
		    minimumResultsForSearch: -1
		});
	}

	const montgagerage = document.querySelector('.mortgage_calculator_field');
	if(montgagerage != null) {
		$('.mortgage_calculator_field').each(function() {
			var rangeMin = parseInt($(this).find('.mortgage_calculator_field--range').attr('data-min'));
			var rangeMax = parseInt($(this).find('.mortgage_calculator_field--range').attr('data-max'));
			var rangeStart = parseInt($(this).find('.mortgage_calculator_field--range').attr('data-start'));
			$(this).find('.mortgage_calculator_field--range').slider({
				min: rangeMin,
				max: rangeMax,
				values: [rangeMin, rangeStart],
				range: true,
				create: function() {
					var curText = $(this).slider("values", 1) + ' ₽';
					$(this).parent().find('.mortgage_calculator_field--range_field').text(curText);
				},
				change: function() {
					var curText = $(this).slider("values", 1) + ' ₽';
					$(this).parent().find('.mortgage_calculator_field--range_field').text(curText);


					$.post( "/ajax.php", {
						total_sum : parseInt($('#js__field_1').text()),
						first_sum :parseInt($('#js__field_2').text()),
						years :parseInt($('#js__field_3').text())
					}).done(function( response ) {
				

						$('.mortgage_calculator_items tbody').html(response)
					});
				},
				slide: function() {
					var curText = $(this).slider("values", 1) + ' ₽';
					$(this).parent().find('.mortgage_calculator_field--range_field').text(curText);
				},
				stop: function() {
					var curText = $(this).slider("values", 1) + ' ₽';
					$(this).parent().find('.mortgage_calculator_field--range_field').text(curText);
				}
			});
		});
	}
	
	const catalogRange = document.querySelector('.catalog_filters_field--range');
	if(catalogRange != null) {
		$('.catalog_filters_field--range').each(function() {
			var rangePrefix = $(this).attr('data-prefix');
			var rangePrefix2 = $(this).attr('data-prefix2');
			var rangeSufix = $(this).attr('data-sufix');
			var rangeMin = parseInt($(this).attr('data-min'));
			var rangeMax = parseInt($(this).attr('data-max'));
			var rangeStart = parseInt($(this).attr('data-start'));
			var rangeEnd = parseInt($(this).attr('data-end'));
			if(rangePrefix != '') {
				rangePrefix = ' ' + rangePrefix + ' ';
			}
			if(rangePrefix2 != '') {
				rangePrefix2 = ' ' + rangePrefix2 + ' ';
			}
			if(rangeSufix != '') {
				rangeSufix = ' ' + rangeSufix;
			}
			$(this).slider({
				min: rangeMin,
				max: rangeMax,
				values: [rangeStart, rangeEnd],
				range: true,
				create: function() {
					var curText = '<span class="catalog_filters_field--range_field_left">' + rangePrefix + $(this).slider("values", 0) + rangeSufix + '</span>' + '<span class="catalog_filters_field--range_field_right">' + rangePrefix2 + $(this).slider("values", 1) + rangeSufix + '</span>';
					$(this).parent().find('.catalog_filters_field--range_field').html(curText);
				},
				change: function() {
					console.log($(this).slider("values", 1));
					var curText = $(this).slider("values", 1) + ' ₽';
					var curText = '<span class="catalog_filters_field--range_field_left">' + rangePrefix + $(this).slider("values", 0) + rangeSufix + '</span>' + '<span class="catalog_filters_field--range_field_right">' + rangePrefix2 + $(this).slider("values", 1) + rangeSufix + '</span>';
					$(this).parent().find('.catalog_filters_field--range_field').html(curText);
				},
				slide: function() {
					var curText = $(this).slider("values", 1) + ' ₽';
					var curText = '<span class="catalog_filters_field--range_field_left">' + rangePrefix + $(this).slider("values", 0) + rangeSufix + '</span>' + '<span class="catalog_filters_field--range_field_right">' + rangePrefix2 + $(this).slider("values", 1) + rangeSufix + '</span>';
					$(this).parent().find('.catalog_filters_field--range_field').html(curText);
				},
				stop: function() {
					var curText = $(this).slider("values", 1) + ' ₽';
					var curText = '<span class="catalog_filters_field--range_field_left">' + rangePrefix + $(this).slider("values", 0) + rangeSufix + '</span>' + '<span class="catalog_filters_field--range_field_right">' + rangePrefix2 + $(this).slider("values", 1) + rangeSufix + '</span>';
					$(this).parent().find('.catalog_filters_field--range_field').html(curText);
				}
			});
		});
	}
	
	const objectDescSlider = document.querySelector('.object_desc_wrapper');
	if(objectDescSlider != null) {
		$('.object_desc_wrapper').overlayScrollbars({
            className       : "os-theme-dark",
            sizeAutoCapable : true,
            paddingAbsolute : true,
            scrollbars : {
                clickScrolling : true
            }
        });
	}

	$('.main').overlayScrollbars({
        className       : "os-theme-dark",
        sizeAutoCapable : true,
        paddingAbsolute : true,
        scrollbars : {
            clickScrolling : true
        }
    });

    $('.sidebar_body').overlayScrollbars({
        className       : "os-theme-dark",
        sizeAutoCapable : true,
        paddingAbsolute : true,
        scrollbars : {
            clickScrolling : true
        }
    });

	$('.faq_item_title').on('click', function() {
		$(this).parent().toggleClass('active').find('.faq_item_desc').slideToggle();
	});

	$('.us_works_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		customPaging: function(slider, i) {
		  return '<span class="dot"></span>';
		},
	});

	$('.activity_slider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true,
		prevArrow: $('.activity_slider_wrapper .work_examples_slider_nav--arr_left'), 
		nextArrow: $('.activity_slider_wrapper .work_examples_slider_nav--arr_right'),
		dots: false,
		responsive: [
			{
			  breakpoint: 1615,
			  settings: {
				slidesToShow: 3
			  }
			},
			{
			  breakpoint: 1295,
			  settings: {
				slidesToShow: 2
			  }
			},
			{
			  breakpoint: 655,
			  settings: {
				slidesToShow: 1
			  }
			}
		]
	});

	$('.reviews_slider').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		arrows: true,
		prevArrow: $('.reviews_slider_wrapper .work_examples_slider_nav--arr_left'), 
		nextArrow: $('.reviews_slider_wrapper .work_examples_slider_nav--arr_right'),
		dots: false,
		responsive: [
			{
			  breakpoint: 655,
			  settings: {
				slidesToShow: 1
			  }
			}
		]
	});

	$('.work_examples_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		prevArrow: $('.work_examples_slider_nav .work_examples_slider_nav--arr_left'), 
		nextArrow: $('.work_examples_slider_nav .work_examples_slider_nav--arr_right'),
		asNavFor: $('.work_examples_slider_thumbnail'),
		dots: false
	});
	
	$('.work_examples_slider_thumbnail').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		arrows: false,
		asNavFor: $('.work_examples_slider'),
		focusOnSelect: true,
		dots: false,
		responsive: [
			{
			  breakpoint: 1468,
			  settings: {
				slidesToShow: 4
			  }
			},
			{
			  breakpoint: 888,
			  settings: {
				slidesToShow: 3
			  }
			},
			{
			  breakpoint: 508,
			  settings: {
				slidesToShow: 2
			  }
			}
		]
	});
	
	$('.object_general_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		prevArrow: $('.object_general_slider_nav .work_examples_slider_nav--arr_left'), 
		nextArrow: $('.object_general_slider_nav .work_examples_slider_nav--arr_right'),
		asNavFor: $('.object_general_slider_thumbnails'),
		dots: false
	});
	$('.object_general_slider_thumbnails').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true,
		prevArrow: $('.object_general_slider_thumbnails_nav .work_examples_slider_nav--arr_left'), 
		nextArrow: $('.object_general_slider_thumbnails_nav .work_examples_slider_nav--arr_right'),
		asNavFor: $('.object_general_slider'),
		focusOnSelect: true,
		dots: false,
		responsive: [
			{
			  breakpoint: 1686,
			  settings: {
				slidesToShow: 3
			  }
			},
			{
			  breakpoint: 888,
			  settings: {
				slidesToShow: 3
			  }
			},
			{
			  breakpoint: 508,
			  settings: {
				slidesToShow: 2
			  }
			}
		]
	});
	
	const similarSlider = document.querySelector('.object_similar_slider');
	if(similarSlider != null) {
		$('.object_similar_slider').each(function () {
			var curLeft = $(this).parent().parent().find('.work_examples_slider_nav--arr_left');
			var curRight = $(this).parent().parent().find('.work_examples_slider_nav--arr_right');
			$(this).slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: true,
				prevArrow: curLeft, 
				nextArrow: curRight,
				dots: false,
				responsive: [
					{
					  breakpoint: 1619,
					  settings: {
						slidesToShow: 2
					  }
					},
					{
					  breakpoint: 659,
					  settings: {
						slidesToShow: 1
					  }
					}
				]
			});
		});
	}

	$('.new_offers_tabs_inside ul li').on('click', function() {
		const curDataItem = $(this).attr('data-item');
		$(this).parent().find('li').removeClass('active');
		$(this).addClass('active');
		console.log(curDataItem);
		$('.new_offers_item').removeClass('active');
		$('.new_offers_item').each(function() {

			if($(this).attr('data-item') == curDataItem) {
				$(this).addClass('active');
			}
		});
	});
	
	$('.sidebar_menu_btn').on('click', function() {
		$('.overlay_sidebar').toggleClass('active');
		$(this).toggleClass('active');
		$(this).parents('.sidebar').toggleClass('active');
	});
	
	var overlay = $('#overlay');
	var open_modal = $('.open_modal');
	var close_modal = $('.modal_close, #overlay');
	var modal = $('.modal_window');
	
	open_modal.on('click', function(event) {
		event.preventDefault();
		$('.modal_window.active').animate({opacity: 0, top: 45 + "%"},300, function(){$(this).css('display','none');});
		var div = $(this).attr('href');
		$(div).addClass('active');
		overlay.fadeIn(400,
			function() {
				$(div)
					.css('display', 'block')
					.animate({opacity: 1, top: '50%', marginTop: "-" + ($(div).outerHeight()/2)}, 200);
			}
		);
	});
	close_modal.on('click', function() {
		modal
			.animate(
				{opacity: 0, top: 45+"%"}, 200,
				function() {
					$(this).css('display', 'none');
					overlay.fadeOut(400);
				}
			);
		$(modal).removeClass('active');
	});
	
// 	Кнопки блока "Как добраться"
	var contact_buttons = $('.contacts_info_buttons a');
	contact_buttons.click(function(e){
		var target = $(this).attr('href');
		$('.contacts_info_address').hide();
		$(target).show();
		console.log(target);
		$('.contacts_info_button a').removeClass('btn_yellow').addClass('btn_yellow_transparent');
		$(this).addClass('btn_yellow').removeClass('btn_yellow_transparent');
		return false;
	});
	
});