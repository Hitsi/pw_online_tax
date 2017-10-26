{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | Управление{% endblock %}
{% block main %}
<div class="col_12 center">Вы действительно хотите удалить члена клана:{{ User.name }}?<br> 
    Удалятся также все записи о полученных им баллов.</div>
<div class="col_12 center">
    <form method="post">
        <input type="submit" name="delete" value="Удалить" class="blue small">
    </form>
</div>
{% endblock %}