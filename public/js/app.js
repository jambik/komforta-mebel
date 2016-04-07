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

    if ($('input[name=furniture_type]:checked').length){
        $('#furnitureTypeImage').html('<img src="/img/'+$('input[name=furniture_type]:checked').data('img')+'">');
    }

});

function changeFurnitureType(element)
{
    $('#furnitureTypeImage').html('<img src="/img/'+$(element).data('img')+'">');
}