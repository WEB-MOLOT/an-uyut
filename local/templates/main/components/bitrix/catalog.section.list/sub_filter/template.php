<ul class="d_flex f_wrap">
        <?php foreach ($arResult['SECTIONS'] as &$arSection)
        {
        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
        ?>
        <li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>" class="active" data-item="<?=$arSection['ID'];?>"><? echo $arSection['NAME']; ?>
        </li>
        <?php }?>
    </ul>


<div class="filter__panel">
<?php foreach ($arResult['SECTIONS'] as &$arSection)
{
$APPLICATION->IncludeComponent(
    "bitrix:catalog.smart.filter",
    "main",
    array(
        "COMPONENT_TEMPLATE" => ".default",
        "IBLOCK_TYPE" => "books",
        "IBLOCK_ID" => "31",
        "SECTION_ID" => $arSection['ID'],
        "SECTION_CODE" => "",
        "FILTER_NAME" => "arrFilter",
        "HIDE_NOT_AVAILABLE" => "N",
        "TEMPLATE_THEME" => "blue",
        "FILTER_VIEW_MODE" => "",
        "DISPLAY_ELEMENT_COUNT" => "Y",
        "SEF_MODE" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_GROUPS" => "Y",
        "SAVE_IN_SESSION" => "N",
        "INSTANT_RELOAD" => "Y",
        "PAGER_PARAMS_NAME" => "arrPager",
        "PRICE_CODE" => array(
            0 => "BASE",
        ),
        "CONVERT_CURRENCY" => "Y",
        "XML_EXPORT" => "N",
        "SECTION_TITLE" => "-",
        "SECTION_DESCRIPTION" => "-",
        "POPUP_POSITION" => "left",
        "SEF_RULE" => "search/#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
        "SECTION_CODE_PATH" => "",
        "SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
        "CURRENCY_ID" => "RUB"
    ),
    false
);
}?>
</div>
