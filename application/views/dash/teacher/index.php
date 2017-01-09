<div class="row">
    <div class="col s12 m12 l12">
        <h4 class="light">Функції</h4>
        <div class="card-panel center-align" style="overflow: auto">
            <div class="col s12 m6 l3" style="padding: 2%"><a class="waves-effect waves-light btn-large"><i class="material-icons left">assignment</i>Домашні завдання</a></div>
            <div class="col s12 m6 l3" style="padding: 2%"><a class="waves-effect waves-light btn-large"><i class="material-icons left">check_circle</i>Виставити оцінки</a></div>
            <div class="col s12 m6 l3" style="padding: 2%"><a class="waves-effect waves-light btn-large"><i class="material-icons left">pageview</i>Переглянути оцінки</a></div>
            <div class="col s12 m6 l3" style="padding: 2%"><a class="waves-effect waves-light btn-large"><i class="material-icons left">dashboard</i>Оголошення</a></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m12 l12">
        <div class="col s12 m6 l6">
            <h4 class="light">Новини</h4>
            <ul class="collapsible" data-collapsible="accordion">
                <?php
                foreach ($news as $row):
                    if ($row['priority'] == 2) {$color = 'orange';} elseif ($row['priority'] == 3) {$color ='red';} else {$color = 'black';}?>
                <li>
                    <div class="collapsible-header"><i class="material-icons" style="color: <?php echo $color; ?>">info_outline</i><?php echo $row['header']; ?></span></div>
                    <div class="collapsible-body"><p><?php echo $row['content']; ?></p></div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col s12 m6 l6">
            <h4 class="light">Повідомлення</h4>
            <?php foreach ($messages as $row): ?>
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">message</i><?php echo $row['header']; ?></div>
                    <div class="collapsible-body"><p><label>Автор: <?php echo $this->ion_auth->user($row['author'])->row()->last_name.' '.$this->ion_auth->user($row['author'])->row()->first_name; ?></label><br><?php echo $row['content'];?></p></div>
                </li>
            </ul>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m12 l12">
        <h4 class="light">Останні дії</h4>
        <div class="card-panel center-align" style="overflow: auto">
            <table>
                <thead>
                <tr>
                    <th data-field="id">Name</th>
                    <th data-field="name">Item Name</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Alvin</td>
                    <td>Eclair</td>
                </tr>
                <tr>
                    <td>Alan</td>
                    <td>Jellybean</td>
                </tr>
                <tr>
                    <td>Jonathan</td>
                    <td>Lollipop</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>