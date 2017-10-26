{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | {{ Head }}{% endblock %}
{% block main %}
<div class="center">{{ Head }}</div>
<div id="result"></div>
<div class="col_1"></div>
<form id="form" onsubmit = "return false;">
    <div class="col_7">
        <table cellspacing="0" cellpadding="0" border="1px">
            <thead>
                <tr>
                    <th class="center">Ник</th>
                    <th class="center" style="width:100px">Баллы</th>
                    <th class="center">Причина</th>
                </tr>
            </thead>
            <tbody>
                {% for pos in Users %}
                <tr>
                    <th>{{pos.name}}</th>
                    <td class="center"><input type="text" name="ball[{{pos.id}}]" id="ball[{{pos.id}}]" value=""></td>
                    <td class="center"><input type="text" name="text[{{pos.id}}]" id="text[{{pos.id}}]" value=""></td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
    <div class="col_3 center">
        <div>Дата<input type="text" name="date" id="date" class="tcal" value=""/></div>
        <div class="clear"></div>
        <table cellspacing="0" cellpadding="0" border="1px">
            <tbody>
                <tr>
                    <th>Обновить</th>
                    <td class="center"><input type="checkbox" name="update"></td>
                </tr>
            </tbody>
        </table>
        <input type="submit" name="save" value="Добавить" class="blue" onclick = "xajax_Add(xajax.getFormValues('form')); return false;">
        <input type="submit" name="load" value="Загрузить" class="blue" onclick = "xajax_Load(document.getElementById('date').value); return false;">
        <input type="submit" name="delete" value="Удалить" class="blue" onclick = "
            if (confirm('Вы точно ходите удалить данные?')) {xajax_Delete(document.getElementById('date').value); return false;}">
    </div>
</form>
{% endblock %}