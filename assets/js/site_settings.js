"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        var table = "";
        var sources = [];
        for (var prop in properties) {
            if (properties[prop]['type'] == "select") {
                var value = properties[prop]['values'];
                sources[prop] = value;
            }
        }

        table = $('#table').DataTable({
            "ajax": {
                "url": "assets/php_data/settings.txt",
                "dataSrc": ""
            },
            "fnDrawCallback": function () {
                for (prop in properties) {
                    $('.' + prop).editable({
                        source: sources[prop]
                    });
                }
            },
            "columns": [
                {"data": "SNo"},
                {"data": "Property"},
                {"data": "Property Value"}
            ],
            "order": [[0, 'asc']]
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