"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        function format(d) {
            // `d` is the original data object for the row
            var opt = "";
            opt += '' +
                '<table class="table table-condensed m-t-15">' +
                '<tbody><tr><td>Booking Schedule :</td> <td>regular</td> <td>Booked By :</td> <td>Superadmin</td> <td>Booked Time :</td> <td>17/09 06:00 AM</td> </tr><tr><td>Assigned Time :</td> <td>17/09 09:23 PM</td> <td>Assigned By :</td> <td>Admin.</td> <td></td> <td></td> </tr><tr><td>Cancelled Time :</td> <td>2018-09-17 21:45:19</td> <td>Cancelled By :</td> <td>Arumugam</td> <td></td></tr><tr><td>No of Passengers :</td> <td>1</td> <td>Requested Pickup Time :</td> <td>17/09 09:35 PM</td> <td>Vehicle Model :</td><td>Dzire AC</td> </tr><tr><td>Starting KM :</td> <td> - </td><td>Ending KM :</td> <td> - </td> <td> IMEI :</td><td>353241090040513</td> </tr><tr><td class="width-60">Starting Time :</td> <td></td><td>Ending Time: </td> <td></td> <td>Empty Km</td><td> - </td></tr><tr><td>Total Payable Time :</td><td> - </td>  <td>Paid Amount :</td><td>0</td><td>Tariff Type : </td><td> Oto </td></tr><tr><td>Discount Amount :</td><td> - </td><td> Followup Mobile :</td><td>9944455662</td><td> Remarks :</td><td> - </td></tr><tr><td>Is VIP :</td><td> - </td><td>Customer Type : </td><td>Platinum</td> <td>Address : </td><td>hopes doctor diabitician in kmch</td></tr></tbody>' +
                '</table>';

            return opt;
        }


        var table = "";
        table = $('#table').DataTable({
            "scrollX"     : true,
            "ajax"        : "assets/php/Data/cancelled_booking",
            "initComplete": function (settings, json) {
//                $($('.details-control')[ 2 ]).trigger('click');
            },
            "columns"     : [
                {
                    "className"     : 'details-control',
                    "orderable"     : false,
                    "data"          : null,
                    "defaultContent": ''
                },
                {"data": 'name'},
                {"data": 'number'},
                {"data": 'pnr'},
                {"data": 'taxino'},
                {"data": 'driver'},
                {"data": 'from'},
                {"data": 'to'},
                {"data": 'model'},
                {"data": 'bookingtype'},
                {"data": 'total'},
                {"data": 'bookedby'},
                {"data": 'assignedby'},
                {"data": 'closedby'},
                {"data": 'paymode'}
            ],
            "order"       : [ [ 0, 'asc' ] ]
        });


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