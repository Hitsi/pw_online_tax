{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | ДЦД{% endblock %}
{% block main %}
<div class="center">ДЦД</div>
<div id="result"></div>
<div class="col_2"></div>
<form id="form" onsubmit = "return false;">
    <div class="col_5">
        <table cellspacing="0" cellpadding="0" border="1px">
            <thead>
                <tr>
                    <th class="center">Ник</th>
                    <th class="center">Был</th>
                    <th class="center">Онлайн</th>
                    <th class="center">Баллы</th>
                    <th class="center">Результат</th>
                </tr>
            </thead>
            <tbody>
                {% for pos in Users %}
                <tr>
                    <th>{{pos.name}}</th>
                    <td class="center"><input type="checkbox" name="users[{{pos.id}}]" id="users[{{pos.id}}]"></td>
                    <td class="center"><input type="checkbox" name="online[{{pos.id}}]" id="online[{{pos.id}}]"></td>
                    <td class="center"><input type="text" name="ball[{{pos.id}}]" value=""></td>
                    <td class="center"><input type="text" name="result[{{pos.id}}]" id="result[{{pos.id}}]" disabled="disabled" value="0"></td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
    <div class="col_3 center">
        <div>Дата<input type="text" name="date" id="date" class="tcal" value=""/></div>
        <div class="clear"></div>
        <table cellspacing="0" cellpadding="0" border="1px">
            <thead>
                <tr>
                    <th colspan="2" class="center">Баллы</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Был</th>
                    <td class="center"><input type="text" name="ball_in" id="ball_in" value="{% if Const.gvg_in!="" %}{{ Const.gvg_in }}{% else %}0{% endif %}" style="width:100px"></td>
                </tr>
                <tr>
                    <th>Не был</th>
                    <td class="center"><input type="text" name="ball_out" id="ball_out" value="{% if Const.gvg_out!="" %}{{ Const.gvg_out }}{% else %}0{% endif %}" style="width:100px"></td>
                </tr>
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