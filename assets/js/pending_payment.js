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
            "ajax"        : "assets/php/Data/pending_payment",
            "columnDefs"  : [
            ],
            "columns"     : [
                {"data": null},
                {"data": "vid"},
                {"data": "cc"}
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