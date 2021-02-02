<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Такой страницы не существует");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<? $APPLICATION->SetTitle("404 Такой страницы не существует");?>


<div class="page__404">
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
            
            <div class="page404_error_info">
						<div class="page404_error_ontitle">Ошибка</div>
						<div class="page404_error_title">404</div>
						<div class="page404_error_desc">Если вы искали какой-либо объект недвижимости, вероятнее всего он уже не актуален, посмотрите <a href="/search/">актуальные объекты в каталоге</a></div>
					</div>
                    
                    <div class="page404_error_buttons_wrapper">
						<div class="page404_error_buttons">
							<div class="row row_page404 d_flex f_wrap">
								<div class="col col-2">
									<div class="item d_flex a_items_center j_content_between">
										<div class="item_desc">Наши услуги можно посмотреть тут - </div>
										<div class="item_btn">
											<a href="/uslugi/" type="submit" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">УСЛУГИ</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</a>
										</div>
									</div>
								</div>
								<div class="col col-2">
									<div class="item d_flex a_items_center j_content_between">
										<div class="item_desc">Как нас найти - в разделе контакты</div>
										<div class="item_btn">
											<a href="/kontakty/" type="submit" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">КОНТАКТЫ</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
            
        </div>
    </div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>