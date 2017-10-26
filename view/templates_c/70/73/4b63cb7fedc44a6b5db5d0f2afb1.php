<?php

/* table/table_show.tpl */
class __TwigTemplate_70734b63cb7fedc44a6b5db5d0f2afb1 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<table cellspacing=\"0\" cellpadding=\"0\" class=\"tablehover\">
    <thead>
        <tr>
            <th class=\"verticalText\">Ник</th>
            ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'Dates'));
        foreach ($context['_seq'] as $context['_key'] => $context['date']) {
            // line 6
            echo "            <th>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->getContext($context, 'date'), "d/m"), "html");
            echo "</th>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 8
        echo "        </tr>
    </thead>
    <tbody>
        ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'Data'));
        foreach ($context['_seq'] as $context['uid'] => $context['udate']) {
            // line 12
            echo "        <tr>
            <th>";
            // line 13
            echo twig_escape_filter($this->env, $this->getContext($context, 'uid'), "html");
            echo "</th>
            ";
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'Dates'));
            foreach ($context['_seq'] as $context['_key'] => $context['date']) {
                // line 15
                echo "            <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'udate'), twig_date_format_filter($this->getContext($context, 'date'), "Y-m-d"), array(), "array", false), "html");
                echo "</a></td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 17
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['uid'], $context['udate'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 18
        echo "        </tr>
    </tbody>
    <thead>
        <tr>
            <th class=\"verticalText\">Ник</th>
            ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'Dates'));
        foreach ($context['_seq'] as $context['_key'] => $context['date']) {
            // line 24
            echo "            <th>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->getContext($context, 'date'), "d/m"), "html");
            echo "</th>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 26
        echo "        </tr>
    </thead>
</table>

";
    }

    public function getTemplateName()
    {
        return "table/table_show.tpl";
    }

    public function isTraitable()
    {
        return false;
    }
}
