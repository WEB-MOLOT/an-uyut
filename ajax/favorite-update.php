<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_REQUEST['ajax_action'])) {
    switch($_REQUEST['ajax_action']) {
        case "add_favorite":
            if(isset($_REQUEST['id'])) {
                $return['status'] = 0;
                $return['message'] = '';

                $favoriteId = intval($_REQUEST['id']);

                if(!$USER->IsAuthorized()) {
                    $userFovarites = unserialize($APPLICATION->get_cookie('favorites'));
                    if(!in_array($favoriteId, $userFovarites))
                        $userFovarites[] = $favoriteId;
                    $APPLICATION->set_cookie("favorites",serialize($userFovarites));
                }
                else {
                    $idUser = $USER->GetID();
                    $rsUser = CUser::GetByID($idUser);
                    $arUser = $rsUser->Fetch();
                    $userFovarites = unserialize($arUser['UF_FAVORITES']);
                    if(!in_array($favoriteId, $userFovarites))
                        $userFovarites[] = $favoriteId;
                    $USER->Update($idUser, Array("UF_FAVORITES"=>serialize($userFovarites)));
                }

                $return['status'] = 1;
            }
            break;

        case "remove_favorite":
            if(isset($_REQUEST['id'])) {
                $return['status'] = 0;
                $return['message'] = '';

                $favoriteId = intval($_REQUEST['id']);

                if(!$USER->IsAuthorized()) {
                    $userFovarites = unserialize($APPLICATION->get_cookie('favorites'));
                    foreach ($userFovarites as $id => $favoriteItem) {
                        if($favoriteId == $favoriteItem) {
                            unset($userFovarites[$id]);
                            break;
                        }
                    }
                    $APPLICATION->set_cookie("favorites",serialize($userFovarites));
                }
                else {
                    $idUser = $USER->GetID();
                    $rsUser = CUser::GetByID($idUser);
                    $arUser = $rsUser->Fetch();
                    $userFovarites = unserialize($arUser['UF_FAVORITES']);
                    foreach ($userFovarites as $id => $favoriteItem) {
                        if($favoriteId == $favoriteItem) {
                            unset($userFovarites[$id]);
                            break;
                        }
                    }
                    $USER->Update($idUser, Array("UF_FAVORITES"=>serialize($userFovarites)));
                }

                $return['status'] = 1;
            }
            break;

        case "remove_all_favorite":
            if(true) { // haha
                $return['status'] = 0;
                $return['message'] = '';

                $userFovarites = array();

                if(!$USER->IsAuthorized()) {
                    $APPLICATION->set_cookie("favorites",serialize($userFovarites));
                }
                else {
                    $USER->Update($USER->GetID(), Array("UF_FAVORITES"=>serialize($userFovarites)));
                }

                $return['status'] = 1;
            }
            break;


        case "is_favorite":
            if(isset($_REQUEST['id'])) {
                $return['status'] = 0;
                $return['message'] = '';

                $favoriteId = intval($_REQUEST['id']);

                // избранное
                $arResult['FAVOITE_LIST_ITEMS'] = array();
                if(!$USER->IsAuthorized()) {
                    $arResult['FAVOITE_LIST_ITEMS'] = unserialize($APPLICATION->get_cookie('favorites'));
                }
                else {
                    $idUser = $USER->GetID();
                    $rsUser = CUser::GetByID($idUser);
                    $arUser = $rsUser->Fetch();
                    $arResult['FAVOITE_LIST_ITEMS'] = unserialize($arUser['UF_FAVORITES']);
                }
                if (!empty($arResult['FAVOITE_LIST_ITEMS']) && in_array($favoriteId, $arResult['FAVOITE_LIST_ITEMS'])) {
                    $return['status'] = 1;
                }

            }
            break;
    }
}

print json_encode($return);
?>