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
<div class="row row_safety_items d_flex f_wrap">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    
    
    <div class="col <? if(!empty($arItem['PROPERTIES']['w100']['VALUE'])){?>col-1<?}else{?>col-2<?}?>">
								<div class="item d_flex a_items_center" <? if(!empty($arItem['PROPERTIES']['bg']['VALUE'])){?>style="background-color:<?=$arItem['PROPERTIES']['bg']['VALUE']?>;"<?}?>>
									<div class="item_icon d_flex j_content_center a_items_center">
										<div class="item_icon_img">
											<img src="<? echo CFile::GetPath($arItem["PROPERTIES"]["icon"]["VALUE"]) ?>" alt=""/>
										</div>
									</div>
									<div class="item_desc"><?echo $arItem["NAME"]?></div>
								</div>
							</div>
    
    
    
<?endforeach;?>
</div>
