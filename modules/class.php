<?php

/*
 * Статистика
 */

/*
 * Проверка константы в целях безопасности
 */
if (!defined('ThisScript')) {
    header("Location: /");
    exit();
}
if (!isset($_SESSION['SessinLogin']) or $_SESSION['SessinLogin'] == "") {
    header("Location: /login/");
    exit();
}

if (isset($navigation[1])) {
    try {
        $sql = "select *
            from " . $prefixdb . "users where class=:class order by lvl desc";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":class" => $navigation[1]));
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $ERROR[] = $e;
    }
} else {
    try {
        $sql = "select *
            from " . $prefixdb . "users order by class, lvl desc";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $ERROR[] = $e;
    }
}
$TemplateVar["Users"] = $result;

$TemplateName = "class.tpl";
?>