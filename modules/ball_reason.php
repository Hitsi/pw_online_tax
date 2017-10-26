<?php

/*
 * Добавление информации в таблицы, в которых нужны только баллы и причина (без лута)
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
if (!in_array($navigation[1], $_SESSION['SessinLogin'])) {
    header("Location: /404/");
    exit();
}
/*
 * xajax
 */

function Add($Form) {
    global $DBH, $prefixdb, $navigation;
    $objResponse = new xajaxResponse("utf8");
    $ball = False;
    foreach ($Form["ball"] as $key => $value) {
        if ($Form["ball"][$key] != "")
            $ball = True;
    }
    $text = "";
    if (!isset($Form["date"]) or $Form["date"] == "") {
        $text = '<div class="notice error">Не указана дата</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!$ball) {
        $text = '<div class="notice error">Не указаны баллы или там не цифра</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } else {
        $date = $Form["date"];
        $ball = $Form["ball"];
        if (isset($Form["text"]))
            $form_text = $Form["text"];
        else
            $form_text = array();
        try {
            $sql = "select count(uid) as count from " . $prefixdb . $navigation[1] . " where date=:date";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":date" => $date));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
        if ((isset($result) and $result["count"] > 0) and (isset($Form["update"]) and $Form["update"] == "on")) {
            try {
                $sql = "delete from " . $prefixdb . "" . $navigation[1] . " where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
                $sql = "insert into " . $prefixdb . "" . $navigation[1] . " (uid,date,ball,text) values (:uid,:date,:ball,:text)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                foreach ($ball as $key => $value) {
                    if (!isset($form_text[$key])) {
                        $form_text[$key] = "";
                    }
                    if ($value != "")
                        $sth->execute(array(":uid" => $key, ":date" => $date, ":ball" => $value, ":text" => $form_text[$key]));
                }
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('result', 'innerHTML');
                $objResponse->addAssign("result", "innerHTML", $text);
                return $objResponse;
            }
        } elseif (!isset($result) or $result["count"] == 0) {
            try {
                $sql = "insert into " . $prefixdb . "" . $navigation[1] . " (uid,date,ball,text) values (:uid,:date,:ball,:text)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                foreach ($ball as $key => $value) {
                    if (!isset($form_text[$key])) {
                        $form_text[$key] = "";
                    }
                    if ($value != "")
                        $sth->execute(array(":uid" => $key, ":date" => $date, ":ball" => $value, ":text" => $form_text[$key]));
                }
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
        $text = '<div class="notice success">Добавлено</div>';
    $objResponse->addClear('result', 'innerHTML');
    $objResponse->addAssign("result", "innerHTML", $text);
    return $objResponse;
}

function Load($date) {
    global $DBH, $prefixdb, $navigation;
    $objResponse = new xajaxResponse("utf8");
    if (!isset($date) or empty($date)) {
        $text = '<div class="notice error">Не указана дата</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } else {
        try {
            $sql = "select * from " . $prefixdb . "" . $navigation[1] . " where date=:date";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":date" => $date));
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
        if (isset($result) and count($result) > 0) {
            foreach ($result as $oficer) {
                $objResponse->addAssign("ball[" . $oficer['uid'] . "]", "value", $oficer['ball']);
                $objResponse->addAssign("text[" . $oficer['uid'] . "]", "value", $oficer['text']);
            }
        } else {
            $text = '<div class="notice error">Данных за это число не существуют, нельзя загрузить</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
    }
    if (empty($text))
        $text = '<div class="notice success">Загружено</div>';
    $objResponse->addClear('result', 'innerHTML');
    $objResponse->addAssign("result", "innerHTML", $text);
    return $objResponse;
}

function Delete($date) {
    global $DBH, $prefixdb, $navigation;
    $objResponse = new xajaxResponse("utf8");
    $text = '';
    if (!isset($date) or empty($date)) {
        $text = '<div class="notice error">Не указана дата</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } else {
        try {
            $sql = "select *, count(date) as count from " . $prefixdb . "" . $navigation[1] . " where date=:date";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":date" => $date));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
        if ((isset($result) and $result["count"] > 0)) {
            try {
                $sql = "delete from " . $prefixdb . "" . $navigation[1] . " where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('result', 'innerHTML');
                $objResponse->addAssign("result", "innerHTML", $text);
                return $objResponse;
            }
        } else {
            $text = '<div class="notice error">Данные за это число не существуют</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
    }
    if (empty($text))
        $text = '<div class="notice success">Удалено</div>';
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

switch ($navigation[1]) {
    case "nalog": {
            $TemplateVar["Head"] = "Баллы за налог";
            break;
        }
    case "shtraf": {
            $TemplateVar["Head"] = "Штрафы";
            break;
        }
    case "help": {
            $TemplateVar["Head"] = "Баллы за помощь";
            break;
        }
    case "oficer": {
            $TemplateVar["Head"] = "Баллы за должности";
            break;
        }
    case "pvp": {
            $TemplateVar["Head"] = "Баллы за пвп";
            break;
        }
}
$xajax->registerFunction("Add");
$xajax->registerFunction("Load");
$xajax->registerFunction("Delete");
$TemplateName = "add/ball_reason.tpl";
?>