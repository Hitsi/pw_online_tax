{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | Таблица "{{ TableName[Table]}}"{% endblock %}
{% block main %}
<div class="center">Таблица "{{ TableName[Table]}}"</div>
<div id="result"></div>
<div>
    <form id="show-table" onsubmit = "return false;">
    <div class="col_3"> </div>
    <div class="col_3">От: <input type="text" name="date_ot" class="tcal" /></div>
    <div class="col_3">До: <input type="text" name="date_do" class="tcal" /></div>
    <div class="col_3"> </div>
    <div class="col_12 center"><input type="submit" value="Показать" class="blue small" onclick = "xajax_ShowTable(xajax.getFormValues('show-table')); return false;"></div>
    </form>
</div>
<div class="col_12" id="table"></div>
{% endblock %}