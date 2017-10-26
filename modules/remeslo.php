<?php

/*
 * Добавление информации в таблицу Ремесло
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
if (!in_array("remeslo", $_SESSION['SessinLogin'])) {
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
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["online"]) or $Form["online"] == "") {
        $text = '<div class="notice error">Не отмечен ни один из тех кто был онлайн</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["date"]) or $Form["date"] == "") {
        $text = '<div class="notice error">Не указана дата</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["ball_in"]) or $Form["ball_in"] == "" or !is_numeric($Form["ball_in"])) {
        $text = '<div class="notice error">Не указаны баллы присутвующим или там не цифра</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["ball_out"]) or $Form["ball_out"] == "" or !is_numeric($Form["ball_out"])) {
        $text = '<div class="notice error">Не указаны штраф забившим или там не цифра</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["nis"]) or $Form["nis"] == "" or !is_numeric($Form["nis"])) {
        $text = '<div class="notice error">Не указана стоимость Награды Истинному Чемпиону</div>';
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } else {
        $users = $Form["users"];
        $online = $Form["online"];
        $date = $Form["date"];
        $nis = $Form["nis"];
        $fond = $Form["fond"];
        $formball = $Form["ball"];
        try {
            $sql = "select count(uid) as count from " . $prefixdb . "remeslo where date=:date";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":date" => $date));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
            return $objResponse;
        }
        $sum = $Form["nis"];
        $reason = array();
        $users_profit = array();
        $online_profit = array();
        $cost = $Form["nis"] . "," . $Form["fond"] . "," . $Form["ball_in"] . "," . $Form["ball_out"];
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
                $reason[$key] = "За отсутствие";
            }
            $online_profit[] = $key;
        }
        $users_profit = implode(",", $users_profit);
        $online_profit = implode(",", $online_profit);
        foreach ($ball as $key => $value) {
            if (isset($formball[$key]) and $formball[$key] != "") {
                $ball[$key] = $formball[$key];
            } elseif (isset($Form["divide"]) and $Form["divide"] == "on" and isset($users[$key]) and $remin[$key] != "" and $sum != 0) {
                $ball[$key] = round(($nis * (100 - $fond) / 100) / count($users), 2);
                $reason[$key] = "За присутствие, при получении награды";
            } elseif ((isset($Form["divide"]) and $Form["divide"] == "on" and isset($online[$key]) and $online[$key] != "") and (!isset($remin[$key]) or $remin[$key] == "") and $sum != 0) {
                $ball[$key] = -round(($nis * (100 - $fond) / 100) / count($users), 2);
                $reason[$key] = "За отсутствие, при получении награды";
            }
        }
        if ((isset($result) and $result["count"] > 0) and (isset($Form["update"]) and $Form["update"] == "on")) {
            try {
                $sql = "delete from " . $prefixdb . "remeslo where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
                $sql = "delete from " . $prefixdb . "remeslo_profit where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
                $sql = "insert into " . $prefixdb . "remeslo_profit (date,cost,online,users)
                    values (:date,:cost,:online,:users)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date,
                    ":cost" => $cost, ":online" => $online_profit, ":users" => $users_profit));
                $sql = "insert into " . $prefixdb . "remeslo (uid,date,ball,text) values (:uid,:date,:ball,:text)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                foreach ($ball as $key => $value) {
                    $sth->execute(array(":uid" => $key, ":date" => $date, ":ball" => $value, ":text" => $reason[$key]));
                }
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('show', 'innerHTML');
                $objResponse->addAssign("show", "innerHTML", $text);
                return $objResponse;
            }
        } elseif (!isset($result) or $result["count"] == 0) {
            try {
                $sql = "insert into " . $prefixdb . "remeslo_profit (date,cost,online,users)
                    values (:date,:cost,:online,:users)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date,
                    ":cost" => $cost, ":online" => $online_profit, ":users" => $users_profit));
                $sql = "insert into " . $prefixdb . "remeslo (uid,date,ball,text) values (:uid,:date,:ball,:text)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                foreach ($ball as $key => $value) {
                    $sth->execute(array(":uid" => $key, ":date" => $date, ":ball" => $value, ":text" => $reason[$key]));
                }
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('show', 'innerHTML');
                $objResponse->addAssign("show", "innerHTML", $text);
                return $objResponse;
            }
        } else {
            $text = '<div class="notice error">Данные за это число уже существуют, поставьте галочку обновить</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
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
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } else {
        try {
            $sql = "select *, count(date) as count from " . $prefixdb . "remeslo_profit where date=:date";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":date" => $date));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
            return $objResponse;
        }
        if ((isset($result) and $result["count"] > 0)) {
            $online = explode(",", $result["online"]);
            $users = explode(",", $result["users"]);
            foreach ($online as $value) {
                $objResponse->addAssign('online[' . $value . ']', 'checked', true);
            }
            list($nis_ball, $fond, $ball_in, $ball_out) = explode(",", $result["cost"]);
            $objResponse->addAssign("nis", "value", $nis_ball);
            $objResponse->addAssign("fond", "value", $fond);
            $objResponse->addAssign("ball_in", "value", $ball_in);
            $objResponse->addAssign("ball_out", "value", $ball_out);
            $users = explode(",", $result["users"]);
            foreach ($users as $value) {
                $objResponse->addAssign('users[' . $value . ']', 'checked', true);
            }
        } else {
            $text = '<div class="notice error">Данные за это число не существуют</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
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
        $objResponse->addClear('show', 'innerHTML');
        $objResponse->addAssign("show", "innerHTML", $text);
        return $objResponse;
    } else {
        try {
            $sql = "select *, count(date) as count from " . $prefixdb . "remeslo where date=:date";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":date" => $date));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $text = '<div class="notice error">' . $e . '</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
            return $objResponse;
        }
        if ((isset($result) and $result["count"] > 0)) {
            try {
                $sql = "delete from " . $prefixdb . "remeslo where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
                $sql = "delete from " . $prefixdb . "remeslo_profit where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('show', 'innerHTML');
                $objResponse->addAssign("show", "innerHTML", $text);
                return $objResponse;
            }
        } else {
            $text = '<div class="notice error">Данные за это число не существуют</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
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
$TemplateName = "add/remeslo.tpl";
?>
