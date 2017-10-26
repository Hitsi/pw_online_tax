<?php

/* users/users.tpl */
class __TwigTemplate_1b8a0fd01a667544592ce85c55cec15c extends Twig_Template
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
        echo " | Список членов клана";
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"center\">Список клана</div>
<div>
    <table cellspacing=\"0\" cellpadding=\"0\" class=\"tablehover\">
        <thead>
            <tr>
                <th>Ник</th>
                <!--<th>Дата приема</th>-->
                <th>Баллы до</th>
                <th>Мирпиты</th>
                <th>ГТЗ</th>
                <th>ГВГ</th>
                <th>ПВП</th>
                <th>ДЦД</th>
                <th>Ремесло</th>
                <th>Помощь</th>
                <th>Должность</th>
                <th>Налоги</th>
                <th>Штрафы</th>
                <th>Склад</th>
                <th>Итого</th>
                ";
        // line 24
        if (twig_in_filter("priem", $this->getContext($context, 'Prova'))) {
            echo "<th>Удалить</th>";
        }
        // line 25
        echo "            </tr>
        </thead>
        <tbody>
            ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'Users'));
        foreach ($context['_seq'] as $context['_key'] => $context['pos']) {
            // line 29
            echo "            <tr>
                <th><a href=\"/member/";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
            echo "/\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "name", array(), "any", false), "html");
            echo "</a>
                </th>
                <!--<td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "priem", array(), "any", false), "html");
            echo "</td>-->
                <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "ball", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "mirpit", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "gtz", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "gvg", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "pvp", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "dcd", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "remeslo", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "help", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "oficer", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "nalog", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "shtraf", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "sklad", array(), "any", false), "html");
            echo "</td>
                <td>";
            // line 45
            echo twig_escape_filter($this->env, ((((((((((($this->getAttribute($this->getContext($context, 'pos'), "ball", array(), "any", false) + $this->getAttribute($this->getContext($context, 'pos'), "mirpit", array(), "any", false)) + $this->getAttribute($this->getContext($context, 'pos'), "gtz", array(), "any", false)) + $this->getAttribute($this->getContext($context, 'pos'), "gvg", array(), "any", false)) + $this->getAttribute($this->getContext($context, 'pos'), "pvp", array(), "any", false)) + $this->getAttribute($this->getContext($context, 'pos'), "dcd", array(), "any", false)) + $this->getAttribute($this->getContext($context, 'pos'), "remeslo", array(), "any", false)) + $this->getAttribute($this->getContext($context, 'pos'), "help", array(), "any", false)) + $this->getAttribute($this->getContext($context, 'pos'), "oficer", array(), "any", false)) + $this->getAttribute($this->getContext($context, 'pos'), "nalog", array(), "any", false)) + $this->getAttribute($this->getContext($context, 'pos'), "shtraf", array(), "any", false)) + $this->getAttribute($this->getContext($context, 'pos'), "sklad", array(), "any", false)), "html");
            echo "</td>
                ";
            // line 46
            if (twig_in_filter("priem", $this->getContext($context, 'Prova'))) {
                // line 47
                echo "                <td class=\"center\">
                    <a href=\"/users/delete/";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'pos'), "id", array(), "any", false), "html");
                echo "/\"><span class=\"icon red small\">x</span></a>
                </td>
                ";
            }
            // line 51
            echo "            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pos'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 53
        echo "        </tbody>
    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "users/users.tpl";
    }

    public function isTraitable()
    {
        return false;
    }
}
