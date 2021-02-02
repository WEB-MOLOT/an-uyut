$('.js-range-how1, .js-range-how12, .js-range-how3').change(function () {

	var range_val_1 = $('.js-range-how1').val(),
		range_val_2 = $('.js-range-how2').val(),
		range_val_3 = $('.js-range-how3').val(),
		delimiter = /(?=\B(?:\d{3})+(?!\d))/g;


	$('.j-filter_row').each(function () {

		if (parseInt(range_val_1) > parseInt(range_val_2)) {
			var rate = $(this).find('.j-rate').children('span').text().replace(',', '.'),
				clear_sum = range_val_1 - range_val_2,
				overpay = clear_sum * rate / 100 * range_val_3,
				full_sum = clear_sum + overpay,
				month = range_val_3 * 12,
				month_sum = Math.round(full_sum / month);

			$(this).find('.j-result').children('span').text(String(month_sum).replace(delimiter, ' '));
			console.log(month_sum)
		} else {
			$(this).find('.j-result').children('span').text('0');
		}

	});


});