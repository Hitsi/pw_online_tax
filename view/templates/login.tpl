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
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        {% block include_js %}
        <script type="text/javascript" src="/js/jquery.js"></script>
        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <script type="text/javascript" src="/js/prettify.js"></script>                                   <!-- PRETTIFY -->
        <script type="text/javascript" src="/js/kickstart.js"></script>                                  <!-- KICKSTART -->
        <script src="/js/modernizr-1.7.min.js"></script>
        {% endblock %}
        {% block include_css %}
        <link rel="stylesheet" type="text/css" href="/css/kickstart.css" media="all" />                  <!-- KICKSTART -->
        <link rel="stylesheet" type="text/css" href="/css/style.css" media="all" />                          <!-- CUSTOM STYLES -->
        {% endblock %}
    </head>
    <body>
        <a id="top-of-page"></a>
        <div id="wrap" class="clearfix">
            <div class="col_12">
                {% for pos in ERROR %}
                <div class="notice error">{{pos}}</div>
                {% endfor %}
            </div>
            <div class="col_5"></div>
            <div class="col_2 center">
                <form method="post">
                    <div id="head">Введите логин</div>
                    <div><input type="text" name="login" id="login" value=""></div>
                    <div id="head">Введите пароль</div>
                    <div><input type="password" name="password" id="password" value=""></div>
                    <div><input type="submit" name="enter" id="enter" value="Войти"></div>
                </form>
            </div>
            <div class="col_5"></div>
            <!-- ===================================== START FOOTER ===================================== -->
            <div class="clear"></div>
            <div id="footer">
                {% block footer %}
                &copy; 2012 {{ SiteName }}
                <a id="link-top" href="#top-of-page">Top</a>
                {% endblock %}
            </div>
        </div><!-- END WRAP -->
    </body>
</html>