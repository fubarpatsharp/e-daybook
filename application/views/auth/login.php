<?php if (!empty($message)) echo "<div class='row'><div class='col s12 m2 l2 offset-m5 offset-l5 green white-text card-panel center-align'>".$message."</div></div>"?>
<div class="row">
    <div class="col s12 m6 l2 offset-l5 offset-m3">
        <div class="card-panel grey lighten-4 black-text" style="overflow: auto">
            <h5>Авторизація</h5>
            <div class="divider"></div>
            <div class="left-align">
                <?php echo form_open("auth/login");?>
                    <div class="input-field col s12">
                        <?php echo form_input($identity, 'id="nickname"');?>
                        <label for="nickname">Нікнейм</label>
                    </div>
                    <div class="input-field col s12">
                        <?php echo form_input($password, 'id="password"');?>
                        <label for="password">Пароль</label>
                    </div>
                    <p class="center"><?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn-large"');?></p>
                <span class="left"><label>Запам'ятати:</label></span>
                <span class="switch right">
                        <label>
                            Ні
                            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                            <span class="lever"></span>
                            Так
                        </label>
                </span>
                <?php echo form_close();?>
            </div>
        </div>
        <a class="indigo-text" href="auth/register"><p class="center-align">Забули пароль?</p></a>
    </div>
</div>
