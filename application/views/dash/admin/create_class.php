<h4 class="light">Управління класами</h4>
<div class="card-panel" style="overflow: auto; height:100%;">
    <div class="row">
    <?php echo $message; ?>
    <?php echo form_open("admin/classes"); ?>
    <div class="input-field col s12">
        <?php echo form_input(array('name' => 'classname', 'id' => 'name')); ?>
        <label for="name">Назва</label>
    </div>
        <div class="input-field col s12 center-align"><?php echo form_submit('submit', 'Створити', 'class="btn-large"'); ?></div>
    <?php echo form_close(); ?>
    </div>
    <div class="divider"></div>
    <div class="row">
        <div class="col s12 m12 l12">
            <table class="centered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Назва</th>
                    <th>Дії</th>
                </tr>
                </thead>
                <tbody>
                {classes_entries}
                <tr>
                    <td>{id}</td>
                    <td>{name}</td>
                    <td><a href="classes/edit/{id}"><i class="material-icons md-36">mode_edit</i></a><a
                                href="classes/delete/{id}"><i class="material-icons md-36">delete_sweep</i></td>
                </tr>
                {/classes_entries}
                </tbody>
            </table>
        </div>
    </div>
</div>