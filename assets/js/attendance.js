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
            "bPaginate"   : false,
            "ajax"        : "assets/php/Data/attendance_report",
            "initComplete": function (settings, json) {

            },
            "columns"     : [
                {"data": null},
                {"data": 'vid'},
                {"data": 'paymenttype'},
                {"data": 'driver'},
                {"data": 'schedule'},
                {"data": 'starttime'},
                {"data": 'startkm'},
                {"data": 'startloc'},
                {"data": 'currlocation'},
                {"data": 'currkm'},
                {"data": 'nofotrips'},
                {"data": 'coll'},
                {"data": 'cccharge'},
                {"data": 'ccpending'}
            ],
            "order"       : [ [ 0, 'asc' ] ]
        });

        table.on('order.dt search.dt', function () {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        table.columns( [3,4,5,6,7,8,9] ).visible( false );
    },
};
window.addEventListener('load', function () {
    app.main();
});