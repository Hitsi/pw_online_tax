<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-language" content="ru" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-style-type" content="text/css" />
        <meta name="description" content="" />
        <meta name="author" content="Савенков Алексей">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{% block html_title %}{{ SiteName }}{% endblock %}</title>
        <link rel="shortcut icon" href="/favicon.ico">
        {% block include_css %}
        <link rel="stylesheet" href="/css/chosen.css" />
        <link rel="stylesheet" href="/css/jquery.tooltip.css" />
        <link rel="stylesheet" type="text/css" href="/css/kickstart.css" media="all" />                  <!-- KICKSTART -->
        <link rel="stylesheet" type="text/css" href="/css/style.css" media="all" />                         <!-- CUSTOM STYLES -->
        <link rel="stylesheet" type="text/css" href="/css/tcal.css" media="all" />
        {% endblock %}
    </head>
    <body>
        <a id="top-of-page"></a>
        <div id="wrap" class="clearfix">
            <!-- ===================================== END HEADER ===================================== -->
            <!-- Menu Horizontal -->
            {% block header_menu %}
            <ul class="menu">
                <li {% if Module=="main" or Module=="users" or Module=="class" %}class="current"{% endif %}>
                    <a href="/users/"><span class="icon">U</span>Люди</a>
                    <ul>
                        {% if "priem" in Prova %}
                        <li><a href="/users/create/">Создать</a></li>
                        {% endif %}
                        <li><a href="/main/">Статистика</a></li>
                        <li><a href="/class/">По классам</a></li>
                    </ul>
                </li>
                <li {% if Module=="table" %}class="current"{% endif %}>
                    <a href="/table/"><span class="icon small">D</span>Таблицы</a>
                    <ul>
                        <li><a href="/table/mirpit/">Мирпиты</a></li>
                        <li><a href="/table/gtz/">ГТЗ</a></li>
                        <li><a href="/table/gvg/">ГВГ</a></li>
                        <li><a href="/table/pvp/">ПВП</a></li>
                        <li><a href="/table/dcd/">ДЦД</a></li>
                        <li><a href="/table/remeslo/">Ремесленник</a></li>
                        <li><a href="/table/help/">Помощь</a></li>
                        <li><a href="/table/oficer/">Должность</a></li>
                        <li><a href="/table/nalog/">Налог</a></li>
                        <li><a href="/table/shtraf/">Штраф</a></li>
                        <li><a href="/table/sklad/">Склад</a></li>
                    </ul>
                </li>
                {% if "mirpit" in Prova or "gtz" in Prova or "gvg" in Prova or "pvp" in Prova or "dcd" in Prova or "remeslo" in Prova or "help" in Prova or "oficer" in Prova or "nalog" in Prova or "shtraf" in Prova or "sklad" in Prova %}
                <li {% if Module=="add" %}class="current"{% endif %}>
                    <a href="/add/"><span class="icon small">j</span>Баллы</a>
                    <ul>
                        {% if "mirpit" in Prova %}
                        <li><a href="/add/mirpit/">Мирпиты</a></li>
                        {% endif %}
                        {% if "gtz" in Prova %}
                        <li><a href="/add/gtz/">ГТЗ</a></li>
                        {% endif %}
                        {% if "gvg" in Prova %}
                        <li><a href="/add/gvg/">ГВГ</a></li>
                        {% endif %}
                        {% if "pvp" in Prova %}
                        <li><a href="/add/pvp/">ПВП</a></li>
                        {% endif %}
                        {% if "dcd" in Prova %}
                        <li><a href="/add/dcd/">ДЦД</a></li>
                        {% endif %}
                        {% if "remeslo" in Prova %}
                        <li><a href="/add/remeslo/">Ремесленник</a></li>
                        {% endif %}
                        {% if "help" in Prova %}
                        <li><a href="/add/help/">Помощь</a></li>
                        {% endif %}
                        {% if "oficer" in Prova %}
                        <li><a href="/add/oficer/">Должность</a></li>
                        {% endif %}
                        {% if "nalog" in Prova %}
                        <li><a href="/add/nalog/">Налог</a></li>
                        {% endif %}
                        {% if "shtraf" in Prova %}
                        <li><a href="/add/shtraf/">Штраф</a></li>
                        {% endif %}
                        {% if "sklad" in Prova %}
                        <li><a href="/add/sklad/">Склад</a></li>
                        {% endif %}
                    </ul>
                </li>
                {% endif %}
                {% if "admin" in Prova %}
                <li {% if Module=="admin" %}class="current"{% endif %}>
                    <a href="/admin/"><span class="icon small">z</span>Управление</a>
                    <ul>
                        <li><a href="/admin/create/">Создать админа</a></li>
                        <li><a href="/admin/const/">Стоимость</a></li>
                    </ul>
                </li>
                {% endif %}
                <li>
                    <a href="/login/out/"><span class="icon">Q</span>Выход</a>
                </li>
            </ul>
            {% endblock %}
            {% if ERROR %}
            <div class="col_12">
                {% for pos in ERROR %}
                <div class="notice error">{{pos}}</div>
                {% endfor %}
            </div>
            {% endif %}
            <div class="col_12">
                {% block main %}
                {% endblock %}
            </div>
            <!-- ===================================== START FOOTER ===================================== -->
            <div class="clear"></div>
            <div id="footer">
                {% block footer %}
                &copy; 2012 {{ SiteName }}
                <a id="link-top" href="#top-of-page">Top</a>
                {% endblock %}
            </div>
        </div><!-- END WRAP -->
        {% block include_js %}
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <!--[if lt IE 9]><script src="/js/html5.js"></script><![endif]-->
        <script type="text/javascript" src="/js/prettify.js"></script>                                   <!-- PRETTIFY -->
        <script type="text/javascript" src="/js/kickstart.js"></script>                                  <!-- KICKSTART -->
        <script src="/js/modernizr-1.7.min.js"></script>
        <script src="/js/tcal.js"></script>
        <script src="/js/jquery.tooltip.js"></script>
        <script src="/js/chosen.jquery.js" type="text/javascript"></script>
        {% autoescape false %}
        {{ xjavascript }}
        {% endautoescape %}
        {% endblock %}
    </body>
</html>