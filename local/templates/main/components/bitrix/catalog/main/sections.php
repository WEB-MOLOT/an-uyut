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


<div class="page__catalog">

<div class="main_inside_wrapper">
				<div class="main_catalog_head">
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


<h1 class="title_page">Каталог недвижимости</h1>
                        <?if(isset($arResult["VARIABLES"]["SECTION_ID"])){
                            $sectionId = $arResult["VARIABLES"]["SECTION_ID"];
                        }
                        else{
                            $sectionId = 59;
                        }
                        CModule::IncludeModule("iblock");
                        $res = CIBlockSection::GetNavChain(31,$sectionId);
                        if($arSection = $res->GetNext()){
                            $parentId = $arSection["ID"];
                            $parentLeftMargin = $arSection["LEFT_MARGIN"];
                            $parentRightMargin = $arSection["RIGHT_MARGIN"];
                        }
                        $arType = array();
                        $res = CIBlockSection::GetList(array("SORT"=>"ASC","ID"=>"ASC"),array("IBLOCK_ID"=>31,"UF_FILTER_SHOW"=>1,"LEFT_MARGIN"=>$parentLeftMargin,"RIGHT_MARGIN"=>$parentRightMargin),false,array("NAME","ID","SECTION_PAGE_URL","UF_ICON"));
                        while($arSection = $res->GetNext()){
                            $current = "N";
                            if($arSection["ID"]==$sectionId){$current="Y";$sectionLink=$arSection["SECTION_PAGE_URL"];}
                            $arType[$arSection["ID"]] = array("NAME"=>$arSection["NAME"],"CUR"=>$current,"ICON"=>CFile::GetPath($arSection["UF_ICON"]));
                        }
                        ?>
                        <div class="catalog_tabs filter_tabs">
                            <ul class="d_flex f_wrap">
                                <li class="active" data-href="/ajax/get-filter.php?get=y&sectionId=59">Купить</li>
                                <li class="" data-href="/ajax/get-filter.php?get=y&sectionId=64">Снять</li>
                                <li class=""><a href="/deal/">Продать</a></li>
                                <li class=""><a href="/rent/">Сдать</a></li>
                            </ul>
                        </div>

                        <?$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "object_filter", Array(
                            "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                            "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                            "CACHE_TYPE" => "A",	// Тип кеширования
                            "CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
                            "DISPLAY_ELEMENT_COUNT" => "N",	// Показывать количество
                            "FILTER_NAME" => "arrFilter_pf",	// Имя выходящего массива для фильтрации
                            "FILTER_VIEW_MODE" => "vertical",	// Вид отображения
                            "HIDE_NOT_AVAILABLE" => "N",	// Не отображать недоступные товары
                            "IBLOCK_ID" => "31",	// Инфоблок
                            "IBLOCK_TYPE" => "catalog",	// Тип инфоблока
                            "PAGER_PARAMS_NAME" => "arrPager",	// Имя массива с переменными для построения ссылок в постраничной навигации
                            "POPUP_POSITION" => "left",	// Позиция для отображения всплывающего блока с информацией о фильтрации
                            "PREFILTER_NAME" => "smartPreFilter",	// Имя входящего массива для дополнительной фильтрации элементов
                            "PRICE_CODE" => "",	// Тип цены
                            "SAVE_IN_SESSION" => "N",	// Сохранять установки фильтра в сессии пользователя
                            "SECTION_CODE" => "",	// Код раздела
                            "SECTION_DESCRIPTION" => "-",	// Описание
                            "SECTION_ID" => $sectionId,	// ID раздела инфоблока
                            "SECTION_TITLE" => "-",	// Заголовок
                            "SEF_MODE" => "N",	// Включить поддержку ЧПУ
                            "TEMPLATE_THEME" => "blue",	// Цветовая тема
                            "XML_EXPORT" => "N",	// Включить поддержку Яндекс Островов
                            "COMPONENT_TEMPLATE" => "main",
                            "LINK" => $sectionLink,
                            "TYPE" => $arType,
                            "PARENT" => $parentId
                        ),
                            false
                        );?>

</div>
</div>

<div class="main_inside">
					<div class="container">
						<div class="catalog">
							<div class="title_bk">
                            	<? CModule::IncludeModule('iblock');
$arFilter = array(
    'IBLOCK_ID' => 31, // ID инфоблока
    // любые другие параметры, например 'ACTIVE' => 'Y'
);
$res = CIBlockElement::GetList(false, $arFilter, array('IBLOCK_ID'));
if ($el = $res->Fetch())
    echo 'Найдено&nbsp;'  .$el['CNT']; ?> <span>предложения</span>

                            </div>



                   <div class="catalog_head d_flex a_items_center j_content_between f_wrap">
								<div class="catalog_items_tabs">
									<ul class="d_flex f_wrap">
										<li class="d_flex j_content_center a_items_center" data-item="1"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="16" height="4" transform="matrix(-1 0 0 1 16 0)" fill="#B4C7D9" fill-opacity="0.65"/><rect width="16" height="4" transform="matrix(-1 0 0 1 16 6)" fill="#B4C7D9" fill-opacity="0.65"/><rect width="16" height="4" transform="matrix(-1 0 0 1 16 12)" fill="#B4C7D9" fill-opacity="0.65"/></svg></li>
										<li class="active" data-item="2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="4" height="4" transform="matrix(-1 0 0 1 16 0)" fill="#B4C7D9" fill-opacity="0.99"/><rect width="4" height="4" transform="matrix(-1 0 0 1 10 0)" fill="#B4C7D9" fill-opacity="0.99"/><rect width="4" height="4" transform="matrix(-1 0 0 1 4 0)" fill="#B4C7D9" fill-opacity="0.99"/><rect width="4" height="4" transform="matrix(-1 0 0 1 16 6)" fill="#B4C7D9" fill-opacity="0.99"/><rect width="4" height="4" transform="matrix(-1 0 0 1 10 6)" fill="#B4C7D9" fill-opacity="0.99"/><rect width="4" height="4" transform="matrix(-1 0 0 1 4 6)" fill="#B4C7D9" fill-opacity="0.99"/><rect width="4" height="4" transform="matrix(-1 0 0 1 16 12)" fill="#B4C7D9" fill-opacity="0.99"/><rect width="4" height="4" transform="matrix(-1 0 0 1 10 12)" fill="#B4C7D9" fill-opacity="0.99"/><rect width="4" height="4" transform="matrix(-1 0 0 1 4 12)" fill="#B4C7D9" fill-opacity="0.99"/></svg></li>
										<li class="d_flex j_content_center a_items_center" data-item="3"><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.25 0.15918L12.041 2.09814L6.55176 0.728515L0.375 2.46338V17.6421L1.24512 17.395L6.57324 15.8965L12.084 17.2769L18.25 15.3486V0.15918ZM16.875 2.02832V14.3389L12.75 15.6279V3.31738L16.875 2.02832ZM7.25 2.31836L11.375 3.34961V15.6816L7.25 14.6504V2.31836ZM5.875 2.34521V14.6665L1.75 15.8267V3.50537L5.875 2.34521Z" fill="#B4C7D9"/></svg></li>
									</ul>
								</div>

								<div class="catalog_items_select d_flex a_items_center f_wrap">
									<div class="catalog_items_select_txt">Сортировать по:</div>
                                    <form  method="get" onchange="this.submit()">
                                        <div class="catalog_items_select_field">
                                        <select class="select_custom" name="sort">

                                            <option value="dated" <?=(!isset($_GET['sort']) || $_GET['sort'] == 'dated') ? 'selected':'';?> >Сначала новые</option>
                                    <option value="datea" <?=(isset($_GET['sort']) && $_GET['sort'] == 'datea') ? 'selected':'';?> >Сначала старые</option>
                                    <option value="price_valuea" <?=(isset($_GET['sort']) && $_GET['sort'] == 'price_valuea') ? 'selected':'';?>>Сначала дешевые</option>
                                    <option value="price_valued" <?=(isset($_GET['sort']) && $_GET['sort'] == 'price_valued') ? 'selected':'';?>>Сначала дорогие</option>

                                        </select>
                                        </div>
                                    </form>
								</div>
							</div>
							<div class="catalog_items">

<?
$intSectionID = 0;
?><?
$sort = $arParams["ELEMENT_SORT_FIELD"];
$order = $arParams["ELEMENT_SORT_ORDER"];
if(isset($_GET['sort']) && $_GET['sort'] == 'dated') {
	$sort = 'timestamp_x';
	$order = 'desc';
} elseif(isset($_GET['sort']) && $_GET['sort'] == 'datea') {
	$sort = 'timestamp_x';
	$order = 'asc';
} elseif(isset($_GET['sort']) && $_GET['sort'] == 'price_valuea') {
	$sort = 'PROPERTY_price_value';
	$order = 'asc';
} elseif(isset($_GET['sort']) && $_GET['sort'] == 'price_valued') {
	$sort = 'PROPERTY_price_value';
	$order = 'desc';
}
$intSectionID = $APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"",
	array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ELEMENT_SORT_FIELD" => $sort,
		"ELEMENT_SORT_ORDER" => $order,
		"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
		"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
		"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
		"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
		"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
		"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
		"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],

		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
		"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
		"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

		"SECTION_ID" => $sectionId,
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
		'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
		'CURRENCY_ID' => $arParams['CURRENCY_ID'],
		'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],

		'LABEL_PROP' => $arParams['LABEL_PROP'],
		'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
		'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],

		'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
		'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
		'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
		'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
		'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
		'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
		'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
		'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
		'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
		'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],

		'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
		"ADD_SECTIONS_CHAIN" => "N",
		'ADD_TO_BASKET_ACTION' => $basketAction,
		'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
		'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare']
	),
	$component
);?>
</div>

<?$APPLICATION->IncludeFile(
$APPLICATION->GetTemplatePath("include_areas/bottom_form.php"),
Array(),
Array("MODE"=>"html")
);?>
</div>
</div>
</div>
</div>