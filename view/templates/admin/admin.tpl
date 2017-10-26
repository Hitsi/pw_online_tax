{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | Управление{% endblock %}
{% block main %}
<div class="center">Список прав админов</div>
<div id="result"></div>
<div>
    <table cellspacing="0" cellpadding="0" border="1px" class="tablehover">
        <thead>
        <tr>
            <th class="center">Ник</th>
            <th class="center">Админ</th>
            <th class="center">Прием</th>
            <th class="center">Мирпиты</th>
            <th class="center">ГТЗ</th>
            <th class="center">ГВГ</th>
            <th class="center">ПВП</th>
            <th class="center">ДЦД</th>
            <th class="center">Ремесло</th>
            <th class="center">Помощь</th>
            <th class="center">Должность</th>
            <th class="center">Налоги</th>
            <th class="center">Штрафы</th>
            <th class="center">Склад</th>
            <th class="center">Удалить</th>
        </tr>
        </thead>
        <tbody>
            {% for pos in Users %}
            <tr>
            <th><a href="/admin/edit/{{ pos.login }}/">{{ pos.login }}</a></th>
            <td class="center">{% if "admin" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "priem" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "mirpit" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "gtz" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "gvg" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "pvp" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "dcd" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "remeslo" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "help" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "oficer" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "nalog" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "shtraf" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">{% if "sklad" in pos.prova %} + {% else %} - {% endif %}</td>
            <td class="center">
                <a href="/admin/delete/{{ pos.login }}/"><img src="/images/delete.gif" border="0"></a>
        </tr>
        {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}