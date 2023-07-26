"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        var table = "";
        table = $('#table').DataTable({
            "scrollX"       : true,
            "ajax"        : "assets/php/Data/payment_list",
            "columnDefs"  : [
            ],
            "columns"     : [
                {"data": null},
                {"data": "uid"},
                {"data": "vid"},
                {"data": "owner"},
                {"data": "prev"},
                {"data": "tobepaid"},
                {"data": "received"},
                {"data": "bal"},
                {"data": "recdate"},
                {"data": "driver"},
                {"data": "modal"},
                {"data": "recby"}
            ],
            "order"       : [ [ 0, 'asc' ] ],
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