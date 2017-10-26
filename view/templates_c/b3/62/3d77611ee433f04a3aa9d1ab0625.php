<?php

/* add/add.tpl */
class __TwigTemplate_b3623d77611ee433f04a3aa9d1ab0625 extends Twig_Template
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
        echo " | Описание Таблиц ";
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"center\">Таблицы</div>
<div id=\"result\"></div>
<div>
    <table cellspacing=\"0\" cellpadding=\"0\">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><a href=\"/add/mirpit/\">Мирпиты</a></th>
                <td>таблица отображает данные по мирпитам. Кто сколько баллов получил, в какой день, а также явку. \"0\" означает что человек был онлайн, но не был на пите</td>
            </tr>
            <tr>
                <th><a href=\"/add/gtz/\">ГТЗ</a></th>
                <td>Таблица отображает баллы полученные за эвент Город темных зверей. Минусы значит человек был онлайн, но не был на эвенте и не отписался в томе о том что его не пустило.</td>
            </tr>
            <tr>
                <th><a href=\"/add/gvg/\">ГВГ</a></th>
                <td>Таблица отображает баллы полученные за ГВГ. Минусы значит человек был онлайн, но не был на ГВГ, или возможно отписался о том что будет, но не явился.</td>
            </tr>
            <tr>
                <th><a href=\"/add/pvp/\">ПВП</a></th>
                <td>Таблица отображает баллы полученные за ПВП. Баллы начисляются за слив варкланов и предоставление скринов. С вопросами к координатору Карательного отряда.</td>
            </tr>
            <tr>
                <th><a href=\"/add/remeslo/\">Ремесленник</a></th>
                <td>Таблица отображает баллы полученные за эвент Конкурс ремесленников. Минусы значит человек был онлайн, но не был на эвенте.</td>
            </tr>
            <tr>
                <th><a href=\"/add/help/\">Помощ</a></th>
                <td>Таблица отображает баллы полученные за помощ сокланам.</td>
            </tr>
            <tr>
                <th><a href=\"/add/oficer/\">Должность</a></th>
                <td>Таблица отображает баллы полученные за выполнение каки-либо обязанностей.</td>
            </tr>
            <tr>
                <th><a href=\"/add/nalog/\">Налог</a></th>
                <td>Таблица отображает баллы полученные за сдачу травы или минус за неуплату налога.</td>
            </tr>
            <tr>
                <th><a href=\"/add/shtraf/\">Штраф</a></th>
                <td>Таблица по штрафам</td>
            </tr>
            <tr>
                <th><a href=\"/add/sklad/\">Склад</a></th>
                <td>Таблица выдачи имущества находящегося на складе за баллы</td>
            </tr>
        </tbody>
    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "add/add.tpl";
    }

    public function isTraitable()
    {
        return false;
    }
}
