<div class="divider"></div>
<table class="bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Ім'я</th>
        <th>Призвіще</th>
        <th>E-Mail</th>
        <th>Група</th>
        <th>Дії</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user):?>
    <tr>
        <td><?php echo htmlspecialchars($user->id,ENT_QUOTES,'UTF-8');?></td>
        <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
        <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
        <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
        <td><?php foreach ($user->groups as $group){ echo $groups->name; }?></td>
        <td>Редагувати</td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>