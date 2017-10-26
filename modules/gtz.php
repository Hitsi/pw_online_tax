<?php

/*
 * Добавление информации в таблицу ГТЗ
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
if (!in_array("gtz", $_SESSION['SessinLogin'])) {
    header("Location: /404/");
    exit();
}
/*
 * xajax
 */

function Add($Form) {
    global $DBH, $prefixdb;
    $objResponse = new xajaxResponse("utf8");
    $text = "";
    $ball = array();
    if (!isset($Form["users"]) or $Form["users"] == "") {
        $text = '<div class="notice error">Не отмечен ни один из тех кто был на эвенте</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["online"]) or $Form["online"] == "") {
        $text = '<div class="notice error">Не отмечен ни один из тех кто был онлайн</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["date"]) or $Form["date"] == "") {
        $text = '<div class="notice error">Не указана дата</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["ball_in"]) or $Form["ball_in"] == "" or !is_numeric($Form["ball_in"])) {
        $text = '<div class="notice error">Не указаны баллы присутвующим или там не цифра</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["ball_out"]) or $Form["ball_out"] == "" or !is_numeric($Form["ball_out"])) {
        $text = '<div class="notice error">Не указаны штраф забившим или там не цифра</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["fond"]) or $Form["fond"] == "" or !is_numeric($Form["fond"])) {
        $text = '<div class="notice error">Не указан % в фонд клана</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["yan8_ball"]) or $Form["yan8_ball"] == "" or !is_numeric($Form["yan8_ball"])) {
        $text = '<div class="notice error">Не указан балл за янтарь</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["yan8_count"]) or $Form["yan8_count"] == "" or !is_numeric($Form["yan8_count"])) {
        $text = '<div class="notice error">Не указано количество янтарей</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["rub8_ball"]) or $Form["rub8_ball"] == "" or !is_numeric($Form["rub8_ball"])) {
        $text = '<div class="notice error">Не указан балл за рубин</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["rub8_count"]) or $Form["rub8_count"] == "" or !is_numeric($Form["rub8_count"])) {
        $text = '<div class="notice error">Не указано количество рубинов</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["sap8_ball"]) or $Form["sap8_ball"] == "" or !is_numeric($Form["sap8_ball"])) {
        $text = '<div class="notice error">Не указан балл за сапфир</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["sap8_count"]) or $Form["sap8_count"] == "" or !is_numeric($Form["sap8_count"])) {
        $text = '<div class="notice error">Не указано количество сапфиров</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["top8_ball"]) or $Form["top8_ball"] == "" or !is_numeric($Form["top8_ball"])) {
        $text = '<div class="notice error">Не указан балл за топаз</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["top8_count"]) or $Form["top8_count"] == "" or !is_numeric($Form["top8_count"])) {
        $text = '<div class="notice error">Не указано количество топазов</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["iz8_ball"]) or $Form["iz8_ball"] == "" or !is_numeric($Form["iz8_ball"])) {
        $text = '<div class="notice error">Не указан балл за изумруд</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["iz8_count"]) or $Form["iz8_count"] == "" or !is_numeric($Form["iz8_count"])) {
        $text = '<div class="notice error">Не указано количество изумрудов</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["pvo_ball"]) or $Form["pvo_ball"] == "" or !is_numeric($Form["pvo_ball"])) {
        $text = '<div class="notice error">Не указан балл за ПВО</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["pvo_count"]) or $Form["pvo_count"] == "" or !is_numeric($Form["pvo_count"])) {
        $text = '<div class="notice error">Не указано количество ПВО</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["emblema_ball"]) or $Form["emblema_ball"] == "" or !is_numeric($Form["emblema_ball"])) {
        $text = '<div class="notice error">Не указан балл за ПВО</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["emblema_count"]) or $Form["emblema_count"] == "" or !is_numeric($Form["emblema_count"])) {
        $text = '<div class="notice error">Не указано количество ПВО</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } else {
        $users = $Form["users"];
        $online = $Form["online"];
        $date = $Form["date"];
        $sum = $Form["emblema_ball"] * $Form["emblema_count"] + $Form["pvo_ball"] * $Form["pvo_count"] + $Form["yan8_ball"] * $Form["yan8_count"] + $Form["rub8_ball"] * $Form["rub8_count"] + $Form["sap8_ball"] * $Form["sap8_count"] + $Form["top8_ball"] * $Form["top8_count"] + $Form["iz8_ball"] * $Form["iz8_count"];
        $fond = $Form["fond"];
        $formball = array();
        foreach ($Form["ball"] as $key => $value) {
            if ($value != "")
                $formball[$key] = $value;
        }
        $objResponse->addAssign("result_ball", "value", $sum);
        $objResponse->addAssign("result_fond", "value", round(($sum * $fond) / 100, 2));
        $objResponse->addAssign("result_people", "value", count($users));
        try {
            $sql = "select count(uid) as count from " . $prefixdb . "gtz where date=:date";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":date" => $date));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('result', 'innerHTML');
            $objResponse->addAssign("result", "innerHTML", $text);
            return $objResponse;
        }
        $reason = array();
        $reason_text = "";
        if ($Form["emblema_count"] > 0)
            $reason_text.="Эмблема: " . $Form["emblema_count"] . "; ";
        if ($Form["pvo_count"] > 0)
            $reason_text.="ПВО: " . $Form["pvo_count"] . "; ";
        if ($Form["yan8_count"] > 0)
            $reason_text.="Янтарь: " . $Form["yan8_count"] . "; ";
        if ($Form["rub8_count"] > 0)
            $reason_text.="Рубин: " . $Form["rub8_count"] . "; ";
        if ($Form["sap8_count"] > 0)
            $reason_text.="Сапфир: " . $Form["sap8_count"] . "; ";
        if ($Form["top8_count"] > 0)
            $reason_text.="Топаз: " . $Form["top8_count"] . "; ";
        if ($Form["iz8_count"] > 0)
            $reason_text.="Изумруд: " . $Form["iz8_count"] . "; ";
        $users_profit = array();
        $online_profit = array();
        foreach ($users as $key => $value) {
            if ($value == "on") {
                $ball[$key] = $Form["ball_in"];
                $users_profit[] = $key;
                $reason[$key] = "За присутствие";
            }
        }
        foreach ($online as $key => $value) {
            if ($value == "on" and (!isset($users[$key]) or $users[$key] == "")) {
                $ball[$key] = $Form["ball_out"];
                $reason[$key] = "За отсутствие находясь онлайн";
            }
            $online_profit[] = $key;
        }
        $users_profit = implode(",", $users_profit);
        $online_profit = implode(",", $online_profit);
        $costs = $Form["emblema_ball"] . "," . $Form["pvo_ball"] . "," . $Form["yan8_ball"] . "," . $Form["rub8_ball"] . "," . $Form["sap8_ball"] . "," . $Form["top8_ball"] . "," . $Form["iz8_ball"] . "," . $Form["fond"] . "," . $Form["ball_in"] . "," . $Form["ball_out"];
        $profit = $Form["emblema_count"] . "," . $Form["pvo_count"] . "," . $Form["yan8_count"] . "," . $Form["rub8_count"] . "," . $Form["sap8_count"] . "," . $Form["top8_count"] . "," . $Form["iz8_count"];

        foreach ($ball as $key => $value) {
            if (isset($formball[$key]) and $formball[$key] != "") {
                $ball[$key] = $formball[$key];
            } elseif (isset($Form["divide"]) and $Form["divide"] == "on" and isset($users[$key]) and $users[$key] != "" and $sum != 0) {
                $ball[$key] = round(($sum / count($users)) * (100 - $fond) / 100, 2);
                $reason[$key] = "Присутствовал. " . $reason_text;
            } elseif ((isset($Form["divide"]) and $Form["divide"] == "on" and isset($online[$key]) and $online[$key] != "") and (!isset($users[$key]) or $users[$key] == "") and $sum != 0) {
                $ball[$key] = -round(($sum / count($users)) * (100 - $fond) / 100, 2);
                $reason[$key] = "Отсутствовал. " . $reason_text;
            }
        }
        if ((isset($result) and $result["count"] > 0) and (isset($Form["update"]) and $Form["update"] == "on")) {
            try {
                $sql = "delete from " . $prefixdb . "gtz where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
                $sql = "delete from " . $prefixdb . "gtz_profit where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
                $sql = "insert into " . $prefixdb . "gtz_profit (date,profit,cost,online,users)
                    values (:date,:profit,:cost,:online,:users)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date, ":profit" => $profit,
                    ":cost" => $costs, ":online" => $online_profit, ":users" => $users_profit));
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sql = "insert into " . $prefixdb . "gtz (uid,date,ball,text) values (:uid,:date,:ball,:text)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                foreach ($ball as $key => $value) {
                    $sth->execute(array(":uid" => $key, ":date" => $date, ":ball" => $value, ":text" => $reason[$key]));
                }
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('result', 'innerHTML');
                $objResponse->addAssign("result", "innerHTML", $text);
                return $objResponse;
            }
        } elseif (!isset($result) or $result["count"] == 0) {
            try {
                $sql = "insert into " . $prefixdb . "gtz_profit (date,profit,cost,online,users)
                    values (:date,:profit,:cost,:online,:users)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date, ":profit" => $profit,
                    ":cost" => $costs, ":online" => $online_profit, ":users" => $users_profit));
                $sql = "insert into " . $prefixdb . "gtz (uid,date,ball,text) values (:uid,:date,:ball,:text)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                foreach ($ball as $key => $value) {
                    $sth->execute(array(":uid" => $key, ":date" => $date, ":ball" => $value, ":text" => $reason[$key]));
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
    foreach ($ball as $key => $value) {
        $objResponse->addAssign("result[" . $key . "]", "value", $value);
    }
    $objResponse->addClear('result', 'innerHTML');
    $objResponse->addAssign("result", "innerHTML", $text);
    return $objResponse;
}

function Load($date) {
    global $DBH, $prefixdb;
    $objResponse = new xajaxResponse("utf8");
    $text = '';
    if (!isset($date) or empty($date)) {
        $text = '<div class="notice error">Не указана дата</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } else {
        try {
            $sql = "select *, count(date) as count from " . $prefixdb . "gtz_profit where date=:date";
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
            $online = explode(",", $result["online"]);
            $users = explode(",", $result["users"]);
            foreach ($online as $value) {
                $objResponse->addAssign('online[' . $value . ']', 'checked', true);
            }
            list($emblema_ball, $pvo_ball, $yan8_ball, $rub8_ball, $sap8_ball, $top8_ball, $iz8_ball, $fond, $ball_in, $ball_out) = explode(",", $result["cost"]);
            $objResponse->addAssign("emblema_ball", "value", $emblema_ball);
            $objResponse->addAssign("pvo_ball", "value", $pvo_ball);
            $objResponse->addAssign("yan8_ball", "value", $yan8_ball);
            $objResponse->addAssign("rub8_ball", "value", $rub8_ball);
            $objResponse->addAssign("sap8_ball", "value", $sap8_ball);
            $objResponse->addAssign("top8_ball", "value", $top8_ball);
            $objResponse->addAssign("iz8_ball", "value", $iz8_ball);
            $objResponse->addAssign("fond", "value", $fond);
            $objResponse->addAssign("ball_in", "value", $ball_in);
            $objResponse->addAssign("ball_out", "value", $ball_out);
            list($emblema_count, $pvo_count, $yan8_count, $rub8_count, $sap8_count, $top8_count, $iz8_count) = explode(",", $result["profit"]);
            $objResponse->addAssign("emblema_count", "value", $emblema_count);
            $objResponse->addAssign("pvo_count", "value", $pvo_count);
            $objResponse->addAssign("yan8_count", "value", $yan8_count);
            $objResponse->addAssign("rub8_count", "value", $rub8_count);
            $objResponse->addAssign("sap8_count", "value", $sap8_count);
            $objResponse->addAssign("top8_count", "value", $top8_count);
            $objResponse->addAssign("iz8_count", "value", $iz8_count);
            $users = explode(",", $result["users"]);
            foreach ($users as $value) {
                $objResponse->addAssign('users[' . $value . ']', 'checked', true);
            }
        } else {
            $text = '<div class="notice error">Данные за это число не существуют</div>';
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
    global $DBH, $prefixdb;
    $objResponse = new xajaxResponse("utf8");
    $text = '';
    if (!isset($date) or empty($date)) {
        $text = '<div class="notice error">Не указана дата</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } else {
        try {
            $sql = "select *, count(date) as count from " . $prefixdb . "gtz where date=:date";
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
                $sql = "delete from " . $prefixdb . "gtz where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
                $sql = "delete from " . $prefixdb . "gtz_profit where date=:date";
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

$xajax->registerFunction("Add");
$xajax->registerFunction("Load");
$xajax->registerFunction("Delete");
$TemplateName = "add/gtz.tpl";
?>
