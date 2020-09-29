// $(function () {
//     $('input').iCheck({
//         checkboxClass: 'icheckbox_square-blue',
//         radioClass: 'iradio_square-blue',
//         increaseArea: '20%' /* optional */
//     });
// });


// $(function () {
//     $('.sidebar-menu a').each(function () {
//         let location = window.location.protocol + '//' + window.location.host +
//             window.location.pathname;
//         let link = this.href;
//         if (link == location) {
//             $('.sidebar-menu li').removeClass('active');
//             $(this).parent().addClass('active');
//             $(this).closest('.treeview').addClass('active');
//         }
//     });
// });
$(function () {
    $('.sidebar-menu').on('click', function (event) {
        let location = window.location.pathname;
        let click = event.target;
            console.log(click.classList)
        // let countTwo = 0,
        //     link = event.target.getAttribute('href')
        // if (link) {
        //     for (let i = 0; i < link.length; i++) {
        //         if (link[i].includes('/')) {
        //             // count++
        //             countTwo = i
        //         }
        //     }
        // }
        // // console.log(link.substr(0, 12))
        // // console.log(location.substr(0, 12))
        // if ((location.substr(0, countTwo)) === (link.substr(0, countTwo))) {
        //     console.log('Совпадают')
        //     // event.target.classList.add('active')
        //     // event.target.addClass('active')
        // }
        // console.log(count)
    //     if (link == location) {
    //         $('.sidebar-menu li').removeClass('active');
    //         $(this).parent().addClass('active');
    //         $(this).closest('.treeview').addClass('active');
    //     }
    });
});