{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | Управление{% endblock %}
{% block main %}
<div class="col_12 center">Вы действительно хотите удалить админа:{{ Admin }}</div>
<div class="col_12 center">
    <form method="post">
        <input type="submit" name="delete" value="Удалить" class="blue small">
    </form>
</div>
{% endblock %}