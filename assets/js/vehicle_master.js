"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {

        var table = "";
        table = $('#table').DataTable({
            "ajax"        : "assets/php/Data/vehicle_master",
            "columnDefs"  : [
                {
                    "render" : function (data, type, row) {
                        return '<a href="javascript:void(0)" class="label label-primary" data-placement="top" data-toggle="tooltip" title="Edit">View</a>' +
                            '<a href="javascript:void(0)" class="label label-warning m-l-5" data-placement="top" data-toggle="tooltip" title="Edit">Edit</a>';
                    },
                    "targets": 9
                },
                {
                    "render" : function (data, type, row) {
                        return '<span class="ttu">'+data.replace(/\s/g,'')+'</span>';
                    },
                    "targets": 3
                }],
            "columns"     : [
                {"data": null},
                {"data": "model"},
                {"data": "imei"},
                {"data": "reg"},
                {"data": "vech"},
                {"data": "km"},
                {"data": "driver"},
                {"data": "app"},
                {"data": "status"},
                {"data": null}
            ],
            "order"       : [ [ 0, 'asc' ] ],
            "initComplete": function (settings, json) {
                var fileName = 'add_'+location.pathname.split("/").slice(-1);
                $(settings.nTableWrapper).find('.row').first().find('#table_filter').append('<a href="'+fileName+'" class="btn btn-dark btn-sm m-l-10"><i class="ion-plus"></i> Add Vehicle</a>');
                var all_col = this;
                this.api().columns().every(function () {
                    var column = this;
                    var col = this;
                    if ($(col.footer()).hasClass('apply_select')) {
                        var select = $('<select class="form-control p-0 input-xs" style="padding: 5px; width:100%"><option value="">Select</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    }
                    if ($(col.footer()).hasClass('apply_clear')) {
                        var clear = '<a href="javascript:void(0)" class="label label-danger">Clear Filter</a>';
                        $(column.footer()).html(clear).on('click', function () {
                            all_col.api().columns().every(function (i, d) {
                                var column = this;
                                $(column.footer()).find('input, select').val('');
                                column.search('').draw();
                            })

                        })
                    }
                });
            },
        });

        table.on('order.dt search.dt', function () {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        table.columns().every(function (i, d) {
            var col = this;
            if ($(col.footer()).hasClass('apply_search')) {
                var title = $(col.footer()).text();
                $(col.footer()).html('<input class="form-control input-xs" style="padding: 5px; width:100%" type="text" placeholder="Search ' + title + '" />');
            }
        });
        table.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    },
};
window.addEventListener('load', function () {
    app.main();
});