{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | Список членов клана{% endblock %}
{% block main %}
<div class="center">Склад</div>
<div id="result"></div>
<form id="form" onsubmit = "return false;">
<div class="col_2">
    <label for="do">Действие:</label>
    <select name="do" id="do">
        <option value="give">Выдать</option>
        <option value="get">Получить</option>
    </select>
</div>
<div class="col_3">
    <label for="item">Что именно:</label>
    <select data-placeholder="Ресурсы..." class="chzn-select" name="item" id="item">
        <option></option>
        {% for key,resource in Sklad_resource %}
        <option value="{{ key }}">{{resource}}</option>
        {% endfor %}       
    </select>
</div>
<div class="col_3">
    <label for="uid">Кому:</label>
    <select data-placeholder="Соклане..." class="chzn-select" name="uid" id="uid">
        <option value=""></option>
        {% for pos in Users %}
        <option value="{{ pos.id }}">{{ pos.name }}</option> 
        {% endfor %}
    </select>
</div>
<div class="col_2">
    <label for="date">Дата</label>
    <input type="text" name="date" id="date" class="tcal" />
</div>
<div class="col_2">
    <label for="update">Обновить</label>
    <input type="checkbox" name="update" id="update" />
</div>
<div class="col_12 center">
    <input type="submit" name="save" value="Добавить" class="blue" onclick = "xajax_Add(xajax.getFormValues('form')); return false;">
</div>
    </form>
<script type="text/javascript"> 
      $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); 
</script>
{% endblock %}