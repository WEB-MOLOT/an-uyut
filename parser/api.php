<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(0);
/**
 * internal-id
 * type
 * property-type
 * category
 * deal-status
 * creation-date
 * last-update-date
 * location{
 *  country
 *  region
 *  district
 *  locality-name
 *  address
 *  metro->name
 *  metro->time-on-transport
 *  latitude
 *  longitude
 * }
 * image array
 *
 * area ->value
 * area ->unit
 *
 * living-space ->value
 * living-space ->unit
 *
 * room-space ->value
 * room-space ->unit
 * room-space[
 *  array
 *          ->value
 *          ->unit
 * ]
 * kitchen-space -> value
 * kitchen-space -> unit
 ** description
 * rooms
 * rooms-offered
 * apartments
 * rooms-type
 * phone
 * floor-covering
 * window-view
 * renovation
 * balcony
 * bathroom-unit
 * floor
 * floors-total
 * building-type
 * ceiling-height
 * lift
 * is-elite
 * price->value
 * price->currency
 * cadastral-number
 *
 * sales-agent->name
 * sales-agent->phone
 * sales-agent->category
 * sales-agent->organization
 * sales-agent->email
 * sales-agent->photo
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
$IBLOCK_ID = 31;
$xml = parser('https://api.quick-deal.ru/v3/feed/organisationObjects/303?secret=iakUVegLtUWzKpqQ9JJ1QjghTeA&format=yandex&withAddressCoordinates');

$z = 0;
$arSelect = array("ID", "NAME");
$arFilter = array("IBLOCK_ID"=>IntVal($IBLOCK_ID));
$res = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    CIBlockElement::Delete($arFields['ID']);

}

if (!empty($xml)) {

    $data = simplexml_load_string($xml);

    foreach ($data->offer as $object) {
        //echo '<pre>';
        //var_dump($object);
        //echo '</pre>';
        //die();
        $PROP = array();
        $SALES = array();
        $images = array();
        foreach ((array)$object as $k => $v) {

            if (isset($v['internal-id'])) {
                $PROP['internal_id'] = $v['internal-id'];
            } else if (is_object($v)) {
                foreach ((array)$v as $key => $val) {
                    if (is_object($val)) {
                        foreach ((array)$val as $k1 => $v1) {
                            $PROP[str_replace('-', '_', $k . '_' . $key . '_' . $k1)] = $v1;
                        }
                    } else {


                        if ($k == 'sales-agent') {
                            $PROP[str_replace('-', '_', $k.'_'.$key)] = $val;
                        }
                        else {
                            $PROP[str_replace('-', '_', $k . '_' . $key)] = $val;
                        }
                    }
                }
            } else if ($k == 'area') {
                foreach ((array)$v as $key => $val) {
                    $PROP['location_' . str_replace('-', '_', $key)] = $val;
                }
            } else if ($k == 'rooms'){
                switch ($v):
                    case 1: $room = 27;break;
                    case 2: $room = 28;break;
                    case 3: $room = 29;break;
                    case 4: $room = 30;break;
                    case 5: $room = 31;break;
                    case 6: $room = 32;break;
                    case 7: $room = 33;break;
                    case 8: $room = 34;break;
                    case 9: $room = 35;break;
                    case 10: $room = 36;break;
                    case 11: $room = 37;break;
                endswitch;
                $PROP[$k] = array("VALUE" => $room );
            }
            else if ($k == 'floors-total'){
                $PROP[$k] = array("VALUE" => $v );
            }
            else if ($k == 'image') {
                $PROP['image'] = $v;
                $PROP['main_picture'] = $v[0];
            } else {

                $PROP[str_replace('-', '_', $k)] = trim($v);
            }
        }

        if (!empty($PROP['image'])) {
            foreach ($PROP['image'] as $k => $v) {

                $images['n' . $k] = CFile::MakeFileArray($v);
            }
            $PROP['images'] = $images;
        }
        if (!empty($PROP['rooms'])){
            $room ="";
            switch ($PROP["rooms"]["VALUE"]):
                case 27: $room = 1;break;
                case 28: $room = 2;break;
                case 29: $room = 3;break;
                case 30: $room = 4;break;
                case 31: $room = 5;break;
                case 32: $room = 6;break;
                case 33: $room = 7;break;
                case 34: $room = 8;break;
                case 35: $room = 9;break;
                case 36: $room = 10;break;
                case 37: $room = 11;break;
            endswitch;
            $name = $room ." "."-"." "."комн.";
        }
        elseif (!empty($PROP['floors-total'])){
            $name = $PROP["floors-total"]["VALUE"]." "."-"." "."эт.";
        }

        if(!empty($PROP['sales_agent_photo'])) {
            $PROP['sales_agent_photo'] = CFile::MakeFileArray( $PROP['sales_agent_photo'] );
        }

        //Проверим доп поля

        foreach($PROP as $k=>$v){
            $fields[] = $k;
        }


        $properties = CIBlockProperty::GetList(array("sort"=>"asc", "name"=>"asc"), array("ACTIVE"=>"Y", "IBLOCK_ID"=>$IBLOCK_ID));
        while ($prop_fields = $properties->GetNext())
        {
            $iblock_fields[] = $prop_fields["CODE"];
        }

        $diffirence = array_diff($fields,$iblock_fields);
        if(!empty($diffirence)){
            foreach($diffirence as $item){
                $arFields = array(
                    "NAME" => $item,
                    "ACTIVE" => "Y",
                    "SORT" => "100",
                    "CODE" => $item,
                    "PROPERTY_TYPE" => "S",
                    "IBLOCK_ID" => $IBLOCK_ID
                );

                $ibp = new CIBlockProperty;
                $PropID = $ibp->Add($arFields);

            }
        }
        //Ищем раздел
        $arFilter = array('IBLOCK_ID' => '31', 'NAME' => $PROP['type']);
        $db_list = CIBlockSection::GetList(array(), $arFilter, true);
        $ar_result = $db_list->GetNext();
        //Создаем если не нашли
        if (!$ar_result) {
            $bs = new CIBlockSection;
            $arFields = array(
                "ACTIVE" => 'Y',
                "IBLOCK_ID" => 31,
                "CODE"=>Cutil::translit($PROP['type'],"ru",$arParams),
                "NAME" => $PROP['type']);
            $sectionId = $bs->Add($arFields);
        } else {
            $sectionId = $ar_result['ID'];
        }
        echo $PROP['type'].' | Первая категория '.$sectionId.'<br/>';

        $arFilter = array('IBLOCK_ID' => '31', 'SECTION_ID'=>$sectionId, 'NAME' => $PROP['property_type']);
        $db_list = CIBlockSection::GetList(array(), $arFilter, true);
        $ar_result = $db_list->GetNext();

        if(!empty($PROP['property_type'])) {
            if (!$ar_result) {
                $arParams = array("replace_space" => "-", "replace_other" => "-");

                $bs = new CIBlockSection;
                $arFields = array(
                    "ACTIVE" => 'Y',
                    "IBLOCK_ID" => 31,
                    "IBLOCK_SECTION_ID" => $sectionId,
                    "CODE" => Cutil::translit($PROP['property_type'], "ru", $arParams),
                    "NAME" => trim($PROP['property_type'])
                );
                $sectionId = $bs->Add($arFields);
            } else {
                $sectionId = $ar_result['ID'];
            }
            echo $PROP['property_type'] . ' | Вторая категория ' . $sectionId.'<br/>';
        }

        $arFilter = array('IBLOCK_ID' => '31', 'SECTION_ID'=>$sectionId, 'NAME' => $PROP['category']);
        $db_list = CIBlockSection::GetList(array(), $arFilter, true);
        $ar_result = $db_list->GetNext();
        if(!empty($PROP['category'])) {
            if (!$ar_result) {
                $arParams = array("replace_space"=>"-","replace_other"=>"-");

                $bs = new CIBlockSection;
                $arFields = array(
                    "ACTIVE" => 'Y',
                    "IBLOCK_ID" => 31,
                    "IBLOCK_SECTION_ID" => $sectionId,
                    "CODE"=>Cutil::translit(str_replace(' ','-',$PROP['category']),"ru",$arParams),
                    "NAME" => trim($PROP['category'])
                );
                $sectionId = $bs->Add($arFields);

            } else {
                $sectionId = $ar_result['ID'];
            }
            echo $PROP['category'] . ' | Третья категория ' . $sectionId.'<br/>';
        }
        $arLoadProductArray = array(
            'MODIFIED_BY' => $GLOBALS['USER']->GetID(), // элемент изменен текущим пользователем
            'IBLOCK_SECTION_ID' => $sectionId, // элемент лежит в корне раздела
            'IBLOCK_ID' => 31,
            'PROPERTY_VALUES' => $PROP,
            'NAME' => $name." ".$PROP['category'],
            'CODE'=>$PROP['internal_id'],
            'ACTIVE' => 'Y', // активен
            'DETAIL_TEXT' => trim($PROP['description']),
            'PREVIEW_PICTURE' => CFile::MakeFileArray($PROP['main_picture']),
            'DETAIL_PICTURE' => CFile::MakeFileArray($PROP['main_picture']) // картинка, загружаемая из файлового поля веб-формы с именем DETAIL_PICTURE
        );

        $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM");
        $arFilter = array("IBLOCK_ID" => 31, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", 'NAME' => $PROP['internal_id']);
        $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
        $ob = $res->GetNextElement();
        $el = new CIBlockElement;
        if ($ob->fields['ID']) {
            echo 'Обновляем: '.$PROP['internal_id'].'<br/>';
            $el->Update($ob->fields['ID'], $arLoadProductArray);
        } else {
            echo 'Создаем: '.$PROP['internal_id'].'<br/>';
            $el->Add($arLoadProductArray);
        }
        if($el->LAST_ERROR) {
            echo 'Ошибка: ' . $el->LAST_ERROR;
        }
    }
}
//else {
//echo 'CRM вернул пустой результат';
//}


function parser($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); // отправляем на
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20100101 Firefox/23.0");
    curl_setopt($ch, CURLOPT_HEADER, 0); // пустые заголовки
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // возвратить то что вернул сервер
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // следовать за редиректами
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);// таймаут4
    curl_setopt($ch, CURLOPT_REFERER, "http://an.ledimiqx.beget.tech");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// просто отключаем проверку сертификата
    $result1 = curl_exec($ch);
    if (curl_errno($ch)) {
        print curl_error($ch);
        exit;
    } else {
        curl_close($ch);
        return $result1;
    }
}

?>