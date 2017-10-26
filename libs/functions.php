<?php

if (!defined('ThisScript'))
    header("Location /");

function converturl($url) {
    // Сначала заменяем "односимвольные" фонемы.
    $st = strtr($url, array ("а" => "a",
                "б" => "b",
                "в" => "v",
                "г" => "g",
                "д" => "d",
                "е" => "e",
                "ё" => "e",
                "ж" => "zh",
                "з" => "z",
                "и" => "i",
                "й" => "i",
                "к" => "k",
                "л" => "l",
                "м" => "m",
                "н" => "n",
                "о" => "o",
                "п" => "p",
                "р" => "r",
                "с" => "s",
                "т" => "t",
                "у" => "u",
                "ф" => "f",
                "х" => "h",
                "ц" => "ts",
                "ч" => "ch",
                "ш" => "sh",
                "щ" => "shch",
                "ь" => "",
                "ъ" => "",
                "ы" => "i",
                "э" => "e",
                "ю" => "yu",
                "я" => "ya",
                "А" => "a",
                "Б" => "b",
                "В" => "v",
                "Г" => "g",
                "Д" => "d",
                "Е" => "e",
                "Ё" => "e",
                "Ж" => "zh",
                "З" => "z",
                "И" => "i",
                "Й" => "i",
                "К" => "k",
                "Л" => "l",
                "М" => "m",
                "Н" => "n",
                "О" => "o",
                "П" => "p",
                "Р" => "r",
                "С" => "s",
                "Т" => "t",
                "У" => "u",
                "Ф" => "f",
                "Х" => "h",
                "Ц" => "ts",
                "Ч" => "ch",
                "Ш" => "sh",
                "Щ" => "shch",
                "Ь" => "",
                "Ъ" => "",
                "Ы" => "i",
                "Э" => "e",
                "Ю" => "yu",
                "Я" => "ya"));
    // Возвращаем результат.
    $st = str_replace(" ", "-", $st);
    $st = preg_replace('/[^0-9a-zA-Z_-]/', '', $st);
    return $st;
}

function thumb($url) {
    $url = str_replace("/upload/images", "/upload/_thumbs/Images", $url);
    #$url=explode("/", $url);
    #$name=$url[count($url)-1];
    #$url[count($url)-1]="";
    #$url=implode("%2F", $url);
    #$url="/libs/ckfinder/core/connector/php/connector.php?command=Thumbnail&type=Images&currentFolder=".$url."&FileName=".$name;
    return $url;
}
?>
