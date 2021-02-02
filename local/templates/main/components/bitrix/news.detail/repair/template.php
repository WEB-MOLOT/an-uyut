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


<div class="page__repair">
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
                    
                    
                    
                    
                    <div class="why_liked">
							<div class="title_bk">Почему мы вам понравимся</div>
							<div class="why_liked_items">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:news.list", 
                                "repair_why", 
                                array(
                                    "DISPLAY_DATE" => "Y",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "Y",
                                    "AJAX_MODE" => "N",
                                    "IBLOCK_TYPE" => "repair",
                                    "IBLOCK_ID" => "8",
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
                                        1 => "",
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
                                    "COMPONENT_TEMPLATE" => "repair_why",
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
                       
                       
                       <div class="us_works">
							<div class="title_bk">Примеры наших работ</div>
							<div class="us_works_items">
                            	<?$APPLICATION->IncludeComponent(
                                    "bitrix:news.list", 
                                    "repair_examles", 
                                    array(
                                        "DISPLAY_DATE" => "Y",
                                        "DISPLAY_NAME" => "Y",
                                        "DISPLAY_PICTURE" => "Y",
                                        "DISPLAY_PREVIEW_TEXT" => "Y",
                                        "AJAX_MODE" => "N",
                                        "IBLOCK_TYPE" => "repair",
                                        "IBLOCK_ID" => "9",
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
                                            0 => "price",
                                            1 => "price_m2",
                                            2 => "green_text",
                                            3 => "area",
                                            4 => "floor",
                                            5 => "addr",
                                            6 => "works",
                                            7 => "link",
                                            8 => "",
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
                                        "COMPONENT_TEMPLATE" => "repair_examles",
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
                      
                      
                      <div class="steps_rent">
							<div class="title_bk">Как мы работаем</div>
							<div class="steps_rent_items">
                            	<?$APPLICATION->IncludeComponent(
                                    "bitrix:news.list", 
                                    "repair_work", 
                                    array(
                                        "DISPLAY_DATE" => "Y",
                                        "DISPLAY_NAME" => "Y",
                                        "DISPLAY_PICTURE" => "Y",
                                        "DISPLAY_PREVIEW_TEXT" => "Y",
                                        "AJAX_MODE" => "N",
                                        "IBLOCK_TYPE" => "repair",
                                        "IBLOCK_ID" => "10",
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
                                        "COMPONENT_TEMPLATE" => "repair_work",
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
                       
                       <div class="faq">
							<div class="title_bk">Самые важные вопросы и ответы на них</div>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:news.list", 
                                "repair_faq", 
                                array(
                                    "DISPLAY_DATE" => "Y",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "Y",
                                    "AJAX_MODE" => "N",
                                    "IBLOCK_TYPE" => "repair",
                                    "IBLOCK_ID" => "11",
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
                                        1 => "",
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
                                    "COMPONENT_TEMPLATE" => "repair_faq",
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
                    
                    
                     <div style="display:none">
                      	<script>
                        	$('.breadcrumbs').appendTo('.bread__block')
                        </script>
                      </div>
                      
                      
                     <?$APPLICATION->IncludeFile(
$APPLICATION->GetTemplatePath("include_areas/bottom_form.php"),
Array(),
Array("MODE"=>"html")
);?>
                    
                    </div>
                 </div>
        
        
        
        
    </div>
</div><!--end page__repair-->

