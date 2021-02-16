Number.prototype.format = function(n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = this.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};
$(document).ready(function() {
	function formatMoney(number, decPlaces, decSep, thouSep) {
decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
decSep = typeof decSep === "undefined" ? "." : decSep;
thouSep = typeof thouSep === "undefined" ? "," : thouSep;
var sign = number < 0 ? "-" : "";
var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
var j = (j = i.length) > 3 ? j % 3 : 0;

return sign +
	(j ? i.substr(0, j) + thouSep : "") +
	i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
	(decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
}
	$('.tabs_changer ul li').on('click', function() {
		if($(this).find('span').length===0) {
			var curDataItem = $(this).attr('data-item');
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

	function beautySelect() {
		const selectCustom = document.querySelector('.select_custom');
		if (selectCustom != null) {
			$('.select_custom').select2({
				minimumResultsForSearch: -1
			});
		}

		if($(".custom-select").length){
			$(".custom-select").customSelect({
				search: true
			});
		}
	}
	beautySelect();

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
					var meas = '';
					if($(this).parent().find('.mortgage_calculator_field--range_field').attr('id') == 'js__field_3') {
						meas = ' лет';
					} else {
						meas = ' ₽';
					}
					var v = parseInt($(this).slider("values", 1));
					var curText = v.format(0, 3, " ", ",") + meas;
					$(this).parent().find('.mortgage_calculator_field--range_field').text(curText);
				},
				change: function() {
					var meas = '';
					if($(this).parent().find('.mortgage_calculator_field--range_field').attr('id') == 'js__field_3') {
						meas = ' лет';
					} else {
						meas = ' ₽';
					}
					var v = parseInt($(this).slider("values", 1));
					var curText = v.format(0, 3, " ", ",") + meas;
					$(this).parent().find('.mortgage_calculator_field--range_field').text(curText);

					$.post( "/ajax.php", {
						total_sum : parseInt($('#js__field_1').text().replace(/\s+/g, '').trim()),
						first_sum :parseInt($('#js__field_2').text().replace(/\s+/g, '').trim()),
						years :parseInt($('#js__field_3').text().replace(/\s+/g, '').trim())
					}).done(function( response ) {
				

						$('.mortgage_calculator_items tbody').html(response)
					});
				},
				slide: function() {
					var meas = '';
					if($(this).parent().find('.mortgage_calculator_field--range_field').attr('id') == 'js__field_3') {
						meas = ' лет';
					} else {
						meas = ' ₽';
					}
					var v = parseInt($(this).slider("values", 1));
					var curText = v.format(0, 3, " ", ",") + meas;
					$(this).parent().find('.mortgage_calculator_field--range_field').text(curText);
				},
				stop: function() {
					var meas = '';
					if($(this).parent().find('.mortgage_calculator_field--range_field').attr('id') == 'js__field_3') {
						meas = ' лет';
					} else {
						meas = ' ₽';
					}
					var v = parseInt($(this).slider("values", 1));
					var curText = v.format(0, 3, " ", ",") + meas;
					$(this).parent().find('.mortgage_calculator_field--range_field').text(curText);
				}
			});
		});
	}
	function initRange(){
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
					var curText = '<input type="text" class="catalog_filters_field--range_field_left" value="'+rangePrefix+$(this).slider("values", 0).toLocaleString()+ rangeSufix+'">' + '<input type="text" class="catalog_filters_field--range_field_right" value="'+rangePrefix2 + $(this).slider("values", 1).toLocaleString() + rangeSufix+'">';
					$(this).parent().find('.catalog_filters_field--range_field').html(curText);
				},
				change: function() {
					$("#"+$(this).data("min-id")).val($(this).slider("values", 0));
					$("#"+$(this).data("max-id")).val($(this).slider("values", 1));
					$("#"+$(this).data("min-id")).trigger( "change" );
					$("#"+$(this).data("max-id")).trigger( "change" );
					var curText = '<input type="text" class="catalog_filters_field--range_field_left" value="'+rangePrefix+$(this).slider("values", 0).toLocaleString()+ rangeSufix+'">' + '<input type="text" class="catalog_filters_field--range_field_right" value="'+rangePrefix2 + $(this).slider("values", 1).toLocaleString() + rangeSufix+'">';
					$(this).parent().find('.catalog_filters_field--range_field').html(curText);
				},
				slide: function() {
					var curText = '<input type="text" class="catalog_filters_field--range_field_left" value="'+rangePrefix+$(this).slider("values", 0).toLocaleString()+ rangeSufix+'">' + '<input type="text" class="catalog_filters_field--range_field_right" value="'+rangePrefix2 + $(this).slider("values", 1).toLocaleString() + rangeSufix+'">';
					$(this).parent().find('.catalog_filters_field--range_field').html(curText);
				},
				stop: function() {
					var curText = '<input type="text" class="catalog_filters_field--range_field_left" value="'+rangePrefix+$(this).slider("values", 0).toLocaleString()+ rangeSufix+'">' + '<input type="text" class="catalog_filters_field--range_field_right" value="'+rangePrefix2 + $(this).slider("values", 1).toLocaleString() + rangeSufix+'">';
					$(this).parent().find('.catalog_filters_field--range_field').html(curText);
				}
			});
		});
		$(document).on("change",".catalog_filters_field--range_field input",function() {
			var slider = $(this).parent().next('.catalog_filters_field--range');
			var inputs = $(this).parent().find("input");
			var values = [];
			inputs.each(function(){
				var value = parseInt($(this).val().replace(/\D+/g, ""));
				values.push(value);
			})
			slider.slider("option",{values:values});
		})
	}
	const catalogRange = document.querySelector('.catalog_filters_field--range');
	if(catalogRange != null) {
		initRange();
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
		var cl = '';
		if($(this).hasClass('btn_green_transparent') === true || $(this).hasClass('btn_green') === true) {
			$('.contacts_info_button a').removeClass('btn_green').addClass('btn_green_transparent');
			$(this).addClass('btn_green').removeClass('btn_green_transparent');
		} else {
			$('.contacts_info_button a').removeClass('btn_yellow').addClass('btn_yellow_transparent');
			$(this).addClass('btn_yellow').removeClass('btn_yellow_transparent');
		}
		return false;
	});
	
	$(".wus_field input[name='form_text_4'], .wus_field input[name='form_text_22'], .wus_field input[name='form_text_38'], .wus_field input[name='form_text_43'], .wus_field input[name='form_text_26'], .object_general_manager--form input[name='form_text_12']").mask("+7(999) 999-99-99");

	//перезагрузка фильтра взависимости от типа недвижки
	$(document).on("change","#getFilter",function(){
		var sectionId = $(this).val();
		var main="";
		if(document.location.pathname==="/"){
			main="&main=y";
		}
		$.ajax({
			url:"/ajax/get-filter.php?get=y&sectionId="+sectionId+main,
			method:"get",
			cache: false,
			success:function(data){
				$("#filterBlock").html(data);
				initRange();
				beautySelect();
			},
			error:function(err){
				console.log(err);
			}
		})
	});

	$(document).on("click",".filter_tabs li",function(){
		if($(this).hasClass("active"))return false;
		var main="";
		if(document.location.pathname==="/"){
			main="&main=y";
		}
		var that = $(this);
		var url=$(this).data("href")+main;
		if(url.length) {
			$.ajax({
				url: url,
				method: "get",
				cache: false,
				success: function (data) {
					$("#filterBlock").html(data);
					initRange();
					beautySelect();
					$(".filter_tabs li.active").removeClass("active");
					that.addClass("active");
				}
			})
		}
	})

	$(document).on("keyup",".row.row_catalog_filters_fp .item .item-field .pseudo",function(){
		var txt = $(this).val().toLowerCase();
		var url = $("#filterUrl").val();
		var that = $(this);
		var id = $(this).attr("id");
		if(txt.length>=2) {
			$.ajax({
				url: url + "?get_address=y",
				method: "get",
				cache: false,
				success: function (data) {
					var list = $(data).find("#"+id).find(".list-item");
					var str = "";
					list.each(function () {
						var item = $(this);
						if (item.text().toLowerCase().indexOf(txt)>=0) {
							str+=item[0].outerHTML;
						}
					})
					if(str.length>0){
						if(that.parent().find(".list").length){
							that.parent().find(".list").html(str);
						}else {
							that.parent().append('<div class="list">' + str + '</div>');
						}
					}else{
						that.parent().find(".list").remove();
					}
				},
				error: function (err) {
					console.log(err);
				}
			})
		}else{
			$(".row.row_catalog_filters_fp .item .item-field .list .list-item").remove();
			$(this).prev().val("").attr("name","").trigger( "change" );
		}
	})

	$(document).on("click",".row.row_catalog_filters_fp .item .item-field .list .list-item",function(){
		var name = $(this).data("name");
		var value = $(this).data("value");
		var trueValue = $(this).text();
		var input = $(this).parents(".item-field").find("input[type='hidden']");
		var trueInput = $(this).parents(".item-field").find("input[type='text']");
		input.attr('name',name).val(value);
		trueInput.val(trueValue);
		$(this).parent().remove();
		input.trigger( "change" );
	})
});
