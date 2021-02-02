<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
//header('Content-Type: application/json');


$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "calkulator_session",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "N",
        "CHECK_DATES" => "Y",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "N",
        "DISPLAY_PICTURE" => "N",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "33",
        "IBLOCK_TYPE" => "content",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "100",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "PROG",
            1 => "FIRST_FEE",
            2 => "TERM",
            3 => "RATE",
            4 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "TIMESTAMP_X",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "calkulator"
    ),
    false
);


$range_val_1 = (int)$_POST['total_sum'];

$range_val_2 = (int)preg_replace('/\D/', '',$_POST['first_sum']);
$range_val_3 = (int)preg_replace('/\D/', '',$_POST['years']);
var_dump($_POST);
if($range_val_2 > $range_val_1){
    $range_val_2 = $range_val_1;
}
$first_pay_min = 1000000000;

foreach($_SESSION['calculator'] as $item){
    $first = $range_val_1 * $item['PROPERTIES']['FIRST_FEE']['VALUE'] /100;


    if($first < $range_val_2){
        $minimal = $range_val_2;
    }else{
        $minimal = $first;
    }
    $clear_sum = $range_val_1 - $minimal;

    $B10  =$range_val_1 - $minimal;


    $m10  =(float)str_replace(',','.',$item['PROPERTIES']['RATE']['VALUE']) /12;

//$m10 = $m10;

    if($range_val_3 > $item['PROPERTIES']['TERM']['VALUE']){
        $year = $item['PROPERTIES']['TERM']['VALUE'];
    }else{
        $year = $range_val_3;
    }

    $l10 = $year *12;
//B10*(M10/(1-(1+M10)^-(L10-0)))
    $ab =-1*($l10 - 0);
    $ads = 1+$m10;
    $m10In = pow($ads,$ab);
    $total  = $B10*($m10/(1-$m10In) );

    $i = $m10/100;

    $n = $year  * 12;
    $K = ($i*pow((1+$i),$n)) / (pow((1+$i),$n) - 1);

    $total = $K*$clear_sum;


    if($range_val_3 > $item['PROPERTIES']['TERM']['VALUE']){
        $year = $item['PROPERTIES']['TERM']['VALUE'];
        $total = 0;
    }else{
        $year = $range_val_3;
    }
//
    $html .='<tr><td class="mortgage_calculator_table--bank"><img src="'.CFile::GetPath($item['PROPERTIES']['SVG_ICON']['VALUE']).'" alt="'.$item['NAME'].'" style="max-width:200px;"></td><td class="mortgage_calculator_table--stavka"> от '.$item['PROPERTIES']['FIRST_FEE']['VALUE'].'%</td><td class="mortgage_calculator_table--vznos" id="395">'.number_format($total, 0, false, ' ').' руб.</td><td class="mortgage_calculator_table--srok"> до '.$range_val_3.' лет</td><td class="mortgage_calculator_table--plat"><span class="reslut_395">'.number_format($total/$range_val_3*12, 0, false, ' ') .'</span> руб</td></tr>';
    $row[$item['ID']] = array('pay'=>number_format($total, 0, false, ' '),'first'=>number_format($minimal , 0, false, ' '), 'year'=>$year);
}


echo $html;
