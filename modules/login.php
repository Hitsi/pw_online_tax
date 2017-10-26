<?php

/*
 * Авторизация
 */

/*
 * Проверка константы в целях безопасности
 */
if (!defined('ThisScript'))
    header("Location: /");

/*
 * Уничтожение сессии и выход
 */
if (isset($navigation[1]) and $navigation[1] == "out") {
    session_destroy();
    header("Location: /");
}

function GetRealIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

try {
    $sql = "select * from " . $prefixdb . "security where ip=:ip";
    $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':ip' => GetRealIp()));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $ERROR[] = "Ошибка при обработке запроса";
}

/*
 * Вход
 */

if (isset($_POST['enter'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $IP = GetRealIp();
    if (isset($result['counts']) and ($result['counts'] >= 3 and $result['time'] > time() - 60 * 5)) {
        $ERROR[] = "Вы сделали 3 неудачные попытки войти, вам придется подождать 5 минут для следующей попытки";
    } else {
        if (!isset($result['time']) or $result['time'] < time() - 60 * 5) {
            try {
                $sql = "delete from " . $prefixdb . "security where ip=:ip";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(':ip' => $IP));
                $sql = "insert into " . $prefixdb . "security (ip,counts,time) values (:ip,'1',:time)";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(':ip' => $IP, ":time" => time()));
            } catch (PDOException $e) {
                $ERROR[] = "Ошибка при обработке запроса";
            }
            $counts = 1;
        } elseif (isset($result['counts']) and $result['counts'] < 3) {
            try {
                $sql = "update " . $prefixdb . "security set counts=counts+1 where ip=:ip";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(':ip' => $IP));
            } catch (PDOException $e) {
                $ERROR[] = "Ошибка при обработке запроса";
            }
            $counts = $result['counts'] + 1;
        }
        $result = "";
        try {
            $sql = "select prova from " . $prefixdb . "login where login=:login and password=:password";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(':login' => $login, ':password' => $password));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $ERROR[] = "Ошибка при обработке запроса";
        }
        if (empty($result))
            $ERROR[] = "Неправильный логин или пароль? осталось попыток:" . (3 - $counts);
        else {
            $_SESSION['SessinLogin'] = explode(",", $result['prova']);
            header("Location: /");
        }
    }
}

$TemplateName = "login.tpl";
?>
