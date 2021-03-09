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
$range_val_2 = 1000000;

$range_val_3 = 25;


?>

<form class="mortgage_calculator">
    <div class="title_bk title_bk--large">Ипотечный калькулятор</div>
    <div class="mortgage_calculator_fields">
        <div class="row row_mortgage_calculator_fields d_flex f_wrap">
            <div class="col col-3">
                <div class="mortgage_calculator_field">
                    <div class="mortgage_calculator_field--title">Стоимость квартиры:</div>
					<div class="mortgage_calculator_field--range_wrapper">
						<div id="js__field_1" class="mortgage_calculator_field--range_field ">
							<input type="text" value="<?=number_format($range_val_1, 0, false, ' ')?> ₽" <?php if(!$arParams['PRICE_CHANGEABLE']){ ?>disabled <? } ?>>
						</div>
						<div class="mortgage_calculator_field <?Php if($arParams['PRICE_CHANGEABLE']){ ?>mortgage_calculator_field--range<?php }?>" data-min="0" data-max="25000000" data-start="<?=$range_val_1;?>"></div>
					</div>
                </div>
            </div>
            <div class="col col-3">
				<div class="mortgage_calculator_field">
					<div class="mortgage_calculator_field--title">Первый взнос?</div>
					<div class="mortgage_calculator_field--range_wrapper">
						<div  id="js__field_2"  class="mortgage_calculator_field--range_field">
						<input type="text" value="<?=$range_val_2;?> ₽">
						</div>
						<div class="mortgage_calculator_field--range" data-min="0" data-max="10000000" data-start="<?=$range_val_2;?>"></div>
					</div>
				</div>
            </div>
            <div class="col col-3">
                <div class="mortgage_calculator_field">
                    <div class="mortgage_calculator_field--title">Срок:</div>
                    <div class="mortgage_calculator_field--range_wrapper">
                        <div id="js__field_3" class="mortgage_calculator_field--range_field">
                        <input type="text" value="25 лет"></div>
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
		<?
		$total_sum = $range_val_1;
		$first_sum = $range_val_2;
		$years = $range_val_3;
		
		$month_payments = array();
		foreach($arResult['ITEMS'] as $item) {
			$monthly_rate = $item['PROPERTIES']['RATE']['VALUE'] / 12 / 100; // Месячная ставка
			$whole_rate =  pow((1 + $monthly_rate), $years*12); // Общая ставка
			
			$first = $total_sum * ($item['PROPERTIES']['FIRST_FEE']['VALUE'] /100); // минимально возможный первоначальный взнос по тарифам банка
			if($first < $first_sum){
				$minimal = $first_sum;
			}else{
				$minimal = $first;
			}
			$credit_sum = $total_sum - $minimal; // Сумма кредита
			
			$monthly_payment = round($credit_sum * $monthly_rate * $whole_rate / ($whole_rate - 1)); // Месячный платеж
			
			$month_payments[] = $monthly_payment;
			
                /*$first = $range_val_1 * $item['PROPERTIES']['FIRST_FEE']['VALUE'] /100;

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

                $total = $K*$clear_sum;*/

              $item['PROPERTIES']['RATE']['VALUE'] = (float)str_replace(',','.', $item['PROPERTIES']['RATE']['VALUE']);
				$row[$item['ID']] = array(
					'img' => CFile::GetPath($item['PROPERTIES']['SVG_ICON']['VALUE']),
					'name' => $item['NAME'],
					'rate' => $item['PROPERTIES']['RATE']['VALUE'],
					'first_perc' => $item['PROPERTIES']['FIRST_FEE']['VALUE'],
					'pay' => number_format($monthly_payment, 0, false, ' '),
					'first' => number_format($minimal, 0, false, ' '),
					'year' => $item['PROPERTIES']['TERM']['VALUE']
				);
          		?>

			<?php } ?>
			<? uasort($row, 'cmp'); ?>
			<? foreach($row as $k => $r) { ?>
				<tr>
                <td class="mortgage_calculator_table--bank"><img src="<?=$r['img'];?>" alt="<?=$r['name'];?>"></td>
				<td class="mortgage_calculator_table--stavka"> от <?=$r['rate'];?>%</td>
				<td class="mortgage_calculator_table--vznos" id="<?=$k;?>" ><?=$r['first_perc']?>% / <?=$r['first'];?> руб.</td>
				<td class="mortgage_calculator_table--srok"> до <?=$r['year']?> лет</td>
				<td class="mortgage_calculator_table--plat"><span class="reslut_<?=$k;?>"><?=$r['pay'];?></span> руб</td>
                </tr>
			<?php } ?>

    </div>

                </tbody>
            </table>
        </div>

    </div>
</form>
<script>
$(document).ready(function(){
	var min = '<?=number_format(min($month_payments), 0, false, ' ')?>';
	$('.object_general_price--month span').text(min);
});
</script>
<?
function cmp($a, $b) {
	if($a['pay'] == $b['pay']) {
		return 0;
	}
	return ($a['pay'] > $b['pay']) ? 1 : -1;
}
?>