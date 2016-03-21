$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    // Применять плагин tablesorter к таблицам
    $.tablesorter.themes.material = {
        iconSortAsc  : 'material-icons arrow_drop_up', // class name added to icon when column has ascending sort
        iconSortDesc : 'material-icons arrow_drop_down' // class name added to icon when column has descending sort
    };

    $('#table_items').tablesorter({
        theme          : "material",
        sortReset      : true,
        sortRestart    : true,
        widthFixed     : true,
        headerTemplate : '{content} {icon}',
        widgets        : [ "uitheme", "filter", "pager", "zebra", "stickyHeaders" ],
        widgetOptions: {
            // filter
            filter_cssFilter   : 'filter-input',
            filter_searchDelay : 0,
            filter_hideFilters : true,

            // zebra
            zebra : ["even", "odd"]
        }
    }).tablesorterPager({
        container: $(".pager"),
        output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'
    }).bind('pagerComplete', function(e, c){ // Обновляем все элементы select после того как меняется pager
        $('#table_items select').material_select();
    });

    $('select').material_select();

});