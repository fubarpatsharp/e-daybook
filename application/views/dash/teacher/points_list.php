<div class="col s12 m12 l12">
    <h4 class="light">Оцінки</h4>
    <div class="card-panel" style="overflow:auto; height: inherit">
        <div class="col s12 m12 l12">
            <div class="divider"></div>
            <h5 class="light">Перегляд оцінок N класу з предмету N </h5>
            <table class="bordered responsive-table">
                <tr>
                    <th data-field="name">Призвіще</th>
                    <th>Оцінка</th>
                    <th>Оцінка</th>
                    <th>Оцінка</th>
                    <th>Оцінка</th>
                    <th>Оцінка</th>
                    <th>Оцінка</th>
                    <th>Оцінка</th>
                    <th>Оцінка</th>
                </tr>
                {points_entries}
                <tr>
                    <td>{last_name}</td>
                    <td>{mark}</td>
                </tr>
                {/points_entries}
                </tbody>
            </table>
            <div class="divider"></div>
        </div>
    </div>
</div>