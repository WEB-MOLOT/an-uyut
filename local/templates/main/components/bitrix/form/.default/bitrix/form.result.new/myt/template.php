<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>
<?if ($arResult["isFormNote"] != "Y") { ?>
	<div class="wus_desc">Оставьте заявку в этой форме или позвоните нам по номеру <span>8 495 150 33 28</span> и мы решим ваш жилищный вопрос!</div>
<? } ?>
<?if ($arResult["isFormErrors"] == "Y") {?><? //echo $arResult["FORM_ERRORS_TEXT"]; ?><? }?>

<?if ($arResult["isFormNote"] == "Y") { ?>
	<br><br><div class="wus_desc"><?=$arResult["FORM_NOTE"]?></div>
<? } ?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<div class="wus_form">
<?=$arResult["FORM_HEADER"]?>

<table>
<?
if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
{
?>
	<tr>
		<td><?
/***********************************************************************************
					form header
***********************************************************************************/
if ($arResult["isFormTitle"])
{
?>
<!-- 	<h3><?=$arResult["FORM_TITLE"]?></h3> -->
<?
} //endif ;

	if ($arResult["isFormImage"] == "Y")
	{
	?>
	<a href="<?=$arResult["FORM_IMAGE"]["URL"]?>" target="_blank" alt="<?=GetMessage("FORM_ENLARGE")?>"><img src="<?=$arResult["FORM_IMAGE"]["URL"]?>" <?if($arResult["FORM_IMAGE"]["WIDTH"] > 300):?>width="300"<?elseif($arResult["FORM_IMAGE"]["HEIGHT"] > 200):?>height="200"<?else:?><?=$arResult["FORM_IMAGE"]["ATTR"]?><?endif;?> hspace="3" vscape="3" border="0" /></a>
	<?//=$arResult["FORM_IMAGE"]["HTML_CODE"]?>
	<?
	} //endif
	?>

			<p><?=$arResult["FORM_DESCRIPTION"]?></p>
		</td>
	</tr>
	<?
} // endif
	?>
</table>
<br />
<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>
<div class="row wus_fields d_flex a_items_center f_wrap">
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
		if($FIELD_SID == 'AGREEMENT') continue;
	?>
		<div class="col col-3">
			<div class="wus_field">
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
<!-- 				<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span> -->
					<font color="red">
				<?endif;?>
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				</font>
				<?endif;?>
				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
				<?=$arQuestion["HTML_CODE"]?>
			</div>
		</div>
	<?
	} //endwhile
	?>
<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
		<tr>
			<th colspan="2"><b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b></th>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></td>
		</tr>
		<tr>
			<td><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></td>
			<td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></td>
		</tr>
<?
} // isUseCaptcha
?>

	

<p>


</p>
</div>
<!--<div class="row">
<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</div>-->
<div class="wus_form_submit">
	<div class="wus_fs_btn">
		<button <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center" name="web_form_submit">
			<em class="btn_txt">Отправить</em>
			<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"></path></svg></em>
		</button>
		<?if ($arResult["F_RIGHT"] >= 15):?>
		&nbsp;<input type="hidden" name="web_form_apply" value="Y" /><!--<input type="submit" name="web_form_apply" value="<?=GetMessage("FORM_APPLY")?>" />-->
		<?endif;?>
<!-- 	&nbsp;<input type="reset" value="<?=GetMessage("FORM_RESET");?>" /> -->
	</div>
	<div class="wus_fs_agree">
		<?
		foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
			if($FIELD_SID != 'AGREEMENT') continue; ?>
			<span class="agree_input_field">
				<span class="agree_input">
					<?=$arQuestion["HTML_CODE"]?>
				</span>
				<span class="agree_txt">
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<font color="red">
				<?endif;?>
				Даю согласие на обработку <a href="#">персональных данных</a>
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				</font>
				<?endif;?>
				
				</span>
			</span>
			
		<? } ?>
	</div>
</div>
<?=$arResult["FORM_FOOTER"]?>
</div>
<?
} //endif (isFormNote)
?>

<script>
$(document).ready(function(){
	$('.wus_form input.popup_referer').val(location.href);
});
</script>
