<div class="catalog_tabs tabs_changer">
    <ul class="d_flex f_wrap">
        <?php foreach ($arResult['SECTIONS'] as &$arSection) {

            if ($arSection['DEPTH_LEVEL'] == 1) {
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                if (isset($arSection['UF_LINK'])) { ?>
                    <li><span class="go_out"
                              data-href="<?= $arSection['UF_LINK']; ?>"><?= (!empty($arSection['UF_NAME'])) ? $arSection['UF_NAME'] : $arSection['NAME']; ?></span>
                    </li>
                <? } else {

                    ?>
                    <li class="catalog_tabs_li_parent" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
                        data-item="<?= $arSection['ID']; ?>"><?= (!empty($arSection['UF_NAME'])) ? $arSection['UF_NAME'] : $arSection['NAME']; ?></li>
                <?php }
            }
        } ?>
    </ul>
    <div class="catalog_filter_items tabs_changer--items">


        <?php
        $tab = 0;
        foreach ($arResult['SECTIONS'] as &$arSection) {
            ?>
        <div class="tab_<?= $arSection['ID'] ?> catalog_filter_tabs <?
        if ($tab == 0) echo "active"; ?>">
            <ul class="d_flex f_wrap">
                <?php
                $arFilter = array('IBLOCK_ID' => "31", 'SECTION_ID' => $arSection['ID']); // выберет потомков без учета активности
                $rsSect = CIBlockSection::GetList(array('sort' => 'asc'), $arFilter, false, array('UF_LINK'));
                while ($arSect = $rsSect->GetNext()) {

                    ?>
                    <li class="d_flex j_content_center a_items_center" data-item="<?= $arSect['ID']; ?>">

            	<span class="catalog_filter_tab--icon">
                    <img src="<?= $arSection['PICTURE']['SRC'] ?>" width="29" height="28"/>

													</span>
                        <? echo $arSect['NAME']; ?>

                    </li>
                    <?php
                }

                ?>
            </ul>


            <div class="tabs__inner">
                <?php


                $arFilter = array('IBLOCK_ID' => "31", 'SECTION_ID' => $arSection['ID']); // выберет потомков без учета активности
                $rsSect = CIBlockSection::GetList(array('sort' => 'asc'), $arFilter, false, array('UF_FILTER', 'UF_BIG_FORM'));
                    while ($arSect = $rsSect->GetNext()) {
                        $filter = '';

                        $filter = explode(',', (!stripos($_SERVER['REQUEST_URI'], 'search')) ? $arSect['UF_FILTER'] : $arSect['UF_BIG_FORM']);
                        $filter[] = "price_value";
// 						print_r($filter);
                        ?>
                        <div class="tab__inner_<?= $arSect['ID'] ?> <?
                        if ($tab == 0) echo "active"; ?>">
                            <?php
                            $APPLICATION->IncludeComponent(
                                "bitrix:catalog.filter",
                                "",
                                array(
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "IBLOCK_ID" => "31",
                                    "SECTION_ID" => $arSect['ID'],
                                    "SECTION_CODE" => "",
                                    "FILTER_NAME" => "arrFilter",
                                    "HIDE_NOT_AVAILABLE" => "N",
                                    "TEMPLATE_THEME" => "blue",
                                    "FILTER_VIEW_MODE" => "",
                                    "DISPLAY_ELEMENT_COUNT" => "Y",
                                    "SEF_MODE" => "Y",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_GROUPS" => "Y",
                                    "SAVE_IN_SESSION" => "N",
                                    "INSTANT_RELOAD" => "Y",
                                    "PAGER_PARAMS_NAME" => "arrPager",
                                    "FIELD_CODE" => "SECTION_ID",
                                    "PROPERTY_CODE" => $filter,
                                    "PRICE_CODE" => array("price_value"),
                                    "CONVERT_CURRENCY" => "Y",
                                    "XML_EXPORT" => "N",
                                    "SECTION_TITLE" => "-",
                                    "SECTION_DESCRIPTION" => "-",
                                    "POPUP_POSITION" => "left",
                                    "SEF_RULE" => "/search/#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
                                    "SECTION_CODE_PATH" => "",
                                    "SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
                                    "CURRENCY_ID" => "RUB",
                                    "FORM_ACTION" => '/search',

                                ),
                                false
                            );

                            ?>
                        </div>
                        <?php
                    }

                 ?>


            </div>
            </div><?php
            $tab++;
        }
        ?>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("li.catalog_tabs_li_parent").on('click', function () {
            var id = $(this).data("item");
            $("div.catalog_filter_tabs").removeClass("active");
            $(".tab_"+id+".catalog_filter_tabs").addClass("active");
        });
    });
    /*$('.catalog_filter_items > ul > li:first-child').addClass('active');
    $('.tabs__inner > div:first-child').addClass('active');
    
     $('.catalog_tabs > ul > li:first-child').addClass('active');
     $('.tab_4').addClass('active');
    
     $('.catalog_tabs > ul > li:nth-child(1)').on('click', function(){
           $('.catalog_tabs > ul > li').removeClass('active');
           $('.catalog_tabs > ul > li:nth-child(1)').removeClass('active');
           $('.catalog_filter_items > div').removeClass('active');
           $('.tab_4').addClass('active');
     });
     $('.catalog_tabs > ul > li:nth-child(2)').on('click', function(){
           $('.catalog_tabs > ul > li').removeClass('active');
           $('.catalog_tabs > ul > li:nth-child(1)').removeClass('active');
           $('.catalog_filter_items > div').removeClass('active');
           $('.tab_5').addClass('active');
     });
     $('.catalog_tabs > ul > li:nth-child(3)').on('click', function(){
           $('.catalog_tabs > ul > li').removeClass('active');
           $('.catalog_tabs > ul > li:nth-child(1)').removeClass('active');
           $('.catalog_filter_items > div').removeClass('active');
           $('.tab_2').addClass('active');
     });
     $('.catalog_tabs > ul > li:nth-child(4)').on('click', function(){
           $('.catalog_tabs > ul > li').removeClass('active');
           $('.catalog_tabs > ul > li:nth-child(1)').removeClass('active');
           $('.catalog_filter_items > div').removeClass('active');
           $('.tab_6').addClass('active');
     });
     $('.catalog_filter_tabs > ul > li:nth-child(1)').on('click', function(){
           $('.catalog_filter_tabs > ul > li').removeClass('active');
           $('.catalog_filter_tabs > ul > li:nth-child(1)').removeClass('active');
           $('.tabs__inner > div').removeClass('active');
           $('.tabs__inner > div:nth-child(1)').addClass('active');
     });
     $('.catalog_filter_tabs > ul > li:nth-child(2)').on('click', function(){
           $('.catalog_filter_tabs > ul > li').removeClass('active');
           $('.catalog_filter_tabs > ul > li:nth-child(1)').removeClass('active');
           $('.tabs__inner > div').removeClass('active');
           $('.tabs__inner > div:nth-child(2)').addClass('active');
    });*/
    // $('.catalog_filter_tabs > ul > li:nth-child(3)').on('click', function(){
    //       $('.catalog_filter_tabs > ul > li').removeClass('active');
    //       $('.catalog_filter_tabs > ul > li:nth-child(1)').removeClass('active');
    //       $('.tabs__inner > div').removeClass('active');
    //       $('.tabs__inner > div:nth-child(3)').addClass('active');
    // });
    // $('.catalog_filter_tabs > ul > li:nth-child(4)').on('click', function(){
    //       $('.catalog_filter_tabs > ul > li').removeClass('active');
    //       $('.catalog_filter_tabs > ul > li:nth-child(1)').removeClass('active');
    //       $('.tabs__inner > div').removeClass('active');
    //       $('.tabs__inner > div:nth-child(4)').addClass('active');
    // });
    // $('.catalog_filter_tabs > ul > li:nth-child(5)').on('click', function(){
    //       $('.catalog_filter_tabs > ul > li').removeClass('active');
    //       $('.catalog_filter_tabs > ul > li:nth-child(1)').removeClass('active');
    //       $('.tabs__inner > div').removeClass('active');
    //       $('.tabs__inner > div:nth-child(5)').addClass('active');
    // });
    // $('.catalog_filter_tabs > ul > li:nth-child(6)').on('click', function(){
    //       $('.catalog_filter_tabs > ul > li').removeClass('active');
    //       $('.catalog_filter_tabs > ul > li:nth-child(1)').removeClass('active');
    //       $('.tabs__inner > div').removeClass('active');
    //       $('.tabs__inner > div:nth-child(6)').addClass('active');
    // });
    // $('.catalog_filter_tabs > ul > li:nth-child(7)').on('click', function(){
    //       $('.catalog_filter_tabs > ul > li').removeClass('active');
    //       $('.catalog_filter_tabs > ul > li:nth-child(1)').removeClass('active');
    //       $('.tabs__inner > div').removeClass('active');
    //       $('.tabs__inner > div:nth-child(7)').addClass('active');
    // });
    // $('.catalog_filter_tabs > ul > li:nth-child(8)').on('click', function(){
    //       $('.catalog_filter_tabs > ul > li').removeClass('active');
    //       $('.catalog_filter_tabs > ul > li:nth-child(1)').removeClass('active');
    //       $('.tabs__inner > div').removeClass('active');
    //       $('.tabs__inner > div:nth-child(8)').addClass('active');
    // });
    //
    // });
</script>