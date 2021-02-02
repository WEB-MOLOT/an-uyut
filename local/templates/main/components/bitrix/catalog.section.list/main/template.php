<div class="catalog_filters">
<div class="new_offers_tabs">
    <div class="title_bk title_bk--large">Новые <span>предложения</span></div>
    <div class="new_offers_tabs_wrapper">
        <div class="new_offers_tabs_inside">
            <ul class="d_flex a_items_center f_wrap">

                <?php foreach ($arResult['SECTIONS'] as $k => &$arSection)
{
    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

    ?>
                <li  id="<? echo $this->GetEditAreaId($arSection['ID']); ?>" class="d_flex j_content_center a_items_center <?php if($k == 0){?>active<? } ?>" data-item="<?=$arSection['ID'];?>">
                    <span class="new_offers_tabs--title"><?=(!empty($arSection['UF_NAME'])) ? $arSection['UF_NAME'] : $arSection['NAME']; ?></span>
                    <span class="new_offers_tabs--count"><? echo $arSection['ELEMENT_CNT']; ?></span>
                </li>
                <?php }?>

            </ul>
        </div>
    </div>
</div>
</div>
