<table cellspacing="0" cellpadding="0" class="tablehover">
    <thead>
        <tr>
            <th class="verticalText">Ник</th>
            {% for date in Dates %}
            <th>{{date|date('d/m')}}</th>
            {% endfor %}
        </tr>
    </thead>
    <tbody>
        {% for uid,udate in Data %}
        <tr>
            <th>{{ uid }}</th>
            {% for date in Dates %}
            <td>{{udate[date|date('Y-m-d')]}}</a></td>
            {% endfor %}
            {% endfor %}
        </tr>
    </tbody>
    <thead>
        <tr>
            <th class="verticalText">Ник</th>
            {% for date in Dates %}
            <th>{{date|date('d/m')}}</th>
            {% endfor %}
        </tr>
    </thead>
</table>

