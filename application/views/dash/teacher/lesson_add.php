<div class="col s12 m12 l12">
    <h4 class="light">Звіт уроку</h4>
    <div class="card-panel" style="overflow:auto; min-height: 800px">
        <div class="col s12 m12 l12" id="result">
            <div class="divider"></div>
            <?php if ($exist_information == FALSE) { ?>
                <h3 class="center-align thin">Не обрано даних для звіту!</h3>
            <?php } else { ?>
                <h4 class="light">Клас <b><?php echo $class_name; ?></b>, предмет <b><?php echo $subject_name; ?></b>,
                    дата </h4>
                <div class="col s12 m8 l8 offset-l2 offset-m2">
                    <table>
                        <thead>
                        <tr>
                            <th>Учень</th>
                            <th>Оцінка</th>
                            <th>Тип</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php echo form_open("tc/lesson"); ?>
                            <td>
                                <div class="input-field col s12 m12 l12">
                                    <?php echo form_dropdown('student', $class_students); ?>
                                </div>
                            </td>
                            <td>
                                <div class="input-field col s12 m12 l12">
                                    <?php echo form_dropdown('point', $point); ?>
                                </div>
                            </td>
                            <td>
                                <div class="input-field col s12 m12 l12">
                                    <?php echo form_dropdown('point_type', $point_type); ?>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="input-field col s12 m12 l12 center-align">
                        <?php echo form_submit('submit_send', 'Надіслати', 'class="btn-large"'); ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>