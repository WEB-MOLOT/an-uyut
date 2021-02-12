<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/catalog/([^/]+?)/\\??(.*)#',
    'RULE' => 'SECTION_CODE=$1&$2',
    'ID' => 'main:catalog.section',
    'PATH' => '/personal/wishlist/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/filter/(.*)#',
    'RULE' => '&$1',
    'ID' => 'bitrix:catalog.smart.filter',
    'PATH' => '/local/templates/main/components/bitrix/catalog/main/sections.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/uslugi/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/uslugi/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/search/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/search/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
