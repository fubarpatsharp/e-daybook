<div class="card-panel">
    <h5 class="thin">Управління користувачами</h5>
    <div class="divider"></div>
    <?php echo form_open("admin/getSelectedUsers");?>
    <section>
    <div class="input-field col s12 m12 l12">
        <?php echo form_input(array('name' => 'data', 'id' => 'data'));?>
        <label for="data">Введіть дані для пошуку</label>
    </div>
    <div class="input-field col s12">
        <?php echo form_dropdown('type', array("name" => "Ім'я", "surname" => "Призвіще", "email" => "Електронна пошта"))?>
        <label>Виберіть критерію пошуку</label>
    </div>
        <?php echo form_submit('submit_find_data','Пошук')?>
    </section>
    <?php echo form_close();?>
</div>