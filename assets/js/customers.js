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
            "ajax"        : "assets/php/Data/customers_report",
            "initComplete": function (settings, json) {

            },
            "columns"     : [
                {"data": null},
                {"data": 'pnr'},
                {"data": 'name'},
                {"data": 'vid'},
                {"data": 'from'},
                {"data": 'to'},
                {"data": 'date'},
                {"data": 'amount'}
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