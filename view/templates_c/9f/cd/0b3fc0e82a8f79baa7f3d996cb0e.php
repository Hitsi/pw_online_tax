<?php

/* 404.tpl */
class __TwigTemplate_9fcd0b3fc0e82a8f79baa7f3d996cb0e extends Twig_Template
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
        echo " Неправильная страница";
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"head\">Ошибка: страница не найдена или не существует</div>
<div>
    <p>Извините, но страница, которую вы пытаетесь посмотреть не существует.</p>
    <p>Это может быть по следующим причинам:</p>
    <ul>
        <li>Ошибка в адресе</li>
        <li>Неправильная ссылка</li>
        <li>Ссылка приводит на пустую страницу</li>
        <li>У вас нет прав на просмотр данной страницы</li>
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "404.tpl";
    }

    public function isTraitable()
    {
        return false;
    }
}
