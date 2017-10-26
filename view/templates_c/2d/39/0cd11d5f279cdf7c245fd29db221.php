<?php

/* add/mirpit.tpl */
class __TwigTemplate_2d390cd11d5f279cdf7c245fd29db221 extends Twig_Template
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
        echo " | Мирпиты";
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"center\">Мирпиты</div>
<div id=\"result\"></div>
<form id=\"form\" onsubmit = \"return false;\">
    <div class=\"col_2\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"1px\">
            <thead>
                <tr>
                    <th colspan=\"3\" class=\"center\">Стоимость</th>
                </tr>
                <tr>
                    <th class=\"center\"></th>
                    <th class=\"center\">Баллы</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Янтарь</th>
                    <td class=\"center\"><input type=\"text\" name=\"yan9_ball\" id=\"yan9_ball\" value=\"";
        // line 20
        if (($this->getAttribute($this->getContext($context, 'Const'), "yan9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yan9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>Рубин</th>
                    <td class=\"center\"><input type=\"text\" name=\"rub9_ball\" id=\"rub9_ball\" value=\"";
        // line 24
        if (($this->getAttribute($this->getContext($context, 'Const'), "rub8", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "rub9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>Сапфир</th>
                    <td class=\"center\"><input type=\"text\" name=\"sap9_ball\" id=\"sap9_ball\" value=\"";
        // line 28
        if (($this->getAttribute($this->getContext($context, 'Const'), "sap9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "sap9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>Топаз</th>
                    <td class=\"center\"><input type=\"text\" name=\"top9_ball\" id=\"top9_ball\" value=\"";
        // line 32
        if (($this->getAttribute($this->getContext($context, 'Const'), "top9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "top9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>Изумруд</th>
                    <td class=\"center\"><input type=\"text\" name=\"iz9_ball\" id=\"iz9_ball\" value=\"";
        // line 36
        if (($this->getAttribute($this->getContext($context, 'Const'), "iz9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "iz9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>Яшма</th>
                    <td class=\"center\"><input type=\"text\" name=\"yash9_ball\" id=\"yash9_ball\" value=\"";
        // line 40
        if (($this->getAttribute($this->getContext($context, 'Const'), "yash9", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "yash9", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>Книга</th>
                    <td class=\"center\"><input type=\"text\" name=\"book_ball\" id=\"book_ball\" value=\"";
        // line 44
        if (($this->getAttribute($this->getContext($context, 'Const'), "book", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "book", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
            </tbody>
        </table>
    </div>
                ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 5));
        foreach ($context['_seq'] as $context['_key'] => $context['i']) {
            // line 50
            echo "                <div class=\"col_2 center\">
        <table cellspacing=\"0\" cellpadding=\"0\" border=\"1px\">
            <thead>
                <tr>
                    <th colspan=\"3\" class=\"center\">Мирпит ";
            // line 54
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "</th>
                </tr>
                <tr>
                    <th class=\"center\"></th>
                    <th class=\"center\">Кол-во</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Янтарь</th>
                    <td class=\"center\"><input type=\"text\" name=\"yan9_count[";
            // line 64
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" id=\"yan9_count[";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Рубин</th>
                    <td class=\"center\"><input type=\"text\" name=\"rub9_count[";
            // line 68
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" id=\"rub9_count[";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Сапфир</th>
                    <td class=\"center\"><input type=\"text\" name=\"sap9_count[";
            // line 72
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" id=\"sap9_count[";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Топаз</th>
                    <td class=\"center\"><input type=\"text\" name=\"top9_count[";
            // line 76
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" id=\"top9_count[";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Изумруд</th>
                    <td class=\"center\"><input type=\"text\" name=\"iz9_count[";
            // line 80
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" id=\"iz9_count[";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Яшма</th>
                    <td class=\"center\"><input type=\"text\" name=\"yash9_count[";
            // line 84
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" id=\"yash9_count[";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Книга</th>
                    <td class=\"center\"><input type=\"text\" name=\"book_count[";
            // line 88
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" id=\"book_count[";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "]\" value=\"0\"></td>
                </tr>
            </tbody>
        </table>
    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 94
        echo "    
    <div class=\"col_3 center\">
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
        // line 105
        if (($this->getAttribute($this->getContext($context, 'Const'), "mirpit_in", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "mirpit_in", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>Не был</th>
                    <td class=\"center\"><input type=\"text\" name=\"ball_out\" id=\"ball_out\" value=\"";
        // line 109
        if (($this->getAttribute($this->getContext($context, 'Const'), "mirpit_out", array(), "any", false) != "")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'Const'), "mirpit_out", array(), "any", false), "html");
        } else {
            echo "0";
        }
        echo "\"></td>
                </tr>
                <tr>
                    <th>В фонд %</th>
                    <td class=\"center\"><input type=\"text\" name=\"fond\" id=\"fond\" value=\"";
        // line 113
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
                    <td class=\"center\"><input type=\"checkbox\" name=\"divide\" checked></td>
                </tr>
            </tbody>
        </table>
                <table cellspacing=\"0\" cellpadding=\"0\" border=\"1px\">
            <thead>
                <tr>
                    <th colspan=\"4\" class=\"center\">Результат</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Баллы</th>
                    <th>Фонд</th>
                    <th>Людей</th>
                </tr>
                </thead>
            <tbody>
                <tr>
                    <th>Мп1</th>
                    <td class=\"center\"><input type=\"text\" name=\"mp_ball[1]\" id=\"mp_ball[1]\" disabled=\"disabled\" value=\"0\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"mp_fond[1]\" id=\"mp_fond[1]\" disabled=\"disabled\" value=\"0\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"mp_people[1]\" id=\"mp_people[1]\" disabled=\"disabled\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Мп2</th>
                    <td class=\"center\"><input type=\"text\" name=\"mp_ball[2]\" id=\"mp_ball[2]\" disabled=\"disabled\" value=\"0\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"mp_fond[2]\" id=\"mp_fond[2]\" disabled=\"disabled\" value=\"0\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"mp_people[2]\" id=\"mp_people[2]\" disabled=\"disabled\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Мп3</th>
                    <td class=\"center\"><input type=\"text\" name=\"mp_ball[3]\" id=\"mp_ball[3]\" disabled=\"disabled\" value=\"0\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"mp_fond[3]\" id=\"mp_fond[3]\" disabled=\"disabled\" value=\"0\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"mp_people[3]\" id=\"mp_people[3]\" disabled=\"disabled\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Мп4</th>
                    <td class=\"center\"><input type=\"text\" name=\"mp_ball[4]\" id=\"mp_ball[4]\" disabled=\"disabled\" value=\"0\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"mp_fond[4]\" id=\"mp_fond[4]\" disabled=\"disabled\" value=\"0\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"mp_people[4]\" id=\"mp_people[4]\" disabled=\"disabled\" value=\"0\"></td>
                </tr>
                <tr>
                    <th>Мп5</th>
                    <td class=\"center\"><input type=\"text\" name=\"mp_ball[5]\" id=\"mp_ball[5]\" disabled=\"disabled\" value=\"0\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"mp_fond[5]\" id=\"mp_fond[5]\" disabled=\"disabled\" value=\"0\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"mp_people[5]\" id=\"mp_people[5]\" disabled=\"disabled\" value=\"0\"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class=\"col_2 center\">
        <div>Дата<input type=\"text\" name=\"date\" id=\"date\" class=\"tcal\" value=\"\" /></div>
        <input type=\"submit\" name=\"save\" value=\"Добавить\" class=\"blue\" onclick = \"xajax_Add(xajax.getFormValues('form')); return false;\">
        <input type=\"submit\" name=\"load\" value=\"Загрузить\" class=\"blue\" onclick = \"xajax_Load(xajax.getFormValues('form')); return false;\">
        <input type=\"submit\" name=\"delete\" value=\"Удалить\" class=\"blue\" onclick = \"
            if (confirm('Вы точно ходите удалить данные?')) {xajax_Delete(document.getElementById('date').value); return false;}\">
    </div>
    <div class=\"col_7\">
        <table cellspacing=\"0\" cellpadding=\"0\" border=\"1px\">
            <thead>
                <tr>
                    <th class=\"center\">Ник</th>
                    <th class=\"center\">МП1</th>
                    <th class=\"center\">МП2</th>
                    <th class=\"center\">МП3</th>
                    <th class=\"center\">МП4</th>
                    <th class=\"center\">МП5</th>
                    <th class=\"center\">Онлайн</th>
                    <th class=\"center\">Баллы</th>
                    <th class=\"center\">Результат</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 194
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'Users'));
        foreach ($context['_seq'] as $context['_key'] => $context['pos']) {
            // line 195
            echo "                <tr>
                    <th>";
            // line 196
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "name", array(), "any", false), "html");
            echo "</th>
                    <td class=\"center\"><input type=\"checkbox\" name=\"mp1[";
            // line 197
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" id=\"mp1[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\"></td>
                    <td class=\"center\"><input type=\"checkbox\" name=\"mp2[";
            // line 198
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" id=\"mp2[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\"></td>
                    <td class=\"center\"><input type=\"checkbox\" name=\"mp3[";
            // line 199
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" id=\"mp3[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\"></td>
                    <td class=\"center\"><input type=\"checkbox\" name=\"mp4[";
            // line 200
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" id=\"mp4[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\"></td>
                    <td class=\"center\"><input type=\"checkbox\" name=\"mp5[";
            // line 201
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" id=\"mp5[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\"></td>
                    <td class=\"center\"><input type=\"checkbox\" name=\"online[";
            // line 202
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" id=\"online[";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"ball[";
            // line 203
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "]\" value=\"\"></td>
                    <td class=\"center\"><input type=\"text\" name=\"result[";
            // line 204
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
        // line 207
        echo "            </tbody>
            <thead>
                <tr>
                    <th class=\"center\">Ник</th>
                    <th class=\"center\">МП1</th>
                    <th class=\"center\">МП2</th>
                    <th class=\"center\">МП3</th>
                    <th class=\"center\">МП4</th>
                    <th class=\"center\">МП5</th>
                    <th class=\"center\">Онлайн</th>
                    <th class=\"center\">Баллы</th>
                    <th class=\"center\">Результат</th>
                </tr>
            </thead>
        </table>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "add/mirpit.tpl";
    }

    public function isTraitable()
    {
        return false;
    }
}
