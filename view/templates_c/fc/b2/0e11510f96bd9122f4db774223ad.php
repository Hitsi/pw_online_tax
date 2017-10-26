<?php

/* add/gtz.tpl */
class __TwigTemplate_fcb20e11510f96bd9122f4db774223ad extends Twig_Template
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
        echo " | ГТЗ";
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"center\">Город Темных Зверей</div>
<div id=\"result\"></div>
<div class=\"col_1\"></div>
<form id=\"form\" onsubmit = \"return false;\">
    <div class=\"col_4\">
        <table cellspacing=\"0\" cellpadding=\"0\" border=\"1px\">
            <thead>
                <tr>
                    <th class=\"center\">Ник</th>
                    <th class=\"center\">Был</th>
                    <th class=\"center\">Онлайн</th>
                    <th class=\"center\">Баллы</th>
                    <th class=\"center\">Результат</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'Users'));
        foreach ($context['_seq'] as $context['_key'] => $context['pos']) {
            // line 21
            echo "                <tr>
                    <th>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "name", array(), "any", false), "html");
            echo "</th>
                    <td class=\"center\"><input type=\"checkbox\" name=\"users[";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" id=\"users[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\"></td>
                    <td class=\"center\"><input type=\"checkbox\" name=\"online[";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" id=\"online[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"ball[";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" value=\"\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"result[";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" id=\"result[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" disabled=\"disabled\" value=\"0\"></td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pos'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 29
        echo "            </tbody>
        </table>
    </div>
    <div class=\"col_3 center\">
        <div>Дата<input type=\"text\" name=\"date\" id=\"date\" class=\"tcal\" value=\"\"/></div>
        <div class=\"clear\"></div>
        <table cellspacing=\"0\" cellpadding=\"0\" border=\"1px\">
            <thead>
                <tr>
                    <th colspan=\"2\" class=\"center\">Баллы</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Был</th>
                    <td class=\"center\"><input type=\"text\" name=\"ball_in\" id=\"ball_in\" value=\"";
        // line 44
        if (($this->getAttribute($this->getContext($context, 'Const'), "gtz_in", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "gtz_in", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>Не был</th>
                    <td class=\"center\"><input type=\"text\" name=\"ball_out\" id=\"ball_out\" value=\"";
        // line 48
        if (($this->getAttribute($this->getContext($context, 'Const'), "gtz_out", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "gtz_out", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>В фонд %</th>
                    <td class=\"center\"><input type=\"text\" name=\"fond\" id=\"fond\" value=\"";
        // line 52
        if (($this->getAttribute($this->getContext($context, 'Const'), "fond", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "fond", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>Обновить</th>
                    <td class=\"center\"><input type=\"checkbox\" name=\"update\"></td>
                </tr>
                <tr>
                    <th>Делить награду</th>
                    <td class=\"center\"><input type=\"checkbox\" name=\"divide\"></td>
                </tr>
            </tbody>
        </table>
        <input type=\"submit\" name=\"save\" value=\"Добавить\" class=\"blue\" onclick = \"xajax_Add(xajax.getFormValues('form')); return false;\">
        <input type=\"submit\" name=\"load\" value=\"Загрузить\" class=\"blue\" onclick = \"xajax_Load(document.getElementById('date').value); return false;\">
        <input type=\"submit\" name=\"delete\" value=\"Удалить\" class=\"blue\" onclick = \"
            if (confirm('Вы точно ходите удалить данные?')) {xajax_Delete(document.getElementById('date').value); return false;}\">
    </div>
    <div class=\"col_3 center\">
        <table cellspacing=\"0\" cellpadding=\"0\" border=\"1px\">
            <thead>
                <tr>
                    <th colspan=\"3\" class=\"center\">Лут</th>
                </tr>
                <tr>
                    <th class=\"center\"></th>
                    <th class=\"center\">Баллы</th>
                    <th class=\"center\">Кол-во</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Янтарь</th>
                    <td class=\"center\"><input type=\"text\" name=\"yan8_ball\" id=\"yan8_ball\" value=\"";
        // line 84
        if (($this->getAttribute($this->getContext($context, 'Const'), "yan8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yan8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"yan8_count\" id=\"yan8_count\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Рубин</th>
                    <td class=\"center\"><input type=\"text\" name=\"rub8_ball\" id=\"rub8_ball\" value=\"";
        // line 89
        if (($this->getAttribute($this->getContext($context, 'Const'), "rub8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "rub8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"rub8_count\" id=\"rub8_count\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Сапфир</th>
                    <td class=\"center\"><input type=\"text\" name=\"sap8_ball\" id=\"sap8_ball\" value=\"";
        // line 94
        if (($this->getAttribute($this->getContext($context, 'Const'), "sap8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "sap8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"sap8_count\" id=\"sap8_count\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Топаз</th>
                    <td class=\"center\"><input type=\"text\" name=\"top8_ball\" id=\"top8_ball\" value=\"";
        // line 99
        if (($this->getAttribute($this->getContext($context, 'Const'), "top8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "top8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"top8_count\" id=\"top8_count\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Изумруд</th>
                    <td class=\"center\"><input type=\"text\" name=\"iz8_ball\" id=\"iz8_ball\" value=\"";
        // line 104
        if (($this->getAttribute($this->getContext($context, 'Const'), "iz8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "iz8", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"iz8_count\" id=\"iz8_count\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>ПВО</th>
                    <td class=\"center\"><input type=\"text\" name=\"pvo_ball\" id=\"pvo_ball\" value=\"";
        // line 109
        if (($this->getAttribute($this->getContext($context, 'Const'), "pvo", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "pvo", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"pvo_count\" id=\"pvo_count\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Эмблема</th>
                    <td class=\"center\"><input type=\"text\" name=\"emblema_ball\" id=\"emblema_ball\" value=\"";
        // line 114
        if (($this->getAttribute($this->getContext($context, 'Const'), "emblema", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "emblema", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"emblema_count\" id=\"emblema_count\" value=\"0\"></td>
                </tr>
            </tbody>
        </table>
            <table cellspacing=\"0\" cellpadding=\"0\" border=\"1px\">
            <thead>
                <tr>
                    <th colspan=\"3\" class=\"center\">Результат</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Баллы</th>
                    <td class=\"center\"><input type=\"text\" name=\"result_ball\" id=\"result_ball\" disabled=\"disabled\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Фонд</th>
                    <td class=\"center\"><input type=\"text\" name=\"result_fond\" id=\"result_fond\" disabled=\"disabled\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Людей</th>
                    <td class=\"center\"><input type=\"text\" name=\"result_people\" id=\"result_people\" disabled=\"disabled\" value=\"0\"></td>
                </tr>
            </tbody>
        </table>
        </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "add/gtz.tpl";
    }

    public function isTraitable()
    {
        return false;
    }
}
