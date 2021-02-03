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
$templateLibrary = array('popup');
$currencyList = '';
$global_price = $arResult['PROPERTIES']['price_value']['VALUE'];
if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}
$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
	'ID' => $strMainID,
	'PICT' => $strMainID.'_pict',
	'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
	'STICKER_ID' => $strMainID.'_sticker',
	'BIG_SLIDER_ID' => $strMainID.'_big_slider',
	'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
	'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
	'SLIDER_LIST' => $strMainID.'_slider_list',
	'SLIDER_LEFT' => $strMainID.'_slider_left',
	'SLIDER_RIGHT' => $strMainID.'_slider_right',
	'OLD_PRICE' => $strMainID.'_old_price',
	'PRICE' => $strMainID.'_price',
	'DISCOUNT_PRICE' => $strMainID.'_price_discount',
	'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
	'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
	'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
	'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
	'QUANTITY' => $strMainID.'_quantity',
	'QUANTITY_DOWN' => $strMainID.'_quant_down',
	'QUANTITY_UP' => $strMainID.'_quant_up',
	'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
	'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
	'BASIS_PRICE' => $strMainID.'_basis_price',
	'BUY_LINK' => $strMainID.'_buy_link',
	'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
	'BASKET_ACTIONS' => $strMainID.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
	'COMPARE_LINK' => $strMainID.'_compare_link',
	'PROP' => $strMainID.'_prop_',
	'PROP_DIV' => $strMainID.'_skudiv',
	'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
	'OFFER_GROUP' => $strMainID.'_set_group_',
	'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
);
$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
$templateData['JS_OBJ'] = $strObName;

$strTitle = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	: $arResult['NAME']
);
$strAlt = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	: $arResult['NAME']
);
?>




<h1 class="title_page">
    <?php
    if($arResult["NAME"]){
        echo $arResult["NAME"];
    }elseif($arResult["NAME"]){
        echo $arResult["NAME"];
    }else{
        echo $arResult["NAME"];
    }
    /*if($arResult['PROPERTIES']['location_country']['VALUE']){
echo $arResult['PROPERTIES']['location_country']['VALUE'];
    }elseif($arResult['PROPERTIES']['location_country']['VALUE']){
        echo $arResult['PROPERTIES']['location_country']['VALUE'];
    }else{
        echo $arResult['PROPERTIES']['location_country']['VALUE'];
    }*/
    ?></h1>
					<div class="object_desc_und_title"><?=$arResult['PROPERTIES']['location_district']['VALUE']?>, <?=$arResult['PROPERTIES']['location_locality_name']['VALUE']?>, <?=$arResult['PROPERTIES']['location_address']['VALUE']?></div>
					<div class="object_general">
						<div class="object_cols d_flex j_content_between f_wrap">
							<div class="object_col_left">
								<div class="object_general_info">
									<div class="object_general_info--items d_flex j_content_between f_wrap">
										<div class="object_general_info--item">
											<div class="object_general_info--item_title"><?=$arResult['PROPERTIES']['rooms']['VALUE']?></div>
											<div class="object_general_info--item_desc">Кол. комнат</div>
										</div>
										<div class="object_general_info--item">
											<div class="object_general_info--item_title"><?=$arResult['PROPERTIES']['area_value']['VALUE']?></div>
											<div class="object_general_info--item_desc">Площадь общая, м<sup>2</sup></div>
										</div>
										<div class="object_general_info--item">
											<div class="object_general_info--item_title"><?=$arResult['PROPERTIES']['living_space_value']['VALUE']?></div>
											<div class="object_general_info--item_desc">Площадь жилая, м<sup>2</sup></div>
										</div>
										<div class="object_general_info--item">
											<div class="object_general_info--item_title"><?=$arResult['PROPERTIES']['kitchen_space_value']['VALUE']?></div>
											<div class="object_general_info--item_desc">Площадь кухни, м<sup>2</sup></div>
										</div>
										<div class="object_general_info--item">
											<div class="object_general_info--item_title"><?=$arResult['PROPERTIES']['floor']['VALUE']?></div>
											<div class="object_general_info--item_desc">Этаж из <?=$arResult['PROPERTIES']['floors_total']['VALUE']?></div>
										</div>
									</div>
								</div>
								<div class="object_general_slider_wrapper">
									<div class="object_general_slider_inside">
										<div class="object_general_slider">
                                            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
											<div class="item">
												<? if(!empty($arResult['PROPERTIES']['fancy']['VALUE'])){?><a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" data-fancybox="gallery" <? if ($arResult["DETAIL_PICTURE"]["DESCRIPTION"]){?>data-caption="<?=$arResult["DETAIL_PICTURE"]["DESCRIPTION"];?>"<?}?>><?}?><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt=""/><? if(!empty($arResult['PROPERTIES']['fancy']['VALUE'])){?></a><?}?>
											</div>
                                            <?endif?>
                                            <?foreach($arResult["PROPERTIES"]["images"]["VALUE"] as $PHOTO => $val):?>
											<div class="item">

                                                <a href="<?=CFile::GetPath($val); ?>" data-fancybox="gallery" data-caption="<?=$arResult["PROPERTIES"]["images"]["DESCRIPTION"][$PHOTO];?>" > <img src="<?=CFile::GetPath($val); ?>" alt=""/></a>
											</div>
											<?endforeach?>
										</div>
										<div class="object_general_slider_nav">
											<span class="work_examples_slider_nav--arr work_examples_slider_nav--arr_left d_flex j_content_center a_items_center">
												<svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0.929688 3.5L4.26562 6.96875L4.98437 6.28125L2.78906 3.99219L14 3.99219L14 2.99219L2.80859 2.99219L4.98438 0.718751L4.26563 0.0312504L0.929688 3.5Z" fill="#010101"/>
												</svg>
											</span>
											<span class="work_examples_slider_nav--arr work_examples_slider_nav--arr_right d_flex j_content_center a_items_center">
												<svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#010101"/>
												</svg>
											</span>
										</div>
									</div>
									<div class="object_general_slider_thumbnails_wrapper">
										<div class="object_general_slider_thumbnails">
                                            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
											<div class="item">
												<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt=""/>
											</div>
                                            <?endif?>
                                            <?foreach($arResult["PROPERTIES"]["images"]["VALUE"] as $PHOTO => $val):?>
											<div class="item">
												<img src="<?=CFile::GetPath($val); ?>" alt=""/>
											</div>
                                            <?endforeach?>
											
										</div>
										<div class="object_general_slider_thumbnails_nav">
											<span class="work_examples_slider_nav--arr work_examples_slider_nav--arr_left d_flex j_content_center a_items_center">
												<svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M0.929688 3.5L4.26562 6.96875L4.98437 6.28125L2.78906 3.99219L14 3.99219L14 2.99219L2.80859 2.99219L4.98438 0.718751L4.26563 0.0312504L0.929688 3.5Z" fill="#010101"/>
												</svg>
											</span>
											<span class="work_examples_slider_nav--arr work_examples_slider_nav--arr_right d_flex j_content_center a_items_center">
												<svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#010101"/>
												</svg>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="object_col_right">
								<div class="object_general_side">
									<div class="object_general_prices">
										<span class="object_general_price--basic"><?=number_format($arResult['PROPERTIES']['price_value']['VALUE'], 0, '', ' ' )?> ₽</span>
                                        <? if(!empty($arResult['PROPERTIES']['price_value']['VALUE'])){?>
										<span class="object_general_price--area"><?=number_format(ceil($arResult['PROPERTIES']['price_value']['VALUE']/$arResult['PROPERTIES']['area_value']['VALUE']), 0, '', ' ' )?> ₽ за м<sup>2</sup></span>
                                        <?}?>
                                        <? if(!empty($arResult['PROPERTIES']['price_value']['VALUE'])){?>
										<span class="object_general_price--month"><?=number_format(ceil($arResult['PROPERTIES']['price_value']['VALUE']), 0, '', ' ' )?> ₽ в месяц</span>
                                        <?}?>
									</div>
									<div class="object_general_side--info">
										<span class="item_info--appartment"><?=$arResult['PROPERTIES']['green_text']['VALUE']?></span> <span class="item_info--appartment_info"><?=$arResult['PROPERTIES']['area_value']['VALUE']?> м<sup>2</sup> <?=$arResult['PROPERTIES']['floor']['VALUE']?>/<?=$arResult['PROPERTIES']['floors_total']['VALUE']?> этаж</span> <br><?=$arResult['PROPERTIES']['location_country']['VALUE']?> <?=$arResult['PROPERTIES']['location_district']['VALUE']?>  <?=$arResult['PROPERTIES']['location_locality_name']['VALUE']?>  <?=$arResult['PROPERTIES']['location_address']['VALUE']?>
									</div>
									<div class="object_general_side--buttons">
										<div class="object_general_side--button">
											<a href="#" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">Заявка на просмотр квартиры</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</a>
										</div>
										<div class="object_general_side--button">
											<a href="#" class="btn btn_green_transparent btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">Предложить свою цену</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</a>
										</div>
										<div class="object_general_side--button">
											<a href="#" class="btn btn_green_transparent btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">Рассчитать ипотеку</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</a>
										</div>
									</div>
									<span class="object_general_side_favorite d_flex a_items_center j_content_center">
										<svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M7 11L6.80503 10.855C6.43529 10.5778 5.93478 10.2771 5.35462 9.92953C3.0946 8.57226 0 6.71494 0 3.54832C0 1.59184 1.77497 0 3.95652 0C5.14181 0 6.25221 0.473393 7 1.28264C7.74779 0.473393 8.85819 0 10.0435 0C12.225 0 14 1.59184 14 3.54832C14 6.71494 10.9054 8.57226 8.64538 9.92953C8.06522 10.2771 7.56471 10.5778 7.19497 10.855L7 11Z" fill="#D9E3EC"/>
										</svg>
									</span>
								</div>
                                
                                
                                
                                
                                <? if(!empty($arResult['PROPERTIES']['sales_agent_name']['VALUE'])){?>


                                
								<div class="object_general_manager">
									<div class="object_general_manager--title">Об этом объекте все знает:</div>
									<div class="object_general_manager--image"><img src="<?=CFile::getPath($arResult['PROPERTIES']['sales_agent_photo']['VALUE'])?>" alt=""/></div>
									<div class="object_general_manager--name"><?=$arResult['PROPERTIES']['sales_agent_name']['VALUE']?></div>

									<div class="object_general_manager--workposition"><?=$arResult['PROPERTIES']['sales_agent_organization']['VALUE']?></div>


									<div class="object_general_manager--number"><a href="tel:<?=$arResult['PROPERTIES']['sales_agent_phone']['VALUE']?>"><?=$arResult['PROPERTIES']['sales_agent_phone']['VALUE']?></a></div>
									<div class="object_general_manager--form">
										<div class="object_general_manager--form_title">Или оставьте ваш номер, и я вам перезвоню:</div>
                                        <?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                                            "",
                                            Array(
                                                "WEB_FORM_ID" => "4",
                                                "IGNORE_CUSTOM_TEMPLATE" => "N",
                                                "USE_EXTENDED_ERRORS" => "N",
                                                "SEF_MODE" => "N",
                                                "CACHE_TYPE" => "A",
                                                "CACHE_TIME" => "3600",
                                                "LIST_URL" => "",
                                                "EDIT_URL" => "",
                                                "SUCCESS_URL" => "",
                                                "SUCCESS" => "",
                                                "CHAIN_ITEM_TEXT" => "",
                                                "CHAIN_ITEM_LINK" => "",
                                                "VARIABLE_ALIASES" => Array(
                                                    "WEB_FORM_ID" => "WEB_FORM_ID",
                                                    "RESULT_ID" => "RESULT_ID"
                                                )
                                            ),

);?>
									</div>
								</div>

                                <?}?>
                                
                                
							</div>
						</div>
					</div>
					<div class="object_desc">
						<div class="title_bk title_bk--large">Описание объекта</div>
						<div class="object_desc_cols d_flex f_wrap j_content_between">
							<div class="col col-2">
								<div class="object_desc_wrapper">
									<div class="object_desc_inside">
										<?echo $arResult["DETAIL_TEXT"];?>
									</div>
								</div>
							</div>
							<div class="col col-2">
								<div class="object_desc_cols_inside d_flex f_wrap j_content_between">
									<div class="col col-2">
										<div class="item">
											<div class="object_desc_info">
												<table class="object_desc_info_table">
                                                
                                                <?

                                                $count = 0; ?>
  												<? foreach($arResult["PROPERTIES"] as $k => $value){
  												    if($value['VALUE'] && $value['VALUE'] != '-' && !stristr($value['CODE'],'sales' ) && !stristr($value['CODE'],'location') && !stristr($value['CODE'],'images' )) {
                                                       if(preg_match("/^[a-zA-Z_]+$/i", $value['NAME'])){
                                                           continue;
                                                       }
  												        ?>
                                                        <tr>
                                                            <td><?= $value['NAME'] ?></td>
                                                            <td><?= $value['VALUE'] ?></td>
                                                        </tr>
                                                        <?
                                                    }
  												    }?>
												</table>
											</div>
										</div>
									</div>
									<div class="col col-2">
										<div class="item">
											<? $arProperty = $arResult["DISPLAY_PROPERTIES"]; ?>

                                                <? $arPos = explode(",", $arProperty['map']['VALUE']);?>
                                                <div class="yandexmapa">
                                                    <?$APPLICATION->IncludeComponent(
                                                    "bitrix:map.yandex.view",
                                                    "",
                                                    Array(
                                                    "INIT_MAP_TYPE" => "MAP",
                                                    "MAP_DATA" => serialize(array(
                                                    'yandex_lat' => $arResult['PROPERTIES']['location_latitude']['VALUE'],
                                                    'yandex_lon' =>  $arResult['PROPERTIES']['location_longitude']['VALUE'],
                                                    'yandex_scale' => $arProperty["map_zoom"]["VALUE"],
                                                    'PLACEMARKS' => array (
                                                    array(
                                                    'TEXT' => $arProperty["map_caption"]["VALUE"]{"TEXT"},
                                                    'LON' => $arResult['PROPERTIES']['location_latitude']['VALUE'],
                                                    'LAT' => $arResult['PROPERTIES']['location_longitude']['VALUE'],
                                                    ),
                                                    ),
                                                    )),
                                                    "MAP_WIDTH" => "100%",
                                                    "MAP_HEIGHT" => '',
                                                    "CONTROLS" => array("ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"),
                                                    "OPTIONS" => array("DESABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING"),
                                                    "MAP_ID" => ""
                                                    ),
                                                    false
                                                    );?>
                                                </div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>







<div class="object_similar">
						<div class="title_bk title_bk--large">Похожие объекты</div>
						<div class="object_similar_slider_wrapper">
							<div class="object_similar_slider_inside">
								<div class="object_similar_slider row_catalog">

                                <?
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PICTURE", "PREVIEW_TEXT", "DETAIL_PAGE_URL",  "DATE_ACTIVE_FROM","PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>31, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
if($res->GetNextElement()){
while($ob = $res->GetNextElement()):?>
  
  
 
<?
$arFields = $ob->GetFields();  
//print_r($arFields);
$arProps = $ob->GetProperties();
//print_r($arProps);
?>  
									
									<div class="item">
										<div class="item_head">
											<div class="item_image"><a href="<?=$arFields["DETAIL_PAGE_URL"]?>"><img src="<?=CFile::getPath($arFields["DETAIL_PICTURE"])?>" alt=""/></a></div>
											<span class="item_favorite"><svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.00062 13.1365L7.79562 12.9665C7.40687 12.6415 6.88062 12.289 6.27062 11.8815C3.89438 10.2902 0.640625 8.11273 0.640625 4.40023C0.640625 2.10648 2.50687 0.240234 4.80062 0.240234C6.04688 0.240234 7.21438 0.795234 8.00062 1.74398C8.78687 0.795234 9.95438 0.240234 11.2006 0.240234C13.4944 0.240234 15.3606 2.10648 15.3606 4.40023C15.3606 8.11273 12.1069 10.2902 9.73063 11.8815C9.12062 12.289 8.59438 12.6415 8.20563 12.9665L8.00062 13.1365Z" fill="#D9E3EC"/></svg></span>
										</div>
										<a href="<?=$arFields["DETAIL_PAGE_URL"]?>" class="item_body">
											<div class="item_meta d_flex a_items_center j_content_between f_wrap">
                                            	<? if (!empty($arProps['price_value']['VALUE'])){?>
												<div class="item_meta_price"><?=number_format($arProps['price_value']['VALUE'], 0, '', ' ')?> ₽</div>
                                                <?}?>
                                                <? if (!empty($arProps['price_value']['VALUE'])){?>
												<div class="item_meta_area"><?=number_format(ceil($arProps['price_value']['VALUE']/$arProps['area_value']['VALUE']), 0, '', ' ')?> ₽ за м<sup>2</sup></div>
                                                <?}?>
											</div>
											<div class="item_info">

                                                <span class="item_info--appartment">Зеленый текст</span>,
                                                <span class="item_info--appartment_info"><? if (!empty($arProps['area_value']['VALUE'])){?>
                                                        <?=$arProps['area_value']['VALUE']?> м<sup>²</sup>,<?}?>
                                                    <? if (!empty($arProps['floor']['VALUE'])){?>
                                                        <?=$arProps['floor']['VALUE']?> этаж<?}?></span>
                                                <? if (!empty($arProps['location_locality_name']['VALUE'])){?><br><?=$arProps['location_locality_name']['VALUE']?>, <?=$arProps['location_address']['VALUE']?><?}?></div>
										</a>
									</div>
                                    
                             <?endwhile?>
                                    <?php }?>
                                    
                                    
								</div>
							</div>
							<div class="object_similar_nav">
								<span class="work_examples_slider_nav--arr work_examples_slider_nav--arr_left d_flex j_content_center a_items_center">
									<svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M0.929688 3.5L4.26562 6.96875L4.98437 6.28125L2.78906 3.99219L14 3.99219L14 2.99219L2.80859 2.99219L4.98438 0.718751L4.26563 0.0312504L0.929688 3.5Z" fill="#010101"/>
									</svg>
								</span>
								<span class="work_examples_slider_nav--arr work_examples_slider_nav--arr_right d_flex j_content_center a_items_center">
									<svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#010101"/>
									</svg>
								</span>
							</div>
						</div>
					</div>



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
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
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
        "SHOW_404" => "N",
        "MESSAGE_404" => "",
        "PAGER_BASE_LINK" => "",
        "PAGER_PARAMS_NAME" => "arrPager",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "PRICE"=>$global_price,
    )
);?>








