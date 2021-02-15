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
<?if(!$_REQUEST["get"]):?>
<div class="catalog_filter_items tabs_changer--items" id="filterBlock">
<?endif?>
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arParams["LINK"]?>" method="get">
<div class="row row_catalog_filters_fp d_flex f_wrap">
    <div class="item">
        <div class="item-name">Тип недвижимости:</div>
        <div class="item-field">
            <select id="getFilter" class="select_custom">
                <?foreach($arParams["TYPE"] as $val=>$arrVal):?>
                    <option value="<?=$val?>"<?=$arrVal["CUR"]=="Y"?" selected":""?>><?=$arrVal["NAME"]?></option>
                <?endforeach?>
            </select>
        </div>
    </div>
    <?foreach($arResult["ITEMS"] as $key=>$arItem):?>
    <?if(empty($arItem["VALUES"]))continue?>
    <?if ($arItem["DISPLAY_TYPE"] == "A"&& ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0))continue;?>
    <div class="item">
        <div class="item-name"><?=$arItem["NAME"]?>:</div>
        <div class="item-field">
            <?foreach($arItem["VALUES"] as $val => $ar){
                if($ar["CHECKED"]){
                    $arCur = $ar;
                    break;
                }
            }?>
            <?switch ($arItem["DISPLAY_TYPE"]):
                case "A":?>
                <div class="catalog_filters_field--range_wrapper">
                    <input
                            type="hidden"
                            name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                            id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                            value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                            onchange="smartFilter.keyup(this)"
                    />
                    <input
                            type="hidden"
                            name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                            id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                            value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                            onchange="smartFilter.keyup(this)"
                    />
                    <div class="catalog_filters_field--range_field">
                    </div>
                    <div class="catalog_filters_field--range" data-min-id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" data-max-id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" data-prefix="от" data-prefix2="до" data-sufix="<?=$arItem["FILTER_HINT"]?>" data-min="<?=$arItem["VALUES"]["MIN"]["VALUE"]?>" data-max="<?=$arItem["VALUES"]["MAX"]["VALUE"]?>" data-start="<?=$arItem["VALUES"]["MIN"]["HTML_VALUE"]?$arItem["VALUES"]["MIN"]["HTML_VALUE"]:$arItem["VALUES"]["MIN"]["VALUE"]?>" data-end="<?=$arItem["VALUES"]["MAX"]["HTML_VALUE"]?$arItem["VALUES"]["MAX"]["HTML_VALUE"]:$arItem["VALUES"]["MAX"]["VALUE"]?>"></div>
                </div>
                <?break;?>
                <?case "P":?>
                <?if($arItem["CODE"]=="location_locality_name"||$arItem["CODE"]=="location_address"):?>
                    <?if($_REQUEST["get"]):?>
                        <div id="<?=$arItem["CODE"]?>">
                            <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <?if($ar["DISABLED"])continue?>
                            <div class="list-item" data-name="<?=$ar["CONTROL_NAME_ALT"]?>" data-value="<?=$ar["HTML_VALUE_ALT"]?>"><?=$ar["VALUE"];?></div>
                            <?endforeach;?>
                        </div>
                    <?else:?>
                    <input type="hidden" name="<?=$arCur["CONTROL_NAME_ALT"]?>" value="<?=$arCur["HTML_VALUE_ALT"] ?>" id="value_<?=$arItem["CODE"]?>" onchange="smartFilter.keyup(this)">
                    <input type="text" class="pseudo" id="<?=$arItem["CODE"]?>" value="<?=$arCur["VALUE"] ?>" placeholder="<?=$arItem["FILTER_HINT"]?>">
                    <?endif?>
                <?else:?>
                <select name="<?=$arCur["CONTROL_NAME_ALT"]?>" onchange="smartFilter.select(this)" class="select_custom">
                    <option value="" data-name=""><?=$arItem["FILTER_HINT"]?></option>
                    <?foreach($arItem["VALUES"] as $val => $ar):?>
                        <?if($ar["DISABLED"])continue?>
                        <option value="<?=$ar["HTML_VALUE_ALT"] ?>" data-name="<?=$ar["CONTROL_NAME_ALT"]?>" <?=$ar["CHECKED"]? 'selected="selected"': '' ?>><?=$ar["VALUE"];?></option>
                    <?endforeach?>
                </select>
                <?endif?>
                <?break;?>
                <? default:?>
                <div class="catalog_filters_field--checkboxes d_flex a_items_center j_content_between f_wrap">
                    <?foreach($arItem["VALUES"] as $val => $ar):?>
                        <?if($ar["DISABLED"])continue?>
                        <label class="catalog_filters_field--checkbox" for="<? echo $ar["CONTROL_ID"] ?>">
                            <input
                                    type="checkbox"
                                    value="<? echo $ar["HTML_VALUE"] ?>"
                                    name="<? echo $ar["CONTROL_NAME"] ?>"
                                    id="<? echo $ar["CONTROL_ID"] ?>"
                                    <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                    onclick="smartFilter.click(this)"
                            />
                            <div class="catalog_filters_field--checkbox_txt"><?=$ar["VALUE"];?></div>
                        </label>
                    <?endforeach;?>
                </div>
                <?break;?>
            <?endswitch;?>
        </div>
    </div>
    <?endforeach?>
    <div class="catalog_filters_field--btn">
        <button type="submit" id="set_filter" style="width: 250px;" class="btn btn_yellow btn--icon d_flex a_items_center j_content_center">
            <em class="btn_icon"><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.5 0C3.22266 0 3 0.222656 3 0.5V1H0V2H3V2.5C3 2.77734 3.22266 3 3.5 3H5.5C5.77734 3 6 2.77734 6 2.5V2H12V1H6V0.5C6 0.222656 5.77734 0 5.5 0H3.5ZM4 1H5V2H4V1ZM7.5 5C7.22266 5 7 5.22266 7 5.5V6H0V7H7V7.5C7 7.77734 7.22266 8 7.5 8H9.5C9.77734 8 10 7.77734 10 7.5V7H12V6H10V5.5C10 5.22266 9.77734 5 9.5 5H7.5ZM8 6H9V7H8V6ZM1.5 10C1.22266 10 1 10.2227 1 10.5V11H0V12H1V12.5C1 12.7773 1.22266 13 1.5 13H3.5C3.77734 13 4 12.7773 4 12.5V12H12V11H4V10.5C4 10.2227 3.77734 10 3.5 10H1.5ZM2 11H3V12H2V11Z" fill="#39331E"></path></svg></em>
            <em class="btn_txt">Показать предложения</em>
        </button>
    </div>
</div>
    <input type="hidden" id="filterUrl" value="">
</form>
<script type="text/javascript">
    var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>
<?if(!$_REQUEST["get"]):?>
</div>
<?endif?>

