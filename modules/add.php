<?php

/*
 * Модуль "Добавление в таблицу"
 */

/*
 * Проверка константы в целях безопасности
 */
if (!defined('ThisScript'))
    header("Location: /");

if (!isset($_SESSION['SessinLogin']) or $_SESSION['SessinLogin'] == "")
    header("Location: /login/");
/*
 * xajax
 */
$TemplateName = "add/add.tpl";
?>
