<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

$colorSchemes = array(
	"green" => "bx-green",
	"yellow" => "bx-yellow",
	"red" => "bx-red",
	"blue" => "bx-blue",
);
if(isset($colorSchemes[$arParams["TEMPLATE_THEME"]]))
{
	$colorScheme = $colorSchemes[$arParams["TEMPLATE_THEME"]];
}
else
{
	$colorScheme = "";
}
?>

<div class="pagination <?=$colorScheme?>">
<?if($arResult["bDescPageNumbering"] === true):?>

	<?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["bSavePage"]):?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" class="prev">
				<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.75 3.75L2.74609 3.75L5.48047 0.898437L4.58203 0.039062L0.416992 4.36523L4.58203 8.71094L5.48047 7.85156L2.75098 5L16.75 5L16.75 3.75Z" fill="black"/>
				</svg>
			</a>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">1</a>
		<?else:?>
			<?if (($arResult["NavPageNomer"]+1) == $arResult["NavPageCount"]):?>
				<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="prev">
					<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16.75 3.75L2.74609 3.75L5.48047 0.898437L4.58203 0.039062L0.416992 4.36523L4.58203 8.71094L5.48047 7.85156L2.75098 5L16.75 5L16.75 3.75Z" fill="black"/>
					</svg>
				</a>
			<?else:?>
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" class="prev">
					<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16.75 3.75L2.74609 3.75L5.48047 0.898437L4.58203 0.039062L0.416992 4.36523L4.58203 8.71094L5.48047 7.85156L2.75098 5L16.75 5L16.75 3.75Z" fill="black"/>
					</svg>
				</a>
			<?endif?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
		<?endif?>
	<?else:?>
			<span class="prev">
				<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.75 3.75L2.74609 3.75L5.48047 0.898437L4.58203 0.039062L0.416992 4.36523L4.58203 8.71094L5.48047 7.85156L2.75098 5L16.75 5L16.75 3.75Z" fill="black"/>
				</svg>
			</span>
			<span class="current">1</span>
	<?endif?>

	<?
	$arResult["nStartPage"]--;
	while($arResult["nStartPage"] >= $arResult["nEndPage"]+1):
	?>
		<?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<span class="current"><?=$NavRecordGroupPrint?></span>
		<?else:?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a>
		<?endif?>

		<?$arResult["nStartPage"]--?>
	<?endwhile?>

	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a>
		<?endif?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" class="next">
				<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.417969 5L14.4219 5L11.6875 7.85156L12.5859 8.71094L16.751 4.38477L12.5859 0.0390625L11.6875 0.898437L14.417 3.75L0.417969 3.75L0.417969 5Z" fill="black"/>
				</svg>
			</a>
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
			<span class="current"><?=$arResult["NavPageCount"]?></span>
		<?endif?>
			<span class="next">
				<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.417969 5L14.4219 5L11.6875 7.85156L12.5859 8.71094L16.751 4.38477L12.5859 0.0390625L11.6875 0.898437L14.417 3.75L0.417969 3.75L0.417969 5Z" fill="black"/>
				</svg>
			</span>
	<?endif?>

<?else:?>

	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["bSavePage"]):?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" class="prev">
				<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.75 3.75L2.74609 3.75L5.48047 0.898437L4.58203 0.039062L0.416992 4.36523L4.58203 8.71094L5.48047 7.85156L2.75098 5L16.75 5L16.75 3.75Z" fill="black"/>
				</svg>
			</a>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
		<?else:?>
			<?if ($arResult["NavPageNomer"] > 2):?>
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" class="prev">
					<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16.75 3.75L2.74609 3.75L5.48047 0.898437L4.58203 0.039062L0.416992 4.36523L4.58203 8.71094L5.48047 7.85156L2.75098 5L16.75 5L16.75 3.75Z" fill="black"/>
					</svg>
				</a>
			<?else:?>
				<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="prev">
					<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M16.75 3.75L2.74609 3.75L5.48047 0.898437L4.58203 0.039062L0.416992 4.36523L4.58203 8.71094L5.48047 7.85156L2.75098 5L16.75 5L16.75 3.75Z" fill="black"/>
					</svg>
				</a>
			<?endif?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
		<?endif?>
	<?else:?>
			<span class="prev">
				<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.75 3.75L2.74609 3.75L5.48047 0.898437L4.58203 0.039062L0.416992 4.36523L4.58203 8.71094L5.48047 7.85156L2.75098 5L16.75 5L16.75 3.75Z" fill="black"/>
				</svg>
			</span>
			<span class="current">1</span>
	<?endif?>

	<?
	$arResult["nStartPage"]++;
	while($arResult["nStartPage"] <= $arResult["nEndPage"]-1):
	?>
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<span class="current"><?=$arResult["nStartPage"]?></span>
		<?else:?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>

	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
		<?endif?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" class="next">
				<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.417969 5L14.4219 5L11.6875 7.85156L12.5859 8.71094L16.751 4.38477L12.5859 0.0390625L11.6875 0.898437L14.417 3.75L0.417969 3.75L0.417969 5Z" fill="black"/>
				</svg>
			</a>
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
			<span class="current"><?=$arResult["NavPageCount"]?></span>
		<?endif?>
            <?if ($arResult["NavPageNomer"] !=  $arResult["NavPageCount"])
            {?>

                <span class="next">
                    <svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.417969 5L14.4219 5L11.6875 7.85156L12.5859 8.71094L16.751 4.38477L12.5859 0.0390625L11.6875 0.898437L14.417 3.75L0.417969 3.75L0.417969 5Z" fill="black"/>
                    </svg>
                </span>
            <?}

            ?>

			<!--<span class="next">
				<svg width="17" height="9" viewBox="0 0 17 9" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.417969 5L14.4219 5L11.6875 7.85156L12.5859 8.71094L16.751 4.38477L12.5859 0.0390625L11.6875 0.898437L14.417 3.75L0.417969 3.75L0.417969 5Z" fill="black"/>
				</svg>
			</span>-->
	<?endif?>
<?endif?>

<?if ($arResult["bShowAll"]):?>
	<?if ($arResult["NavShowAll"]):?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0" rel="nofollow"><?echo GetMessage("round_nav_pages")?></a>
	<?else:?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1" rel="nofollow"><?echo GetMessage("round_nav_all")?></a>
	<?endif?>
<?endif?>
</div>
