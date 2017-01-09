<div class="col s12 m12 l12">
    <h4 class="light">Перегляд домашніх завдань</h4>
    <div class="card-panel" style="overflow: auto; min-height: 400px;">
        <?php echo form_open('tc/homeworks');?>
        <div class="col s12 m12 l12">
            <div class="input-field col s12 m8 l8">
                <?php echo form_dropdown('class', $accessed_classes); ?>
                <label>Оберіть клас</label>
            </div>
            <div class="input-field col s12 m4 l4 center-align">
                <?php echo form_submit('submit', 'Відобразити', 'class="btn-large"'); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>