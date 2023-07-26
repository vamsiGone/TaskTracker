"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        var table = "";
        table = $('#loggedout').DataTable({
            "dom":"mf",
            "ajax"   : {
                "url"    : "assets/php_data/logged_out.txt",
                "dataSrc": ""
            },
            "columns": [
                {"data": 'vehicle_no'},
                {"data": "current_place"}
            ],
            "order"  : [ [ 0, 'asc' ] ],
        });

        table = $('#loggedin').DataTable({
            "dom":"mf",
            "ajax"   : {
                "url"    : "assets/php_data/logged_in.txt",
                "dataSrc": ""
            },
            "columns": [
                {"data": 'vehicle_no'},
                {"data": "current_place"}
            ],
            "order"  : [ [ 1, 'asc' ] ],
        });
    },
};
window.addEventListener('load', function () {
    app.main();
});