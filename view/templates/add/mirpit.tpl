{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | Мирпиты{% endblock %}
{% block main %}
<div class="center">Мирпиты</div>
<div id="result"></div>
<form id="form" onsubmit = "return false;">
    <div class="col_2"><table cellspacing="0" cellpadding="0" border="1px">
            <thead>
                <tr>
                    <th colspan="3" class="center">Стоимость</th>
                </tr>
                <tr>
                    <th class="center"></th>
                    <th class="center">Баллы</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Янтарь</th>
                    <td class="center"><input type="text" name="yan9_ball" id="yan9_ball" value="{% if Const.yan9!="" %}{{ Const.yan9 }}{% else %}0{% endif %}"></td>
                </tr>
                <tr>
                    <th>Рубин</th>
                    <td class="center"><input type="text" name="rub9_ball" id="rub9_ball" value="{% if Const.rub8!="" %}{{ Const.rub9 }}{% else %}0{% endif %}"></td>
                </tr>
                <tr>
                    <th>Сапфир</th>
                    <td class="center"><input type="text" name="sap9_ball" id="sap9_ball" value="{% if Const.sap9!="" %}{{ Const.sap9 }}{% else %}0{% endif %}"></td>
                </tr>
                <tr>
                    <th>Топаз</th>
                    <td class="center"><input type="text" name="top9_ball" id="top9_ball" value="{% if Const.top9!="" %}{{ Const.top9 }}{% else %}0{% endif %}"></td>
                </tr>
                <tr>
                    <th>Изумруд</th>
                    <td class="center"><input type="text" name="iz9_ball" id="iz9_ball" value="{% if Const.iz9!="" %}{{ Const.iz9 }}{% else %}0{% endif %}"></td>
                </tr>
                <tr>
                    <th>Яшма</th>
                    <td class="center"><input type="text" name="yash9_ball" id="yash9_ball" value="{% if Const.yash9!="" %}{{ Const.yash9 }}{% else %}0{% endif %}"></td>
                </tr>
                <tr>
                    <th>Книга</th>
                    <td class="center"><input type="text" name="book_ball" id="book_ball" value="{% if Const.book!="" %}{{ Const.book }}{% else %}0{% endif %}"></td>
                </tr>
            </tbody>
        </table>
    </div>
                {% for i in 1..5 %}
                <div class="col_2 center">
        <table cellspacing="0" cellpadding="0" border="1px">
            <thead>
                <tr>
                    <th colspan="3" class="center">Мирпит {{ i }}</th>
                </tr>
                <tr>
                    <th class="center"></th>
                    <th class="center">Кол-во</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Янтарь</th>
                    <td class="center"><input type="text" name="yan9_count[{{ i }}]" id="yan9_count[{{ i }}]" value="0"></td>
                </tr>
                <tr>
                    <th>Рубин</th>
                    <td class="center"><input type="text" name="rub9_count[{{ i }}]" id="rub9_count[{{ i }}]" value="0"></td>
                </tr>
                <tr>
                    <th>Сапфир</th>
                    <td class="center"><input type="text" name="sap9_count[{{ i }}]" id="sap9_count[{{ i }}]" value="0"></td>
                </tr>
                <tr>
                    <th>Топаз</th>
                    <td class="center"><input type="text" name="top9_count[{{ i }}]" id="top9_count[{{ i }}]" value="0"></td>
                </tr>
                <tr>
                    <th>Изумруд</th>
                    <td class="center"><input type="text" name="iz9_count[{{ i }}]" id="iz9_count[{{ i }}]" value="0"></td>
                </tr>
                <tr>
                    <th>Яшма</th>
                    <td class="center"><input type="text" name="yash9_count[{{ i }}]" id="yash9_count[{{ i }}]" value="0"></td>
                </tr>
                <tr>
                    <th>Книга</th>
                    <td class="center"><input type="text" name="book_count[{{ i }}]" id="book_count[{{ i }}]" value="0"></td>
                </tr>
            </tbody>
        </table>
    </div>
                {% endfor %}
    
    <div class="col_3 center">
        <table cellspacing="0" cellpadding="0" border="1px">
            <thead>
                <tr>
                    <th colspan="2" class="center">Баллы</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Был</th>
                    <td class="center"><input type="text" name="ball_in" id="ball_in" value="{% if Const.mirpit_in!="" %}{{ Const.mirpit_in }}{% else %}0{% endif %}"></td>
                </tr>
                <tr>
                    <th>Не был</th>
                    <td class="center"><input type="text" name="ball_out" id="ball_out" value="{% if Const.mirpit_out!="" %}{{ Const.mirpit_out }}{% else %}0{% endif %}"></td>
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
                    <td class="center"><input type="checkbox" name="divide" checked></td>
                </tr>
            </tbody>
        </table>
                <table cellspacing="0" cellpadding="0" border="1px">
            <thead>
                <tr>
                    <th colspan="4" class="center">Результат</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Баллы</th>
                    <th>Фонд</th>
                    <th>Людей</th>
                </tr>
                </thead>
            <tbody>
                <tr>
                    <th>Мп1</th>
                    <td class="center"><input type="text" name="mp_ball[1]" id="mp_ball[1]" disabled="disabled" value="0"></td>
                    <td class="center"><input type="text" name="mp_fond[1]" id="mp_fond[1]" disabled="disabled" value="0"></td>
                    <td class="center"><input type="text" name="mp_people[1]" id="mp_people[1]" disabled="disabled" value="0"></td>
                </tr>
                <tr>
                    <th>Мп2</th>
                    <td class="center"><input type="text" name="mp_ball[2]" id="mp_ball[2]" disabled="disabled" value="0"></td>
                    <td class="center"><input type="text" name="mp_fond[2]" id="mp_fond[2]" disabled="disabled" value="0"></td>
                    <td class="center"><input type="text" name="mp_people[2]" id="mp_people[2]" disabled="disabled" value="0"></td>
                </tr>
                <tr>
                    <th>Мп3</th>
                    <td class="center"><input type="text" name="mp_ball[3]" id="mp_ball[3]" disabled="disabled" value="0"></td>
                    <td class="center"><input type="text" name="mp_fond[3]" id="mp_fond[3]" disabled="disabled" value="0"></td>
                    <td class="center"><input type="text" name="mp_people[3]" id="mp_people[3]" disabled="disabled" value="0"></td>
                </tr>
                <tr>
                    <th>Мп4</th>
                    <td class="center"><input type="text" name="mp_ball[4]" id="mp_ball[4]" disabled="disabled" value="0"></td>
                    <td class="center"><input type="text" name="mp_fond[4]" id="mp_fond[4]" disabled="disabled" value="0"></td>
                    <td class="center"><input type="text" name="mp_people[4]" id="mp_people[4]" disabled="disabled" value="0"></td>
                </tr>
                <tr>
                    <th>Мп5</th>
                    <td class="center"><input type="text" name="mp_ball[5]" id="mp_ball[5]" disabled="disabled" value="0"></td>
                    <td class="center"><input type="text" name="mp_fond[5]" id="mp_fond[5]" disabled="disabled" value="0"></td>
                    <td class="center"><input type="text" name="mp_people[5]" id="mp_people[5]" disabled="disabled" value="0"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col_2 center">
        <div>Дата<input type="text" name="date" id="date" class="tcal" value="" /></div>
        <input type="submit" name="save" value="Добавить" class="blue" onclick = "xajax_Add(xajax.getFormValues('form')); return false;">
        <input type="submit" name="load" value="Загрузить" class="blue" onclick = "xajax_Load(xajax.getFormValues('form')); return false;">
        <input type="submit" name="delete" value="Удалить" class="blue" onclick = "
            if (confirm('Вы точно ходите удалить данные?')) {xajax_Delete(document.getElementById('date').value); return false;}">
    </div>
    <div class="col_7">
        <table cellspacing="0" cellpadding="0" border="1px">
            <thead>
                <tr>
                    <th class="center">Ник</th>
                    <th class="center">МП1</th>
                    <th class="center">МП2</th>
                    <th class="center">МП3</th>
                    <th class="center">МП4</th>
                    <th class="center">МП5</th>
                    <th class="center">Онлайн</th>
                    <th class="center">Баллы</th>
                    <th class="center">Результат</th>
                </tr>
            </thead>
            <tbody>
                {% for pos in Users %}
                <tr>
                    <th>{{pos.name}}</th>
                    <td class="center"><input type="checkbox" name="mp1[{{pos.id}}]" id="mp1[{{pos.id}}]"></td>
                    <td class="center"><input type="checkbox" name="mp2[{{pos.id}}]" id="mp2[{{pos.id}}]"></td>
                    <td class="center"><input type="checkbox" name="mp3[{{pos.id}}]" id="mp3[{{pos.id}}]"></td>
                    <td class="center"><input type="checkbox" name="mp4[{{pos.id}}]" id="mp4[{{pos.id}}]"></td>
                    <td class="center"><input type="checkbox" name="mp5[{{pos.id}}]" id="mp5[{{pos.id}}]"></td>
                    <td class="center"><input type="checkbox" name="online[{{pos.id}}]" id="online[{{pos.id}}]"></td>
                    <td class="center"><input type="text" name="ball[{{pos.id}}]" value=""></td>
                    <td class="center"><input type="text" name="result[{{pos.id}}]" id="result[{{pos.id}}]" disabled="disabled" value="0"></td>
                </tr>
                {% endfor %}
            </tbody>
            <thead>
                <tr>
                    <th class="center">Ник</th>
                    <th class="center">МП1</th>
                    <th class="center">МП2</th>
                    <th class="center">МП3</th>
                    <th class="center">МП4</th>
                    <th class="center">МП5</th>
                    <th class="center">Онлайн</th>
                    <th class="center">Баллы</th>
                    <th class="center">Результат</th>
                </tr>
            </thead>
        </table>
    </div>
</form>
{% endblock %}