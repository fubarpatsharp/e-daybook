<div class="col s12 m12 l12">
    <h4 class="light">Звіт уроку</h4>
    <div class="card-panel" style="overflow:auto; min-height: 800px">
        <div class="col s12 m12 l12">
            <?php echo form_open("tc/lesson"); ?>
            <div class="input-field col s12 m4 l4">
                <?php echo form_dropdown('class', $accessed_classes); ?>
                <label>Оберіть клас</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <?php echo form_dropdown('subject', $accessed_subjects); ?>
                <label>Оберіть предмет</label>
            </div>
            <div class="input-field col s12 m6 l4 center-align">
                <?php echo form_submit('submit_choose', 'Відобразити', 'class="btn-large"'); ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>