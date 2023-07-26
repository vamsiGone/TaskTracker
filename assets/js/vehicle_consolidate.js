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
            "ajax"        : "assets/php/Data/vehicle_consolidate",
            "columnDefs": [{
                className: "text-right",
                "targets": [10,11,12]
            }],
            "columns"     : [
                {"data": null},
                {"data": "vid"},
                {"data": "noofdays"},
                {"data": "trips"},
                {"data": "runkm"},
                {"data": "emptykm"},
                {"data": "runtime"},
                {"data": "idle"},
                {"data": "APRK1"},
                {"data": "APRK2"},
                {"data": "avgcollperday"},
                {"data": "coll"},
                {"data": "cccharge"}
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