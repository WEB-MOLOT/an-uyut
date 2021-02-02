<?php

$recepient = "banket@da-banket.ru";
$sitename = "Форма перезвонить снизу";


$phone = trim($_POST["phone"]);



$message = "Телефон: $phone";

$pagetitle = "\"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");