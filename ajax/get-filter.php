<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(isset($_REQUEST["sectionId"])){
    $sectionId = $_REQUEST["sectionId"];
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
$res = CIBlockSection::GetList(array("SORT"=>"ASC"),array("IBLOCK_ID"=>31,"UF_FILTER_SHOW"=>1,"LEFT_MARGIN"=>$parentLeftMargin,"RIGHT_MARGIN"=>$parentRightMargin),false,array("NAME","ID","SECTION_PAGE_URL"));
while($arSection = $res->GetNext()){
    $current = "N";
    if($arSection["ID"]==$sectionId){$current="Y";$sectionLink=$arSection["SECTION_PAGE_URL"];}
    $arType[$arSection["ID"]] = array("NAME"=>$arSection["NAME"],"CUR"=>$current);
}
$params = Array(
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
    "PRICE_CODE" => "",	// Тип цены
    "SAVE_IN_SESSION" => "N",	// Сохранять установки фильтра в сессии пользователя
    "SECTION_DESCRIPTION" => "-",	// Описание
    "SECTION_ID" => $sectionId,	// ID раздела инфоблока
    "SECTION_TITLE" => "-",	// Заголовок
    "SEF_MODE" => "Y",	// Включить поддержку ЧПУ
    "SEF_RULE" => "/search/#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
    "SMART_FILTER_PATH" => "",
    "TEMPLATE_THEME" => "blue",	// Цветовая тема
    "XML_EXPORT" => "N",	// Включить поддержку Яндекс Островов
    "COMPONENT_TEMPLATE" => "main",
    "LINK" => $sectionLink,
    "TYPE" => $arType,
    "PARENT" => $parentId
);
if($_REQUEST["main"]=="y"){
    $params["MAIN"] = array(
        "location_locality_name",
        "location_address",
        "rooms",
        "price_value",
        "area_value",
        "floors_total",
        "lot_type",
        "lot_area_value"
    );
}
$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "object_filter", $params,false);
?>
