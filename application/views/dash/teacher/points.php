<div class="col s12 m12 l12">
    <h4 class="light">Оцінки</h4>
    <div class="card-panel" style="overflow:auto; height: 400px">
        <div class="col s12 m12 l12">
            <?php echo form_open("tc/points");?>
            <div class="input-field col s12 m4 l">
                <?php echo form_dropdown('subject', $classes); ?>
                <label>Виберіть клас</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <?php echo form_dropdown('class', $subjects); ?>
                <label>Виберіть предмет</label>
            </div>
            <div class="input-field col s12 m6 l4 center-align">
                <?php echo form_submit('submit','Відобразити');?>
            </div>
            <?php echo form_close();?>
        </div>
        <div class="col s12 m12 l12">
            <div class="divider"></div>
            <h3 class="center-align thin">Не обрано данних для відображення!</h3>
        </div>
    </div>
</div>