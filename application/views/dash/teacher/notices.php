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
    <div class="card-panel" style="overflow:auto;">
        <table class="bordered responsive-table">
            <thead>
            <tr>
                <th data-field="id">ID</th>
                <th data-field="id">Назва</th>
                <th data-field="name">Короткий зміст</th>
                <th data-field="price">Дії</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>Алгебра</td>
                <td>Алгебра</td>
                <td>Робота біля дошки</td>
                <td>11</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>