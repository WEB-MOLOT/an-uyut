<?php

$recepient = "banket@da-banket.ru";
$sitename = "Сообщение с блока контакты";

$date = trim($_POST["date"]);
$phone = trim($_POST["phone"]);
$guestform2 = trim($_POST["guestform2"]);


$message = "Когда: $date \nТип мероприятия: $guestform2 \nТелефон: $phone";

$pagetitle = "\"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");