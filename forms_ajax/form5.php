<?php

$recepient = "banket@da-banket.ru";
$sitename = "Добавить площадку";

$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$zavi = trim($_POST["zavi"]);


$message = "Имя: $name \nНазвание завидения: $zavi \nТелефон: $phone";

$pagetitle = "\"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");