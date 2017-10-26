{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} новый член клана{% endblock %}
{% block main %}
<div class="center">Добавить нового члена клана</div>
<div id="result"></div>
<div class="col_3"></div>
<div class="col_6">
    <form id="user-create" onsubmit = "return false;">
    <table cellspacing="0" cellpadding="0">
        <tr>
            <th>Ник</th>
            <td><input type="text" name="nickname" {% if User.name!="" %}value="{{ User.name }}"{% endif %}></td>
        </tr>
        <tr>
            <th>Класс</th>
            <td>
                <select name="class">
                    {% for pos in GameClass %}
                    <option value="{{ loop.index }}" {% if User.class!="" and  User.class==loop.index %}selected{% endif %}>{{ pos }}</option>
                    {% endfor %}
                </select>
            </td>

        </tr>
        <tr>
            <th>Дата приема</th>
            <td><input type="text" name="priem" class="tcal" {% if User.priem!="" %}value="{{ User.priem }}"{% endif %} /></td>
        </tr>
        <tr>
            <th>Баллы в начале</th>
            <td><input type="text" name="ball" {% if User.ball!="" %}value="{{ User.ball }}"{% endif %} /></td>
        </tr>
        <tr>
            <th>Уровень</th>
            <td><input type="text" name="lvl" value="{% if User.lvl!="" %}{{ User.lvl }}{% else %}0{% endif %}" /></td>
        </tr>
        <tr>
            <th>Кукла</th>
            <td><input type="text" name="pwcalc" {% if User.pwcalc!="" %}value="{{ User.pwcalc }}"{% endif %} /></td>
        </tr>
        <tr>
            <th colspan="2" class="center"><input type="submit" value="Добавить" class="blue small" onclick = "xajax_EditUser(xajax.getFormValues('user-create')); return false;"></th>
        </tr>
    </table>
</div>
<div class="col_3"></div>
{% endblock %}