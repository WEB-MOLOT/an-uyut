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
<div class="row row_us_works d_flex f_wrap">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    
    
    
    <div class="col col-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
										<div class="item">
											<div class="item_head">
												<div class="item_image">
													<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""/>
												</div>
											</div>
											<div class="item_body">
												<div class="item_meta d_flex a_items_center j_content_between f_wrap">
													<div class="item_meta_price"><?=$arItem['PROPERTIES']['price']['VALUE']?> ₽</div>
													<? if(!empty($arItem['PROPERTIES']['price_2']['VALUE'])){?><div class="item_meta_area"><?=$arItem['PROPERTIES']['price_2']['VALUE']?> ₽ за м<sup>2</sup></div><?}?>
												</div>
												<div class="item_info"><? if(!empty($arItem['PROPERTIES']['green_text']['VALUE'])){?><span class="item_info--appartment"><?=$arItem['PROPERTIES']['green_text']['VALUE']?></span>,<?}?> <span class="item_info--appartment_info"><? if(!empty($arItem['PROPERTIES']['area']['VALUE'])){?><?=$arItem['PROPERTIES']['area']['VALUE']?> м<sup>²</sup>,<?}?> <? if(!empty($arItem['PROPERTIES']['floor']['VALUE'])){?><?=$arItem['PROPERTIES']['floor']['VALUE']?> этаж<?}?></span> <? if(!empty($arItem['PROPERTIES']['addr']['VALUE'])){?><br><?=$arItem['PROPERTIES']['addr']['VALUE']?><?}?> </div>
												<div class="item_list">
													<ul>
														<?foreach($arItem["DISPLAY_PROPERTIES"]["works"]["VALUE"] as $k=>$value):?>   
                                                        <li><?=$value?><?=$arItem["DISPLAY_PROPERTIES"]["works"]["DESCRIPTION"][$k]?></li>
                                                        <?endforeach?>
													</ul>
												</div>
                                                <? if(!empty($arItem['PROPERTIES']['link']['VALUE'])){?>
												<div class="item_show_more"><a href="<?=$arItem['PROPERTIES']['link']['VALUE']?>">Подробнее</a></div>
                                                <?}?>
											</div>
										</div>
									</div>
    
    
    
<?endforeach;?>
</div>
