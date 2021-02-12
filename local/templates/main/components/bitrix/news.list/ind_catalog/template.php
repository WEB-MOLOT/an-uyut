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
// print_r($arResult["ITEMS"]);
?>
<div class="object_similar_slider row_catalog">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
// 	echo $arItem['PROPERTIES']['area_value']['VALUE'];
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="item">
		<div class="item_head" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="item_image"><a href="<? echo $arItem['DETAIL_PAGE_URL']; ?>"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" alt=""/></a></div>
			<span class="item_favorite"  data-item="<?=$arItem["ID"]?>"><svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.00062 13.1365L7.79562 12.9665C7.40687 12.6415 6.88062 12.289 6.27062 11.8815C3.89438 10.2902 0.640625 8.11273 0.640625 4.40023C0.640625 2.10648 2.50687 0.240234 4.80062 0.240234C6.04688 0.240234 7.21438 0.795234 8.00062 1.74398C8.78687 0.795234 9.95438 0.240234 11.2006 0.240234C13.4944 0.240234 15.3606 2.10648 15.3606 4.40023C15.3606 8.11273 12.1069 10.2902 9.73063 11.8815C9.12062 12.289 8.59438 12.6415 8.20563 12.9665L8.00062 13.1365Z" fill="#D9E3EC"/></svg></span>
		</div>
        <script>
            $(document).ready(function() {
                /* Favorites */
                $('span.item_favorite').on('click', function(e) {
                    var favorID = $(this).attr('data-item');
                    if($(this).hasClass('active'))
                        var doAction = 'delete';
                    else
                        var doAction = 'add';

                    addFavorite(favorID, doAction);
                });
                /* Favorites */
            });
            /* Избранное */
            function addFavorite(id, action)
            {
                var param = 'id='+id+"&action="+action;
                $.ajax({
                    url:     '/ajax/favorites.php', // URL отправки запроса
                    type:     "GET",
                    dataType: "html",
                    data: param,
                    success: function(response) { // Если Данные отправлены успешно
                        var result = $.parseJSON(response);
                        if(result == 1){ // Если всё чётко, то выполняем действия, которые показывают, что данные отправлены :)
                            $('.favor[data-item="'+id+'"]').addClass('active');
                            var wishCount = parseInt($('#want .col').html()) + 1;
                            $('#want .col').html(wishCount); // Визуально меняем количество у иконки
                        }
                        if(result == 2){
                            $('.favor[data-item="'+id+'"]').removeClass('active');
                            var wishCount = parseInt($('#want .col').html()) - 1;
                            $('#want .col').html(wishCount); // Визуально меняем количество у иконки
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){ // Если ошибка, то выкладываем печаль в консоль
                        console.log('Error: '+ errorThrown);
                    }
                });
            }
            /* Избранное */
        </script>
		<a href="<? echo $arItem['DETAIL_PAGE_URL']; ?>" class="item_body">
			<div class="item_meta d_flex a_items_center j_content_between f_wrap">
				<div class="item_meta_price"><?=number_format($arItem['PROPERTIES']['price_value']['VALUE'], 0, '', ' ')?> ₽</div>
				<? if (!empty($arItem['PROPERTIES']['area_value']['VALUE'])){?>
				<div class="item_meta_area"><?=number_format(ceil($arItem['PROPERTIES']['price_value']['VALUE']/$arItem['PROPERTIES']['area_value']['VALUE']), 0, '', ' ')?> ₽ за м<sup>2</sup></div>
				<?}?>
			</div>
			<div class="item_info">
                <? if($arItem["NAME"]) { ?>
                    <span class="item_info--appartment"><?=$arItem["NAME"]?></span>,
                <? } ?>
				<?/* if($arItem['PROPERTIES']['rooms']['VALUE']) { */?><!--
				<span class="item_info--appartment"><?/*=$arItem['PROPERTIES']['rooms']['VALUE']*/?>-комн. квартира</span>,
				--><?/* } */?>
				<span class="item_info--appartment_info"><? if (!empty($arItem['PROPERTIES']['area_value']['VALUE'])){?>
						<?=$arItem['PROPERTIES']['area_value']['VALUE']?> м<sup>²</sup>,
					<?}?>
					<? if (!empty($arItem['PROPERTIES']['floor']['VALUE'])){?>
						<?=$arItem['PROPERTIES']['floor']['VALUE']?> этаж<?}?></span>
				<? if (!empty($arItem['PROPERTIES']['location_locality_name']['VALUE'])){?><br><?=$arItem['PROPERTIES']['location_locality_name']['VALUE']?>, <?=$arItem['PROPERTIES']['location_address']['VALUE']?><?}?>
			</div>
		</a>
	</div>



    
<?endforeach;?>
</div>
