<?php

/*
 * Добавление информации в таблицу Склад
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
if (!in_array("sklad", $_SESSION['SessinLogin'])) {
    header("Location: /404/");
    exit();
}
/*
 * xajax
 */

function Add($Form) {
    global $DBH, $prefixdb, $Sklad_resource;
    $objResponse = new xajaxResponse("utf8");
    if (!isset($Form["date"]) or $Form["date"] == "") {
        $text = '<div class="notice error">Не указана дата</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["item"]) or $Form["item"] == "") {
        $text = '<div class="notice error">Не указан ресурс</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["uid"]) or $Form["uid"] == "") {
        $text = '<div class="notice error">Не указана член клана</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } else {
        $date = $Form["date"];
        $uid = $Form["uid"];
        $item = $Form["item"];
        $Const = array();
        try {
            $sql = "select name from " . $prefixdb . "users where id=:id";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":id" => $uid));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
        if (!isset($result) or empty($result["name"])) {
            $text = '<div class="notice error">Такого члена клана не существует</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
        else
            $user = $result["name"];
        try {
            $sql = "select * from " . $prefixdb . "const";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $const) {
                $Const[$const['const']] = $const['value'];
            }
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
        if ($Form["do"] == "give") {
            $ball = -$Const[$item];
            $reason = "Выдали: " . $Sklad_resource[$item];
        } else {
            $ball = $Const[$item];
            $reason = "Положил на склад: " . $Sklad_resource[$item];
        }
        try {
            $sql = "select count(uid) as count from " . $prefixdb . "sklad where date=:date and uid=:uid";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":date" => $date, "uid" => $uid));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
        if ((isset($result) and $result["count"] > 0) and (isset($Form["update"]) and $Form["update"] == "on")) {
            try {
                $sql = "delete from " . $prefixdb . "sklad where date=:date and uid=:uid";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date, "uid" => $uid));
                $sql = "insert into " . $prefixdb . "sklad (uid,date,ball,text) values (:uid,:date,:ball,:text)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":uid" => $uid, ":date" => $date, ":ball" => $ball, ":text" => $reason));
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('result', 'innerHTML');
                $objResponse->addAssign("result", "innerHTML", $text);
                return $objResponse;
            }
        } elseif (!isset($result) or $result["count"] == 0) {
            try {
                $sql = "insert into " . $prefixdb . "sklad (uid,date,ball,text) values (:uid,:date,:ball,:text)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":uid" => $uid, ":date" => $date, ":ball" => $ball, ":text" => $reason));
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('result', 'innerHTML');
                $objResponse->addAssign("result", "innerHTML", $text);
                return $objResponse;
            }
        } else {
            $text = '<div class="notice error">Данные за это число уже существуют, поставьте галочку обновить</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
    }
    if (empty($text))
        $text = '<div class="notice success">Добавлено: "' . $reason . '" для ' . $user . '</div>';
    $objResponse->addClear('result', 'innerHTML');
    $objResponse->addAssign("result", "innerHTML", $text);
    return $objResponse;
}

/*
 * routing
 */
try {
    $sql = "select * from " . $prefixdb . "users";
    $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array());
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $TemplateVar["Users"] = $result;
} catch (PDOException $e) {
    $ERROR[] = '<div class="notice error">' . $e . '</div>';
}
$TemplateVar["Sklad_resource"] = $Sklad_resource;
$xajax->registerFunction("Add");
$TemplateName = "add/sklad.tpl";
?>
