<div class="col s10 m6 l4 offset-m3 offset-s1">
    <div class="card green darken-1 white-text z-depth-3 hoverable">
        <div class="card-content">
            <h5 class="thin">{students} зареєстрованих учнів</h5>
        </div>
    </div>
</div>
<div class="col s10 m6 l4 offset-m3 offset-s1">
    <div class="card blue darken-1 white-text z-depth-3 hoverable">
        <div class="card-content">
            <h5 class="thin">{teachers} зареєстрованих вчителів</h5>
        </div>
    </div>
</div>
<div class="col s10 m6 l4 offset-m3 offset-s1">
    <div class="card purple darken-4 white-text z-depth-3 hoverable">
        <div class="card-content">
            <h5 class="thin">{parents} зареєстрованих батьків</h5>
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