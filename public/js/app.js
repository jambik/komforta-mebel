$(document).ready(function() {

    if ($('#form_request_design').length) {
        $('#form_request_design').on('submit', function(e){
            ajaxFormSubmit(e, requestDesignSuccess);
        })
    }

    if ($('#form_callback').length) {
        $('#form_callback').on('submit', function(e){
            ajaxFormSubmit(e, callbackSuccess);
        })
    }

    if ($('.popup-gallery').length){
        $('.popup-gallery').magnificPopup({
            type: 'image',
            zoom: {
                enabled: true
            },
            gallery: {
                enabled: true,
                preload: [1, 2],
                tPrev: 'Пердыдущая (клавиша влево)',
                tNext: 'Следующая (клавиша вправо)'
            },
            tLoading: 'Загрузка...'
        });
    }

    if ($('.popup-product').length){
        $('.popup-product').magnificPopup({
            type: 'image',
            zoom: {
                enabled: true
            },
            tLoading: 'Загрузка...'
        });
    }

    // Проверяем не установлен ли Вид гарнитуры, если да то отображем нужную картинку, если нет то выбираем первую
    if ($('input[name=furniture_type]:checked').length){
        $('#furnitureTypeImage').html('<img src="/img/'+$('input[name=furniture_type]:checked').data('img')+'">');
    }
    else if ($('input[name=furniture_type]').length){
        $('input[name=furniture_type]')[0].checked = true;
        changeFurnitureType($('input[name=furniture_type]')[0]);
    }

});

function changeFurnitureType(element)
{
    $('#furnitureTypeImage').html('<img src="/img/'+$(element).data('img')+'">');
}

function ajaxFormSubmit(e, successFunction)
{
    e.preventDefault();

    var form = e.target;

    // Место для отображения ошибок в форме
    var formStatus = $(form).find('.form-status');
    if (formStatus.length) formStatus.html('');

    // Анимированная кнопка при отправки формы
    var formButton = $(form).find('.form-button');
    if (formButton.length)
    {
        formButton.append(' <i class="fa fa-spinner fa-spin"></i>');
        formButton.prop('disabled', true);
    }

    $.ajax({
        method: $(form).attr('method'),
        url: $(form).attr('action'),
        data: $(form).serialize(),
        dataType: 'json',
        success: function (data)
        {
            successFunction(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (formStatus.length && jqXHR.status == 422) // Если статус 422 (неправильные входные данные) то отображаем ошибки
            {
                var formStatusText = "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><div class='text-uppercase'>" + (formStatus.data('errorText') ? formStatus.data('errorText') : 'Ошибка!') + "</div><ul>";

                $.each(jqXHR.responseJSON, function (index, value) {
                    formStatusText += "<li>" + value + "</li>";
                });

                formStatusText += "</ul></div>";
                formStatus.html(formStatusText);
                $('body').scrollTo(formStatus, 500);
            }
            else
            {
                sweetAlert("", "Ошибка при запросе к серсеру", 'error');
            }
        },
        complete: function (jqXHR, textStatus)
        {
            if (formButton.length)
            {
                formButton.find('i').remove();
                formButton.prop('disabled', false);
            }
        }
    });
}

function requestDesignSuccess(data)
{
    $('#requestDesignModal').modal('hide');
    showNoty(data.message, 'success');
}

function callbackSuccess(data)
{
    $('#callbackModal').modal('hide');
    showNoty(data.message, 'success');
}

function showNoty(message, type)
{
    noty({
        text: message,
        type: type,
        layout: 'topCenter',
        theme: 'relax',
        timeout: 5000,
        animation: {
            open: 'animated flipInX', // jQuery animate function property object
            close: 'animated flipOutX', // jQuery animate function property object
            easing: 'swing', // easing
            speed: 500 // opening & closing animation speed
        }
    });
}