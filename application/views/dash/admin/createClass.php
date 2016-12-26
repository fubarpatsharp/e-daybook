<div class="card-panel">
    <h5>Створити клас</h5>
    <div class="divider"></div>
    <?php echo form_open("admin/createClass");?>
    <div class="input-field col s12">
        <?php echo form_input(array('name' => 'classname', 'id' => 'name'));?>
        <label for="name">Назва</label>
    </div>
    <?php echo form_submit('submit', 'Створити');?>
    <?php echo form_close();?>
    <div class="divider"></div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Назва</th>
        </tr>
        </thead>
        <tbody>
        {classes_entries}
        <tr>
            <td>{id}</td>
            <td>{name}</td>
        </tr>
        {/classes_entries}
        </tbody>
    </table>
</div>