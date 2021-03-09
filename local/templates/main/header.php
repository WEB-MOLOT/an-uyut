
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link type="text/css" media="all" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/slick.css" />
		<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/jquery-ui.css" media="all">
		<link type="text/css" media="all" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/OverlayScrollbars.min.css" />
        <link type="text/css" media="all" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/jquery.custom-select.css" />
		<link type="text/css" media="all" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/style.css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />

		<title><? $APPLICATION->ShowTitle() ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
		<? $APPLICATION->ShowHead(); ?>
		<!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

		<![endif]-->
        

        
	</head>
<body>
<?
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
// print_r($arFavorites);
/* Меняем отображение сердечка товара */
?>
<script>
$(document).ready(function() {
<?
foreach($arFavorites as $k => $favoriteItem):?>
	$('.item_favorite[data-item="<?=$favoriteItem?>"]').addClass('active');
<?endforeach;?>
});
</script>
	<div class="wrapper d_flex j_content_end f_wrap">
		<span class="overlay_sidebar"></span>
		<div class="sidebar">
			<div class="sidebar_btn_wrapper">
				<div class="sidebar_menu_btn">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="sidebar_head">
				<div class="sidebar_logo">
					<a href="/"><img src="<?= SITE_TEMPLATE_PATH ?>/img/logo.png" alt=""/></a>
				</div>
			</div>
			<div class="sidebar_body">
				<?$APPLICATION->IncludeComponent(
                    "bitrix:menu", 
                    "mainmenu", 
                    array(
                        "ROOT_MENU_TYPE" => "top",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "ALLOW_MULTI_SELECT" => "N",
                        "COMPONENT_TEMPLATE" => "mainmenu",
                        "DELAY" => "N"
                    ),
                    false
                );?>
			</div>
			<div class="sidebar_footer">
				<div class="sidebar_address">г. Жуковский, <br>Гагарина 19/2А, 2-ой этаж</div>
				<div class="sidebar_show_to_map"><a href="/kontakty/">Показать на карте</a></div>
				<div class="sidebar_number">8 (495) 150-33-28</div>
				<div class="sidebar_btn">
					<a href="#" class="btn btn_yellow btn--icon d_flex a_items_center j_content_center">
						<em class="btn_icon"><svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.37047 0.0429688L0.796254 1.61719C-0.0670273 2.48047 -0.254527 3.82422 0.36266 4.87891C1.05016 6.05859 1.61266 6.92969 3.96813 9.28125C6.31969 11.6367 6.96032 11.957 8.12047 12.6367C9.17907 13.2539 10.5189 13.0664 11.3783 12.2031L12.9564 10.6289L9.90954 7.58594L8.67125 8.82422C8.52282 8.75781 8.30016 8.64062 8.04235 8.47656C7.5111 8.13672 6.83141 7.61719 6.23375 7.01562C5.63219 6.41797 5.04625 5.67187 4.64 5.07031C4.44078 4.77344 4.28063 4.50391 4.19469 4.32812C4.19078 4.32031 4.19078 4.32031 4.18688 4.3125L5.41344 3.08594L2.37047 0.0429688ZM2.37047 1.45703L3.99938 3.08594L3.28453 3.80469C3.1361 3.95312 3.12047 4.11719 3.12438 4.21094C3.12438 4.30078 3.14 4.36328 3.15563 4.42188C3.19078 4.54297 3.23766 4.64844 3.29625 4.77344C3.41735 5.01562 3.59313 5.30469 3.81188 5.63281C4.24938 6.28125 4.86657 7.06641 5.52282 7.72656C6.18297 8.38281 6.90953 8.9375 7.50719 9.31641C7.80407 9.50781 8.06579 9.65234 8.28844 9.75C8.40172 9.80078 8.50329 9.83984 8.62438 9.86328C8.68297 9.875 8.74938 9.88281 8.83922 9.875C8.92907 9.87109 9.06969 9.83984 9.19469 9.71484L9.90954 9L11.5423 10.6289L10.6713 11.5C10.1283 12.043 9.28844 12.1602 8.62438 11.7734C7.44469 11.082 6.99547 10.8984 4.67125 8.57812C2.35094 6.25391 1.90563 5.53906 1.22594 4.375C0.839223 3.71094 0.95641 2.87109 1.49938 2.32812L2.37047 1.45703Z" fill="black"/></svg></em>
						<em class="btn_txt">Обратный звонок</em>
					</a>
				</div>
				<div class="sidebar_copyright">© 2020 все права защищены</div>
				<div class="sidebar_policy"><a href="#">Политика конфиденциальности</a></div>
			</div>
		</div>
        
        
        <div class="main">
        <div id="panel"><?$APPLICATION->ShowPanel();?></div>