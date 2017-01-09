TODO
<div class="row">
    <div class="col s12 m12 l12">
        <h4 class="light">Редагування N класу</h4>
        <div class="card-panel" style="overflow:auto; height: 600px;">
            <div class="col s12 m12 l12">
                <div class="input-field col s12">
                    <?php form_dropdown('teacher', $teachers);?>
                    <label>Класний керівник</label>
                </div>
                <div class="input-field col s12">
                    <input id="first_name" type="text" class="validate">
                    <label for="first_name">Назва</label>
                </div>
            </div>
            <div class="col s12 m12 l12">
                <div class="divider"></div>
                <h5>Список учнів:</h5>
                <table>
                    <thead>
                    <tr>
                        <th>ID користувача</th>
                        <th>ПІБ</th>
                        <th>Дії</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Пархоменко Р.</td>
                        <td><input type="checkbox" name="checkbox[]" id="checkbox" class="filled-in" /><label  for="checkbox"></label></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>