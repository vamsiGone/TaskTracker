"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {

        var table = "";
        table = $('#table').DataTable({
            "scrollX"     : true,
            "ajax"        : "assets/php/Data/tariff",
            "initComplete": function (settings, json) {

            },
            "columnDefs"  : [
                {
                    "render" : function (data, type, row) {
                        return '<a href="javascript:void(0)" class="label label-primary">Edit</a>';
                    },
                    "targets": 8
                }
            ],
            "columns"     : [
                {"data": null},
                {"data": 'cat'},
                {"data": 'tt'},
                {"data": 'minkm'},
                {"data": 'minc'},
                {"data": 'exkm'},
                {"data": 'nc'},
                {"data": 'status'},
                {"data": null}
            ],
            "order"       : [ [ 0, 'asc' ] ]
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