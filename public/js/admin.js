// Устанавливаем заголовок для все Ajax запросов
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    // Применяем плагин tablesorter к таблице элементов
    if ($('#table_items').length) {

        // Установка стилей к плагину tablesorter
        $.tablesorter.themes.material = {
            iconSortAsc: 'material-icons arrow_drop_up', // class name added to icon when column has ascending sort
            iconSortDesc: 'material-icons arrow_drop_down' // class name added to icon when column has descending sort
        };

        $('#table_items').tablesorter({
            theme: "material",
            sortReset: true,
            sortRestart: true,
            widthFixed: true,
            headerTemplate: '{content} {icon}',
            widgets: ["uitheme", "filter", "pager", "zebra", "stickyHeaders"],
            widgetOptions: {
                // filter
                filter_cssFilter: 'filter-input',
                filter_searchDelay: 0,
                filter_hideFilters: true,

                // zebra
                zebra: ["even", "odd"]
            }
        }).tablesorterPager({ // Настройка вывода pager
            container: $(".pager"),
            output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'
        }).bind('pagerComplete', function (e, c) { // Обновляем все элементы select после того как меняется pager
            $('#table_items select').material_select();
        });

    }

    // Применять плагин datetime к полям типа дата
    if ($('.input-datetime').length) {

        $.datetimepicker.setLocale('ru');
        $('.input-datetime input').datetimepicker({
            format: 'Y-m-d H:i:s',
            dayOfWeekStart: 1
        });

    }

    // Применять плагин flora editor к html полям
    if ($('.input-html').length) {

        $('.input-html textarea').each(function(){
            CKEDITOR.replace( this );
        });

    }

    // Применяем стили material ко всем элементам select
    if ($('#app select').length) {

        $('#app select').material_select();

    }

});

// Функция подтверждения удаления элемента
function confirmDelete(element, id, url)
{
    sweetAlert({
        title: 'Удаление',
        text: 'Вы действительно хотите удалить запись #' + id + '?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: "Отмена",
        confirmButtonColor: '#D32F2F',
        confirmButtonText: 'Да, удалить!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    }, function(){
        if (!url) {
            url = window.location.href + '/' + id;
        }
        $.post(url, { '_method': 'DELETE' }, function(data){
            sweetAlert.close();
            var row = $(element).closest('#table_items tr');
            if (row.length) {
                row.remove();
                $("#table_items").trigger("update");
            }
        })
        .fail(function(){
            sweetAlert("", "Ошибка при запросе к серсеру", 'error');
        })
        .always(function(){

        });
    });
}