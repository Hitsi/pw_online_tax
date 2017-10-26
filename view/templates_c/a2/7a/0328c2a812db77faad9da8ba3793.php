<?php

/* admin/admin_const.tpl */
class __TwigTemplate_a27a0328c2a812db77faad9da8ba3793 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'html_title' => array($this, 'block_html_title'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "strukture.tpl";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_html_title($context, array $blocks = array())
    {
        echo $this->renderParentBlock("html_title", $context, $blocks);
        echo " | Управление";
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"center\">Стоимость ресурсов на складе</div>
<div id=\"result\"></div>
<div>
    <form id=\"form\" onsubmit = \"return false;\">
        <div class=\"col_2\">
            <table cellspacing=\"0\" cellpadding=\"0\">
                <thead>
                    <tr>
                        <th colspan=\"2\" class=\"center\">8 камни</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Янтарь</th>
                        <td><input type=\"text\" name=\"yan8\" value=\"";
        // line 18
        if (($this->getAttribute($this->getContext($context, 'Const'), "yan8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yan8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\" /></td>
                    </tr>
                    <tr>
                        <th>Рубин</th>
                        <td><input type=\"text\" name=\"rub8\" value=\"";
        // line 22
        if (($this->getAttribute($this->getContext($context, 'Const'), "rub8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "rub8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Сапфир</th>
                        <td><input type=\"text\" name=\"sap8\" value=\"";
        // line 26
        if (($this->getAttribute($this->getContext($context, 'Const'), "sap8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "sap8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Топаз</th>
                        <td><input type=\"text\" name=\"top8\" value=\"";
        // line 30
        if (($this->getAttribute($this->getContext($context, 'Const'), "top8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "top8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Изумруд</th>
                        <td><input type=\"text\" name=\"iz8\" value=\"";
        // line 34
        if (($this->getAttribute($this->getContext($context, 'Const'), "iz8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "iz8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Яшма</th>
                        <td><input type=\"text\" name=\"yash8\" value=\"";
        // line 38
        if (($this->getAttribute($this->getContext($context, 'Const'), "yash8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yash8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                </tbody>
            </table>
                    <table cellspacing=\"0\" cellpadding=\"0\">
                <thead>
                    <tr>
                        <th colspan=\"2\" class=\"center\">ГВГ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Был</th>
                        <td><input type=\"text\" name=\"gvg_in\" value=\"";
        // line 51
        if (($this->getAttribute($this->getContext($context, 'Const'), "gvg_in", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "gvg_in", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\" /></td>
                    </tr>
                    <tr>
                        <th>Небыл</th>
                        <td><input type=\"text\" name=\"gvg_out\" value=\"";
        // line 55
        if (($this->getAttribute($this->getContext($context, 'Const'), "gvg_out", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "gvg_out", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class=\"col_2\">
            <table cellspacing=\"0\" cellpadding=\"0\">
                <thead>
                    <tr>
                        <th colspan=\"2\" class=\"center\">9 камни</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Янтарь</th>
                        <td><input type=\"text\" name=\"yan9\" value=\"";
        // line 70
        if (($this->getAttribute($this->getContext($context, 'Const'), "yan9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yan9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\" /></td>
                    </tr>
                    <tr>
                        <th>Рубин</th>
                        <td><input type=\"text\" name=\"rub9\" value=\"";
        // line 74
        if (($this->getAttribute($this->getContext($context, 'Const'), "rub9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "rub9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Сапфир</th>
                        <td><input type=\"text\" name=\"sap9\" value=\"";
        // line 78
        if (($this->getAttribute($this->getContext($context, 'Const'), "sap9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "sap9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Топаз</th>
                        <td><input type=\"text\" name=\"top9\" value=\"";
        // line 82
        if (($this->getAttribute($this->getContext($context, 'Const'), "top9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "top9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Изумруд</th>
                        <td><input type=\"text\" name=\"iz9\" value=\"";
        // line 86
        if (($this->getAttribute($this->getContext($context, 'Const'), "iz9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "iz9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Яшма</th>
                        <td><input type=\"text\" name=\"yash9\" value=\"";
        // line 90
        if (($this->getAttribute($this->getContext($context, 'Const'), "yash9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yash9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                </tbody>
            </table>
                    <table cellspacing=\"0\" cellpadding=\"0\">
                <thead>
                    <tr>
                        <th colspan=\"2\" class=\"center\">ГТЗ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Был</th>
                        <td><input type=\"text\" name=\"gtz_in\" value=\"";
        // line 103
        if (($this->getAttribute($this->getContext($context, 'Const'), "gtz_in", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "gtz_in", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\" /></td>
                    </tr>
                    <tr>
                        <th>Небыл</th>
                        <td><input type=\"text\" name=\"gtz_out\" value=\"";
        // line 107
        if (($this->getAttribute($this->getContext($context, 'Const'), "gtz_out", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "gtz_out", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class=\"col_2\">
            <table cellspacing=\"0\" cellpadding=\"0\">
                <thead>
                    <tr>
                        <th colspan=\"2\" class=\"center\">10 камни</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Янтарь</th>
                        <td><input type=\"text\" name=\"yan10\" value=\"";
        // line 122
        if (($this->getAttribute($this->getContext($context, 'Const'), "yan10", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yan10", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\" /></td>
                    </tr>
                    <tr>
                        <th>Рубин</th>
                        <td><input type=\"text\" name=\"rub10\" value=\"";
        // line 126
        if (($this->getAttribute($this->getContext($context, 'Const'), "rub10", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "rub10", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Сапфир</th>
                        <td><input type=\"text\" name=\"sap10\" value=\"";
        // line 130
        if (($this->getAttribute($this->getContext($context, 'Const'), "sap10", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "sap10", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Топаз</th>
                        <td><input type=\"text\" name=\"top10\" value=\"";
        // line 134
        if (($this->getAttribute($this->getContext($context, 'Const'), "top10", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "top10", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Изумруд</th>
                        <td><input type=\"text\" name=\"iz10\" value=\"";
        // line 138
        if (($this->getAttribute($this->getContext($context, 'Const'), "iz10", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "iz10", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Яшма</th>
                        <td><input type=\"text\" name=\"yash10\" value=\"";
        // line 142
        if (($this->getAttribute($this->getContext($context, 'Const'), "yash10", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yash10", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                </tbody>
            </table>
                    <table cellspacing=\"0\" cellpadding=\"0\">
                <thead>
                    <tr>
                        <th colspan=\"2\" class=\"center\">Ремесло</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Был</th>
                        <td><input type=\"text\" name=\"remeslo_in\" value=\"";
        // line 155
        if (($this->getAttribute($this->getContext($context, 'Const'), "remeslo_in", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "remeslo_in", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\" /></td>
                    </tr>
                    <tr>
                        <th>Небыл</th>
                        <td><input type=\"text\" name=\"remeslo_out\" value=\"";
        // line 159
        if (($this->getAttribute($this->getContext($context, 'Const'), "remeslo_out", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "remeslo_out", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class=\"col_2\">
            <table cellspacing=\"0\" cellpadding=\"0\">
                <thead>
                    <tr>
                        <th colspan=\"2\" class=\"center\">11 камни</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Янтарь</th>
                        <td><input type=\"text\" name=\"yan11\" value=\"";
        // line 174
        if (($this->getAttribute($this->getContext($context, 'Const'), "yan11", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yan11", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\" /></td>
                    </tr>
                    <tr>
                        <th>Рубин</th>
                        <td><input type=\"text\" name=\"rub11\" value=\"";
        // line 178
        if (($this->getAttribute($this->getContext($context, 'Const'), "rub11", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "rub11", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Сапфир</th>
                        <td><input type=\"text\" name=\"sap11\" value=\"";
        // line 182
        if (($this->getAttribute($this->getContext($context, 'Const'), "sap11", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "sap11", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Топаз</th>
                        <td><input type=\"text\" name=\"top11\" value=\"";
        // line 186
        if (($this->getAttribute($this->getContext($context, 'Const'), "top11", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "top11", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Изумруд</th>
                        <td><input type=\"text\" name=\"iz11\" value=\"";
        // line 190
        if (($this->getAttribute($this->getContext($context, 'Const'), "iz11", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "iz11", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Яшма</th>
                        <td><input type=\"text\" name=\"yash11\" value=\"";
        // line 194
        if (($this->getAttribute($this->getContext($context, 'Const'), "yash11", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yash11", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                </tbody>
            </table>
                    <table cellspacing=\"0\" cellpadding=\"0\">
                <thead>
                    <tr>
                        <th colspan=\"2\" class=\"center\">Мирпит</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Был</th>
                        <td><input type=\"text\" name=\"mirpit_in\" value=\"";
        // line 207
        if (($this->getAttribute($this->getContext($context, 'Const'), "mirpit_in", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "mirpit_in", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\" /></td>
                    </tr>
                    <tr>
                        <th>Небыл</th>
                        <td><input type=\"text\" name=\"mirpit_out\" value=\"";
        // line 211
        if (($this->getAttribute($this->getContext($context, 'Const'), "mirpit_out", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "mirpit_out", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class=\"col_2\">
            <table cellspacing=\"0\" cellpadding=\"0\">
                <thead>
                    <tr>
                        <th colspan=\"2\" class=\"center\">12 камни</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Янтарь</th>
                        <td><input type=\"text\" name=\"yan12\" value=\"";
        // line 226
        if (($this->getAttribute($this->getContext($context, 'Const'), "yan12", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yan12", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\" /></td>
                    </tr>
                    <tr>
                        <th>Рубин</th>
                        <td><input type=\"text\" name=\"rub12\" value=\"";
        // line 230
        if (($this->getAttribute($this->getContext($context, 'Const'), "rub12", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "rub12", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Сапфир</th>
                        <td><input type=\"text\" name=\"sap12\" value=\"";
        // line 234
        if (($this->getAttribute($this->getContext($context, 'Const'), "sap12", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "sap12", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Топаз</th>
                        <td><input type=\"text\" name=\"top12\" value=\"";
        // line 238
        if (($this->getAttribute($this->getContext($context, 'Const'), "top12", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "top12", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Изумруд</th>
                        <td><input type=\"text\" name=\"iz12\" value=\"";
        // line 242
        if (($this->getAttribute($this->getContext($context, 'Const'), "iz12", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "iz12", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Яшма</th>
                        <td><input type=\"text\" name=\"yash12\" value=\"";
        // line 246
        if (($this->getAttribute($this->getContext($context, 'Const'), "yash12", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yash12", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                </tbody>
            </table>
                    <table cellspacing=\"0\" cellpadding=\"0\">
            <thead>
                <tr>
                    <th colspan=\"2\" class=\"center\">ДЦД</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Был</th>
                    <td><input type=\"text\" name=\"dcd_in\" value=\"";
        // line 259
        if (($this->getAttribute($this->getContext($context, 'Const'), "dcd_in", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "dcd_in", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>Небыл</th>
                    <td><input type=\"text\" name=\"dcd_out\" value=\"";
        // line 263
        if (($this->getAttribute($this->getContext($context, 'Const'), "dcd_out", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "dcd_out", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class=\"col_2\">
            <table cellspacing=\"0\" cellpadding=\"0\">
                <thead>
                    <tr>
                        <th colspan=\"2\" class=\"center\">Прочее</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Книга времени</th>
                        <td><input type=\"text\" name=\"book\" value=\"";
        // line 278
        if (($this->getAttribute($this->getContext($context, 'Const'), "book", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "book", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\" /></td>
                    </tr>
                    <tr>
                        <th>ПВО</th>
                        <td><input type=\"text\" name=\"pvo\" value=\"";
        // line 282
        if (($this->getAttribute($this->getContext($context, 'Const'), "pvo", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "pvo", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Эмблема</th>
                        <td><input type=\"text\" name=\"emblema\" value=\"";
        // line 286
        if (($this->getAttribute($this->getContext($context, 'Const'), "emblema", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "emblema", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>НИС</th>
                        <td><input type=\"text\" name=\"nis\" value=\"";
        // line 290
        if (($this->getAttribute($this->getContext($context, 'Const'), "nis", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "nis", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                    <tr>
                        <th>Фонд клана %</th>
                        <td><input type=\"text\" name=\"fond\" value=\"";
        // line 294
        if (($this->getAttribute($this->getContext($context, 'Const'), "fond", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "fond", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class=\"col_12 center\">
            <input type=\"submit\" name=\"save\" value=\"Сохранить\" class=\"blue\" onclick = \"xajax_EditCost(xajax.getFormValues('form')); return false;\">
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin/admin_const.tpl";
    }

    public function isTraitable()
    {
        return false;
    }
}
