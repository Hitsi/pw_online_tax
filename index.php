<?php

/**
 * Загрузочный файл, принимающий и обрабатывающий все запросы сервера
 * Преобразует ссылку в массив элементов и подгружает необходимый модуль
 * согласно полученным данным из ссылки
 */
/**
 * Определение константы, чтобы остальные скрипты работали только при
 * подключении в этом файле.
 * Сделано в целях безопасности и для обработки всех запросов только этим файлом
 */
if (!defined('ThisScript'))
    define('ThisScript', "Work");
session_start();


/**
 * Переменная в которую будем собирать ошибки
 */
$ERROR = array();

/**
 * Переменная в которую будем собирать переменные для шаблонов
 */
$TemplateVar = array();

/*
 * Создание часто используемых констант
 */
if (!defined('WWW_DIR'))
    define('WWW_DIR', $_SERVER['HTTP_HOST']);
if (!defined('DOC_DIR'))
    define('DOC_DIR', $_SERVER['DOCUMENT_ROOT']);
/*
 * Загрузка конфига и файла с функциями
 */
include("libs/const.php");
/*
 * Библиотека с функциями smtp (отправка почты с сайта)
 */
#require_once(DOC_DIR . "/libs/smtp-func.php");

/*
 * Загрузка шаблонизатора
 */
require_once DOC_DIR . '/libs/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(DOC_DIR . '/view/templates');

$twig = new Twig_Environment($loader, array(
            'cache' => DOC_DIR . '/view/templates_c',
            'auto_reload' => true,
            'debug' => true,
        ));

/*
 * Загрузка xajax
 */
require_once(DOC_DIR . '/libs/xajax/xajax.class.php');
$xajax = new xajax("UTF-8");

/*
 * Подключение к Базе данных и загрузка класса pdo для работы с ней
 */
$mysql_connect = True;
try {
    $DBH = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['database'], $config['username'], $config['password']);
} catch (PDOException $e) {
    $ERROR[] = $e;
    $mysql_connect = False;
}
 if ($mysql_connect == False) {
    $template = $twig->loadTemplate("error.tpl");
    echo $template->render($TemplateVar);
    exit();
 }

$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$DBH->query("SET NAMES UTF8");

/*
 * Обработка адреса. Разбиваем на составляющие чтобы потом с ними работать
 */
preg_match("/^(\/)(.+)/", $_SERVER['REQUEST_URI'], $matches);
if (count($matches) != 0) {
    $navigation = explode('/', trim($matches[2], "/"));
} else {
    /*
     * Если в адресе только домен, то задаем раздел по умолчанию
     */
    $navigation[0] = "main";
}
if (!isset($_SESSION['SessinLogin']) or $_SESSION['SessinLogin'] == "")
    $navigation[0] = "login";
else
    $TemplateVar["Prova"] = $_SESSION['SessinLogin'];
/*
 * Загрузка модулей согласно переменным из адреса
 */
if (preg_match("/^login$|^main$|^users$|^table$|^admin$|^member$|^gvg$|^class$/", $navigation[0]))
    include("modules/" . $navigation[0] . ".php");
elseif ($navigation[0] == "add")
    if (isset($navigation[1]) and preg_match("/^gvg$|^remeslo$|^gtz$|^mirpit$|^sklad$|^dcd$/", $navigation[1]))
        include("modules/" . $navigation[1] . ".php");
    elseif (isset($navigation[1]) and preg_match("/^shtraf$|^nalog$|^oficer$|^help$|^pvp$/", $navigation[1]))
        include("modules/ball_reason.php");
    elseif (isset($navigation[1]) and $navigation[1] != "")
        $TemplateName = "404.tpl";
    else
        include("modules/add.php");
elseif ($navigation[0] != "")
    $TemplateName = "404.tpl";
else {
    include("modules/main.php");
}

$TemplateVar["GameClass"] = $GameClass;
$TemplateVar["SiteName"] = $SiteName;
$TemplateVar["NowDate"] = date('Y-m-d');
$TemplateVar["ERROR"] = $ERROR;
$TemplateVar["Module"] = $navigation[0];
$xajax->processRequests();
$TemplateVar["xjavascript"] = $xajax->getJavascript("/libs/xajax/");
if (!isset($TemplateName))
    $TemplateName = "404.tpl";
$template = $twig->loadTemplate($TemplateName);
echo $template->render($TemplateVar);
?>
