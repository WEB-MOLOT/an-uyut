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
<div class="row row_partners_items d_flex f_wrap">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    
    
    <div class="col col-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
										<div class="item d_flex a_items_center j_content_center">
                                            <? if(!empty($arItem['PROPERTIES']['link']['VALUE'])){?>
                                            <a href="" <? if(!empty($arItem['PROPERTIES']['blank']['VALUE'])){?>target="_blank"<?}?>>
                                            <?}?>
											<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""/>
                                            <? if(!empty($arItem['PROPERTIES']['link']['VALUE'])){?>
                                            </a>
                                            <?}?>
										</div>
									</div>
    
    
    
<?endforeach;?>
</div>
