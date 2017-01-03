<div class="col s12 m12 l12">
    <h4 class="light">Звіт уроку</h4>
    <div class="card-panel" style="overflow:auto; min-height: 800px">
        <div class="col s12 m12 l12">
            <?php echo form_open("tc/report_lesson"); ?>
            <div class="input-field col s12 m4 l4">
                <?php echo form_dropdown('class_show', $classes); ?>
                <label>Оберіть клас</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <?php echo form_dropdown('subject_show', $subjects); ?>
                <label>Оберіть предмет</label>
            </div>
            <div class="input-field col s12 m6 l4 center-align">
                <?php echo form_submit('submit_show', 'Відобразити', 'class="btn-large"'); ?>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="col s12 m12 l12">
            <div class="divider"></div>
            <?php if ($existinfo == FALSE) { ?>
                <h3 class="center-align thin">Не обрано даних для звіту!</h3>
            <?php } else { ?>
                <h5 class="thin">Клас N предмет N</h5>
                <table>
                    <thead>
                    <tr>
                        <th data-field="id">Учень</th>
                        <th data-field="name">Оцінка</th>
                        <th data-field="name">Коментар</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Пархоменко</td>
                        <td>Eclair</td>
                        <td>Eclair</td>
                    </tr>
                    </tbody>
                </table>

            <?php } ?>
        </div>
    </div>
</div>
