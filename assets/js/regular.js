"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        function insertInput(label, col) {
            var inp = '<div class="col-sm-3">' +
                '<div class="form-group">' +
                '<label class="control-label required">' + label + '</label>' +
                '<input type="text" data-column="' + col + '" class="form-control">' +
                '</div>' +
                '</div>';
            return inp;
        }

        function insertSelect(label, col) {
            var inp = '<div class="col-sm-3">' +
                '<div class="form-group">' +
                '<label class="control-label required">' + label + '</label>' +
                '<select data-column="' + col + '" class="form-control select_2">' +
                '<option value="" selected>Search ' + label + '</option>' +
                '</select>' +
                '</div>' +
                '</div>';
            return inp;
        }

        function insertClear(label, close) {
            var inp = '<div class="col-sm-12">' +
                '                                    <div class="form-group">'
            if (label != null) {
                inp += '<label class="control-label w-in-100">' + label + '</label>'
            } else {
                inp += '<label class="control-label w-in-100 hide">Clear</label>'
            }
            inp += '<button type="button" id="clear_filter" class="btn btn-dark">'
            if (label != null) {
                inp += '' + label + ''
            } else {
                inp += 'Clear'
            }
            inp += '</button><button type="button" id="close_filter" class="btn btn-warning m-l-10">Close</button>' +
                '</div>' +
                '</div>';
            return inp;
        }


        $(document).on('preInit.dt', function (e, settings) {
            $.each($(settings.nTHead).find('tr th'), function (i, d) {
                var text = $(d).text().trim();
                if ($(d).hasClass('apply_search')) {
                    $('#append_col').append(insertInput(text, i))
                }
            });
            App.searchInit();
        });
        var table = "";
        table = $('#table').DataTable({
            "scrollX"   : true,
            "ajax"      : "assets/php/Data/regular",
            "columnDefs": [
                {
                    "render" : function (data, type, row) {
                        return '<a href="javascript:void(0)" class="label label-primary" data-placement="top" data-toggle="tooltip" title="Edit">View</a>' +
                            '<a href="javascript:void(0)" class="label label-warning m-l-5" data-placement="top" data-toggle="tooltip" title="Edit">Edit</a>';
                    },
                    "targets": 9
                } ],
            "columns"   : [
                {"data": "SNo"},
                {"data": "CustomerName"},
                {"data": "MobileNumber"},
                {"data": "FromLocation"},
                {"data": "ToLocation"},
                {"data": "StartDate"},
                {"data": "PickupTime"},
                {"data": "Status"},
                {"data": "Status1"},
                {"data": null}
            ],
            "order"     : [ [ 0, 'asc' ] ],
            "initComplete": function (settings, json) {
                $(settings.nTableWrapper).find('.row').first().find('#table_filter').append('<a href="javascript:void(0)" id="show_multiple_filter" class="btn btn-dark btn-sm m-l-10"><i class="fa fa-filter"></i> Multiple Filter</a>');
                this.api().columns().every(function () {
                    var column = this;
                    var col = this;
                    if ($(col.header()).hasClass('apply_select')) {
                        column.unique().sort().each(function (d, j) {
                            $('#append_col').append(insertSelect($(col.header()).text(), d))
                            column.data().unique().sort().each(function (dd, jj) {
                                $('[data-column="' + d + '"]').append('<option value="' + dd + '">' + dd + '</option>');
                            });
                        });
                    }
                });

                $("#append_col [data-column]").each(function (i, d) {
                    $(d).on('keyup change', function () {
                        var col = $(this).data('column');
                        var val = $(this).val();
                        table.column(col).search(val).draw();
                    });
                });

                App.plugin();
                App.inputSelect();
                $('#append_col').append(insertClear(null,'null'));
                $('#clear_filter').on('click', function () {
                    $('#append_col').find('input, select').val('');
                    $("#append_col .select_2").select2("destroy").select2();
                    table.search('').columns().search('').draw();
                });
                $('#show_multiple_filter, #close_filter').on('click', function () {
                    if(!$("#show_multiple_filter_div").is(":visible")){
                        $('#show_multiple_filter_div').slideDown("slow");
                        App.plugin();
                    }else{
                        $('#show_multiple_filter_div').slideUp("slow");
                    }
                });
            },
        });
    },
};
window.addEventListener('load', function () {
    app.main();
});