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



<div class="catalog_item" data-item="1">
<div class="catalog_rows">

<div class="catalog_row catalog_row_head">
											<div class="catalog_row_th catalog_row_th--image"></div>
											<div class="catalog_row_th catalog_row_th--rooms">Комнат:</div>
											<div class="catalog_row_th catalog_row_th--area">Площадь:</div>
											<div class="catalog_row_th catalog_row_th--floor">Этаж:</div>
											<div class="catalog_row_th catalog_row_th--address">Адрес:</div>
											<div class="catalog_row_th catalog_row_th--price">Стоимость:</div>
											<div class="catalog_row_th catalog_row_th--price_area">Стоимость за м<sup>2</sup>:</div>
											<div class="catalog_row_th catalog_row_th--favorite">В избранное:</div>
										</div>
										<div class="catalog_row_space"></div>

<?
foreach ($arResult['ITEMS'] as $key => $arItem)
{
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);

	$arItemIDs = array(
		'ID' => $strMainID,
		'PICT' => $strMainID.'_pict',
		'SECOND_PICT' => $strMainID.'_secondpict',
		'STICKER_ID' => $strMainID.'_sticker',
		'SECOND_STICKER_ID' => $strMainID.'_secondsticker',
		'QUANTITY' => $strMainID.'_quantity',
		'QUANTITY_DOWN' => $strMainID.'_quant_down',
		'QUANTITY_UP' => $strMainID.'_quant_up',
		'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
		'BUY_LINK' => $strMainID.'_buy_link',
		'BASKET_ACTIONS' => $strMainID.'_basket_actions',
		'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
		'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
		'COMPARE_LINK' => $strMainID.'_compare_link',

		'PRICE' => $strMainID.'_price',
		'DSC_PERC' => $strMainID.'_dsc_perc',
		'SECOND_DSC_PERC' => $strMainID.'_second_dsc_perc',
		'PROP_DIV' => $strMainID.'_sku_tree',
		'PROP' => $strMainID.'_prop_',
		'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
		'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
	);

	$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);

	$productTitle = (
		isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])&& $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
		? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
		: $arItem['NAME']
	);
	$imgTitle = (
		isset($arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
		? $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
		: $arItem['NAME']
	);

	$minPrice = false;
	if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
		$minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);


	?>

    <div class="catalog_row" id="<? echo $strMainID; ?>">
											<div class="catalog_row_td catalog_row_td--image"><a href="<? echo $arItem['DETAIL_PAGE_URL']; ?>"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" alt=""/></a></div>
											<div class="catalog_row_td catalog_row_td--rooms"><a href="<? echo $arItem['DETAIL_PAGE_URL']; ?>"><? echo $arItem['NAME']; ?></a></div>
											<div class="catalog_row_td catalog_row_td--area"><?=$arItem['PROPERTIES']['area_value']['VALUE']?> м<sup>2</sup></div>
											<div class="catalog_row_td catalog_row_td--floor"><?=$arItem['PROPERTIES']['floor']['VALUE']?> этаж</div>
											<div class="catalog_row_td catalog_row_td--address"><div class="catalog_row_td--inline">Адрес <span><?=$arItem['PROPERTIES']['location_locality_name']['VALUE']?>, <?=$arItem['PROPERTIES']['location_address']['VALUE']?></span></div></div>
											<div class="catalog_row_td catalog_row_td--price"><?=number_format($arItem['PROPERTIES']['price_value']['VALUE'], 0, '', ' ')?> ₽</div>
											<div class="catalog_row_td catalog_row_td--price_area"><? if(!empty($arItem['PROPERTIES']['area_value']['VALUE'])){ echo number_format(ceil($arItem['PROPERTIES']['price_value']['VALUE']/$arItem['PROPERTIES']['area_value']['VALUE']), 0, '', ' ').' ₽ за м<sup>2</sup>';}?></div>
											<div class="catalog_row_td catalog_row_td--favorite">
												<span class="catalog_row_td--favorite_btn d_flex a_items_center j_content_center">
													<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M8.00062 13.1365L7.79562 12.9665C7.40687 12.6415 6.88062 12.289 6.27062 11.8815C3.89438 10.2902 0.640625 8.11273 0.640625 4.40023C0.640625 2.10648 2.50687 0.240234 4.80062 0.240234C6.04688 0.240234 7.21438 0.795234 8.00062 1.74398C8.78687 0.795234 9.95438 0.240234 11.2006 0.240234C13.4944 0.240234 15.3606 2.10648 15.3606 4.40023C15.3606 8.11273 12.1069 10.2902 9.73063 11.8815C9.12062 12.289 8.59438 12.6415 8.20563 12.9665L8.00062 13.1365Z" fill="#D9E3EC"/>
													</svg>
												</span>
											</div>
										</div>
										<div class="catalog_row_space"></div>
    
    
    
    <? } ?> 
    </div>
    </div>
    
    
    <div class="catalog_item active" data-item="2">
    	<div class="catalog_item_cols">
			<div class="row row_catalog d_flex f_wrap">
    <? foreach ($arResult['ITEMS'] as $key => $arItem){

        ?>
    
    									<div class="col col-4">
												<div class="item">
													<div class="item_head">
														<div class="item_image"><a href="<? echo $arItem['DETAIL_PAGE_URL']; ?>"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" alt=""/></a></div>
														<span class="item_favorite"><svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.00062 13.1365L7.79562 12.9665C7.40687 12.6415 6.88062 12.289 6.27062 11.8815C3.89438 10.2902 0.640625 8.11273 0.640625 4.40023C0.640625 2.10648 2.50687 0.240234 4.80062 0.240234C6.04688 0.240234 7.21438 0.795234 8.00062 1.74398C8.78687 0.795234 9.95438 0.240234 11.2006 0.240234C13.4944 0.240234 15.3606 2.10648 15.3606 4.40023C15.3606 8.11273 12.1069 10.2902 9.73063 11.8815C9.12062 12.289 8.59438 12.6415 8.20563 12.9665L8.00062 13.1365Z" fill="#D9E3EC"/></svg></span>
													</div>
													<a href="<? echo $arItem['DETAIL_PAGE_URL']; ?>" class="item_body">
														<div class="item_meta d_flex a_items_center j_content_between f_wrap">
															<div class="item_meta_price"><?=number_format($arItem['PROPERTIES']['price_value']['VALUE'], 0, '', ' ')?> ₽</div>
															<div class="item_meta_area"><?=number_format(ceil($arItem['PROPERTIES']['price_value']['VALUE']/$arItem['PROPERTIES']['area_value']['VALUE']), 0, '', ' ')?> ₽ за м<sup>2</sup></div>
														</div>
														<div class="item_info"><span class="item_info--appartment"><? echo $arItem['NAME']; ?></span>, <span class="item_info--appartment_info"><?=$arItem['PROPERTIES']['area_value']['VALUE']?> м<sup>²</sup>, <?=$arItem['PROPERTIES']['floor']['VALUE']?> этаж</span> <br><?=$arItem['PROPERTIES']['addr']['VALUE']?> </div>
													</a>
												</div>
											</div>
    
    <?}?>
    		</div>
    	</div>
    </div>
    
    <div class="catalog_item" data-item="3">
       		
			<? foreach ($arResult['ITEMS'] as $key => $arItem){?>  
            
			<?}?>
            
            <?
			$iblock_id = 31; // ID инфоблока с кторым работаем
    $mapData = CIBlockElement::GetList(
        Array("ID" => "ASC"),
        Array("IBLOCK_ID" => $iblock_id),
        false,
        false,
        Array(
            'ID',
            'NAME',
            'PROPERTY_location_latitude',
            'PROPERTY_location_longitude',
            'PROPERTY_addr',
        )
    );
    while ($ar_fields = $mapData->GetNext()) {

        $mapLAT = $ar_fields['PROPERTY_LOCATION_LATITUDE_VALUE'];
        $mapLON = $ar_fields['PROPERTY_LOCATION_LONGITUDE_VALUE'];

        $arPlacemarks[] = array(
            "LAT" => $mapLAT,
            "LON" => $mapLON,
            "TEXT" => $ar_fields["NAME"] . $ar_fields["PROPERTY_addr_VALUE"],
        );

    }

	$APPLICATION->IncludeComponent(
    "bitrix:map.yandex.view",
    "",
     Array(
        "INIT_MAP_TYPE" => "map",
       "MAP_DATA" => serialize(array(
            'yandex_lat' => $onMap[0], 
            'yandex_lon' => $onMap[1], 
            'yandex_scale' => 9, 
            'PLACEMARKS' => $arPlacemarks)),
        "MAP_WIDTH" => "100%",
        "MAP_HEIGHT" => "550",
        "CONTROLS" => array("ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"),
        "OPTIONS" => array("DESABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING"),
         "MAP_ID" => ""
    ),
false
);	


	?>
    
    

	   					
	</div>
    
    

    <? echo $arResult["NAV_STRING"]; ?>

    
   