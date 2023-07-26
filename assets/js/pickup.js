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

        function format(d) {
            // `d` is the original data object for the row
            var opt = "";
            opt += '<table class="table table-condensed m-t-15">\n' +
                '                                <tbody>\n' +
                '                                <tr>\n' +
                '                                    <td>Unique ID</td>\n' +
                '                                    <td class="f-w-700">' + d[ "Unique ID" ] + '</td>\n' +
                '                                    <td>SMS status</td>\n' +
                '                                    <td>: ' + d[ "SMS status" ] + '</td>\n' +
                '                                    <td></td>\n' +
                '                                    <td></td>\n' +
                '                                </tr>\n' +
                '                                <tr>\n' +
                '                                    <td data-original-title="" title="">Own Trip</td>\n' +
                '                                    <td>: <a href="#" class="select_own" data-type="select" data-title="Select Preferred Model">' + d[ "Own Trip" ] + '</a>' +
                '                                    </td>\n' +
                '                                    <td>Landmark</td>\n' +
                '                                    <td>: ' + d[ "Landmark" ] + '</td>\n' +
                '                                    <td></td>\n' +
                '                                    <td></td>\n' +
                '                                </tr>\n' +
                '                                <tr>\n' +
                '                                    <td data-original-title="" title="">PNR</td>\n' +
                '                                    <td>: ' + d[ "PNR" ] + '</td>\n' +
                '                                    <td>Customer Address</td>\n' +
                '                                    <td>: ' + d[ "Customer Address" ] + '</td>\n' +
                '                                    <td>Via</td>\n' +
                '                                    <td>: ' + d[ "Via" ] + '</td>\n' +
                '                                </tr>\n' +
                '                                <tr>\n' +
                '                                    <td>Mobile No</td>\n' +
                '                                    <td>: ' + d[ "Mobile No" ] + '</td>\n' +
                '                                    <td>Landline No</td>\n' +
                '                                    <td>: ' + d[ "Landline No" ] + '</td>\n' +
                '                                    <td>Remark</td>\n' +
                '                                    <td>: ' + d[ "Remark" ] + '</td>\n' +
                '                                </tr>\n' +
                '                                <tr>\n' +
                '                                    <td>Booked By</td>\n' +
                '                                    <td>: ' + d[ "Booked By" ] + '</td>\n' +
                '                                    <td>No of Passengers</td>\n' +
                '                                    <td>: ' + d[ "No of Passengers" ] + '</td>\n' +
                '                                    <td>OTP</td>\n' +
                '                                    <td>: ' + d[ "OTP" ] + '</td>\n' +
                '                                </tr>\n' +
                '                                <tr>\n' +
                '                                    <td>Is Round</td>\n' +
                '                                    <td>: ' + d[ "Is Round" ] + '</td>\n' +
                '                                    <td>Booking Time</td>\n' +
                '                                    <td>: ' + d[ "Booking Time" ] + '</td>\n' +
                '                                    <td>Assigned By</td>\n' +
                '                                    <td>: ' + d[ "Assigned By" ] + '</td>\n' +
                '                                </tr>\n' +
                '                                <tr>\n' +
                '                                    <td>Assigned Time</td>\n' +
                '                                    <td>: ' + d[ "Assigned Time" ] + '</td>\n' +
                '                                    <td></td>\n' +
                '                                    <td></td>\n' +
                '                                    <td></td>\n' +
                '                                    <td></td>\n' +
                '                                </tr>\n' +
                '                                </tbody>\n' +
                '                                <tfoot>\n' +
                '                                <tr>\n' +
                '                                    <th>Last Week Usage : ' + d[ "Last Week Usage" ] + '</th>\n' +
                '                                    <th>Last Month Usage : ' + d[ "Last Month Usage" ] + '</th>\n' +
                '                                    <th>Total Usage : ' + d[ "Total Usage" ] + '</th>\n' +
                '                                </tr>\n' +
                '                                </tfoot>\n' +
                '                            </table>';

            return opt;
        }

        function close_popover() {
            $(".actions").on("click", function () {
                $(".actions").not(this).popover('hide');
            });
        }

        function getContent(obj) {
            var ctype = $(obj).attr("data-type");
            if (ctype == "pickup") {
                var html = $("#" + ctype + "Content").html();
            }
            return html;
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
            "scrollX"       : true,
            "ajax"          : "assets/php_data/pickup.php",
            "fnDrawCallback": function () {

                $('.date_edit').editable({
                    format        : 'yyyy-mm-dd hh:ii',
                    viewformat    : 'dd/mm HH:ii p',
                    placement     : 'left',
                    emptytext     : 'Pickup time',
                    datetimepicker: {
                        format        : 'dd/mm/yyyy hh:ii',
                        autoclose     : true,
                        todayBtn      : true,
                        todayHighlight: 1,
                        showMeridian  : true
                    }
                });

                $('.places').editable({
                    source   : locations_list,
                    emptytext: 'Select Location',
                    select2  : {
                        placeholder: 'Select Place',
                        allowClear : true,
                        matcher    : function (params, data) {
                            if ($.trim(params.term) === '') {
                                return data;
                            }
                            if (data.text.toLowerCase().startsWith(params.term.toLowerCase())) {
                                var modifiedData = $.extend({}, data, true);
                                return modifiedData;
                            }
                            return null;
                        }
                    },
                    validate : function (value) {
                        if (value == "")
                            var opt = "This field is required.";
                        return opt;
                    }
                });

                $('.pref_mod_edit').editable({
                    source   : prefered_model_list,
                    emptytext: 'Vehicle Type',
                    select2  : {
                        placeholder: 'Select Prefered Model'
                    },
                    validate : function (value) {
                        if (value == "") return "This field is required.";
                    }
                });

                $('.contact_number').editable({
                    emptytext: 'Contact Number',
                    validate : function (value) {
                        if (value == "") return "This field is required.";
                    }
                });

                $(".actions").popover({
                    html     : true,
                    container: 'body',
                    trigger  : 'click',
                    placement: 'left',
                    content  : function () {
                        return getContent(this);
                    },
                });

                $(".actions").on('shown.bs.popover', function () {
                    $('.datetime_picker_bootstrap').datetimepicker({
                        todayBtn      : 1,
                        autoclose     : 1,
                        showMeridian  : true,
                        todayHighlight: 1,
                        format        : 'dd/mm/yyyy hh:ii',
                    });
                });

                close_popover();
            },
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
                        var type = $(this).attr('type');
                        if(type === 'text'){
                            var val = $(this).val();
                            table.column(col).search(val).draw();
                        }else{
                            var val = $(this).find(':selected').text();
                            if(val === 'Search '+$(this).prev().text()){
                                val = '';
                            }
                            table.column(col).search(val).draw();
                        }
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
                $($('.details-control')[ 2 ]).trigger('click');

                $(document).on("click", ".popover .close_popover", function () {
                    $(this).parents(".popover").popover('hide');
                    $(this).closest("td").find(".actions").trigger("click");
                });
            },
            "columnDefs"    : [
                {
                    "visible": true,
                    "targets": 2
                }, {
                    "render" : function (data, type, row) {
                        var title_close = '<a href="#" class="close_popover" data-dismiss="alert">x</a>';
                        return "<a href='javascript:void(0)' class='actions' disabled='true' data-type='pickup' title='Start the Trip " + title_close + " ' data-toggle='popover'>Start Trip</a>";
                    },
                    "targets": 10
                }, {
                    "render" : function (data, type, row) {
                        var title_close = '<a href="#" class="close_popover" data-dismiss="alert">x</a>';
                        return "<a href='javascript:void(0)' class='actions' disabled='true' data-type='pickup' title='Start the Trip " + title_close + " ' data-toggle='popover'>End Trip</a>";
                    },
                    "targets": 11
                } ],
            "columns"       : [
                {
                    "className"     : 'details-control',
                    "orderable"     : false,
                    "data"          : null,
                    "defaultContent": ''
                },

                {"data": null},
                {"data": "PNR"},
                {"data": "Name"},
                {"data": "From"},
                {"data": "To"},
                {"data": "Pickup Time"},
                {"data": "Exp Drop"},
                {"data": "Vid Type"},
                {"data": "Mobile No"},
                {"data": null},
                {"data": null},
                {"data": "Action"}
            ],
            "order"         : [ [ 1, 'asc' ] ]
        });

        table.on('order.dt search.dt', function () {
            table.column(1, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        // Add event listener for opening and closing details
        $('#table').on('click', 'td.details-control', function () {

            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
                $('.select_own').editable({
                    source: [
                        {value: 'yes', text: 'Yes'},
                        {value: 'no', text: 'No'},
                    ],
                });
            }
        });
    },
};
window.addEventListener('load', function () {
    app.main();
});