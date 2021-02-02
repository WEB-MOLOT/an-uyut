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


<h1 class="title_page"><?=$arResult["NAME"]?></h1>
					<div class="single_inside">
                       <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
						<div class="single_thumbnail">
							<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt=""/>
						</div>
                        <?endif?>
						<div class="single_content">
							<?echo $arResult["DETAIL_TEXT"];?>
						</div>
					</div>
