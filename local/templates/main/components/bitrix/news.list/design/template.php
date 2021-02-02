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
<div class="row row_dpi d_flex f_wrap">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    
    
    
    <div class="col col-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
										<div class="item">
											<div class="item_head d_flex a_items_center">
                                                <? if(!empty($arItem['PROPERTIES']['icon']['VALUE'])){?>
												<div class="item_icon d_flex j_content_center a_items_center">
													<img src="<? echo CFile::GetPath($arItem["PROPERTIES"]["icon"]["VALUE"]) ?>" alt=""/>
												</div>
                                                <?}?>
												<div class="item_title"><?=$arItem["NAME"]?></div>
											</div>
											<div class="item_body">
												<div class="item_list">
													<ul>
														<?foreach($arItem["DISPLAY_PROPERTIES"]["list"]["VALUE"] as $k=>$value):?>   
                                                        	<li><?=$value?><?=$arItem["DISPLAY_PROPERTIES"]["list"]["DESCRIPTION"][$k]?></li>
                                                        <?endforeach?>
													</ul>
												</div>
											</div>
											<div class="item_footer">
												<div class="item_footer_info d_flex a_items_center j_content_between f_wrap">
                                                    <? if(!empty($arItem['PROPERTIES']['price']['VALUE'])){?>
													<div class="item_price"><?=$arItem['PROPERTIES']['price']['VALUE']?> ₽ за м<sup>2</sup></div>
                                                    <?}?>
                                                    <? if(!empty($arItem['PROPERTIES']['metr']['VALUE'])){?>
													<div class="item_offer">Предложение от <?=$arItem['PROPERTIES']['metr']['VALUE']?> м<sup>2</sup></div>
                                                    <?}?>
												</div>
											</div>
										</div>
									</div>
    
    
    
    
    
    
	
<?endforeach;?>
</div>
