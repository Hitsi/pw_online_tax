<?php

/*
 * Информация по отдельному соклану
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
/*
 * Xajax
 */

function ShowTable($Form) {
    global $DBH, $prefixdb, $twig, $navigation;
    $objResponse = new xajaxResponse("utf8");
    $text = "";
    if (!isset($Form["date_ot"]) or $Form["date_ot"] == "") {
        $text = '<div class="notice error">Не указана дата от которой считать</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["date_do"]) or $Form["date_do"] == "") {
        $text = '<div class="notice error">не указана дата до которой считать</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["table"]) or !preg_match("/^mirpit|gvg|gtz|remeslo|help|oficer|nalog|shtraf|sklad|pvp|dcd$/", $Form["table"])) {
        $text = '<div class="notice error">Не выбрана или неправильная таблица</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } else {
        try {
            $sql = "select * from " . $prefixdb . "" . $Form['table'] . "
                    where date>=:date_ot and
                    date<=:date_do and uid=:uid
                    order by date desc";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":date_ot" => $Form["date_ot"],
                ":date_do" => $Form["date_do"],
                ":uid" => $navigation[1]));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
            return $objResponse;
        }
        if (empty($result)) {
            $text = '<div class="notice">Ничего не найдено</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
            return $objResponse;
        } else {
            $tmpVar["Data"] = $result;
            $tmpVar["module"] = $Form["table"];
            $tmpVar["Prova"] = $_SESSION['SessinLogin'];
            $tmp = $twig->loadTemplate("member/member_table.tpl");
            $text = $tmp->render($tmpVar);
        }
    }
    $objResponse->addClear('show', 'innerHTML');
    $objResponse->addAssign("show", "innerHTML", $text);
    return $objResponse;
}

/*
 * routing
 */
if (isset($navigation[1]) and $navigation[1] == "delete") {
    if (!isset($navigation[2]) or !preg_match("/^mirpit|gtz|gvg|remeslo|help|nalog|shtraf|oficer|sklad|pvp|dcd$/", $navigation[2]) or !isset($navigation[3]) or !preg_match("/^\d+$/", $navigation[3])) {
        header("Location: /404/");
        exit();
    } else {
        if (isset($_POST["delete"])) {
            try {
                $sql = "delete from " . $prefixdb . "" . $navigation[2] . " where id=:id";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":id" => $navigation[3]));
            } catch (PDOException $e) {
                $ERROR[] = $e;
            }
            header("Location: /users/");
            exit();
        }
        $result = "";
        try {
            $sql = "select " . $prefixdb . "" . $navigation[2] . ".*, " . $prefixdb . "users.name as name
            from " . $prefixdb . "" . $navigation[2] . "
                left join " . $prefixdb . "users on " . $prefixdb . "users.id=" . $prefixdb . "" . $navigation[2] . ".uid
                where " . $prefixdb . "" . $navigation[2] . ".id=:id";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":id" => $navigation[3]));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $ERROR[] = '<div class="notice error">' . $e . '</div>';
        }
        $TemplateVar["record"] = $result;
        $TemplateVar["table"] = $navigation[2];
        $TemplateName = "member/delete_record.tpl";
    }
} elseif (isset($navigation[1]) and preg_match("/^\d+$/", $navigation[1])) {
    $result = "";
    try {
        $sql = "select " . $prefixdb . "users.*,
            TO_DAYS(CURDATE()) - TO_DAYS(" . $prefixdb . "users.priem) as days,
            (select ROUND(sum(ball),2) from " . $prefixdb . "mirpit where " . $prefixdb . "users.id=uid) mirpit,
            (select ROUND(sum(ball),2) from " . $prefixdb . "gtz where " . $prefixdb . "users.id=uid) gtz,
            (select ROUND(sum(ball),2) from " . $prefixdb . "gvg where " . $prefixdb . "users.id=uid) gvg,
            (select ROUND(sum(ball),2) from " . $prefixdb . "remeslo where " . $prefixdb . "users.id=uid) remeslo,
            (select ROUND(sum(ball),2) from " . $prefixdb . "help where " . $prefixdb . "users.id=uid) help,
            (select ROUND(sum(ball),2) from " . $prefixdb . "oficer where " . $prefixdb . "users.id=uid) oficer,
            (select ROUND(sum(ball),2) from " . $prefixdb . "nalog where " . $prefixdb . "users.id=uid) nalog,
            (select ROUND(sum(ball),2) from " . $prefixdb . "shtraf where " . $prefixdb . "users.id=uid) shtraf,
            (select ROUND(sum(ball),2) from " . $prefixdb . "sklad where " . $prefixdb . "users.id=uid) sklad,
            (select ROUND(sum(ball),2) from " . $prefixdb . "pvp where " . $prefixdb . "users.id=uid) pvp,
            (select ROUND(sum(ball),2) from " . $prefixdb . "dcd where " . $prefixdb . "users.id=uid) dcd,
            (select count(id) from " . $prefixdb . "mirpit where ball>0 and " . $prefixdb . "users.id=uid) mirpit_on,
            (select count(id) from " . $prefixdb . "mirpit where ball<=0 and " . $prefixdb . "users.id=uid) mirpit_off,
            (select count(id) from " . $prefixdb . "gtz where ball>0 and " . $prefixdb . "users.id=uid) gtz_on,
            (select count(id) from " . $prefixdb . "gtz where ball<=0 and " . $prefixdb . "users.id=uid) gtz_off,
            (select count(id) from " . $prefixdb . "remeslo where ball>0 and " . $prefixdb . "users.id=uid) remeslo_on,
            (select count(id) from " . $prefixdb . "remeslo where ball<=0 and " . $prefixdb . "users.id=uid) remeslo_off,
            (select count(id) from " . $prefixdb . "gvg where ball>0 and " . $prefixdb . "users.id=uid) gvg_on,
            (select count(id) from " . $prefixdb . "gvg where ball<=0 and " . $prefixdb . "users.id=uid) gvg_off,
            (select count(id) from " . $prefixdb . "dcd where ball>0 and " . $prefixdb . "users.id=uid) dcd_on,
            (select count(id) from " . $prefixdb . "dcd where ball<=0 and " . $prefixdb . "users.id=uid) dcd_off
            from " . $prefixdb . "users
            where " . $prefixdb . "users.id=:id
            order by " . $prefixdb . "users.name";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id" => $navigation[1]));
        $result = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $ERROR[] = '<div class="notice error">' . $e . '</div>';
    }

    $TemplateVar["User"] = $result;


    $xajax->registerFunction("ShowTable");
    $TemplateName = "member/member.tpl";
} else {
    header("Location: /404/");
    exit();
}
?>
