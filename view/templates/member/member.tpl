{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | Статистика{% endblock %}
{% block main %}
<div class="center">Статистика</div>
<div id="result"></div>
<div>
    <table cellspacing="0" cellpadding="0" border="1px">
        <thead>
            <tr>
                <th>Ник</th>
                <th>Баллы до</th>
                <th>Мирпиты</th>
                <th>ГТЗ</th>
                <th>ГВГ</th>
                <th>ПВП</th>
                <th>ДЦД</th>
                <th>Ремесло</th>
                <th>Помощь</th>
                <th>Должность</th>
                <th>Налоги</th>
                <th>Штрафы</th>
                <th>Склад</th>
                <th>Итого</th>
                {% if "priem" in Prova %}<th>Удалить</th>{% endif %}
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    {% if "priem" in Prova %}
                    <a href="/users/edit/{{ User.id }}/">{{ User.name }}</a>
                    {% else %}
                    {{ User.name }}
                    {% endif %}
                </th>
                <td class="center">{{ User.ball }}</td>
                <td class="center">{{ User.mirpit }}</td>
                <td class="center">{{ User.gtz }}</td>
                <td class="center">{{ User.gvg }}</td>
                <td class="center">{{ User.pvp }}</td>
                <td class="center">{{ User.dcd }}</td>
                <td class="center">{{ User.remeslo }}</td>
                <td class="center">{{ User.help }}</td>
                <td class="center">{{ User.oficer }}</td>
                <td class="center">{{ User.nalog }}</td>
                <td class="center">{{ User.shtraf }}</td>
                <td class="center">{{ User.sklad }}</td>
                <td class="center">{{ User.ball+User.mirpit+User.gtz+User.gvg+User.pvp+User.dcd+User.remeslo+User.help+User.oficer+User.nalog+User.shtraf+User.sklad }}</td>
                {% if "priem" in Prova %}
                <td class="center">
                    <a href="/users/delete/{{ User.id }}/"><span class="icon red small">x</span></a>
                </td>
                {% endif %}
            </tr>
        </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" border="1px">
        <thead>
            <tr>
                <th></th>
                <th class="center">Был/небыл на мирпитах</th>
                <th class="center">Был/небыл на ГТЗ</th>
                <th class="center">Был/небыл на ремесле</th>
                <th class="center">Был/небыл на ГВГ</th>
                <th class="center">Был/небыл на ДЦД</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Явка</th>
                <td class="center">{{ User.mirpit_on }}/{{ User.mirpit_off }}</td>
                <td class="center">{{ User.gtz_on }}/{{ User.gtz_off }}</td>
                <td class="center">{{ User.remeslo_on }}/{{ User.remeslo_off }}</td>
                <td class="center">{{ User.gvg_on }}/{{ User.gvg_off }}</td>
                <td class="center">{{ User.dcd_on }}/{{ User.dcd_off }}</td>
            </tr>
        </tbody>
    </table>
    <table cellspacing="0" cellpadding="0" border="1px">
        <thead>
            <tr>
                <th></th>
                <th class="center">Дата приема</th>
                <th class="center">Дней в клане</th>
                <th class="center">Класс</th>
                <th class="center">Уровень</th>
                <th class="center">Кукла</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Информация</th>
                <td class="center">{{ User.priem }}</td>
                <td class="center">{{ User.days }}</td>
                <td class="center">{{ GameClass[User.class-1] }}</td>
                <td class="center">{{ User.lvl }}</td>
                <td class="center"><a href="{{ User.pwcalc }}" target="_blank">{{ User.pwcalc }}</a></td>
            </tr>
        </tbody>
    </table>
</div>
<div>
    <form id="show-table" onsubmit = "return false;">
        <div class="col_4 center">
            <label for="date_ot">От:</label>
            <input type="text" name="date_ot" id="date_ot" class="tcal" />
        </div>
        <div class="col_4 center">
            <label for="date_do">До:</label>
            <input type="text" name="date_do" id="date_do" class="tcal" />
        </div>
        <div class="col_4 center">
            <label for="table">Таблица:</label>
            <select data-placeholder="Таблица..." class="chzn-select" name="table" id="table">
                <option value=""></option>
                <option value="mirpit">Мирпиты</option>
                <option value="gtz">ГТЗ</option>
                <option value="gvg">ГВГ</option>
                <option value="pvp">ПВП</option>
                <option value="dcd">ДЦД</option>
                <option value="remeslo">Ремесло</option>
                <option value="help">Помощ</option>
                <option value="oficer">Должность</option>
                <option value="nalog">Налог</option>
                <option value="shtraf">Штрафы</option>
                <option value="sklad">Склад</option>
            </select>
            <script type="text/javascript">
                $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true});
            </script>
        </div>
        <div class="col_12 center">
            <input type="submit" value="Показать" class="blue" onclick = "xajax_ShowTable(xajax.getFormValues('show-table')); return false;">
        </div>
    </form>
</div>
<div class="col_12" id="show"></div>
{% endblock %}