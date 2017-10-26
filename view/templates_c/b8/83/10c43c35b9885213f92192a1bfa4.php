<?php

/* strukture.tpl */
class __TwigTemplate_b88310c43c35b9885213f92192a1bfa4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'html_title' => array($this, 'block_html_title'),
            'include_css' => array($this, 'block_include_css'),
            'header_menu' => array($this, 'block_header_menu'),
            'main' => array($this, 'block_main'),
            'footer' => array($this, 'block_footer'),
            'include_js' => array($this, 'block_include_js'),
        );
    }

    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"content-language\" content=\"ru\" />
        <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
        <meta http-equiv=\"content-style-type\" content=\"text/css\" />
        <meta name=\"description\" content=\"\" />
        <meta name=\"author\" content=\"Савенков Алексей\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>";
        // line 10
        $this->displayBlock('html_title', $context, $blocks);
        echo "</title>
        <link rel=\"shortcut icon\" href=\"/favicon.ico\">
        ";
        // line 12
        $this->displayBlock('include_css', $context, $blocks);
        // line 19
        echo "    </head>
    <body>
        <a id=\"top-of-page\"></a>
        <div id=\"wrap\" class=\"clearfix\">
            <!-- ===================================== END HEADER ===================================== -->
            <!-- Menu Horizontal -->
            ";
        // line 25
        $this->displayBlock('header_menu', $context, $blocks);
        // line 107
        echo "            ";
        if ($this->getContext($context, 'ERROR')) {
            // line 108
            echo "            <div class=\"col_12\">
                ";
            // line 109
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'ERROR'));
            foreach ($context['_seq'] as $context['_key'] => $context['pos']) {
                // line 110
                echo "                <div class=\"notice error\">";
                echo twig_escape_filter($this->env, $this->getContext($context, 'pos'), "html");
                echo "</div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pos'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 112
            echo "            </div>
            ";
        }
        // line 114
        echo "            <div class=\"col_12\">
                ";
        // line 115
        $this->displayBlock('main', $context, $blocks);
        // line 117
        echo "            </div>
            <!-- ===================================== START FOOTER ===================================== -->
            <div class=\"clear\"></div>
            <div id=\"footer\">
                ";
        // line 121
        $this->displayBlock('footer', $context, $blocks);
        // line 125
        echo "            </div>
        </div><!-- END WRAP -->
        ";
        // line 127
        $this->displayBlock('include_js', $context, $blocks);
        // line 140
        echo "    </body>
</html>";
    }

    // line 10
    public function block_html_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getContext($context, 'SiteName'), "html");
    }

    // line 12
    public function block_include_css($context, array $blocks = array())
    {
        // line 13
        echo "        <link rel=\"stylesheet\" href=\"/css/chosen.css\" />
        <link rel=\"stylesheet\" href=\"/css/jquery.tooltip.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/kickstart.css\" media=\"all\" />                  <!-- KICKSTART -->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/style.css\" media=\"all\" />                         <!-- CUSTOM STYLES -->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/tcal.css\" media=\"all\" />
        ";
    }

    // line 25
    public function block_header_menu($context, array $blocks = array())
    {
        // line 26
        echo "            <ul class=\"menu\">
                <li ";
        // line 27
        if (((($this->getContext($context, 'Module') == "main") || ($this->getContext($context, 'Module') == "users")) || ($this->getContext($context, 'Module') == "class"))) {
            echo "class=\"current\"";
        }
        echo ">
                    <a href=\"/users/\"><span class=\"icon\">U</span>Люди</a>
                    <ul>
                        ";
        // line 30
        if (twig_in_filter("priem", $this->getContext($context, 'Prova'))) {
            // line 31
            echo "                        <li><a href=\"/users/create/\">Создать</a></li>
                        ";
        }
        // line 33
        echo "                        <li><a href=\"/main/\">Статистика</a></li>
                        <li><a href=\"/class/\">По классам</a></li>
                    </ul>
                </li>
                <li ";
        // line 37
        if (($this->getContext($context, 'Module') == "table")) {
            echo "class=\"current\"";
        }
        echo ">
                    <a href=\"/table/\"><span class=\"icon small\">D</span>Таблицы</a>
                    <ul>
                        <li><a href=\"/table/mirpit/\">Мирпиты</a></li>
                        <li><a href=\"/table/gtz/\">ГТЗ</a></li>
                        <li><a href=\"/table/gvg/\">ГВГ</a></li>
                        <li><a href=\"/table/pvp/\">ПВП</a></li>
                        <li><a href=\"/table/dcd/\">ДЦД</a></li>
                        <li><a href=\"/table/remeslo/\">Ремесленник</a></li>
                        <li><a href=\"/table/help/\">Помощь</a></li>
                        <li><a href=\"/table/oficer/\">Должность</a></li>
                        <li><a href=\"/table/nalog/\">Налог</a></li>
                        <li><a href=\"/table/shtraf/\">Штраф</a></li>
                        <li><a href=\"/table/sklad/\">Склад</a></li>
                    </ul>
                </li>
                ";
        // line 53
        if (((((((((((twig_in_filter("mirpit", $this->getContext($context, 'Prova')) || twig_in_filter("gtz", $this->getContext($context, 'Prova'))) || twig_in_filter("gvg", $this->getContext($context, 'Prova'))) || twig_in_filter("pvp", $this->getContext($context, 'Prova'))) || twig_in_filter("dcd", $this->getContext($context, 'Prova'))) || twig_in_filter("remeslo", $this->getContext($context, 'Prova'))) || twig_in_filter("help", $this->getContext($context, 'Prova'))) || twig_in_filter("oficer", $this->getContext($context, 'Prova'))) || twig_in_filter("nalog", $this->getContext($context, 'Prova'))) || twig_in_filter("shtraf", $this->getContext($context, 'Prova'))) || twig_in_filter("sklad", $this->getContext($context, 'Prova')))) {
            // line 54
            echo "                <li ";
            if (($this->getContext($context, 'Module') == "add")) {
                echo "class=\"current\"";
            }
            echo ">
                    <a href=\"/add/\"><span class=\"icon small\">j</span>Баллы</a>
                    <ul>
                        ";
            // line 57
            if (twig_in_filter("mirpit", $this->getContext($context, 'Prova'))) {
                // line 58
                echo "                        <li><a href=\"/add/mirpit/\">Мирпиты</a></li>
                        ";
            }
            // line 60
            echo "                        ";
            if (twig_in_filter("gtz", $this->getContext($context, 'Prova'))) {
                // line 61
                echo "                        <li><a href=\"/add/gtz/\">ГТЗ</a></li>
                        ";
            }
            // line 63
            echo "                        ";
            if (twig_in_filter("gvg", $this->getContext($context, 'Prova'))) {
                // line 64
                echo "                        <li><a href=\"/add/gvg/\">ГВГ</a></li>
                        ";
            }
            // line 66
            echo "                        ";
            if (twig_in_filter("pvp", $this->getContext($context, 'Prova'))) {
                // line 67
                echo "                        <li><a href=\"/add/pvp/\">ПВП</a></li>
                        ";
            }
            // line 69
            echo "                        ";
            if (twig_in_filter("dcd", $this->getContext($context, 'Prova'))) {
                // line 70
                echo "                        <li><a href=\"/add/dcd/\">ДЦД</a></li>
                        ";
            }
            // line 72
            echo "                        ";
            if (twig_in_filter("remeslo", $this->getContext($context, 'Prova'))) {
                // line 73
                echo "                        <li><a href=\"/add/remeslo/\">Ремесленник</a></li>
                        ";
            }
            // line 75
            echo "                        ";
            if (twig_in_filter("help", $this->getContext($context, 'Prova'))) {
                // line 76
                echo "                        <li><a href=\"/add/help/\">Помощь</a></li>
                        ";
            }
            // line 78
            echo "                        ";
            if (twig_in_filter("oficer", $this->getContext($context, 'Prova'))) {
                // line 79
                echo "                        <li><a href=\"/add/oficer/\">Должность</a></li>
                        ";
            }
            // line 81
            echo "                        ";
            if (twig_in_filter("nalog", $this->getContext($context, 'Prova'))) {
                // line 82
                echo "                        <li><a href=\"/add/nalog/\">Налог</a></li>
                        ";
            }
            // line 84
            echo "                        ";
            if (twig_in_filter("shtraf", $this->getContext($context, 'Prova'))) {
                // line 85
                echo "                        <li><a href=\"/add/shtraf/\">Штраф</a></li>
                        ";
            }
            // line 87
            echo "                        ";
            if (twig_in_filter("sklad", $this->getContext($context, 'Prova'))) {
                // line 88
                echo "                        <li><a href=\"/add/sklad/\">Склад</a></li>
                        ";
            }
            // line 90
            echo "                    </ul>
                </li>
                ";
        }
        // line 93
        echo "                ";
        if (twig_in_filter("admin", $this->getContext($context, 'Prova'))) {
            // line 94
            echo "                <li ";
            if (($this->getContext($context, 'Module') == "admin")) {
                echo "class=\"current\"";
            }
            echo ">
                    <a href=\"/admin/\"><span class=\"icon small\">z</span>Управление</a>
                    <ul>
                        <li><a href=\"/admin/create/\">Создать админа</a></li>
                        <li><a href=\"/admin/const/\">Стоимость</a></li>
                    </ul>
                </li>
                ";
        }
        // line 102
        echo "                <li>
                    <a href=\"/login/out/\"><span class=\"icon\">Q</span>Выход</a>
                </li>
            </ul>
            ";
    }

    // line 115
    public function block_main($context, array $blocks = array())
    {
        // line 116
        echo "                ";
    }

    // line 121
    public function block_footer($context, array $blocks = array())
    {
        // line 122
        echo "                &copy; 2012 ";
        echo twig_escape_filter($this->env, $this->getContext($context, 'SiteName'), "html");
        echo "
                <a id=\"link-top\" href=\"#top-of-page\">Top</a>
                ";
    }

    // line 127
    public function block_include_js($context, array $blocks = array())
    {
        // line 128
        echo "        <script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js\"></script>
        <!--[if lt IE 9]><script src=\"/js/html5.js\"></script><![endif]-->
        <script type=\"text/javascript\" src=\"/js/prettify.js\"></script>                                   <!-- PRETTIFY -->
        <script type=\"text/javascript\" src=\"/js/kickstart.js\"></script>                                  <!-- KICKSTART -->
        <script src=\"/js/modernizr-1.7.min.js\"></script>
        <script src=\"/js/tcal.js\"></script>
        <script src=\"/js/jquery.tooltip.js\"></script>
        <script src=\"/js/chosen.jquery.js\" type=\"text/javascript\"></script>
        ";
        // line 137
        echo "        ";
        echo $this->getContext($context, 'xjavascript');
        echo "
        ";
        // line 139
        echo "        ";
    }

    public function getTemplateName()
    {
        return "strukture.tpl";
    }

    public function isTraitable()
    {
        return false;
    }
}
