$(document).ready(function () {
    $('#jstree').jstree({
        'core' : {
            'data': {
                'url': function () {
                    return '/admin/categories?json=true';
                },
                'data': function (node) {
                    return {'id': node.id};
                }
            },
            'check_callback' : true
        }
    })
    .on('select_node.jstree', function (node, selected, e) {
        console.log(selected.node);
    })
    .on('create_node.jstree', function (node, parent, position) {
        console.log('create_node');
    });

    $('#tree-add').on('click', function() {
        $('#jstree').jstree(true).create_node('1', "Just added!");
    });
});