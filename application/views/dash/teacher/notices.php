<div class="col s12 m12 l12">
    <h4 class="light">Сповіщення</h4>
    <div class="card-panel" style="overflow: auto">
        <?php echo form_open("admin/notices");?>
        <div class="col s12 m12 l12">
            <div class="input-field col s12 m4 l6">
                <?php echo form_dropdown('class',$classes);?>
                <label>Виберіть клас</label>
            </div>
            <div class="input-field col s12 m4 l6">
                <?php echo form_dropdown('priority',$priority);?>
                <label>Виберіть пріорітет</label>
            </div>
        </div>
        <div class="col s12 m12 l12">
            <div class="input-field col s12 m12 l12">
                <?php echo form_input('name', '', 'id ="name" length="50"'); ?>
                <label for="name">Назва</label>
            </div>
            <div class="input-field col s12 m12 l12">
                <?php echo form_textarea('content', '', 'class ="materialize-textarea" id ="content" length="250"'); ?>
                <label for="content">Вміст</label>
            </div>
            <div class="input-field col s12 m12 l12 center-align">
                <?php echo form_submit('submit','Опублікувати');?>
            </div>
        </div>
        <?php echo form_close();?>
    </div>
</div>