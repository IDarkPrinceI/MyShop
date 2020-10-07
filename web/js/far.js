// $(function () {
//     $('input').iCheck({
//         checkboxClass: 'icheckbox_square-blue',
//         radioClass: 'iradio_square-blue',
//         increaseArea: '20%' /* optional */
//     });
// });

//Добавления класса active к выбранному элементу sidebar'а
$(function () {
    $('.sidebar-menu a').each(function () {
        let location = window.location.pathname,
               link = this.href,
               countTwo = 0;

        for (let i = 0; i < location.length; i++) {
               if (location[i].includes('/')) {
                   countTwo = i
               }
            }
           if (location === '/far') {
               $('#mainPage').addClass('active');

           } else if (link.includes(location.substr(0, countTwo))) {
               $(this).parent().addClass('active');
               $(this).closest('.treeview').addClass('active');
        }
    });
});
//Добавления класса active к выбранному элементу sidebar'а

//календарь
if (window.location.pathname.includes('statistic/index')) {

$(function(){
    $("#datepicker").datepicker();
});
//локализация
$.datepicker.regional['ru'] = {
    closeText: 'Закрыть',
    prevText: 'Предыдущий',
    nextText: 'Следующий',
    currentText: 'Сегодня',
    monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
    monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
    dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
    dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
    weekHeader: 'Не',
    dateFormat: 'dd.mm.yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['ru']);
//календарь
}

$('#userStatistic').on('click', function () {
    let chooseDate = document.querySelector('#datepicker').value
    $.ajax({
        url:'/far/statistic/index',
        data: {chooseDate: chooseDate},
        type: 'GET',
        success: function (res) {
            $('#testDate').html(res)
        },
        error: function () {
            alert('Error!')
        }
    })

})
