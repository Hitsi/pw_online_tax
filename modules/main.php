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


try {
    $sql = "select count(" . $prefixdb . "users.id) as users,
            ROUND(sum(ball),2) ball,
            (select ROUND(sum(ball),2) from " . $prefixdb . "mirpit) mirpit,
            (select ROUND(sum(ball),2) from " . $prefixdb . "gtz) gtz,
            (select ROUND(sum(ball),2) from " . $prefixdb . "gvg) gvg,
            (select ROUND(sum(ball),2) from " . $prefixdb . "remeslo) remeslo,
            (select ROUND(sum(ball),2) from " . $prefixdb . "help) help,
            (select ROUND(sum(ball),2) from " . $prefixdb . "oficer) oficer,
            (select ROUND(sum(ball),2) from " . $prefixdb . "nalog) nalog,
            (select ROUND(sum(ball),2) from " . $prefixdb . "shtraf) shtraf,
            (select ROUND(sum(ball),2) from " . $prefixdb . "sklad) sklad,
            (select ROUND(sum(ball),2) from " . $prefixdb . "pvp) pvp,
            (select ROUND(sum(ball),2) from " . $prefixdb . "dcd) dcd
            from " . $prefixdb . "users";
    $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array());
    $result = $sth->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $ERROR[] = $e;
}
$TemplateVar["Ball"] = $result;
try {
    $sql = "select count(id) as users,
            (select count(id) from " . $prefixdb . "users where class=1) var,
            (select count(id) from " . $prefixdb . "users where class=2) mag,
            (select count(id) from " . $prefixdb . "users where class=3) luk,
            (select count(id) from " . $prefixdb . "users where class=4) prist,
            (select count(id) from " . $prefixdb . "users where class=5) obr,
            (select count(id) from " . $prefixdb . "users where class=6) dru,
            (select count(id) from " . $prefixdb . "users where class=7) sin,
            (select count(id) from " . $prefixdb . "users where class=8) sham,
            (select count(id) from " . $prefixdb . "users where class=9) strag,
            (select count(id) from " . $prefixdb . "users where class=10) mist,
            (select count(id) from " . $prefixdb . "users where lvl>=100) sto,
            (select count(id) from " . $prefixdb . "users where lvl<100) nine
            from " . $prefixdb . "users";
    $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array());
    $result = $sth->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $ERROR[] = $e;
}
$TemplateVar["Class"] = $result;

try {
    $sql = "select * from " . $prefixdb . "const";
    $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $const) {
        $Const[$const['const']] = $const['value'];
    }
    $TemplateVar["Const"] = $Const;
} catch (PDOException $e) {
    $ERROR[] = '<div class="notice error">' . $e . '</div>';
}

$TemplateName = "main.tpl";
?>