<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><div class="page__contacts">
			<div class="main_inside_wrapper">
				<div class="container">
					<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"main", 
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1",
		"COMPONENT_TEMPLATE" => "main"
	),
	false
);?>
					<h1 class="title_page"><?$APPLICATION->ShowTitle(false)?></h1>
					<div class="contacts_cols d_flex f_wrap">
						<div class="contacts_left_col">
							<div id="map" class="contacts_map"></div>
						</div>
						<div class="contacts_right_col">
							<div class="contacts_info_wrapper">
								<div class="contacts_info_title">Офис в г. Жуковском</div>
								<div class="contacts_info_items">
									<div class="contacts_info_item contacts_info_item--address">
										<div class="contacts_info_item--title">Адрес:</div>
										<div class="contacts_info_item--desc">г. Жуковский, ул. Гагарина 19/2А, ТЦ "Марс", 2-ой этаж</div>
									</div>
									<div class="contacts_info_item contacts_info_item--phone">
										<div class="contacts_info_item--title">Телефон:</div>
										<div class="contacts_info_item--desc">
											<span>8 (495) <strong>150-33-28</strong></span>
											<span>8 (915) <strong>124-74-74</strong></span>
											<span>8 (925) <strong>205-61-23</strong></span>
										</div>
									</div>
									<div class="contacts_info_item contacts_info_item--email">
										<div class="contacts_info_item--title">E-mail:</div>
										<div class="contacts_info_item--desc">89252056123@mail.ru</div>
									</div>
									<div class="contacts_info_item contacts_info_item--worktime">
										<div class="contacts_info_item--desc">Будни с 09.00 до 18.00 <br>Суббота с 10.00 до 16.00</div>
									</div>
								</div>
								<div class="contacts_info_buttons_wrapper">
									<div class="contacts_info_buttons_title">Как добраться:</div>
									<div class="contacts_info_buttons">
										<div class="contacts_info_button active" data-item="1">
											<a href="#" class="btn btn_green btn--bold d_flex a_items_center j_content_center"><span>на автомобиле</span></a>
										</div>
										<div class="contacts_info_button" data-item="2">
											<a href="#" class="btn btn_green_transparent btn--bold d_flex a_items_center j_content_center"><span>на общественном транспорте</span></a>
										</div>
										<div class="contacts_info_button" data-item="3">
											<a href="#" class="btn btn_green_transparent btn--bold d_flex a_items_center j_content_center"><span>на такси</span></a>
										</div>
									</div>
								</div>
								<div class="contacts_info_address_wrapper">
									<div class="contacts_info_address active" data-item="1">
										<p>По адресу: Московская обл., г. Жуковский, ул. Гагарина, д. 19/2А</p>
										<p>Координаты gps: 55.604381, 38.102618</p>
									</div>
									<div class="contacts_info_address" data-item="2">
										<p>По адресу: Московская обл., г. Жуковский, ул. Гагарина, д. 19/2А</p>
										<p>Координаты gps: 55.604381, 38.102618</p>
									</div>
									<div class="contacts_info_address" data-item="3">
										<p>По адресу: Московская обл., г. Жуковский, ул. Гагарина, д. 19/2А</p>
										<p>Координаты gps: 55.604381, 38.102618</p>
									</div>
								</div>
								<div class="contacts_info_bottom d_flex a_items_center f_wrap">
									<div class="contacts_info_bottom--callback">
										<a href="#" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
											<em class="btn_txt">Обратный звонок</em>
											<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
										</a>
									</div>
									<div class="contacts_info_bottom--request">
										<a href="#" class="btn btn_green btn--bold d_flex a_items_center j_content_center"><span>Оставить заявку</span></a>
									</div>
									<div class="contacts_info_bottom--socials d_flex">
										<a href="#" class="contacts_info_bottom--social contacts_info_bottom--social_vk d_flex j_content_center a_items_center">
											<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M6.25397 0.00175853C5.55647 -0.00524764 4.96285 0.00175853 4.62894 0.155884C4.40634 0.257467 4.23567 0.488657 4.33955 0.499165C4.46941 0.51668 4.76251 0.576228 4.91833 0.775891C5.11868 1.0316 5.11126 1.60957 5.11126 1.60957C5.11126 1.60957 5.22256 3.19987 4.84042 3.39953C4.577 3.53615 4.21712 3.25942 3.438 1.99489C3.04101 1.34335 2.74049 0.625268 2.74049 0.625268C2.74049 0.625268 2.68484 0.492159 2.58096 0.422102C2.45482 0.334531 2.28044 0.306508 2.28044 0.306508L0.421671 0.317016C0.421671 0.317016 0.143412 0.327525 0.0432399 0.439616C-0.0495138 0.544702 0.0358187 0.751371 0.0358187 0.751371C0.0358187 0.751371 1.49018 3.96349 3.13748 5.58182C4.64749 7.06703 6.36157 6.96895 6.36157 6.96895H7.14069C7.14069 6.96895 7.37443 6.94443 7.49315 6.82533C7.60446 6.71324 7.60075 6.50307 7.60075 6.50307C7.60075 6.50307 7.58591 5.51876 8.06822 5.37164C8.54683 5.23153 9.15529 6.32442 9.80456 6.74477C10.298 7.06353 10.6727 6.99347 10.6727 6.99347L12.4091 6.96895C12.4091 6.96895 13.3143 6.91641 12.884 6.24035C12.8506 6.18781 12.6354 5.74295 11.5965 4.8322C10.5058 3.87943 10.6505 4.03355 11.9638 2.3837C12.7615 1.37838 13.0806 0.765382 12.9804 0.499165C12.884 0.250462 12.2978 0.317016 12.2978 0.317016L10.3425 0.327525C10.3425 0.327525 10.1978 0.31001 10.0902 0.369559C9.98635 0.429107 9.91957 0.569222 9.91957 0.569222C9.91957 0.569222 9.60792 1.34686 9.1961 2.0089C8.32793 3.40304 7.97547 3.4801 7.83449 3.39253C7.50428 3.18936 7.58591 2.57986 7.58591 2.14901C7.58591 0.793405 7.8048 0.232947 7.16295 0.0858272C6.95148 0.0367867 6.79565 0.00526116 6.25397 0.00175853Z" fill="white"/>
											</svg>
										</a>
										<a href="#" class="contacts_info_bottom--social contacts_info_bottom--social_odn d_flex j_content_center a_items_center">
											<svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M4.49913 2.33398C5.28493 2.33398 5.9241 2.93555 5.9241 3.67513C5.9241 4.41211 5.28493 5.01367 4.49913 5.01367C3.71332 5.01367 3.07416 4.41211 3.07416 3.67513C3.07416 2.93555 3.71332 2.33398 4.49913 2.33398ZM4.49913 7.00586C6.45258 7.00586 8.03803 5.51367 8.03803 3.67513C8.03803 1.83659 6.45258 0.341797 4.49913 0.341797C2.54568 0.341797 0.957461 1.83659 0.957461 3.67513C0.957461 5.51107 2.54568 7.00586 4.49913 7.00586ZM5.89089 9.55273C6.59092 9.4043 7.26605 9.14388 7.88861 8.77409C8.35899 8.49544 8.5001 7.9095 8.20404 7.4668C7.90798 7.02409 7.28542 6.88867 6.81505 7.16992C5.40391 8.00325 3.59158 8.00325 2.18321 7.16992C1.71007 6.88867 1.08751 7.02409 0.791445 7.4668C0.495384 7.9095 0.636498 8.49544 1.10964 8.77409C1.72943 9.14388 2.40733 9.4043 3.10736 9.55273L1.18158 11.3652C0.788678 11.735 0.788679 12.3366 1.18435 12.7064C1.3808 12.8913 1.63813 12.985 1.89545 12.985C2.15277 12.985 2.41287 12.8913 2.60932 12.7064L4.49913 10.9277L6.39171 12.7064C6.78461 13.0762 7.421 13.0762 7.81667 12.7064C8.20958 12.3366 8.20958 11.735 7.81667 11.3652L5.89089 9.55273Z" fill="white"/>
											</svg>
										</a>
										<a href="#" class="contacts_info_bottom--social contacts_info_bottom--social_fb d_flex j_content_center a_items_center">
											<svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M7.75005 0.00270487L6.06426 0C4.17033 0 2.94639 1.25573 2.94639 3.19932V4.67442H1.2514C1.10494 4.67442 0.986328 4.79316 0.986328 4.93963V7.07688C0.986328 7.22335 1.10507 7.34196 1.2514 7.34196H2.94639V12.7349C2.94639 12.8814 3.065 13 3.21147 13H5.42294C5.56941 13 5.68802 12.8813 5.68802 12.7349V7.34196H7.66986C7.81632 7.34196 7.93493 7.22335 7.93493 7.07688L7.93574 4.93963C7.93574 4.8693 7.90775 4.80195 7.85811 4.75218C7.80848 4.70241 7.74086 4.67442 7.67053 4.67442H5.68802V3.42396C5.68802 2.82294 5.83124 2.51783 6.61416 2.51783L7.74978 2.51742C7.89611 2.51742 8.01472 2.39868 8.01472 2.25234V0.267782C8.01472 0.121584 7.89625 0.00297535 7.75005 0.00270487Z" fill="white"/>
											</svg>
										</a>
										<a href="#" class="contacts_info_bottom--social contacts_info_bottom--social_tg d_flex j_content_center a_items_center">
											<svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5.10097 6.59069L4.88593 9.38269C5.1936 9.38269 5.32685 9.26069 5.48664 9.11419L6.9291 7.84169L9.91801 9.86219C10.4662 10.1442 10.8524 9.99569 11.0003 9.39669L12.9622 0.910701L12.9627 0.910201C13.1366 0.162202 12.6697 -0.130297 12.1356 0.0532027L0.603513 4.1287C-0.183529 4.4107 -0.171612 4.8157 0.469721 4.9992L3.41801 5.84569L10.2663 1.8902C10.5886 1.6932 10.8816 1.8022 10.6406 1.9992L5.10097 6.59069Z" fill="white"/>
											</svg>
										</a>
										<a href="#" class="contacts_info_bottom--social contacts_info_bottom--social_inst d_flex j_content_center a_items_center">
											<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M4.09277 0.65625C2.20642 0.65625 0.65625 2.20435 0.65625 4.09277V8.90723C0.65625 10.7936 2.20435 12.3438 4.09277 12.3438H8.90723C10.7936 12.3438 12.3438 10.7957 12.3438 8.90723V4.09277C12.3438 2.20642 10.7957 0.65625 8.90723 0.65625H4.09277ZM4.09277 1.71875H8.90723C10.2208 1.71875 11.2813 2.77918 11.2813 4.09277V8.90723C11.2813 10.2208 10.2208 11.2812 8.90723 11.2812H4.09277C2.77918 11.2812 1.71875 10.2208 1.71875 8.90723V4.09277C1.71875 2.77918 2.77918 1.71875 4.09277 1.71875ZM9.6377 2.88086C9.37 2.88086 9.15625 3.0946 9.15625 3.3623C9.15625 3.63 9.37 3.84375 9.6377 3.84375C9.9054 3.84375 10.1191 3.63 10.1191 3.3623C10.1191 3.0946 9.9054 2.88086 9.6377 2.88086ZM6.5 3.3125C4.74646 3.3125 3.3125 4.74646 3.3125 6.5C3.3125 8.25354 4.74646 9.6875 6.5 9.6875C8.25354 9.6875 9.6875 8.25354 9.6875 6.5C9.6875 4.74646 8.25354 3.3125 6.5 3.3125ZM6.5 4.375C7.68079 4.375 8.625 5.31921 8.625 6.5C8.625 7.68079 7.68079 8.625 6.5 8.625C5.31921 8.625 4.375 7.68079 4.375 6.5C4.375 5.31921 5.31921 4.375 6.5 4.375Z" fill="white"/>
											</svg>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="price_control price_control--contacts">
						<div class="price_control_info">
							<div class="price_control_desc"><strong>Здравствуйте!</strong> Меня зовут Дмитрий Соколов, я руководитель отдела продаж в агентстве недвижимости "Уют". Моя цель, чтобы вы были довольны покупкой у нас на всех этапах. <br>Если это не так - напишите мне: <br><strong>ds@an-uyut.ru</strong></div>
						</div>
						<div class="price_control_image">
							<img src="/local/templates/main/img/bg_price_control.png" alt=""/>
						</div>
					</div>
                    
                    <?$APPLICATION->IncludeFile(
$APPLICATION->GetTemplatePath("include_areas/bottom_form.php"),
Array(),
Array("MODE"=>"html")
);?>
                    
                    
                    
                    </div>
                    
                    
                    <div style="display:none">
	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=abc601f5-b945-4864-a08f-5e7bbe2fee05" type="text/javascript"></script>
	<script type="text/javascript">
		
		
		ymaps.ready(function () {
			var myMap = new ymaps.Map('map', {
				center: [55.996850, 92.796438],
				zoom: 16,
				controls: ['zoomControl']
			}),
			MyIconContentLayout = ymaps.templateLayoutFactory.createClass('<div class="some-class">$[properties.iconContent]</div>'), 
				myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
				iconContent: '<div class="map__caption">г. Жуковский, Гагарина д.19/2А <br>Офис №9</div>',
			}, {
				iconLayout: 'default#imageWithContent',
				iconImageHref: '/local/templates/main/img/svg/icon_contacts_svg_marker.svg',
				iconImageSize: [54, 54],
				iconImageOffset: [-27, -54]
			});
			myMap.geoObjects.add(myPlacemark);
			myMap.behaviors.disable('scrollZoom');
		});
	</script>
                    </div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>