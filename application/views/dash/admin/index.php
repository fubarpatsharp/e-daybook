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
<div class="col s12 m12 l12">
    <div class="col s12 m6 l6">
        <h5 class="light">Новини</h5>
        <ul class="collapsible" data-collapsible="accordion">
            {news_entries}
            <li>
                <div class="collapsible-header"><i class="material-icons">info_outline</i>{header} <span class="badge" data-badge-caption="fubarpatsharp"></span></div>
                <div class="collapsible-body"><p>{content}</p></div>
            </li>
            {/news_entries}
        </ul>
    </div>
    <div class="col s12 m6 l6">
        <h5 class="light">Повідомлення</h5>
        <ul class="collapsible" data-collapsible="accordion">
            {message_entries}
            <li>
                <div class="collapsible-header"><i class="material-icons">message</i>{header} <span class="badge" data-badge-caption="fubarpatsharp"></span></div>
                <div class="collapsible-body"><p>{content}</p></div>
            </li>
            {/message_entries}
        </ul>
    </div>
</div>
<div class="col s12 m12 l12">
    <div class="card-panel z-depth-3">
        <img src="http://canvasjs.com/wp-content/uploads/2013/01/html5_multiseries_area_chart.jpg"
             width="100%">
    </div>
</div>