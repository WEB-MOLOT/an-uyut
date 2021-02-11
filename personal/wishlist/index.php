<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Избранное");
$favoriteIds = array();
if(!$USER->IsAuthorized()) {
    $favoriteIds = unserialize($APPLICATION->get_cookie('favorites'));
}
else
{
    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $favoriteIds = unserialize($arUser['UF_FAVORITES']);
}?>
   <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>