<div class="col s12 m12 l12">
    <?php if ($message != NULL) { ?>
    <div class="col s12 m12 l12">
        <blockquote><?php echo $message;?></blockquote>
    </div>
    <?php } ?>
    <h4 class="thin">Розклад уроків</h4>
    <div class="card-panel" style="overflow-x: auto; height: 100%">
        <?php echo form_open('tc/schedule') ?>
        <div class="row">
            <div class="input-field col s12 m12 l4">
                <?php echo form_dropdown('class', $classes); ?>
                <label>Оберіть клас</label>
            </div>
            <div class="input-field col s12 m12 l6">
                <?php echo form_dropdown('day', $days); ?>
                <label>Оберіть день</label>
            </div>
            <div class="input-field col s12 m12 l2 center-align">
                <?php echo form_submit('submit', 'Надіслати', 'class="btn-large"'); ?>
            </div>
        </div>
        <div class="row col s12 m8 offset-m2 l6 offset-l3">
            <table class="centered">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Урок</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>0</td>
                    <td>
                        <div class="input-field col s6 offset-s3"><?php echo form_dropdown('subject0', $subjects); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
                        <div class="input-field col s6 offset-s3"><?php echo form_dropdown('subject1', $subjects); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <div class="input-field col s6 offset-s3"><?php echo form_dropdown('subject2', $subjects); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <div class="input-field col s6 offset-s3"><?php echo form_dropdown('subject3', $subjects); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <div class="input-field col s6 offset-s3"><?php echo form_dropdown('subject4', $subjects); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        <div class="input-field col s6 offset-s3"><?php echo form_dropdown('subject5', $subjects); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>
                        <div class="input-field col s6 offset-s3"><?php echo form_dropdown('subject6', $subjects); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>
                        <div class="input-field col s6 offset-s3"><?php echo form_dropdown('subject7', $subjects); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>
                        <div class="input-field col s6 offset-s3"><?php echo form_dropdown('subject8', $subjects); ?></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>