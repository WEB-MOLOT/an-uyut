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
<div class="row row_why_liked d_flex f_wrap">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    
    
    <div class="col col-2" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
										<div class="item d_flex a_items_center f_wrap" <? if(!empty($arItem['PROPERTIES']['bg']['VALUE'])){?> style="background-color:<?=$arItem['PROPERTIES']['bg']['VALUE']?>;"<?}?>>
                                            <? if(!empty($arItem['PROPERTIES']['icon']['VALUE'])){?>
											<div class="item_icon d_flex a_items_center j_content_center">
												<img src="<? echo CFile::GetPath($arItem["PROPERTIES"]["icon"]["VALUE"]) ?>" alt=""/>
											</div>
                                            <?}?>
											<div class="item_info">
												<div class="item_title"><?echo $arItem["NAME"]?></div>
												<div class="item_desc"><?echo $arItem["PREVIEW_TEXT"];?></div>
											</div>
										</div>
									</div>
    
    
<?endforeach;?>
</div>
