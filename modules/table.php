<?php

/*
 * Отображение таблиц
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


if (isset($navigation[1]) and preg_match("/^mirpit$|^gtz$|^gvg$|^remeslo$|^help$|^nalog$|^shtraf$|^oficer$|^sklad$|^pvp$|^dcd$$/", $navigation[1])) {

    function ShowTable($Form) {
        global $DBH, $prefixdb, $twig, $navigation;
        $objResponse = new xajaxResponse("utf8");
        $text = "";
        if (isset($Form["date_ot"]) and isset($Form["date_do"]) and $Form["date_ot"] != "" and $Form["date_do"] != "") {
            $date_ot = explode("-", $Form["date_ot"]);
            $date_do = explode("-", $Form["date_do"]);
            $date_ot = mktime(0, 0, 0, $date_ot[1], $date_ot[2], $date_ot[0]);
            $date_do = mktime(0, 0, 0, $date_do[1], $date_do[2], $date_do[0]);
        }
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
        } elseif (($navigation[1] != "gtz" and $navigation[1] != "remeslo") and ($date_do - $date_ot) > 60 * 60 * 24 * 13) {
            $text = '<div class="notice error">Нельзя выводить больше чем за 2 недели, кроме гтз и ремесла</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
            return $objResponse;
        } elseif (($navigation[1] == "gtz" or $navigation[1] == "remeslo") and ($date_do - $date_ot) > 60 * 60 * 24 * 13 * 7) {
            $text = '<div class="notice error">Нельзя выводить таблицы гтз и ремесла больше чем за 14 неделm</div>';
            $objResponse->addClear('show', 'innerHTML');
            $objResponse->addAssign("show", "innerHTML", $text);
            return $objResponse;
        } else {
            try {
                $sql = "select " . $prefixdb . "users.name as name, " . $prefixdb . "" . $navigation[1] . ".*
                    from " . $prefixdb . "users
                    left join " . $prefixdb . "" . $navigation[1] . " on " . $prefixdb . "" . $navigation[1] . ".uid=" . $prefixdb . "users.id
                    where " . $prefixdb . "" . $navigation[1] . ".date>=:date_ot and
                    " . $prefixdb . "" . $navigation[1] . ".date<=:date_do
                    order by " . $prefixdb . "users.name";
                $sth = $DBH->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(":date_ot" => $Form["date_ot"], ":date_do" => $Form["date_do"]));
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $text = '<div class="notice error">' . $e . '</div>';
                $objResponse->addClear('show', 'innerHTML');
                $objResponse->addAssign("show", "innerHTML", $text);
                return $objResponse;
            }
            if (empty($result)) {
                $text = "Ничего не найдено";
                $objResponse->addClear('show', 'innerHTML');
                $objResponse->addAssign("show", "innerHTML", $text);
                return $objResponse;
            } else {
                foreach ($result as $data) {
                    $TableData[$data["name"]][$data["date"]] = $data["ball"];
                }

                $date = array();
                if ($navigation[1] == "gtz") {
                    while (date("w", $date_ot) != 3)
                        $date_ot+=60 * 60 * 24;
                    $interval = 60 * 60 * 24 * 7;
                } elseif ($navigation[1] == "remeslo") {
                    while (date("w", $date_ot) != 4)
                        $date_ot+=60 * 60 * 24;
                    $interval = 60 * 60 * 24 * 7;
                } else
                    $interval = 60 * 60 * 24;
                for ($i = $date_ot; $i <= $date_do; $i+=$interval)
                    $dates[] = $i;
                $tmpVar["Dates"] = $dates;
                $tmpVar["Data"] = $TableData;
                $tmp = $twig->loadTemplate("table/table_show.tpl");
                $text = $tmp->render($tmpVar);
            }
        }
        $objResponse->addClear('table', 'innerHTML');
        $objResponse->addAssign("table", "innerHTML", $text);
        return $objResponse;
    }

    $TemplateVar["TableName"] = $TableName;
    $xajax->registerFunction("ShowTable");
    $TemplateVar["Table"] = $navigation[1];
    $TemplateName = "table/table.tpl";
} else {
    $TemplateName = "table/table_info.tpl";
}
?>
