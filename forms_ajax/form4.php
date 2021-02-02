<?php

$recepient = "banket@da-banket.ru";
$sitename = "Отзыв на сайте";

$name = trim($_POST["name"]);
$otzuv = trim($_POST["otzuv"]);



$message = "Имя: $name \nОтзыв: $otzuv";

$pagetitle = "\"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");