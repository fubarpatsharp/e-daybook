<div class="row">
    <div class="col s12 m12 l12">
        <h4 class="light">Створити користувача</h4>
        <div class="card-panel">

            <div id="infoMessage"><?php echo $message; ?></div>

            <?php echo form_open("auth/create_user"); ?>
            <div class="input-field">
                <label>Ім'я</label>
                <?php echo form_input($first_name); ?>
            </div>

            <div class="input-field">
                <label>Призвіще</label>
                <?php echo form_input($last_name); ?>
            </div>

            <?php
            if ($identity_column !== 'email') {
                echo '<p>';
                echo lang('create_user_identity_label', 'identity');
                echo '<br />';
                echo form_error('identity');
                echo form_input($identity);
                echo '</p>';
            }
            ?>

            <div class="input-field">
                <label>Компанія</label>
                <?php echo form_input($company); ?>
            </div>

            <div class="input-field">
                <label>Пошта</label>
                <?php echo form_input($email); ?>
            </div>

            <div class="input-field">
                <label>Телефон</label>
                <?php echo form_input($phone); ?>
            </div>

            <div class="input-field">
                <label>Пароль</label>
                <?php echo form_input($password); ?>
            </div>

            <div class="input-field">
                <label>Повторіть пароль</label>
                <?php echo form_input($password_confirm); ?>
            </div>


            <div class="input-field"><?php echo form_submit('submit', 'Створити', 'class="btn-large green"'); ?></div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>