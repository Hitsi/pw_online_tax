<?php

/*
 * Модуль "Админы"
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
if (!in_array("admin", $_SESSION['SessinLogin'])) {
    header("Location: /404/");
    exit();
}
/*
 * Xajax
 */

function EditAdmin($Form) {
    global $DBH, $prefixdb, $navigation;
    $objResponse = new xajaxResponse("utf8");
    $text = "";
    if (!isset($Form["login"]) or empty($Form["login"])) {
        $text = '<div class="notice error">Не указан Ник</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } elseif (!isset($Form["password"]) or empty($Form["password"])) {
        $text = '<div class="notice error">Не указан пароль</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    } else {
        $prova = "view";
        if (isset($Form["admin"]) and $Form["admin"] == "on")
            $prova.=",admin";
        if (isset($Form["mirpit"]) and $Form["mirpit"] == "on")
            $prova.=",mirpit";
        if (isset($Form["gtz"]) and $Form["gtz"] == "on")
            $prova.=",gtz";
        if (isset($Form["gvg"]) and $Form["gvg"] == "on")
            $prova.=",gvg";
        if (isset($Form["remeslo"]) and $Form["remeslo"] == "on")
            $prova.=",remeslo";
        if (isset($Form["help"]) and $Form["help"] == "on")
            $prova.=",help";
        if (isset($Form["oficer"]) and $Form["oficer"] == "on")
            $prova.=",oficer";
        if (isset($Form["nalog"]) and $Form["nalog"] == "on")
            $prova.=",nalog";
        if (isset($Form["shtraf"]) and $Form["shtraf"] == "on")
            $prova.=",shtraf";
        if (isset($Form["sklad"]) and $Form["sklad"] == "on")
            $prova.=",sklad";
        if (isset($Form["pvp"]) and $Form["pvp"] == "on")
            $prova.=",pvp";
        if (isset($Form["priem"]) and $Form["priem"] == "on")
            $prova.=",priem";
        if (isset($Form["dcd"]) and $Form["dcd"] == "on")
            $prova.=",dcd";
        if ($navigation[1] == "create") {
            try {
                $sql = "select count(login) as count from " . $prefixdb . "login where login=:login";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":login" => $Form["login"]));
                $result = $sth->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('result', 'innerHTML');
                $objResponse->addAssign("result", "innerHTML", $text);
                return $objResponse;
            }
            if ($result["count"] > 0) {
                $text = '<div class="notice error">Такой ник уже используется</div>';
                $objResponse->addClear('result', 'innerHTML');
                $objResponse->addAssign("result", "innerHTML", $text);
                return $objResponse;
            } else
                try {
                    $sql = "insert into " . $prefixdb . "login (login, password, prova)
                    values (:login, :password, :prova)";
                    $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(":login" => $Form["login"],
                        ":password" => $Form["password"],
                        ":prova" => $prova));
                } catch (PDOException $e) {
                    $text = '<div class="notice error">' . $e . '</div>';
                    $objResponse->addClear('result', 'innerHTML');
                    $objResponse->addAssign("result", "innerHTML", $text);
                    return $objResponse;
                }
        } elseif ($navigation[1] == "edit") {
            try {
                $sql = "update " . $prefixdb . "login set login=:login, password=:password, prova=:prova
                        where login=:oldlogin";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":login" => $Form["login"],
                    ":password" => $Form["password"],
                    ":prova" => $prova,
                    ":oldlogin" => $navigation[2]));
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('result', 'innerHTML');
                $objResponse->addAssign("result", "innerHTML", $text);
                return $objResponse;
            }
        } else
            $text = '<div class="notice error">Неправильный раздел</div>';
        $objResponse->addClear('result', 'innerHTML');
        $objResponse->addAssign("result", "innerHTML", $text);
        return $objResponse;
    }
    if (empty($text))
        $text = '<div class="notice success">Добавлен</div>';
    $objResponse->addClear('result', 'innerHTML');
    $objResponse->addAssign("result", "innerHTML", $text);
    return $objResponse;
}

function EditCost($Form) {
    global $DBH, $prefixdb, $navigation;
    $objResponse = new xajaxResponse("utf8");
    $text = "";
    try {
        $sql = "delete from " . $prefixdb . "const";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
    } catch (PDOException $e) {
        $text = '<div class="notice error">' . $e . '</div>';
        $objResponse->addClear('result', 'innerHTML');
    $objResponse->addAssign("result", "innerHTML", $text);
    return $objResponse;
    }
    try {
        $sql = "insert into " . $prefixdb . "const set const=:const, value=:value";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        foreach ($Form as $key => $value) {
            if ($key != "save")
                if (!is_numeric($value))
                    $text = '<div class="notice error">Неправильные данные в поле ' . $key . '</div>';
                else {
                    $sth->execute(array(":const" => $key,
                        ":value" => $value));
                }
        }
    } catch (PDOException $e) {
        $text = '<div class="notice error">' . $e . '</div>';
       $objResponse->addClear('result', 'innerHTML');
    $objResponse->addAssign("result", "innerHTML", $text);
    return $objResponse;
    }
    if (empty($text))
        $text = '<div class="notice success">Сохранено</div>';
    $objResponse->addClear('result', 'innerHTML');
    $objResponse->addAssign("result", "innerHTML", $text);
    return $objResponse;
}

/*
 * routing
 */
if (isset($navigation[1]) and $navigation[1] == "create") {
    $xajax->registerFunction("EditAdmin");
    $TemplateName = "admin/admin_create.tpl";
} elseif (isset($navigation[1]) and $navigation[1] == "edit") {
    try {
        $sql = "select * from " . $prefixdb . "login where login=:login";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":login" => $navigation[2]));
        $result = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $ERROR[] =  $e;
    }
    if (!isset($result) or empty($result))
        $ERROR[] = "Админ не найден";
    else {
        $result["prova"] = explode(",", $result["prova"]);
        $TemplateVar["Admin"] = $result;
    }
    $xajax->registerFunction("EditAdmin");
    $TemplateName = "admin/admin_create.tpl";
} elseif (isset($navigation[1]) and $navigation[1] == "delete") {
    if (isset($_POST["delete"])) {
        try {
            $sql = "delete from " . $prefixdb . "login where login=:login";
            $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(":login" => $navigation[2]));
        } catch (PDOException $e) {
            $ERROR[] = $e;
        }
        if (empty($ERROR))
            header("Location: /admin/");
    }
    $TemplateVar["Admin"] = $navigation[2];
    $TemplateName = "admin/admin_delete.tpl";
} elseif (isset($navigation[1]) and $navigation[1] == "const") {
    try {
        $sql = "select * from " . $prefixdb . "const";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $ERROR[] = $e;
    }
    if (!isset($result) or empty($result))
        $ERROR[] = "Данные не найдены";
    else {
        $Const = array();
        foreach ($result as $value) {
            $Const[$value['const']] = $value['value'];
        }
        $TemplateVar["Const"] = $Const;
    }
    $xajax->registerFunction("EditCost");
    $TemplateName = "admin/admin_const.tpl";
} else {
    try {
        $sql = "select * from " . $prefixdb . "login";
        $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $ERROR[] = $e;
    }
    $Users = array();
    $i = 1;
    foreach ($result as $user) {
        $Users[$i]["login"] = $user["login"];
        $Users[$i]["prova"] = explode(",", $user["prova"]);
        $i++;
    }
    $TemplateVar["Users"] = $Users;
    $TemplateName = "admin/admin.tpl";
}
?>
