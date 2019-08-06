<?php

$recepient = "client.baza2017@yandex.ru";
$sitename = "Scovalini.com";

$name = trim($_POST["name"]);
$surname = trim($_POST["surname"]);
$comment = trim($_POST["comment"]);

$pagetitle = "Новая заявка с сайта \"$sitename\"";
$message = "Имя: $name \nФамилия: $surname \nСообщение: $comment";

try {
    mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
    echo '<span style="color:green;">Сообщение успешно отправлено!</span>';
} catch (Exception $e) {
    echo '<span style="color:red;">Ошибка! Сообщение не отправлено.</span>';
}