$(document).ready(function() {

    $('.popup-gallery').magnificPopup({
        type:'image',
        zoom: {
            enabled: true
        },
        gallery: {
            enabled: true,
            preload: [1,2],
            tPrev: 'Пердыдущая (клавиша влево)',
            tNext: 'Следующая (клавиша вправо)'
        },
        tLoading: 'Загрузка...'
    });

});