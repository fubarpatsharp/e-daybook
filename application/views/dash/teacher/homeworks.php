<?php if (isset($message)) {?>
    <div class="col s12 m12 l12"><blockquote><?=$message?></blockquote></div>
<?php }?>
<div class="col s12 m12 l12">
    <h4 class="thin">Додати домашнє завдання</h4>
    <div class="card-panel" style="overflow: auto; min-height: 400px;">
        <div class="col s12 m12 l12">
            <?php echo form_open_multipart('tc/homeworks')?>
            <div class="input-field col s12 m4 l4">
                <?php echo form_dropdown('class', $accessed_classes); ?>
                <label>Оберіть клас</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <?php echo form_dropdown('subject', $accessed_subjects); ?>
                <label>Оберіть предмет</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <?php echo form_input($datepicker); ?>
                <label>Оберіть дату</label>
            </div>
            <div class="input-field col s12 m6 l6">
                <?php echo form_input($containment); ?>
                <label>Уведіть зміст</label>
            </div>
            <div class="file-field input-field col s12 m6 l6">
                <div class="btn">
                    <span>Файл</span>
                    <input type="file" name="userfile">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="input-field col s12 m12 l12 center-align">
                <?php echo form_submit('submit', 'Додати домашнє завдання', 'class="btn-large"'); ?>
            </div>
            <?php echo form_close()?>
            <div class="divider"></div>
        </div>
    </div>
    <h4 class="thin">Перегляд домашніх завдань</h4>
    <div class="card-panel" style="overflow: auto; min-height: 600px;">
        <div class="col s12 m12 l12">
            <div class="input-field col s12 m9 l9">
                <?php echo form_dropdown('class', $accessed_classes); ?>
                <label>Оберіть клас</label>
            </div>
            <div class="input-field col s12 m3 l3 center-align">
                <?php echo form_submit('submit', 'Відправити', 'class="btn-large"'); ?>
            </div>
        </div>
        <div class="col s12 m12 12">
            <div class="col s12 m12 l6">
                <table>
                    <thead>
                    <tr>
                        <th data-field="id">Предмет</th>
                        <th data-field="name">Зміст</th>
                        <th data-field="price">Опції</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                    </tr>
                    <tr>
                        <td>Alan</td>
                        <td>Jellybean</td>
                        <td>$3.76</td>
                    </tr>
                    <tr>
                        <td>Jonathan</td>
                        <td>Lollipop</td>
                        <td>$7.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>