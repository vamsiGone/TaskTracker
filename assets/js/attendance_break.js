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
            "bPaginate"     : false,
            "ajax"          : {
                "url"    : "assets/php_data/attendance_break.txt",
                "dataSrc": ""
            },
            "fnDrawCallback": function () {

            },
            "columnDefs"    : [
                {
                    "render" : function (data, type, row) {
                        if (data && data != "" && data != null && data != 'null') {
                            var res = data.split("");
                            res = res[ 0 ] + res[ 1 ] + res[ 2 ].replace(/[0-9]/g, "xxxxxx") + res[ 8 ] + res[ 9 ];
                        }
                        return res;
                    },
                    "targets": 3
                }, {
                    "render" : function (data, type, row) {
                        return '0';
                    },
                    "targets": 5
                }, {
                    "render" : function (data, type, row) {
                        if (data.running_status != 'leave' && data.running_status != "break_down") {
                            return 'Yes'
                        } else {
                            return 'No'
                        }
                    },
                    "targets": 6
                }, {
                    "render" : function (data, type, row) {
                        if (data.running_status == "break") {
                            return '<a href="javascript:void(0)" class="label label-inverse">Break Out</a>'
                        } else if (data.running_status == "break_down") {
                            return '<a href="javascript:void(0)" class="label label-warning">Leave</a>'
                        } else if (data.running_status == "assigned") {
                            return '<a href="javascript:void(0)" class="label label-danger">Cancel</a>'
                        } else if (data.running_status == "free") {
                            return '<a href="javascript:void(0)" class="label label-warning">logout</a>'
                        } else if (data.running_status == "running") {
                            return '<a href="javascript:void(0)" class="label label-inverse">End Trip</a>'
                        } else if (data.running_status == "leave") {
                            return '<a href="javascript:void(0)" class="label label-info">Login</a>\n' +
                                '<a href="javascript:void(0)" class="label label-primary m-t-5">Pending</a>'
                        } else {
                            return 'no'
                        }
                    },
                    "targets": 11
                } ],
            "columns"       : [
                {"data": null},
                {"data": "us.display_name", className: "ttc"},
                {"data": "vehicle_no", className: "ttc"},
                {"data": "us.primary_mobile", className: "ttc"},
                {"data": "bk.from_time", className: "ttc"},
                {"data": null, className: "ttc"},
                {"data": null, className: "ttc"},
                {"data": "vt.expected_logout", className: "ttc"},
                {"data": "login_hours", className: "ttc"},
                {"data": "smt.total_amount", className: "ttc"},
                {"data": "running_status", className: "ttc"},
                {"data": null, className: "ttc"},

            ],
            "order"         : [ [ 6, 'desc' ] ]
        });

        table.on('order.dt search.dt', function () {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        table.columns([ 7, 4, 5 ]).visible(false);
    },
};
window.addEventListener('load', function () {
    app.main();
});