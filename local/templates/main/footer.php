	</div>
</div>

<div class="overlay">
	<div class="overlay2"></div>
	<div class="modal2">
		<div id="popup-thank" class="popup popup-thank">
		<div class="popup-in">
			<img class="popup__close" src="/forms_ajax/close.png">
			<p class="popup__title"> Спасибо </p>
			<p class="popup__desc"> Мы свяжемся с вами в течение дня.</span>
			</p>
		</div>
		</div>
	</div>
	<div class="modal3">
		<div id="popup-form" class="popup popup-form">
		<div class="popup-in">
			<div class="popup__close"></div>
		
			<h3>Обратный звонок</h3>
			<?$APPLICATION->IncludeComponent(
				"bitrix:form.result.new",
				"myt",
				Array(
					"WEB_FORM_ID" => "6",
					"SUCCESS_URL" => "",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_SHADOW" => "N", // затемнять область
					"AJAX_OPTION_JUMP" => "Y", // скроллить страницу до компонента
					"AJAX_OPTION_STYLE" => "Y", // подключать стили
					"AJAX_OPTION_HISTORY" => "N",
					"USE_EXTENDED_ERRORS" => "Y",
					"LIST_URL" => "", 
					"EDIT_URL" => "",
					"SEF_MODE" => "N",
				),
			);?>
		</div>
		</div>
	</div>
	<div class="modal4">
		<div id="popup-form" class="popup popup-form">
		<div class="popup-in">
			<div class="popup__close"></div>
		
			<h3>Оставить заявку</h3>
			<?$APPLICATION->IncludeComponent(
				"bitrix:form.result.new",
				"myt",
				Array(
					"WEB_FORM_ID" => "10",
					"SUCCESS_URL" => "",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_SHADOW" => "N", // затемнять область
					"AJAX_OPTION_JUMP" => "Y", // скроллить страницу до компонента
					"AJAX_OPTION_STYLE" => "Y", // подключать стили
					"AJAX_OPTION_HISTORY" => "N",
					"USE_EXTENDED_ERRORS" => "Y",
					"LIST_URL" => "", 
					"EDIT_URL" => "",
					"SEF_MODE" => "N",
				),
			);?>
		</div>
		</div>
	</div>
	<div class="modal5">
		<div id="popup-form" class="popup popup-form">
		<div class="popup-in">
			<div class="popup__close"></div>
		
			<h3>Заявка на просмотр</h3>
			<?$APPLICATION->IncludeComponent(
				"bitrix:form.result.new",
				"myt",
				Array(
					"WEB_FORM_ID" => "11",
					"SUCCESS_URL" => "",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_SHADOW" => "N", // затемнять область
					"AJAX_OPTION_JUMP" => "Y", // скроллить страницу до компонента
					"AJAX_OPTION_STYLE" => "Y", // подключать стили
					"AJAX_OPTION_HISTORY" => "N",
					"USE_EXTENDED_ERRORS" => "Y",
					"LIST_URL" => "", 
					"EDIT_URL" => "",
					"SEF_MODE" => "N",
				),
			);?>
		</div>
		</div>
	</div>
	<div class="modal6">
		<div id="popup-form" class="popup popup-form">
		<div class="popup-in">
			<div class="popup__close"></div>
		
			<h3>Предложить цену</h3>
			<?$APPLICATION->IncludeComponent(
				"bitrix:form.result.new",
				"myt",
				Array(
					"WEB_FORM_ID" => "12",
					"SUCCESS_URL" => "",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_SHADOW" => "N", // затемнять область
					"AJAX_OPTION_JUMP" => "Y", // скроллить страницу до компонента
					"AJAX_OPTION_STYLE" => "Y", // подключать стили
					"AJAX_OPTION_HISTORY" => "N",
					"USE_EXTENDED_ERRORS" => "Y",
					"LIST_URL" => "", 
					"EDIT_URL" => "",
					"SEF_MODE" => "N",
				),
			);?>
		</div>
		</div>
	</div>
</div>
<script src="/forms_ajax/common.js"></script>

<script type="text/javascript">
  $(".popup__close").click(function(e) {
    e.preventDefault();
    $(".popup-thank").not(this).removeClass('open');
    $(".modal3").not(this).removeClass('open');
    $(".modal4").not(this).removeClass('open');
    $(".modal5").not(this).removeClass('open');
    $(".modal6").not(this).removeClass('open');
    $(".modal2").not(this).removeClass('open');
    $(".overlay").not(this).removeClass('open');
  })
  $(".overlay2").click(function(e) {
    e.preventDefault();
    $(".popup-thank").not(this).removeClass('open');
    $(".modal3").not(this).removeClass('open');
    $(".modal4").not(this).removeClass('open');
    $(".modal5").not(this).removeClass('open');
    $(".modal6").not(this).removeClass('open');
    $(".modal2").not(this).removeClass('open');
    $(".overlay").removeClass('open');
  })
  $(".sidebar_btn .btn_yellow").click(function(e) {
    e.preventDefault();
    console.log('dsdasd');
    $(".modal3").addClass('open');
    $(".popup-form").addClass('open');
    $(".overlay").addClass('open');
  })
  $(".object_general_side--button .btn-my-price").click(function(e) {
    e.preventDefault();
    $(".modal6").addClass('open');
    $(".popup-form").addClass('open');
    $(".overlay").addClass('open');
  })
  $(".object_general_side--button .btn_yellow").click(function(e) {
    e.preventDefault();
    $(".modal5").addClass('open');
    $(".popup-form").addClass('open');
    $(".overlay").addClass('open');
  })
  $(".price_control_btn .btn_yellow, .help_safety_wrapper .item_total_btn .btn_yellow, .fp_top_stock--btn a").click(function(e) {
    e.preventDefault();
    $(".modal4").addClass('open');
    $(".popup-form").addClass('open');
    $(".overlay").addClass('open');
  })
    $(".contacts_info_bottom--callback a").click(function(e) {
    e.preventDefault();
    $(".modal3").addClass('open');
    $(".popup-form").addClass('open');
    $(".overlay").addClass('open');
  })
  $(".primary-btn").click(function(e) {
    e.preventDefault();
    $(".modal3").addClass('open');
    $(".popup-form").addClass('open');
    $(".overlay").addClass('open');
  })
  $(".contacts_info_bottom--request .btn_green").click(function(e) {
    e.preventDefault();
    $(".modal4").addClass('open');
    $(".popup-form").addClass('open');
    $(".overlay").addClass('open');
  })
  $(".primary-btn3").click(function(e) {
    e.preventDefault();
    $(".modal5").addClass('open');
    $(".popup-form").addClass('open');
    $(".overlay").addClass('open');
  })



</script>
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/slick.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.overlayScrollbars.min.js"></script>
<?/*<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>*/?>
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/select2.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/main.js"></script>


</body>
</html>
