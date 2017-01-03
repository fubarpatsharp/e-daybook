<div class="col s12 m12 l12">
    <h4 class="light">Оцінки</h4>
    <div class="card-panel" style="overflow:auto; min-height: 800px">
        <div class="col s12 m12 l12">
            <?php echo form_open("tc/points");?>
            <div class="input-field col s12 m4 l4">
                <?php echo form_dropdown('class_show', $classes); ?>
                <label>Виберіть клас</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <?php echo form_dropdown('subject_show', $subjects); ?>
                <label>Виберіть предмет</label>
            </div>
            <div class="input-field col s12 m6 l4 center-align">
                <?php echo form_submit('submit_show','Відобразити', 'class="btn-large"');?>
            </div>
            <?php echo form_close();?>
        </div>
        <div class="col s12 m12 l12">
            <div class="divider"></div>
            <?php if ($existinfo == FALSE) { ?>
                <h3 class="center-align thin">Не обрано данних для відображення!</h3>
            <?php } elseif(empty($info)) {?>
                <h3 class="light center-align">У цього класу немає оцінок з цього предмету</h3>
                <?php } else {?>
            <h5 class="light">Перегляд оцінок <?php echo $class_name;?> класу з предмету <?php echo $subject_name;?> </h5>
                <?php echo $table;?>
            <?php } ?>
        </div>
    </div>
</div>
