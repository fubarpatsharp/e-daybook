<?php if ($message != NULL) {
    echo '<blockquote>' . $message . '</blockquote>';
} ?>
    <h4 class="light">Управління користувачами</h4>
    <div class="card-panel">
        <?php echo form_open("admin/users"); ?>
        <section>
            <div class="input-field col s12 m12 l12">
                <?php echo form_input(array('name' => 'data', 'id' => 'data')); ?>
                <label for="data">Уведіть дані для пошуку</label>
            </div>
            <div class="input-field col s12">
                <?php echo form_dropdown('type', array('1' => "Ім'я", '2' => "Призвіще", '3' => "Електронна пошта")) ?>
                <label>Оберіть критерію пошуку</label>
            </div>
            <?php echo form_submit('submit', 'Пошук', 'class="btn-large"') ?>
        </section>
        <?php echo form_close(); ?>
    </div>
<?php if ($information != NULL): ?>
    <div class="card-panel" style="overflow:auto;">
        <h5>Знайдені користувачі</h5>
        <div class="divider"></div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Ім'я</th>
                <th>Призвіще</th>
                <th>E-mail</th>
                <th>Телефон</th>
                <th>IP</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($information as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['ip_address']; ?></td>
                    <td><a href="users/edit/<?php echo $row['id']; ?>"><i class="material-icons">mode_edit</i></a><a
                                href="users/delete/<?php echo $row['id']; ?>"><i class="material-icons">delete_sweep</i></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>