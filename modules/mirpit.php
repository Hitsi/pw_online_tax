<?php

/*
 * Добавление информации в таблицу Мирпитов
 */

/*
 * Проверка константы и прав в целях безопасности
 */
if (!defined('ThisScript')) {
    header("Location: /");
    exit();
}
if (!isset($_SESSION['SessinLogin']) or $_SESSION['SessinLogin'] == "") { //проверка переменной сессии логина
    header("Location: /login/");
    exit();
}
if (!in_array("mirpit", $_SESSION['SessinLogin'])) { //наличие прав на доступ к этомй разделу
    header("Location: /404/");
    exit();
}
/*
 * xajax
 */

/*
 * Функция подсчета и добавления данных в таблицу мирпитов
 */

function Add($Form) {
    global $DBH, $prefixdb;
    $objResponse = new xajaxResponse("utf8");
    $text = '';
    $user_ball = array();
    if (!isset($Form["mp1"]) and !isset($Form["mp2"]) and !isset($Form["mp3"]) and !isset($Form["mp4"]) and !isset($Form["mp5"])) {
        $text = '<div class="notice error">Не отмечен ни один из тех кто был</div>';
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
    } elseif (!isset($Form["yan9_ball"]) or $Form["yan9_ball"] == "" or !is_numeric($Form["yan9_ball"])) {
        $text = '<div class="notice error">Не указан балл за янтарь</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["rub9_ball"]) or $Form["rub9_ball"] == "" or !is_numeric($Form["rub9_ball"])) {
        $text = '<div class="notice error">Не указан балл за рубин</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["sap9_ball"]) or $Form["sap9_ball"] == "" or !is_numeric($Form["sap9_ball"])) {
        $text = '<div class="notice error">Не указан балл за сапфир</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["top9_ball"]) or $Form["top9_ball"] == "" or !is_numeric($Form["top9_ball"])) {
        $text = '<div class="notice error">Не указан балл за топаз</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["iz9_ball"]) or $Form["iz9_ball"] == "" or !is_numeric($Form["iz9_ball"])) {
        $text = '<div class="notice error">Не указан балл за изумруд</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["yash9_ball"]) or $Form["yash9_ball"] == "" or !is_numeric($Form["yash9_ball"])) {
        $text = '<div class="notice error">Не указан балл за яшму</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["book_ball"]) or $Form["book_ball"] == "" or !is_numeric($Form["book_ball"])) {
        $text = '<div class="notice error">Не указан балл за Книгу времени</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } else {
        $date = $Form["date"];
        $yan9_count = $Form["yan9_count"];
        $rub9_count = $Form["rub9_count"];
        $sap9_count = $Form["sap9_count"];
        $top9_count = $Form["top9_count"];
        $iz9_count = $Form["iz9_count"];
        $yash9_count = $Form["yash9_count"];
        $book_count = $Form["book_count"];
        $yan9_ball = $Form["yan9_ball"];
        $rub9_ball = $Form["rub9_ball"];
        $sap9_ball = $Form["sap9_ball"];
        $top9_ball = $Form["top9_ball"];
        $iz9_ball = $Form["iz9_ball"];
        $yash9_ball = $Form["yash9_ball"];
        $book_ball = $Form["book_ball"];
        $online = $Form["online"];
        $fond = $Form["fond"];
        $formball = $Form["ball"];
        $loot = array();
        $users = array();
        $loot_online = array();
        $reason = array();
        //цикл обработки 5 мирпитов
        for ($i = 1; $i <= 5; $i++) {
            $name = "mp" . $i;
            if (isset($Form[$name]))
                $$name = $Form[$name];
            else
                $$name = array();
            $reason_text[$i] = "<b>Мирпит " . $i . "</b>: ";
            if ($Form["book_count"][$i] > 0)
                $reason_text[$i].="Книга: " . $Form["book_count"][$i] . "; ";
            if ($Form["yash9_count"][$i] > 0)
                $reason_text[$i].="Яшма: " . $Form["yash9_count"] . "; ";
            if ($Form["yan9_count"][$i] > 0)
                $reason_text[$i].="Янтарь: " . $Form["yan9_count"][$i] . "; ";
            if ($Form["rub9_count"][$i] > 0)
                $reason_text[$i].="Рубин: " . $Form["rub9_count"][$i] . "; ";
            if ($Form["sap9_count"][$i] > 0)
                $reason_text[$i].="Сапфир: " . $Form["sap9_count"][$i] . "; ";
            if ($Form["top9_count"][$i] > 0)
                $reason_text[$i].="Топаз: " . $Form["top9_count"][$i] . "; ";
            if ($Form["iz9_count"][$i] > 0)
                $reason_text[$i].="Изумруд: " . $Form["iz9_count"][$i] . "; ";
            $reason_text[$i].="Людей: " . count($$name) . "<br>";
            $mp_sum[$i] = $yan9_ball * $yan9_count[$i] + $rub9_ball * $rub9_count[$i] + $sap9_ball * $sap9_count[$i] + $top9_ball * $top9_count[$i] + $iz9_ball * $iz9_count[$i] + $yash9_ball * $yash9_count[$i] + $book_ball * $book_count[$i];
            $mp_fond[$i] = round($mp_sum[$i] * $fond / 100, 2);
            $loot[$i] = $yan9_count[$i] . "," . $rub9_count[$i] . "," . $sap9_count[$i] . "," . $top9_count[$i] . "," . $iz9_count[$i] . "," . $yash9_count[$i] . "," . $book_count[$i];
            $mp_count[$i] = count($$name);
            if ($mp_count[$i] > 0) {
                if ($mp_sum[$i] == 0)
                    $mp_ball[$i] = $Form["ball_in"];
                elseif (isset($Form["divide"]))
                    $mp_ball[$i] = round(($mp_sum[$i] - $mp_fond[$i]) / $mp_count[$i], 2);
                else
                    $mp_ball[$i] = $Form["ball_in"];
            } else
                $mp_ball[$i] = 0;
            $objResponse->addAssign("mp_ball[" . $i . "]", "value", $mp_sum[$i]);
            $objResponse->addAssign("mp_fond[" . $i . "]", "value", $mp_fond[$i]);
            $objResponse->addAssign("mp_people[" . $i . "]", "value", $mp_count[$i]);
            foreach ($$name as $key => $value) {
                if (!isset($user_ball[$key])) {
                    $user_ball[$key] = $mp_ball[$i];
                } else {
                    $user_ball[$key]+=$mp_ball[$i];
                }
                if (!isset($reason[$key])) {
                    $reason[$key] = $reason_text[$i];
                } else {
                    $reason[$key] = $reason[$key] . $reason_text[$i];
                }
                $users[$i][] = $key;
            }
            if (isset($users[$i]))
                $users[$i] = implode(",", $users[$i]);
            else
                $users[$i] = "";
        }
        $cost = $yan9_ball . "," . $rub9_ball . "," . $sap9_ball . "," . $top9_ball . "," . $iz9_ball . "," . $yash9_ball . "," . $book_ball . "," . $fond . "," . $Form["ball_in"] . "," . $Form["ball_out"];
        $loot = implode(";", $loot);
        $users = implode(";", $users);
        foreach ($online as $key => $value) {
            $loot_online[] = $key;
        }
        $loot_online = implode(",", $loot_online);
        foreach ($online as $key => $value) {
            if (!isset($mp1[$key]) and !isset($mp2[$key]) and !isset($mp3[$key]) and !isset($mp4[$key]) and !isset($mp5[$key])) {
                $user_ball[$key] = $Form["ball_out"];
                $reason[$key] = "за отсутствие";
            }
        }
        try {
            $sql = "select count(uid) as count from " . $prefixdb . "mirpit where date=:date";
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
                $sql = "delete from " . $prefixdb . "mirpit where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
                $sql = "delete from " . $prefixdb . "mirpit_profit where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
                $sql = "insert into " . $prefixdb . "mirpit (uid,date,ball,text) values (:uid,:date,:ball,:text)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                foreach ($user_ball as $key => $value) {
                    if (isset($formball[$key]) and $formball[$key] != "") {
                        $user_ball[$key] = $formball[$key];
                        $value = $formball[$key];
                    }
                    #if (!isset($reason[$key])) $reason[$key]="хз";
                    $sth->execute(array(":uid" => $key, ":date" => $date, ":ball" => $value, ":text" => $reason[$key]));
                }
                $sql = "insert into " . $prefixdb . "mirpit_profit (date,loot,cost,online,users)
                    values (:date,:loot,:cost,:online,:users)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date, ":loot" => $loot,
                    ":cost" => $cost, "online" => $loot_online, "users" => $users));
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('result', 'innerHTML');
                $objResponse->addAssign("result", "innerHTML", $text);
                return $objResponse;
            }
        } elseif (!isset($result) or $result["count"] == 0) {
            try {
                $sql = "insert into " . $prefixdb . "mirpit_profit (date,loot,cost,online,users)
                    values (:date,:loot,:cost,:online,:users)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date, ":loot" => $loot,
                    ":cost" => $cost, "online" => $loot_online, "users" => $users));
                $sql = "insert into " . $prefixdb . "mirpit (uid,date,ball,text) values (:uid,:date,:ball,:text)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                foreach ($user_ball as $key => $value) {
                    if (isset($formball[$key]) and $formball[$key] != "") {
                        $user_ball[$key] = $formball[$key];
                        $value = $formball[$key];
                    }
                    #if (!isset($reason[$key])) $reason[$key]="хз";
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
    foreach ($user_ball as $key => $value) {
        $objResponse->addAssign("result[" . $key . "]", "value", $value);
    }
    if (empty($text))
        $text = '<div class="notice success">Добавлено</div>';
    $objResponse->addClear('result', 'innerHTML');
    $objResponse->addAssign("result", "innerHTML", $text);
    return $objResponse;
}

/*
 * Функция загрузки данных в форму
 */

function Load($Form) {
    global $DBH, $prefixdb;
    $objResponse = new xajaxResponse("utf8");
    $text = '';
    if (!isset($Form['date']) or $Form['date'] == "") {
        $text = '<div class="notice error">Не указана дата</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } else {
        $date = $Form['date'];
        try {
            $sql = "select *, count(date) as count from " . $prefixdb . "mirpit_profit where date=:date";
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
            if (isset($Form["mp1"]))
                $mp1 = $Form["mp1"];
            else
                $mp1 = array();
            if (isset($Form["mp2"]))
                $mp2 = $Form["mp2"];
            else
                $mp2 = array();
            if (isset($Form["mp3"]))
                $mp3 = $Form["mp3"];
            else
                $mp3 = array();
            if (isset($Form["mp4"]))
                $mp4 = $Form["mp4"];
            else
                $mp4 = array();
            if (isset($Form["mp5"]))
                $mp5 = $Form["mp5"];
            else
                $mp5 = array();
            for ($i = 1; $i <= 5; $i++) {
                $name = "mp" . $i;
                foreach ($$name as $key => $value) {
                    $objResponse->addAssign($name . '[' . $key . ']', 'checked', false);
                }
            }
            if (isset($Form["online"]))
                $online = $Form["online"];
            else
                $online = array();
            foreach ($online as $key => $value) {
                $objResponse->addAssign('online[' . $key . ']', 'checked', false);
            }

            $online = explode(",", $result["online"]);
            foreach ($online as $value) {
                $objResponse->addAssign('online[' . $value . ']', 'checked', true);
            }
            list($yan9_ball, $rub9_ball, $sap9_ball, $top9_ball, $iz9_ball, $yash9_ball, $book_ball, $fond, $ball_in, $ball_out) = explode(",", $result["cost"]);
            $objResponse->addAssign("yan9_ball", "value", $yan9_ball);
            $objResponse->addAssign("rub9_ball", "value", $rub9_ball);
            $objResponse->addAssign("sap9_ball", "value", $sap9_ball);
            $objResponse->addAssign("top9_ball", "value", $top9_ball);
            $objResponse->addAssign("iz9_ball", "value", $iz9_ball);
            $objResponse->addAssign("yash9_ball", "value", $yash9_ball);
            $objResponse->addAssign("book_ball", "value", $book_ball);
            $objResponse->addAssign("fond", "value", $fond);
            $objResponse->addAssign("ball_in", "value", $ball_in);
            $objResponse->addAssign("ball_out", "value", $ball_out);
            $users = explode(";", $result["users"]);
            foreach ($users as $key => $value) {
                $user = explode(",", $value);
                foreach ($user as $uid) {
                    $objResponse->addAssign('mp' . ($key + 1) . '[' . $uid . ']', 'checked', true);
                }
            }
            $loot = explode(";", $result["loot"]);
            foreach ($loot as $key => $value) {
                list($yan9_count, $rub9_count, $sap9_count, $top9_count, $iz9_count, $yash9_count, $book_count) = explode(",", $value);
                $objResponse->addAssign("yan9_count[" . ($key + 1) . "]", "value", $yan9_count);
                $objResponse->addAssign("rub9_count[" . ($key + 1) . "]", "value", $rub9_count);
                $objResponse->addAssign("sap9_count[" . ($key + 1) . "]", "value", $sap9_count);
                $objResponse->addAssign("top9_count[" . ($key + 1) . "]", "value", $top9_count);
                $objResponse->addAssign("iz9_count[" . ($key + 1) . "]", "value", $iz9_count);
                $objResponse->addAssign("yash9_count[" . ($key + 1) . "]", "value", $yash9_count);
                $objResponse->addAssign("book_count[" . ($key + 1) . "]", "value", $book_count);
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

/*
 * Функция удаления
 */

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
            $sql = "select *, count(date) as count from " . $prefixdb . "mirpit where date=:date";
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
                $sql = "delete from " . $prefixdb . "mirpit where date=:date";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date" => $date));
                $sql = "delete from " . $prefixdb . "mirpit_profit where date=:date";
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
    $ERROR[] = $e;
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
    $ERROR[] = $e;
}

$xajax->registerFunction("Add");
$xajax->registerFunction("Load");
$xajax->registerFunction("Delete");
$TemplateName = "add/mirpit.tpl";
?>