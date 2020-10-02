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

