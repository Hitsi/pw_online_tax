<?php

/*
 * Список клана
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
 * xajax
 */

function EditUser($Form) {
    global $DBH, $prefixdb, $navigation;
    $objResponse = new xajaxResponse("utf8");
    $text = "";
    if (!isset($Form["nickname"]) or empty($Form["nickname"])) {
        $text = '<div class="notice error">Не указан Ник</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["class"]) or empty($Form["class"])) {
        $text = '<div class="notice error">Не указан класс</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["priem"]) or empty($Form["priem"])) {
        $text = '<div class="notice error">Не указана дата приема</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["ball"]) or $Form["ball"] == "") {
        $text = '<div class="notice error">Не указан Начальный балл</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
        } elseif (!isset($Form["lvl"]) or $Form["lvl"] == "") {
        $text = '<div class="notice error">Не указан уровень</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } else {
        if ($navigation[1] == "create") {
            try {
                $sql = "select count(id) as count from " . $prefixdb . "users where name=:name";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":name" => $Form["nickname"]));
                $result = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('show', 'innerHTML');
                $objResponse->addAssign("show", "innerHTML", $text);
                return $objResponse;
            }
            if ($result["count"] > 0) {
                $text = '<div class="notice error">Такой ник уже используется</div>';
                $objResponse->addClear('show', 'innerHTML');
                $objResponse->addAssign("show", "innerHTML", $text);
                return $objResponse;
            } else
                try {
                    $sql = "insert into " . $prefixdb . "users (name, priem, class, ball, lvl, pwcalc, active)
                    values (:name, :priem, :class, :ball, :lvl, :pwcalc, :active)";
                    $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(":name" => $Form["nickname"],
                        ":priem" => $Form["priem"],
                        ":class" => $Form["class"],
                        ":ball" => $Form["ball"],
                        ":lvl" => $Form["lvl"],
                        ":pwcalc" => $Form["pwcalc"],
                        ":active" => True));
                } catch (PDOException $e) {
                    $text = '<div class="notice error">' . $e . '</div>';
                    $objResponse->addClear('show', 'innerHTML');
                    $objResponse->addAssign("show", "innerHTML", $text);
                    return $objResponse;
                }
        } elseif ($navigation[1] == "edit") {
            try {
                $sql = "update " . $prefixdb . "users set name=:name, priem=:priem, class=:class,
                    ball=:ball, lvl=:lvl, pwcalc=:pwcalc, active=:active where id=:id";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":name" => $Form["nickname"],
                    ":priem" => $Form["priem"],
                    ":class" => $Form["class"],
                    ":ball" => $Form["ball"],
                    ":lvl" => $Form["lvl"],
                    ":pwcalc" => $Form["pwcalc"],
                    ":active" => True,
                    ":id" => $navigation[2]));
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('show', 'innerHTML');
                $objResponse->addAssign("show", "innerHTML", $text);
                return $objResponse;
            }
        } else {
            $text = '<div class="notice error">Неправильный раздел</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
            return $objResponse;
        }
    }
    if (empty($text))
        $text = '<div class="notice success">Добавлен</div>';
    $objResponse->addClear('result', 'innerHTML');
    $objResponse->addAssign("result", "innerHTML", $text);
    return $objResponse;
}

/*
 * routing
 */
if (isset($navigation[1]) and $navigation[1] == "create") {
    if (!in_array("priem", $_SESSION['SessinLogin'])) {
        header("Location: /404/");
        exit();
    }
    $xajax->registerFunction("EditUser");
    $TemplateName = "users/users_create.tpl";
} elseif (isset($navigation[1]) and $navigation[1] == "edit") {
    if (!in_array("priem", $_SESSION['SessinLogin'])) {
        header("Location: /404/");
        exit();
    }
    try {
        $sql = "select * from " . $prefixdb . "users where id=:id";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id" => $navigation[2]));
        $result = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $ERROR[] = $e;
    }
    if (!isset($result) or empty($result))
        $ERROR[] = "Соклан не найден";
    else {
        $TemplateVar["User"] = $result;
    }
    $xajax->registerFunction("EditUser");
    $TemplateName = "users/users_create.tpl";
} elseif (isset($navigation[1]) and $navigation[1] == "delete") {
    if (isset($_POST["delete"])) {
        try {
            $sql = "delete from " . $prefixdb . "users where id=:id";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":id" => $navigation[2]));
        } catch (PDOException $e) {
            $ERROR[] = $e;
        }

        try {
            $sql = array();
            $sql[1] = "delete from " . $prefixdb . "gtz where uid=:uid";
            $sql[2] = "delete from " . $prefixdb . "pvp where uid=:uid";
            $sql[3] = "delete from " . $prefixdb . "dcd where uid=:uid";
            $sql[4] = "delete from " . $prefixdb . "gvg where uid=:uid";
            $sql[5] = "delete from " . $prefixdb . "help where uid=:uid";
            $sql[6] = "delete from " . $prefixdb . "mirpit where uid=:uid";
            $sql[7] = "delete from " . $prefixdb . "nalog where uid=:uid";
            $sql[8] = "delete from " . $prefixdb . "oficer where uid=:uid";
            $sql[9] = "delete from " . $prefixdb . "remeslo where uid=:uid";
            $sql[10] = "delete from " . $prefixdb . "shtraf where uid=:uid";
            $sql[11] = "delete from " . $prefixdb . "sklad where uid=:uid";
            foreach ($sql as $query) {
                $sth = $DBH->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":uid" => $navigation[2]));
            }
        } catch (PDOException $e) {
            $ERROR[] = $e;
        }
        #if (empty($ERROR)) header("Location: /users/");
    }
    try {
        $sql = "select name from " . $prefixdb . "users where id=:id";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id" => $navigation[2]));
        $result = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $ERROR[] = $e;
    }
    if (!isset($result) or $result == "")
        $ERROR[] = "Не найден пользователь";
    else
        $TemplateVar["User"] = $result;
    $TemplateName = "users/users_delete.tpl";
} else {
    $result = "";
    try {
        $sql = "select " . $prefixdb . "users.*,
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
            (select ROUND(sum(ball),2) from " . $prefixdb . "dcd where " . $prefixdb . "users.id=uid) dcd
            from " . $prefixdb . "users
            order by " . $prefixdb . "users.name";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $ERROR[] = $e;
    }
    $TemplateVar["Users"] = $result;
    $TemplateName = "users/users.tpl";
}
?>
