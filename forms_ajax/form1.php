<?php

$recepient = "getscats@gmail.com";
$sitename = "Заявка на подбор зала";

$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$email = trim($_POST["email"]);
$opisanie = trim($_POST["opisanie"]);

$message = "Имя: $name \nТелефон: $phone \nЕmail: $email \nКраткое описание вопроса: $opisanie";

$pagetitle = "Заказ звонка с \"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");