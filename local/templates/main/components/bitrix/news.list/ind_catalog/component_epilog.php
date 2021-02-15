<?
global $APPLICATION;

if(!$USER->IsAuthorized())
{
    $arFavorites = unserialize($APPLICATION->get_cookie("favorites"));
    //print_r($arFavorites);
}
else {
    $idUser = $USER->GetID();
    $rsUser = CUser::GetByID($idUser);
    $arUser = $rsUser->Fetch();
    $arFavorites = $arUser['UF_FAVORITES'];  // Достаём избранное пользователя
}
count($arFavorites);
/* Меняем отображение сердечка товара */
foreach($arFavorites as $k => $favoriteItem):?>
    <script>
        if($('.item_favorite[data-item="<?=$favoriteItem?>"]'))
            $('.item_favorite[data-item="<?=$favoriteItem?>"]').addClass('active');
    </script>
<?endforeach;?>