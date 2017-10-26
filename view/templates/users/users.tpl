{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | Список членов клана{% endblock %}
{% block main %}
<div class="center">Список клана</div>
<div>
    <table cellspacing="0" cellpadding="0" class="tablehover">
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
                {% if "priem" in Prova %}<th>Удалить</th>{% endif %}
            </tr>
        </thead>
        <tbody>
            {% for pos in Users %}
            <tr>
                <th><a href="/member/{{ pos.id }}/">{{ pos.name }}</a>
                </th>
                <!--<td>{{ pos.priem }}</td>-->
                <td>{{ pos.ball }}</td>
                <td>{{ pos.mirpit }}</td>
                <td>{{ pos.gtz }}</td>
                <td>{{ pos.gvg }}</td>
                <td>{{ pos.pvp }}</td>
                <td>{{ pos.dcd }}</td>
                <td>{{ pos.remeslo }}</td>
                <td>{{ pos.help }}</td>
                <td>{{ pos.oficer }}</td>
                <td>{{ pos.nalog }}</td>
                <td>{{ pos.shtraf }}</td>
                <td>{{ pos.sklad }}</td>
                <td>{{ pos.ball+pos.mirpit+pos.gtz+pos.gvg+pos.pvp+pos.dcd+pos.remeslo+pos.help+pos.oficer+pos.nalog+pos.shtraf+pos.sklad}}</td>
                {% if "priem" in Prova %}
                <td class="center">
                    <a href="/users/delete/{{ pos.id }}/"><span class="icon red small">x</span></a>
                </td>
                {% endif %}
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}
