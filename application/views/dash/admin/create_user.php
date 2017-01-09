<div class="row">
    <div class="col s12 m12 l12">
        <h4 class="light">Створити користувача</h4>
        <div class="card-panel" style="overflow:auto; height:100%;">
            <div class="input-field col s12">
                <label>Ім'я</label>
                <?php form_input(array('name' => 'first_name')); ?>
            </div>
            <div class="input-field col s12">
                <label>Призвіще</label>
                <?php form_input(array('name' => 'last_name')); ?>
            </div>
            <div class="input-field col s12">
                <label>Електронна пошта</label>
                <?php form_input(array('name' => 'email', 'type' => 'email')); ?>
            </div>
            <div class="input-field col s12">
                <label>Номер телефону</label>
                <?php form_input(array('name' => 'phone', 'type' => 'tel')); ?>
            </div>
            <div class="input-field col s12">
                <label>Пароль</label>
                <?php form_input(array('name' => 'password', 'type' => 'password')); ?>
            </div>
            <div class="input-field col s12">
                <label>Підтвердження паролю</label>
                <?php form_input(array('name' => 'conf_password', 'type' => 'password')); ?>
            </div>
            <div class="file-field input-field col s12 m4 l4">
                <div class="btn">
                    <span>Файл</span>
                    <input type="file" name="userfile">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
    </div>
</div>