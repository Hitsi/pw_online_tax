{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | ГТЗ{% endblock %}
{% block main %}
<div class="center">Город Темных Зверей</div>
<div id="result"></div>
<div class="col_1"></div>
<form id="form" onsubmit = "return false;">
    <div class="col_4">
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
                    <td class="center"><input type="text" name="ball_in" id="ball_in" value="{% if Const.gtz_in!="" %}{{ Const.gtz_in }}{% else %}0{% endif %}"></td>
                </tr>
                <tr>
                    <th>Не был</th>
                    <td class="center"><input type="text" name="ball_out" id="ball_out" value="{% if Const.gtz_out!="" %}{{ Const.gtz_out }}{% else %}0{% endif %}"></td>
                </tr>
                <tr>
                    <th>В фонд %</th>
                    <td class="center"><input type="text" name="fond" id="fond" value="{% if Const.fond!="" %}{{ Const.fond }}{% else %}0{% endif %}"></td>
                </tr>
                <tr>
                    <th>Обновить</th>
                    <td class="center"><input type="checkbox" name="update"></td>
                </tr>
                <tr>
                    <th>Делить награду</th>
                    <td class="center"><input type="checkbox" name="divide"></td>
                </tr>
            </tbody>
        </table>
        <input type="submit" name="save" value="Добавить" class="blue" onclick = "xajax_Add(xajax.getFormValues('form')); return false;">
        <input type="submit" name="load" value="Загрузить" class="blue" onclick = "xajax_Load(document.getElementById('date').value); return false;">
        <input type="submit" name="delete" value="Удалить" class="blue" onclick = "
            if (confirm('Вы точно ходите удалить данные?')) {xajax_Delete(document.getElementById('date').value); return false;}">
    </div>
    <div class="col_3 center">
        <table cellspacing="0" cellpadding="0" border="1px">
            <thead>
                <tr>
                    <th colspan="3" class="center">Лут</th>
                </tr>
                <tr>
                    <th class="center"></th>
                    <th class="center">Баллы</th>
                    <th class="center">Кол-во</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Янтарь</th>
                    <td class="center"><input type="text" name="yan8_ball" id="yan8_ball" value="{% if Const.yan8!="" %}{{ Const.yan8 }}{% else %}0{% endif %}"></td>
                    <td class="center"><input type="text" name="yan8_count" id="yan8_count" value="0"></td>
                </tr>
                <tr>
                    <th>Рубин</th>
                    <td class="center"><input type="text" name="rub8_ball" id="rub8_ball" value="{% if Const.rub8!="" %}{{ Const.rub8 }}{% else %}0{% endif %}"></td>
                    <td class="center"><input type="text" name="rub8_count" id="rub8_count" value="0"></td>
                </tr>
                <tr>
                    <th>Сапфир</th>
                    <td class="center"><input type="text" name="sap8_ball" id="sap8_ball" value="{% if Const.sap8!="" %}{{ Const.sap8 }}{% else %}0{% endif %}"></td>
                    <td class="center"><input type="text" name="sap8_count" id="sap8_count" value="0"></td>
                </tr>
                <tr>
                    <th>Топаз</th>
                    <td class="center"><input type="text" name="top8_ball" id="top8_ball" value="{% if Const.top8!="" %}{{ Const.top8 }}{% else %}0{% endif %}"></td>
                    <td class="center"><input type="text" name="top8_count" id="top8_count" value="0"></td>
                </tr>
                <tr>
                    <th>Изумруд</th>
                    <td class="center"><input type="text" name="iz8_ball" id="iz8_ball" value="{% if Const.iz8!="" %}{{ Const.iz8 }}{% else %}0{% endif %}"></td>
                    <td class="center"><input type="text" name="iz8_count" id="iz8_count" value="0"></td>
                </tr>
                <tr>
                    <th>ПВО</th>
                    <td class="center"><input type="text" name="pvo_ball" id="pvo_ball" value="{% if Const.pvo!="" %}{{ Const.pvo }}{% else %}0{% endif %}"></td>
                    <td class="center"><input type="text" name="pvo_count" id="pvo_count" value="0"></td>
                </tr>
                <tr>
                    <th>Эмблема</th>
                    <td class="center"><input type="text" name="emblema_ball" id="emblema_ball" value="{% if Const.emblema!="" %}{{ Const.emblema }}{% else %}0{% endif %}"></td>
                    <td class="center"><input type="text" name="emblema_count" id="emblema_count" value="0"></td>
                </tr>
            </tbody>
        </table>
            <table cellspacing="0" cellpadding="0" border="1px">
            <thead>
                <tr>
                    <th colspan="3" class="center">Результат</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Баллы</th>
                    <td class="center"><input type="text" name="result_ball" id="result_ball" disabled="disabled" value="0"></td>
                </tr>
                <tr>
                    <th>Фонд</th>
                    <td class="center"><input type="text" name="result_fond" id="result_fond" disabled="disabled" value="0"></td>
                </tr>
                <tr>
                    <th>Людей</th>
                    <td class="center"><input type="text" name="result_people" id="result_people" disabled="disabled" value="0"></td>
                </tr>
            </tbody>
        </table>
        </div>
</form>
{% endblock %}