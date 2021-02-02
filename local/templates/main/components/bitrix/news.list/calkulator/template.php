<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
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
 
//$res = CIBlockElement::GetByID(2246);

//$ob = $res->GetNextElement();
// $arFields = $ob->GetFields();
// $arProps = $ob->GetProperties();

$range_val_1 = $arParams['PRICE'];
$range_val_2 =500000;

$range_val_3 = 30;


?>

<form class="mortgage_calculator">
    <div class="title_bk title_bk--large">Ипотечный калькулятор</div>
    <div class="mortgage_calculator_fields">
        <div class="row row_mortgage_calculator_fields d_flex f_wrap">
            <div class="col col-3">
                <div class="mortgage_calculator_field">
                    <div class="mortgage_calculator_field--title">Стоимость квартиры:</div>
                    <div class="mortgage_calculator_field--range_wrapper">
                        <div id="js__field_1" class="mortgage_calculator_field--range_field "><?=number_format($range_val_1, 0, false, ' ')?> руб.</div>
                        <div   class="mortgage_calculator_field <?Php if($arParams['PRICE_CHANGEABLE']){ ?>mortgage_calculator_field--range<?php }?>" data-min="0" data-max="<?=$range_val_1;?>" data-start="<?=$range_val_1;?>"></div>
                    </div>
                </div>
            </div>
            <div class="col col-3">
                <div class="mortgage_calculator_field">
                    <div class="mortgage_calculator_field--title">Первый взнос?</div>
                    <div class="mortgage_calculator_field--range_wrapper">
                        <div  id="js__field_2"  class="mortgage_calculator_field--range_field">1000000 ₽</div>
                        <div class="mortgage_calculator_field--range" data-min="0" data-max="10000000" data-start="1000000"></div>
                    </div>
                </div>
            </div>
            <div class="col col-3">
                <div class="mortgage_calculator_field">
                    <div class="mortgage_calculator_field--title">Срок:</div>
                    <div class="mortgage_calculator_field--range_wrapper">
                        <div id="js__field_3" class="mortgage_calculator_field--range_field">25 лет</div>
                        <div class="mortgage_calculator_field--range " data-min="0" data-max="30" data-start="25"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mortgage_calculator_items">
        <div class="mortgage_calculator_table_wrapper">
            <table class="mortgage_calculator_table">
                <thead>
                <tr>
                    <th class="mortgage_calculator_table--bank">Банк</th>
                    <th class="mortgage_calculator_table--stavka">Ставка</th>
                    <th class="mortgage_calculator_table--vznos">Первый взнос</th>
                    <th class="mortgage_calculator_table--srok">Срок</th>
                    <th class="mortgage_calculator_table--plat">Ежемес. платёж</th>
                </tr>
                </thead>
                <tbody>

    <div class="mortgage_calculator">
          	<?php foreach($arResult['ITEMS'] as $item){
                $first = $range_val_1 * $item['PROPERTIES']['FIRST_FEE']['VALUE'] /100;

                if($range_val_3 > $item['PROPERTIES']['TERM']['VALUE']){
                    $year = $item['PROPERTIES']['RATE']['VALUE'];
                }else{
                    $year = $range_val_3;
                }


                if($first < $range_val_2){
                    $minimal = $range_val_2;
                }else{
                    $minimal = $first;
                }
                $clear_sum = $range_val_1 - $minimal;
                $B10  =$range_val_1 - $minimal;
                $m10  =(float)str_replace(',','.',$item['PROPERTIES']['RATE']['VALUE']) /12;
                $l10 =   $year*12;
                $ab =-1*($l10 - 0);
                $ads = 1+$m10;
                $m10In = pow($ads,$ab);
                $total  = $B10*($m10/(1-$m10In) );

                $i = $m10/100;

                $n =   $year * 12;
                $K = ($i*pow((1+$i),$n)) / (pow((1+$i),$n) - 1);

                $total = $K*$clear_sum;

              $item['PROPERTIES']['RATE']['VALUE'] = (float)str_replace(',','.', $item['PROPERTIES']['RATE']['VALUE']);

          		?>
                <tr>
                <td class="mortgage_calculator_table--bank"><img src="<?=CFile::GetPath($item['PROPERTIES']['SVG_ICON']['VALUE']);?>" alt="<?=$item['NAME'];?>" style="max-width:200px;"></td>
                    <td class="mortgage_calculator_table--stavka"> от <?=$item['PROPERTIES']['RATE']['VALUE'];?>%</td>
              <td class="mortgage_calculator_table--vznos" id="<?=$item['ID'];?>" ><?=number_format($first, 0, false, ' ');?> руб.</td>
                    <td class="mortgage_calculator_table--srok"> до <?=$item['PROPERTIES']['TERM']['VALUE']?> лет</td>

              <td class="mortgage_calculator_table--plat"><span class="reslut_<?=$item['ID'];?>"><?=number_format($total, 0, false, ' ');?></span> руб</td>
            </ul>

                </tr>

            <?php }?>

    </div>

                </tbody>
            </table>
        </div>

    </div>
</form>