"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {

        var table1 = "";
        table1 = $('#table').DataTable({
            "paging"    : false,
            "ajax"        : "assets/php/Data/unlock",
            "columnDefs"  : [{
                "render" : function (data, type, row) {
                    return '<a href="javascript:void(0)" class="label label-primary">Unblock</a>';
                },
                "targets": 3
            }],
            "columns"     : [
                {"data": null},
                {"data": "vid"},
                {"data": "cc"},
                {"data": null}
            ],
            "order"       : [ [ 2, 'desc' ] ],
            "initComplete": function (settings, json) {

            },
        });

        table1.on('order.dt search.dt', function () {
            table1.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();


        var table = "";
        table = $('#table1').DataTable({
            "paging"    : false,
            "ajax"        : "assets/php/Data/lock",
            "columnDefs"  : [{
                "render" : function (data, type, row) {
                    return '<a href="javascript:void(0)" class="label label-danger">Block</a>';
                },
                "targets": 3
            }],
            "columns"     : [
                {"data": null},
                {"data": "vid"},
                {"data": "cc"},
                {"data": null},
            ],
            "order"       : [ [ 2, 'desc' ] ],
            "initComplete": function (settings, json) {

            },
        });

        table.on('order.dt search.dt', function () {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    },
};
window.addEventListener('load', function () {
    app.main();
});