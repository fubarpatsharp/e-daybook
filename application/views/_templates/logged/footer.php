</div>
</div>
</div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php echo script_tag('js/materialize.min.js'); ?>
<script>
    $(document).ready(function() {
        $('select').material_select();
        $('ul.tabs').tabs();
        $(".button-collapse").sideNav();
        $('.datepicker').pickadate({
            labelMonthNext: 'Наст. місяць',
            labelMonthPrev: 'Поп. місяць',
            labelMonthSelect: 'Оберіть місяць',
            labelYearSelect: 'Оберіть рік',
            monthsFull: [ 'Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень' ],
            monthsShort: [ 'Січ', 'Лют', 'Бер', 'Кві', 'Тра', 'Чер', 'Лип', 'Сер', 'Вер', 'Жов', 'Лис', 'Гру' ],
            weekdaysFull: [ 'Неділя', 'Понеділок', 'Вівторок', 'Середа', 'Четвер', 'Пятниця', 'Субота' ],
            weekdaysShort: [ 'Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб' ],
            weekdaysLetter: [ 'Н', 'П', 'В', 'С', 'Ч', 'П', 'С' ],
            today: 'Сьогодн.',
            clear: 'Очист.',
            close: 'X',
            format: 'yyyy/mm/dd',
        });
    });
</script>
</body>
</html>