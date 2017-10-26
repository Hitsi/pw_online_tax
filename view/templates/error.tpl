<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-language" content="ru" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-style-type" content="text/css" />
        <meta name="description" content="" />
        <meta name="author" content="Савенков Алексей">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{% block html_title %}НЯ!{% endblock %}</title>
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
        <div id="wrap" class="clearfix">
            <div class="center notice error">
                 Ошибка подключения к базе данных
            </div>
            <!-- ===================================== START FOOTER ===================================== -->
            <div class="clear"></div>
            <div id="footer">
                &copy; 2012 НЯ!
            </div>
        </div><!-- END WRAP -->
    </body>
</html>