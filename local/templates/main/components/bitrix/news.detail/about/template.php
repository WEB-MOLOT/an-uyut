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


<div class="page__about">

	<div class="main_inside_wrapper">
		<div class="container">
              
              <div class="bread__block"></div>
              <h1 class="title_page"><?=$arResult["NAME"]?></h1>  
              
              
              <div class="about_info d_flex a_items_center f_wrap">
                      <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
						<div class="about_info_image">
							<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt=""/>
						</div>
                      <?endif?>
						<div class="about_info_desc" <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?> <?else:?> style="padding:0; width:100%;" <?endif?>>
							<?echo $arResult["DETAIL_TEXT"];?>	
						</div>
					</div>
                
                
                
                
  <? if(!empty($arResult['PROPERTIES']['show_serv']['VALUE'])){?>              
                <div class="activity">
                        <? if(!empty($arResult['PROPERTIES']['serv_title']['VALUE'])){?>  
						<div class="title_bk"><?=htmlspecialcharsBack($arResult['PROPERTIES']['serv_title']['VALUE'])?></div>
                        <?}?>
						<div class="activity_slider_wrapper">
							<div class="activity_slider row_services">
								
							<?$related_arr = $arResult["PROPERTIES"]["service"]["VALUE"]?> 	
                        <?
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_PAGE_URL", "DATE_ACTIVE_FROM","PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => $related_arr);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()):?>
  
  
 
<?
$arFields = $ob->GetFields();  
//print_r($arFields);
$arProps = $ob->GetProperties();
//print_r($arProps);
?>  	
							
								<div class="item">
									<div class="item_image">
										<img src="<?=CFile::getPath($arFields["PREVIEW_PICTURE"])?>" alt=""/>
									</div>
									<div class="item_info">
										<div class="item_title"><?=$arFields["NAME"]?></div>
										<div class="item_btn">
											<a href="<?=$arFields["DETAIL_PAGE_URL"]?>" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">Подробнее</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</a>
										</div>
									</div>
								</div>
                               <?endwhile?>   
                                
                                
							</div>
							<div class="activity_slider_nav">
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
                        
                        
                        <? if(!empty($arResult['PROPERTIES']['serv_link']['VALUE'])){?>  
						<div class="activity_btn">
							<a href="<?=$arResult['PROPERTIES']['serv_link']['VALUE']?>" <? if(!empty($arResult['PROPERTIES']['serv_blank']['VALUE'])){?> target="_blank"<?}?> class="btn btn_green_transparent btn--arrow btn--large d_flex a_items_center j_content_center">
								<em class="btn_txt"><? if(!empty($arResult['PROPERTIES']['serv_text']['VALUE'])){?><?=$arResult['PROPERTIES']['serv_text']['VALUE']?><?}else{?>Смотреть все услуги<?}?></em>
								<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
							</a>
						</div>
                        <?}?>
					</div>
                
                <?}?>
                
                <? if(!empty($arResult['PROPERTIES']['show_docs']['VALUE'])){?>   
                <div class="documents">
						 <? if(!empty($arResult['PROPERTIES']['docs_title']['VALUE'])){?>  
						<div class="title_bk"><?=htmlspecialcharsBack($arResult['PROPERTIES']['docs_title']['VALUE'])?></div>
                        <?}?>
						<div class="documents_items">
							<div class="row row_documents d_flex f_wrap">
                            
                            <? $count = 0; ?>
  								<? for($i = 0; $i < count($arResult["DISPLAY_PROPERTIES"]["docs_small"]["VALUE"]); $i++) {?>
                                <div class="col  <? if(!empty($arResult['PROPERTIES']['show_rekv']['VALUE'])){?> col-4 <?}else{?> col-3<?}?>">
									<div class="item">
										<a href="<?=$value2?><? echo CFile::GetPath($arResult["PROPERTIES"]["docs_big"]["VALUE"][$i]) ?>" data-fancybox="docs"><img src="<?=$value?><? echo CFile::GetPath($arResult["PROPERTIES"]["docs_small"]["VALUE"][$i]) ?>" alt=""/></a>
									</div>
								</div>
                            <?}?>
                            <? if(!empty($arResult['PROPERTIES']['show_rekv']['VALUE'])){?>
                            <div class="col col-4">
									<div class="item_info">
										<div class="item_logo"><img src="<? echo CFile::GetPath($arResult["PROPERTIES"]["rekv_logo"]["VALUE"]) ?>" alt=""/></div>
										<div class="item_title"><?=htmlspecialcharsBack($arResult['PROPERTIES']['rekv_title']['VALUE'])?></div>
										<div class="item_data">
                                        
                                        <? $count = 0; ?>
  											<? for($t = 0; $t < count($arResult["DISPLAY_PROPERTIES"]["rekv_par"]["VALUE"]); $t++) {?>
                                        <div><?=$value?><?=$arResult["DISPLAY_PROPERTIES"]["rekv_par"]["VALUE"][$t]?><span><?=$value2?><?=$arResult["DISPLAY_PROPERTIES"]["rekv_vals"]["VALUE"][$t]?></span></div>
                                        <?}?>
                                        
                                        </div>
										<div class="item_address"><?=htmlspecialcharsBack($arResult["PROPERTIES"]["rekv_addr"]["VALUE"]["TEXT"])?></div>
										<div class="item_phone">Тел: <? if(!empty($arResult['PROPERTIES']['rekv_phone_link']['VALUE'])){?><a href="tel:<?=$arResult['PROPERTIES']['rekv_phone_link']['VALUE']?>"><?=$arResult['PROPERTIES']['rekv_phone']['VALUE']?></a><?}else{?><?=$arResult['PROPERTIES']['rekv_phone']['VALUE']?><?}?></div>
                                        
                                        <? if(!empty($arResult['PROPERTIES']['rekv_show_but']['VALUE'])){?>
										<div class="item_btn">
											<a class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">ОБРАТНЫЙ ЗВОНОК</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</a>
										</div>
                                        <?}?>
									</div>
								</div>
                            <?}?>
                            
                            </div>
                            </div>
                </div>
                <?}?>
                
            <? if(!empty($arResult['PROPERTIES']['show_reviews']['VALUE'])){?>    
                <div class="reviews">
						<? if(!empty($arResult['PROPERTIES']['rev_title']['VALUE'])){?>  
						<div class="title_bk"><?=htmlspecialcharsBack($arResult['PROPERTIES']['rev_title']['VALUE'])?></div>
                        <?}?>
						<div class="reviews_slider_wrapper">
							<div class="reviews_slider">
                            
                            <?$related_arr = $arResult["PROPERTIES"]["reviews"]["VALUE"]?> 	
                        <?
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "data", "DATE_ACTIVE_FROM","PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>2, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => $related_arr);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()):?>
  
  
 
<?
$arFields = $ob->GetFields();  
//print_r($arFields);
$arProps = $ob->GetProperties();
//print_r($arProps);
?>  	
                            
                            <div class="item">
									<div class="item_inside d_flex f_wrap">
										<div class="item_image d_flex a_items_center j_content_center">
                                            <? if (!empty($arFields['PREVIEW_PICTURE'])){?>
											<img src="<?=CFile::getPath($arFields["PREVIEW_PICTURE"])?>" alt="">
                                            <?}else{?>
                                            <img src="/local/templates/main/img/svg/icon_default_reviewer.svg" alt="" class="item_image_default"/>
                                            <?}?>
										</div>
										<div class="item_info">
											<div class="item_info_head">
												<span class="item_info_name"><?=$arFields["NAME"]?></span>
												<span class="item_info_date"><?=$arProps["data"]['VALUE']?></span>
											</div>
											<div class="item_info_desc">
												<?=$arFields["PREVIEW_TEXT"]?>
											</div>
										</div>
									</div>
								</div>
                            <?endwhile?> 
                            </div>
                            
                            
                            <div class="reviews_slider_bottom d_flex a_items_center j_content_between f_wrap">
                               <? if(!empty($arResult['PROPERTIES']['show_link']['VALUE'])){?>
								<div class="reviews_slider_bottom--btn">
									<a href="<?=$arResult['PROPERTIES']['rev_link']['VALUE']?>" <? if(!empty($arResult['PROPERTIES']['rev_blank']['VALUE'])){?>target="_blank"<?}?> class="btn btn_green_transparent btn--arrow btn--large d_flex a_items_center j_content_center">
										<em class="btn_txt"><? if(!empty($arResult['PROPERTIES']['rev_link_text']['VALUE'])){?><?=$arResult['PROPERTIES']['rev_link_text']['VALUE']?> <?}else{?>Смотреть все отзывы<?}?></em>
										<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
									</a>
								</div>
                                <?}?>
								<div class="reviews_slider_bottom--nav d_flex a_items_center">
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
                            
                            
                        </div>
                  </div>
                <?}?>


                
                <?$APPLICATION->IncludeFile(
$APPLICATION->GetTemplatePath("include_areas/bottom_form.php"),
Array(),
Array("MODE"=>"html")
);?>
                

		</div>
	</div>
</div>








<div style="display:none">
                      	<script>
                        	$('.breadcrumbs').appendTo('.bread__block')
                        </script>
                      </div>


