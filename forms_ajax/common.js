$(document).ready(function() {

	$("#form1").submit(function() {
		$.ajax({
			type: "POST",
			url: "/forms_ajax/form1.php",
			data: $(this).serialize()
		}).done(function() {
			$(this).find("input").val("");
			$(".modal3").toggleClass('open');
			$(".modal2").toggleClass('open');
			$("#popup-thank").toggleClass('open');
			
			$("#form1").trigger("reset");
		});
		return false;
	});
	
});

