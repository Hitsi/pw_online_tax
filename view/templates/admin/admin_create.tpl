{% extends 'strukture.tpl' %}
{% block html_title %}{{ parent() }} | Управление{% endblock %}
{% block main %}
<div class="center">Добавить Админа</div>
<div id="result"></div>
<div>
    <form id="form" onsubmit = "return false;">
        <table cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="center">Логин</th>
                    <th class="center">Пароль</th>
                    <th class="center">Админ</th>
                    <th class="center">Прием</th>
                    <th class="center">Мирпиты</th>
                    <th class="center">ГТЗ</th>
                    <th class="center">ГВГ</th>
                    <th class="center">ПВП</th>
                    <th class="center">ДЦД</th>
                    <th class="center">Ремесло</th>
                    <th class="center">Помощь</th>
                    <th class="center">Должность</th>
                    <th class="center">Налоги</th>
                    <th class="center">Штрафы</th>
                    <th class="center">Склад</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><input type="text" name="login" {% if Admin.login!="" %}value="{{Admin.login}}"{% endif %}></th>
                    <th><input type="text" name="password"{% if Admin.password!="" %}value="{{Admin.password}}"{% endif %}></th>
                    <td class="center"><input type="checkbox" name="admin" {% if "admin" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="priem" {% if "priem" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="mirpit" {% if "mirpit" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="gtz" {% if "gtz" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="gvg" {% if "gvg" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="pvp" {% if "pvp" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="dcd" {% if "dcd" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="remeslo" {% if "remeslo" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="help" {% if "help" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="oficer" {% if "oficer" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="nalog" {% if "nalog" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="shtraf" {% if "shtraf" in Admin.prova %}checked{% endif %}></td>
                    <td class="center"><input type="checkbox" name="sklad" {% if "sklad" in Admin.prova %}checked{% endif %}></td>
                </tr>
                <tr>
                    <th colspan="14" class="center"><input type="submit" value="Добавить" class="blue small" onclick = "xajax_EditAdmin(xajax.getFormValues('form')); return false;"></th>
                </tr>
            </tbody>
        </table>
    </form>
</div>
{% endblock %}