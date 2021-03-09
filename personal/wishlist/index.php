<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Избранное");
use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;
$application = Application::getInstance();
$context = $application->getContext();
if(CModule::IncludeModule("catalog") && CModule::IncludeModule("iblock")){
?>

<div class="page__catalog inner favorites">
	<div class="main_inside_wrapper">
		<div class="container">
			<br><br>
			<div class="breadcrumbs">
				<a href="/" title="Главная">
					<span itemprop="name">Главная</span>
				</a>
				<span class="sep">/</span>
				<span>Избранное</span>
			</div>
			<h1 class="title_page">Избранное</h1>
		<div class="catalog">
        <?
		if(!$USER->IsAuthorized()) { // Для неавторизованного
			global $APPLICATION;
			$favorites = unserialize($APPLICATION->get_cookie('favorites'));
		} else {
			$idUser = $USER->GetID();
			$rsUser = CUser::GetByID($idUser);
			$arUser = $rsUser->Fetch();
			$favorites = $arUser['UF_FAVORITES'];

		}
		if(!is_array($favorites)) {
			unset($favorites);
		}
// 		print_r($favorites);
		if(count($favorites) > 0 && is_array($favorites)) {
		
		$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PICTURE", "PREVIEW_TEXT", "DETAIL_PAGE_URL",  "DATE_ACTIVE_FROM","PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
		$arFilter = Array("IBLOCK_ID"=>31, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => $favorites);
		
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>16), $arSelect);
		$res->NavStart(0);
		if($res->SelectedRowsCount() > 0){
			?>
			 <div class="catalog_item active" data-item="2">
				<div class="catalog_item_cols">
					<div class="row row_catalog d_flex f_wrap">
						<?while($ob = $res->GetNextElement()) {?>
						<?
						$arFields = $ob->GetFields();
						$arProps = $ob->GetProperties();
						$img = CFile::getPath($arFields["DETAIL_PICTURE"]);
						if($img == null || !$img || $arFields["DETAIL_PICTURE"] == '') $img = '/local/templates/main/components/bitrix/catalog/main/bitrix/catalog.section/.default/images/no_photo.png';
						?>  
						<div class="col col-4 item_item_container">
							<div class="item">
								<div class="item_head">
									<div class="item_image"><a href="<?=$arFields["DETAIL_PAGE_URL"]?>"><img src="<?=$img?>" alt=""/></a></div>
									<span class="item_favorite fpage" data-item="<?=$arFields["ID"]?>"><svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.00062 13.1365L7.79562 12.9665C7.40687 12.6415 6.88062 12.289 6.27062 11.8815C3.89438 10.2902 0.640625 8.11273 0.640625 4.40023C0.640625 2.10648 2.50687 0.240234 4.80062 0.240234C6.04688 0.240234 7.21438 0.795234 8.00062 1.74398C8.78687 0.795234 9.95438 0.240234 11.2006 0.240234C13.4944 0.240234 15.3606 2.10648 15.3606 4.40023C15.3606 8.11273 12.1069 10.2902 9.73063 11.8815C9.12062 12.289 8.59438 12.6415 8.20563 12.9665L8.00062 13.1365Z" fill="#D9E3EC"/></svg></span>
								</div>
								<a href="<?=$arFields["DETAIL_PAGE_URL"]?>" class="item_body">
									<div class="item_meta d_flex a_items_center j_content_between f_wrap">
										<? if (!empty($arProps['price_value']['VALUE'])){?>
										<div class="item_meta_price"><?=number_format($arProps['price_value']['VALUE'], 0, '', ' ')?> ₽</div>
										<?}?>
										<? if (!empty($arProps['price_value']['VALUE'])){?>
										<div class="item_meta_area"><?=number_format(ceil($arProps['price_value']['VALUE']/$arProps['area_value']['VALUE']), 0, '', ' ')?> ₽ за м<sup>2</sup></div>
										<?}?>
									</div>
									<div class="item_info">
									<span class="item_info--appartment"><?=$arFields["NAME"]?></span>,
									<span class="item_info--appartment_info"><? if (!empty($arProps['area_value']['VALUE'])){?>
											<?=$arProps['area_value']['VALUE']?> м<sup>2</sup>,<?}?>
										<? if (!empty($arProps['floor']['VALUE'])){?>
											<?=$arProps['floor']['VALUE']?> этаж<?}?></span>
									<? if (!empty($arProps['location_locality_name']['VALUE'])){?><br><?=$arProps['location_locality_name']['VALUE']?>, <?=$arProps['location_address']['VALUE']?><?}?></div>
								</a>
							</div>
						</div>
						<? } ?>
					</div>
				</div>
			</div>
			<?
			ob_start(); // начинаем буферизацию вывода
			$APPLICATION->IncludeComponent(
				'bitrix:system.pagenavigation',
				'round',
				array(
					'NAV_TITLE'   => 'Элементы', // поясняющий текст для постраничной навигации
					'NAV_RESULT'  => $res,  // результаты выборки из базы данных
					'SHOW_ALWAYS' => false       // показывать постраничную навигацию всегда?
				)
			);
			$navString = ob_get_clean(); // завершаем буферизацию вывода
			echo $navString;
			?>
			<?
		} else {
			?>
			<div class="inner">
				<div class="center">
					<div class="waitingfor">
						Вы не добавляли товары в избранное.
					</div>
				</div>
			</div>
			<?
		}
		} else {
			?>
			<div class="inner">
				<div class="center">
					<div class="waitingfor">
						Вы не добавляли товары в избранное.
					</div>
				</div>
			</div>
		<? } ?>
		
		</div>
		</div>
		</div>
	</div>
</div>
<? } ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>