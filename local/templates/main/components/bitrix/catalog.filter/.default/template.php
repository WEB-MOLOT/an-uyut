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
if(!stripos($arResult["FORM_ACTION"],'search')){
    $arResult["FORM_ACTION"]  = '/search'.$arResult["FORM_ACTION"];
}

$re = '/arrFilter\_pf\[(.*?)\]/m';
?>
<form name="<?echo $arResult["FILTER_NAME"]?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
    <input type="hidden" name="arrFilter_pf[section_id]" value="<?=$arParams['SECTION_ID'];?>">
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>

    <div class="row row_catalog_filters_fp d_flex  f_wrap">
        <div class="col2" style="width: 100%;">
            <div class="item d_flex j_content_between f_wrap">

		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?if(!array_key_exists("HIDDEN", $arItem)):?>
<? preg_match_all($re, $arItem['INPUT_NAME'], $matches, PREG_SET_ORDER, 0);
?>
            <?php if($arItem['TYPE'] == 'RANGE'){
                    preg_match_all($re, $arItem['INPUT_NAMES'][0], $matches, PREG_SET_ORDER, 0);


                    $arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
                    $arFilter = Array("IBLOCK_ID"=>IntVal(31), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","IBLOCK_SECTION_ID"=>$arParams['SECTION_ID'], 'INCLUDE_SUBSECTIONS'=>'Y');


                    $res = CIBlockElement::GetList(Array('PROPERTY_'.$matches[0][1] =>'asc'), $arFilter, false, Array("nPageSize"=>1), $arSelect);
                    while($ob = $res->GetNextElement()){
                        $arProps = $ob->GetProperties();
                        $min_price = $arProps[$matches[0][1]]['VALUE'];
                    }
                    $res = CIBlockElement::GetList(Array('PROPERTY_'.$matches[0][1] =>'desc'), $arFilter, false, Array("nPageSize"=>1), $arSelect);
                    while($ob = $res->GetNextElement()){
                        $arProps = $ob->GetProperties();
                        $max_price = $arProps[$matches[0][1]]['VALUE'];
                    }
                    if(empty($min_price) && empty($max_price) ){
                        continue;
                    }
                    ?>
                    <div class="catalog_filters_field d_flex a_items_center f_wrap field__<?=strtolower($arItem['TYPE'])?> field__<?=strtolower($arItem['TYPE'])?>_<?=$matches[0][1]?>">
                        <div class="catalog_filters_field--txt"><?=$arItem["NAME"]?>:</div>
                        <div class="catalog_filters_field--field">
                            <div class="catalog_filters_field--range_wrapper">
                                <div class="catalog_filters_field--range_field"></div>
                                <div class="catalog_filters_field--range" data-prefix="от" data-fields_name="<?=implode('|',$arItem['INPUT_NAMES']);?>" data-prefix2="до" data-sufix="₽" data-min="<?=$min_price;?>" data-max="<?=$max_price;?>" data-start="<?=$min_price;?>" data-end="<?=$max_price;?>"></div>
                            <?=str_replace('type="text"','type="hidden"',str_replace('по','',$arItem["INPUT"]));?>
                            </div>
                        </div>
                    </div>
                <?php }else if($arItem['TYPE'] == 'RADIO'){?>
                    <div class="catalog_filters_field d_flex a_items_center f_wrap field__<?=strtolower($arItem['TYPE'])?> field__<?=strtolower($arItem['TYPE'])?>_<?=$matches[0][1]?>">
																<div class="catalog_filters_field--txt"><?=$arItem["NAME"]?>:</div>
																<div class="catalog_filters_field--field">
																	<div class="catalog_filters_field--checkboxes d_flex a_items_center j_content_between f_wrap">
                                                                        <label class="catalog_filters_field--checkbox"></label>

                                                                        <?$fields = explode('<br>',$arItem["INPUT"]);?>
                                                                        <?php foreach($fields as $field){
                                                                        ?>
                                                                            <label class="catalog_filters_field--checkbox"><?=$field;?></label>
                                                                    <?php
                                                                        }
                                                                             ?>
																	</div>
																</div>
															</div>

                <?php }else{ ?>
                <div class="catalog_filters_field d_flex a_items_center f_wrap field__<?=strtolower($arItem['TYPE'])?> field__<?=strtolower($arItem['TYPE'])?>_<?=$matches[0][1]?>" data-itemName="<?=$arItem["NAME"]?>">
                    <div class="catalog_filters_field--txt"><?=$arItem["NAME"]?>:</div>
                    <div class="catalog_filters_field--field">
                        <div class="catalog_filters_field--input">
                            <?=$arItem["INPUT"]?>
                        </div>
                    </div>
                </div>
                <?php }?>
			<?endif?>
		<?endforeach;?>

                <div class="catalog_filters_field d_flex a_items_center f_wrap">
                    <button type="submit" name="set_filter" class="btn btn_yellow btn--icon d_flex a_items_center j_content_center">
                        <em class="btn_icon"><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.5 0C3.22266 0 3 0.222656 3 0.5V1H0V2H3V2.5C3 2.77734 3.22266 3 3.5 3H5.5C5.77734 3 6 2.77734 6 2.5V2H12V1H6V0.5C6 0.222656 5.77734 0 5.5 0H3.5ZM4 1H5V2H4V1ZM7.5 5C7.22266 5 7 5.22266 7 5.5V6H0V7H7V7.5C7 7.77734 7.22266 8 7.5 8H9.5C9.77734 8 10 7.77734 10 7.5V7H12V6H10V5.5C10 5.22266 9.77734 5 9.5 5H7.5ZM8 6H9V7H8V6ZM1.5 10C1.22266 10 1 10.2227 1 10.5V11H0V12H1V12.5C1 12.7773 1.22266 13 1.5 13H3.5C3.77734 13 4 12.7773 4 12.5V12H12V11H4V10.5C4 10.2227 3.77734 10 3.5 10H1.5ZM2 11H3V12H2V11Z" fill="#39331E"/></svg></em>
                        <em class="btn_txt">Показать предложения</em>
                    </button>
                </div>

            </div>
        </div>
    </div>
				<input type="hidden" name="set_filter" value="Y" />&nbsp;

</form>
