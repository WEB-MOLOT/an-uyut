<?php

$recepient = "banket@da-banket.ru";
$sitename = "Заявка на перезвон";

$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$soobhenie = trim($_POST["soobhenie"]);


$message = "Имя: $name \nТелефон: $phone \nСообщение: $soobhenie";

$pagetitle = "\"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");