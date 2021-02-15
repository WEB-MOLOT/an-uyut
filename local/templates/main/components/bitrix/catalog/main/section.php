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
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);
$obCache = new CPHPCache();
if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
{
    $arCurSection = $obCache->GetVars();
}
elseif ($obCache->StartDataCache())
{
    $arCurSection = array();
    if (Loader::includeModule("iblock"))
    {
        $dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

        if(defined("BX_COMP_MANAGED_CACHE"))
        {
            global $CACHE_MANAGER;
            $CACHE_MANAGER->StartTagCache("/iblock/catalog");

            if ($arCurSection = $dbRes->Fetch())
            {
                $CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);
            }
            $CACHE_MANAGER->EndTagCache();
        }
        else
        {
            if(!$arCurSection = $dbRes->Fetch())
                $arCurSection = array();
        }
    }
    $obCache->EndDataCache($arCurSection);
}
if (!isset($arCurSection))
{
    $arCurSection = array();
}
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
        <?
        if($_REQUEST['get_address']=='y')
            $APPLICATION->RestartBuffer();
        $sectionId = $arResult["VARIABLES"]["SECTION_ID"];
        CModule::IncludeModule("iblock");
        $res = CIBlockSection::GetNavChain(31,$sectionId);
        if($arSection = $res->GetNext()){
            $parentId = $arSection["ID"];
            $parentLeftMargin = $arSection["LEFT_MARGIN"];
            $parentRightMargin = $arSection["RIGHT_MARGIN"];
        }
        $arType = array();
        $res = CIBlockSection::GetList(array("SORT"=>"ASC"),array("IBLOCK_ID"=>31,"UF_FILTER_SHOW"=>1,"LEFT_MARGIN"=>$parentLeftMargin,"RIGHT_MARGIN"=>$parentRightMargin),false,array("NAME","ID","SECTION_PAGE_URL"));
        while($arSection = $res->GetNext()){
            $current = "N";
            if($arSection["ID"]==$sectionId){$current="Y";$sectionLink=$arSection["SECTION_PAGE_URL"];}
            $arType[$arSection["ID"]] = array("NAME"=>$arSection["NAME"],"CUR"=>$current);
        }
        ?>
        <?$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "object_filter", Array(
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],	// Учитывать права доступа
            "CACHE_TIME" => $arParams["CACHE_TIME"],	// Время кеширования (сек.)
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],	// Тип кеширования
            "CONVERT_CURRENCY" => $arParams['CONVERT_CURRENCY'],	// Показывать цены в одной валюте
            "DISPLAY_ELEMENT_COUNT" => "N",	// Показывать количество
            "FILTER_NAME" => $arParams["FILTER_NAME"],	// Имя выходящего массива для фильтрации
            "FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],	// Вид отображения
            "HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],	// Не отображать недоступные товары
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],	// Инфоблок
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],	// Тип инфоблока
            "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],	// Имя массива с переменными для построения ссылок в постраничной навигации
            "PRICE_CODE" => $arParams["~PRICE_CODE"],	// Тип цены
            "SAVE_IN_SESSION" => "N",	// Сохранять установки фильтра в сессии пользователя
            "SECTION_DESCRIPTION" => "DESCRIPTION",	// Описание
            "SECTION_ID" => $sectionId,	// ID раздела инфоблока
            "SECTION_TITLE" => "NAME",	// Заголовок
            "SEF_MODE" => $arParams["SEF_MODE"],	// Включить поддержку ЧПУ
            "SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
            "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
            "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],	// Цветовая тема
            "XML_EXPORT" => "N",	// Включить поддержку Яндекс Островов
            "COMPONENT_TEMPLATE" => "object_filter",
            "LINK" => $sectionLink,
            "TYPE" => $arType,
            "PARENT" => $parentId
        ),
            false
        );?>
        <?if($_REQUEST['get_address']=='y')
        die();?>
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
                            <form class="catalog_items_select_field" method="get" onchange="this.submit()">
                                <select class="select_custom" name="sort">
                                    <option value="date" <?=(!isset($_GET['sort']) || $_GET['sort'] =='date') ? 'selected':'';?> >Дате добавления</option>
                                    <option value="price_value" <?=(isset($_GET['sort']) || $_GET['sort'] =='price_value') ? 'selected':'';?>>По цене</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="catalog_items">

                    <?php
if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');
$verticalGrid = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");

if ($verticalGrid)
{
	?><div class="workarea grid2x1"><?
}
if ($arParams['USE_FILTER'] == 'Y')
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
	{
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	}
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
	{
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
	}
	if ($verticalGrid)
	{
		?><div class="bx_sidebar"><?
	}
	?>
    <?
	if ($verticalGrid)
	{
		?></div><?
	}
}
if ($verticalGrid)
{
	?><div class="bx_content_section"><?
}

?><?
if($arParams["USE_COMPARE"]=="Y")
{
	?><?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list",
	"",
	array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NAME" => $arParams["COMPARE_NAME"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		"COMPARE_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		'POSITION_FIXED' => isset($arParams['COMPARE_POSITION_FIXED']) ? $arParams['COMPARE_POSITION_FIXED'] : '',
		'POSITION' => isset($arParams['COMPARE_POSITION']) ? $arParams['COMPARE_POSITION'] : ''
	),
	$component,
	array("HIDE_ICONS" => "Y")
);?><?
}

if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y')
{
	$basketAction = (isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '');
}
else
{
	$basketAction = (isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '');
}
$intSectionID = 0;
?>


<?
$intSectionID = $APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"",
	array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ELEMENT_SORT_FIELD" => ($_GET['sort']) ? $_GET['sort'] :  $arParams["ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
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

		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
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
);?><?
$GLOBALS['CATALOG_CURRENT_SECTION_ID'] = $intSectionID;
unset($basketAction);
if ($verticalGrid)
{
	?></div>
	<div style="clear: both;"></div>
	</div><?
}
if (ModuleManager::isModuleInstalled("sale") && 0)
{
	$arRecomData = array();
	$recomCacheID = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($recomCacheID), "/sale/bestsellers"))
	{
		$arRecomData = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		if (Loader::includeModule("catalog"))
		{
			$arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
			$arRecomData['OFFER_IBLOCK_ID'] = (!empty($arSKU) ? $arSKU['IBLOCK_ID'] : 0);
		}
		$obCache->EndDataCache($arRecomData);
	}
	if (!empty($arRecomData))
	{
		if (!isset($arParams['USE_SALE_BESTSELLERS']) || $arParams['USE_SALE_BESTSELLERS'] != 'N')
		{
			?><?$APPLICATION->IncludeComponent("bitrix:sale.bestsellers", "", array(
				"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
				"PAGE_ELEMENT_COUNT" => "5",
				"SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
				"PRODUCT_SUBSCRIPTION" => $arParams['PRODUCT_SUBSCRIPTION'],
				"SHOW_NAME" => "Y",
				"SHOW_IMAGE" => "Y",
				"MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
				"MESS_BTN_DETAIL" => $arParams['MESS_BTN_DETAIL'],
				"MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
				"MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
				"LINE_ELEMENT_COUNT" => 5,
				"TEMPLATE_THEME" => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"BY" => array(
					0 => "AMOUNT",
				),
				"PERIOD" => array(
					0 => "15",
				),
				"FILTER" => array(
					0 => "CANCELED",
					1 => "ALLOW_DELIVERY",
					2 => "PAYED",
					3 => "DEDUCTED",
					4 => "N",
					5 => "P",
					6 => "F",
				),
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"ORDER_FILTER_NAME" => "arOrderFilter",
				"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
				"SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
				"PRICE_CODE" => $arParams["PRICE_CODE"],
				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
				"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
				"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
				"CURRENCY_ID" => $arParams["CURRENCY_ID"],
				"BASKET_URL" => $arParams["BASKET_URL"],
				"ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action")."_slb",
				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
				"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
				"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
				"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
				"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
				"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
				"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
				"OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
				"ADDITIONAL_PICT_PROP_".$arParams['IBLOCK_ID'] => $arParams['ADD_PICT_PROP'],
				"ADDITIONAL_PICT_PROP_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP']
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);
		}
		if (!isset($arParams['USE_BIG_DATA']) || $arParams['USE_BIG_DATA'] != 'N')
		{
			?><?$APPLICATION->IncludeComponent("bitrix:catalog.bigdata.products", "", array(
				"LINE_ELEMENT_COUNT" => 5,
				"TEMPLATE_THEME" => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
				"BASKET_URL" => $arParams["BASKET_URL"],
				"ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action")."_cbdp",
				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
				"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
				"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
				"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
				"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
				"SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
				"SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
				"PRICE_CODE" => $arParams["PRICE_CODE"],
				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
				"PRODUCT_SUBSCRIPTION" => $arParams['PRODUCT_SUBSCRIPTION'],
				"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
				"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
				"SHOW_NAME" => "Y",
				"SHOW_IMAGE" => "Y",
				"MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
				"MESS_BTN_DETAIL" => $arParams['MESS_BTN_DETAIL'],
				"MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
				"MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
				"PAGE_ELEMENT_COUNT" => 5,
				"SHOW_FROM_SECTION" => "Y",
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"DEPTH" => "2",
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
				"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
				"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
				"CURRENCY_ID" => $arParams["CURRENCY_ID"],
				"SECTION_ID" => $intSectionID,
				"SECTION_CODE" => "",
				"SECTION_ELEMENT_ID" => "",
				"SECTION_ELEMENT_CODE" => "",
				"LABEL_PROP_".$arParams["IBLOCK_ID"] => $arParams['LABEL_PROP'],
				"PROPERTY_CODE_".$arParams["IBLOCK_ID"] => $arParams["LIST_PROPERTY_CODE"],
				"PROPERTY_CODE_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["LIST_OFFERS_PROPERTY_CODE"],
				"CART_PROPERTIES_".$arParams["IBLOCK_ID"] => $arParams["PRODUCT_PROPERTIES"],
				"CART_PROPERTIES_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFERS_CART_PROPERTIES"],
				"ADDITIONAL_PICT_PROP_".$arParams["IBLOCK_ID"] => $arParams['ADD_PICT_PROP'],
				"ADDITIONAL_PICT_PROP_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP'],
				"OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
				"RCM_TYPE" => (isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : '')
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);
		}
	}
}
?>
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
