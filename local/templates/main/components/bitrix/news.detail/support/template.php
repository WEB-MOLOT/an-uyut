<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>


<div class="page__transaction">
	<div class="main_inside_wrapper">
    	
        
        <div class="main_head" style="background-image: url(<?=$arResult["DETAIL_PICTURE"]["SRC"]?>);">
        	<div class="container">
            	<div class="bread__block"></div>
                <h1 class="title_page"><?=$arResult["NAME"]?></h1>
                <div class="mh_desc">
                	<?echo $arResult["DETAIL_TEXT"];?>
                </div>
            </div>
        </div>
        
        
        <div class="main_inside">
			<div class="container">
        	
            
            
            	<div class="general_risks">
							<div class="title_bk">Основные риски <br>при покупке жилья без помощи агентства</div>
							<div class="general_risks_items">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:news.list", 
                                "support_risks", 
                                array(
                                    "DISPLAY_DATE" => "Y",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "Y",
                                    "AJAX_MODE" => "N",
                                    "IBLOCK_TYPE" => "support",
                                    "IBLOCK_ID" => "26",
                                    "NEWS_COUNT" => "20",
                                    "SORT_BY1" => "SORT",
                                    "SORT_ORDER1" => "ASC",
                                    "SORT_BY2" => "ACTIVE_FROM",
                                    "SORT_ORDER2" => "DESC",
                                    "FILTER_NAME" => "",
                                    "FIELD_CODE" => array(
                                        0 => "",
                                        1 => "",
                                    ),
                                    "PROPERTY_CODE" => array(
                                        0 => "bg",
                                        1 => "icon",
                                        2 => "",
                                    ),
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "DISPLAY_PANEL" => "N",
                                    "SET_TITLE" => "N",
                                    "SET_STATUS_404" => "Y",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "3600",
                                    "CACHE_FILTER" => "N",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "DISPLAY_BOTTOM_PAGER" => "N",
                                    "PAGER_TITLE" => "Новости",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => "",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "AJAX_OPTION_SHADOW" => "Y",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "COMPONENT_TEMPLATE" => "support_risks",
                                    "CACHE_GROUPS" => "Y",
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "INCLUDE_SUBSECTIONS" => "N",
                                    "STRICT_SECTION_CHECK" => "N",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "SHOW_404" => "Y",
                                    "FILE_404" => ""
                                ),
                                false
                            );?>
                            
                            </div>
               </div>
               
               
               <? if(!empty($arResult['PROPERTIES']['y_ban']['VALUE'])){?>
               <div class="risks_refund">
							<div class="risks_refund_inside d_flex a_items_center f_wrap">
								<div class="risks_refund_icon d_flex a_items_center j_content_center">
									<img src="/local/templates/main/img/svg/icon_risk.svg" alt=""/>
								</div>
								<div class="risks_refund_info">
									<?=htmlspecialcharsBack($arResult["PROPERTIES"]["y_ban"]["VALUE"]["TEXT"])?>
								</div>
							</div>
						</div>
            <?}?>
            
            
            
            <div class="help_safety">
            	<? if(!empty($arResult['PROPERTIES']['subtitles']['VALUE'])){?>
            	<?=htmlspecialcharsBack($arResult["PROPERTIES"]["subtitles"]["VALUE"]["TEXT"])?>
                <?}?>
                
                
                <div class="help_safety_wrapper d_flex f_wrap">
								<div class="row row_hsw d_flex f_wrap">
									<div class="col col-75">
										<div class="help_safety_items">
                                        	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"support_help", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "support",
		"IBLOCK_ID" => "27",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "bg",
			1 => "icon",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DISPLAY_PANEL" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "support_help",
		"CACHE_GROUPS" => "Y",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "Y",
		"FILE_404" => ""
	),
	false
);?>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col col-25">
                                    	
                                        <div class="item_total d_flex j_content_center a_items_center f_wrap">
                                        	<div class="item_total_inside">
												<div class="item_total_icon d_flex a_items_center j_content_center">
													<img src="<? echo CFile::GetPath($arResult["PROPERTIES"]["icon"]["VALUE"]) ?>" alt=""/>
												</div>
												<div class="item_total_title">Стоимость <br>сопровождения сделки</div>
												<div class="item_total_price">от <?=$arResult['PROPERTIES']['price']['VALUE']?> ₽</div>
												<div class="item_total_btn">
													<a href="#" type="submit" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
														<em class="btn_txt">ОСТАВИТЬ ЗАЯВКУ</em>
														<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
													</a>
												</div>
											</div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                </div>
                
            </div>
            
            
            
            <div class="with_us_comfort">
							<div class="title_bk">С нами удобно!</div>
							<div class="with_us_comfort_items">
                            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"support_careful", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "support",
		"IBLOCK_ID" => "28",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "icon",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DISPLAY_PANEL" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "support_careful",
		"CACHE_GROUPS" => "Y",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "Y",
		"FILE_404" => ""
	),
	false
);?>
                            
                            </div>
                </div>
                
                
                <?$APPLICATION->IncludeFile(
                    $APPLICATION->GetTemplatePath("include_areas/bottom_form.php"),
                    Array(),
                    Array("MODE"=>"html")
                );?>
            
            
            
            
            </div>
        </div>
        
    </div>
</div><!--page__transaction-->


