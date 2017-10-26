<table cellspacing="0" cellpadding="0" border="1px">
    <thead>
        <tr>
            <th>Дата</th>
            <th>Баллы</th>
            <th>Пояснение</th>
            {% if module in Prova %}<th>удалить</th>{% endif %}
        </tr>
    </thead>
    <tbody>
        {% for pos in Data %}
        <tr>
            <td>{{pos.date }}</td>
            <td>{{ pos.ball }}</td>
            <td>{% if pos.text!="" %}{% autoescape false %}{{ pos.text }}{% endautoescape %}{% endif %}</td>
            {% if module in Prova %}<td>
            <a href="/member/delete/{{ module }}/{{ pos.id }}/" class="icon red">x</a>
            </td>{% endif %}
        </tr>
        {% endfor %}
    </tbody>
</table>
