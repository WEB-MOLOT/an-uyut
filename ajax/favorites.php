<?
use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
// $APPLICATION->SetTitle(" ");
global $APPLICATION, $USER;
// $APPLICATION->RestartBuffer();


$context = Application::getInstance()->getContext();
CModule::IncludeModule("catalog");
CModule::IncludeModule("iblock");
/* Избранное */


if($_GET['id']) {
	
	if(!$USER->IsAuthorized()) { // Для неавторизованного
		
		$arElements = unserialize($APPLICATION->get_cookie('favorites'));
// 		echo 'fdfdf';
		if(!in_array($_GET['id'], $arElements))
		{
			$arElements[] = $_GET['id'];
			$result = 1; // Датчик. Добавляем
		}
		else {
			$key = array_search($_GET['id'], $arElements); // Находим элемент, который нужно удалить из избранного
			unset($arElements[$key]);
			$result = 2; // Датчик. Удаляем
		}
		$cookie = new Cookie("favorites", serialize($arElements), time() + 60*60*24*60);
		$cookie->setSpread(\Bitrix\Main\Web\Cookie::SPREAD_DOMAIN); // распространять куки на все домены
		$cookie->setDomain($context->getServer()->getHttpHost()); // домен
		$cookie->setPath("/"); // путь
		$cookie->setSecure(false); // безопасное хранение cookie
		$cookie->setHttpOnly(true);
		\Bitrix\Main\Application::getInstance()->getContext()->getResponse()->addCookie($cookie);
		
	} else { // Для авторизованного
		$idUser = $USER->GetID();
		$rsUser = CUser::GetByID($idUser);
		$arUser = $rsUser->Fetch();
		$arElements = $arUser['UF_FAVORITES'];  // Достаём избранное пользователя
		if(!in_array($_GET['id'], $arElements)) // Если еще нету этой позиции в избранном
		{
			$arElements[] = $_GET['id'];
			$result = 1;
		}
		else {
			$key = array_search($_GET['id'], $arElements); // Находим элемент, который нужно удалить из избранного
			unset($arElements[$key]);
			$result = 2;
		}
		$USER->Update($idUser, Array("UF_FAVORITES" => $arElements)); // Добавляем элемент в избранное
	}
}
/* Избранное */
// 
if(!$USER->IsAuthorized()) {
	$context->getResponse()->flush(json_encode($result));
} else {
	echo json_encode($result);
}