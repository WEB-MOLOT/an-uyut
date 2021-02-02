<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= ''."\n";
}

$strReturn .= '<div class="breadcrumbs">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">
					<span itemprop="name">'.$title.'</span>
				</a>
				<span class="sep">/</span>
			';
	}
	else
	{
		$strReturn .= '
			
				<span>'.$title.'</span>
			';
	}
}

$strReturn .= '</div>';

return $strReturn;
