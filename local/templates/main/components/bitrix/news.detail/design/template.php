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

<div class="page__design">
	<div class="main_inside_wrapper">
    	<div class="main_head" style="background-image: url(<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?><?=$arResult["DETAIL_PICTURE"]["SRC"]?><?else:?>/local/templates/main/img/bg_design.jpg<?endif?>);">
        	<div class="container">
            	<div class="bread__block"></div>
                <h1 class="title_page"><?=$arResult["NAME"]?></h1>
                <div class="mh_desc">
                	<?echo $arResult["DETAIL_TEXT"];?>
                </div>
            </div>
        </div>
        
        
        <div class="main_inside">
					<div class="container">
                    
                    <? if(!empty($arResult['PROPERTIES']['ban_text']['VALUE'])){?>
                    <div class="price_control price_control--design_page">
							<div class="price_control_info">
								<?=htmlspecialcharsBack($arResult["PROPERTIES"]["ban_text"]["VALUE"]["TEXT"])?>
                                 <? if(!empty($arResult['PROPERTIES']['show_ban']['VALUE'])){?>
								<div class="price_control_btn">
									<a class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
										<em class="btn_txt">Оставить заявку</em>
										<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
									</a>
								</div>
                                <?}?>
							</div>
                            <? if(!empty($arResult['PROPERTIES']['ban_pic']['VALUE'])){?>
							<div class="price_control_image">
								<img src="<? echo CFile::GetPath($arResult["PROPERTIES"]["ban_pic"]["VALUE"]) ?>" alt=""/>
							</div>
                            <?}?>
						</div>
                    <?}?>
                    
                    
                   <? if(!empty($arResult['PROPERTIES']['gallery']['VALUE'])){?> 
                    <div class="work_examples">
							<div class="title_bk">Примеры работы</div>
							<div class="work_examples_wrapper">
								<div class="work_examples_slider_wrapper">
									<div class="work_examples_slider">
                                        <?foreach($arResult["PROPERTIES"]["gallery"]["VALUE"] as $PHOTO => $val):?> 
										<div class="item">
											<img src="<?=CFile::GetPath($val); ?>" alt=""/>
										</div>
										<?endforeach?>
									</div>
									<div class="work_examples_slider_nav">
										<span class="work_examples_slider_nav--arr work_examples_slider_nav--arr_left d_flex j_content_center a_items_center">
											<svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M0.929688 3.5L4.26562 6.96875L4.98437 6.28125L2.78906 3.99219L14 3.99219L14 2.99219L2.80859 2.99219L4.98438 0.718751L4.26563 0.0312504L0.929688 3.5Z" fill="#010101"/>
											</svg>
										</span>
										<span class="work_examples_slider_nav--arr work_examples_slider_nav--arr_right d_flex j_content_center a_items_center">
											<svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#010101"/>
											</svg>
										</span>
									</div>
								</div>
								<div class="work_examples_slider_thumbnail">
                                
                                    <?foreach($arResult["PROPERTIES"]["gallery"]["VALUE"] as $PHOTO => $val):?> 
									<div class="item">
										<img src="<?=CFile::GetPath($val); ?>" alt=""/>
									</div>
									<?endforeach?>
								</div>
							</div>
						</div>
                    <?}?>
                    
                    
                    <div class="design_project">
							<div class="title_bk">Дизайн проект квартир</div>
							<div class="design_project_items">
                            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"design", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "design",
		"IBLOCK_ID" => "6",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "list",
			1 => "price",
			2 => "metr",
			3 => "icon",
			4 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DISPLAY_PANEL" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "design",
		"CACHE_GROUPS" => "Y",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "Y",
		"FILE_404" => ""
	),
	false
);?>

                            </div>
                      </div>
                      
                      
                      
                      <div style="display:none">
                      	<script>
                        	$('.breadcrumbs').appendTo('.bread__block')
                        </script>
                      </div>
                    
                    
                    
                     <?$APPLICATION->IncludeFile(
$APPLICATION->GetTemplatePath("include_areas/bottom_form.php"),
Array(),
Array("MODE"=>"html")
);?>
                    </div>
                    
                    
                   
                </div>
        
        
    </div>
</div><!--end page__design-->






