{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | Список членов клана{% endblock %}
{% block main %}
<div class="center">Статистика</div>
<div id="result"></div>
<div>
    <table cellspacing="0" cellpadding="0" border="1px">
        <thead>
            <tr>
                <th>Ник</th>
                <th>Класс</th>
                <th>Уровень</th>
                <th>Кукла</th>
            </tr>
        </thead>
        <tbody>
            {% for pos in Users %}
            <tr>
                <th><a href="/users/{{ pos.id }}/">{{ pos.name }}</a>
                </th>
                <td><a href="/class/{{ pos.class }}/">{{ GameClass[pos.class-1] }}</a></td>
                <td>{{ pos.lvl }}</td>
                <td><a href="{{ pos.pwcalc }}" target="_blank">{{ pos.pwcalc }}</a></td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}