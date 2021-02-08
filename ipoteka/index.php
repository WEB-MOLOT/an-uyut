<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ипотека");
?><div class="page__mortgage">
			<div class="main_inside_wrapper">
				<div class="container">
					<div class="breadcrumbs">
						<a href="/">Главная</a>
						<span class="sep">/</span>
						<span>Ипотечное кредитование</span>
					</div>
					<h1 class="title_page">Ипотечное кредитование</h1>
					<div class="mortgage_desc">
						<div class="mortgage_desc--inside">
							<div class="mortgage_desc--title"><strong>Ипотека</strong> на самых выгодных условиях</div>
							<div class="mortgage_desc--desc">Мы работаем со всеми банками и готовы помочь одобрить вам ипотеку на самых выгодных условиях. Ниже вы можете рассчитать платежи <br>по вашему ипотечному кредиту.</div>
							<div class="mortgage_desc--counts d_flex j_content_between f_wrap">
								<div class="mortgage_desc--count">
									<div class="mortgage_desc--count_title">от 0%</div>
									<div class="mortgage_desc--count_desc">Первый взнос</div>
								</div>
								<div class="mortgage_desc--count">
									<div class="mortgage_desc--count_title">от 8.4%</div>
									<div class="mortgage_desc--count_desc">Процентная ставка</div>
								</div>
								<div class="mortgage_desc--count">
									<div class="mortgage_desc--count_title">от 7000 руб.</div>
									<div class="mortgage_desc--count_desc">Ежемесячный платеж</div>
								</div>
								<div class="mortgage_desc--count">
									<div class="mortgage_desc--count_title">до 30 лет</div>
									<div class="mortgage_desc--count_desc">Срок кредитования</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mortgage_calculator">
                        <?$APPLICATION->IncludeComponent("bitrix:news.list","calkulator",Array(
                                "DISPLAY_DATE" => "Y",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "Y",
                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                "AJAX_MODE" => "Y",
                                "IBLOCK_TYPE" => "news",
                                "IBLOCK_ID" => "33",
                                "NEWS_COUNT" => "100",
                                "SORT_BY1" => "ACTIVE_FROM",
                                "SORT_ORDER1" => "DESC",
                                "SORT_BY2" => "SORT",
                                "SORT_ORDER2" => "ASC",
                                "FILTER_NAME" => "",
                                "FIELD_CODE" => Array("ID"),
                                "PROPERTY_CODE" => Array("DESCRIPTION"),
                                "CHECK_DATES" => "Y",
                                "DETAIL_URL" => "",
                                "PREVIEW_TRUNCATE_LEN" => "",
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "SET_TITLE" => "Y",
                                "SET_BROWSER_TITLE" => "Y",
                                "SET_META_KEYWORDS" => "Y",
                                "SET_META_DESCRIPTION" => "Y",
                                "SET_LAST_MODIFIED" => "Y",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                                "ADD_SECTIONS_CHAIN" => "Y",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                                "PARENT_SECTION" => "",
                                "PARENT_SECTION_CODE" => "",
                                "INCLUDE_SUBSECTIONS" => "Y",
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "3600",
                                "CACHE_FILTER" => "Y",
                                "CACHE_GROUPS" => "Y",
                                "DISPLAY_TOP_PAGER" => "Y",
                                "DISPLAY_BOTTOM_PAGER" => "Y",
                                "PAGER_TITLE" => "Новости",
                                "PAGER_SHOW_ALWAYS" => "Y",
                                "PAGER_TEMPLATE" => "",
                                "PAGER_DESC_NUMBERING" => "Y",
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                "PAGER_SHOW_ALL" => "Y",
                                "PAGER_BASE_LINK_ENABLE" => "Y",
                                "SET_STATUS_404" => "Y",
                                "SHOW_404" => "Y",
                                "MESSAGE_404" => "",
                                "PAGER_BASE_LINK" => "",
                                "PAGER_PARAMS_NAME" => "arrPager",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "PRICE"=>4000000,
                                "TERMIN"=>'40',
                                "FIRST_PAY"=> 100000,
                                "PRICE_CHANGEABLE"=>"Y",
                            )
                        );?>
					</div>
					<div class="price_control price_control--mortgage_page">
						<div class="price_control_info">
							<div class="price_control_title">Чтобы приобрести понравившийся вам вариант в ипотеку, позвоните нам по телефону <span>8 495 150 33 28</span> или приходите в наш офис, мы обязательно решим ваш жилищный вопрос.</div>
						</div>
						<div class="price_control_image">
							<img src="/local/templates/main/img/bg_price_control.png" alt=""/>
						</div>
					</div>
					<div class="additional_articles">
						<div class="row row_additional_articles d_flex f_wrap">
							<div class="col col-2">
								<div class="item">
									<div class="item_image"><img src="/local/templates/main/img/temp/add_article_1.jpg" alt=""/></div>
									<div class="item_info">
										<div class="item_title">Сопровождение сделки</div>
										<div class="item_btn">
											<a href="/support/" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">Подробнее</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col col-2">
								<div class="item">
									<div class="item_image"><img src="/local/templates/main/img/temp/add_article_2.jpg" alt=""/></div>
									<div class="item_info">
										<div class="item_title">Подбор недвижимости</div>
										<div class="item_btn">
											<a href="/search/" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">Подробнее</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="want_use_services">
						<div class="wus_inside">
							<div class="wus_title">Отправьте заявку на <span>расчет ипотеки</span></div>
							<div class="wus_desc">Заполните форму и мы свяжемся с вами что бы ответить на все ваши вопросы.</div>
							<div class="wus_form">
								<form>
									<div class="row wus_fields d_flex a_items_center f_wrap">
										<div class="col col-3">
											<div class="wus_field">
												<input type="text" placeholder="Имя:"/>
											</div>
										</div>
										<div class="col col-3">
											<div class="wus_field">
												<input type="text" placeholder="Телефон:"/>
											</div>
										</div>
										<div class="col col-3">
											<div class="wus_field">
												<input type="text" placeholder="E-mail:"/>
											</div>
										</div>
									</div>
									<div class="wus_form_submit">
										<div class="wus_fs_btn">
											<button type="submit" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">Оставить заявку</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</button>
										</div>
										<div class="wus_fs_agree">
											<span class="agree_input_field">
												<span class="agree_input">
													<input type="checkbox" value=""/>
												</span>
												<span class="agree_txt">Даю согласие на обработку <a href="#">персональных данных</a></span>
											</span>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>