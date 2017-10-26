<?php

/* table/table.tpl */
class __TwigTemplate_c419f26c317d4ed4871449448aee78af extends Twig_Template
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
        echo " | Таблица \"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'TableName'), $this->getContext($context, 'Table'), array(), "array", false), "html");
        echo "\"";
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"center\">Таблица \"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'TableName'), $this->getContext($context, 'Table'), array(), "array", false), "html");
        echo "\"</div>
<div id=\"result\"></div>
<div>
    <form id=\"show-table\" onsubmit = \"return false;\">
    <div class=\"col_3\"> </div>
    <div class=\"col_3\">От: <input type=\"text\" name=\"date_ot\" class=\"tcal\" /></div>
    <div class=\"col_3\">До: <input type=\"text\" name=\"date_do\" class=\"tcal\" /></div>
    <div class=\"col_3\"> </div>
    <div class=\"col_12 center\"><input type=\"submit\" value=\"Показать\" class=\"blue small\" onclick = \"xajax_ShowTable(xajax.getFormValues('show-table')); return false;\"></div>
    </form>
</div>
<div class=\"col_12\" id=\"table\"></div>
";
    }

    public function getTemplateName()
    {
        return "table/table.tpl";
    }

    public function isTraitable()
    {
        return false;
    }
}
