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
                '<tbody><tr><td>Total KM :</td> <td>8</td> <td>Total Amount :</td> <td>145</td> <td>Minimum Amount:</td> <td>0</td> </tr><tr><td>Waiting Hours :</td> <td>0</td> <td>Waiting Charge :</td> <td>-</td> <td></td> <td></td> </tr><tr><td>Booking Schedule :</td> <td>later</td> <td>Booked By :</td> <td>Admin.</td> <td>Booked Time :</td> <td>17/09 08:45 PM</td> </tr><tr><td>Assigned Time :</td> <td>17/09 08:45 PM</td> <td>Assigned By :</td> <td>Admin.</td> <td></td> <td></td> </tr><tr><td>Allotted By :</td> <td>-</td> <td>Allotted Time :</td> <td>-</td> <td>Accepted Time :</td> <td>17/09 09:08 PM</td> </tr><tr><td>Closed By :</td> <td>408 Nagaraj 9047626564</td> <td>Closed Time :</td> <td>17/09 09:43 PM</td> <td></td> <td></td> </tr><tr><td>No of Passengers :</td> <td>2</td> <td>Requested Pickup Time :</td> <td>17/09 09:15 PM</td> <td>Vehicle Model :</td><td>Maruti Ritz</td> </tr><tr><td>Starting KM :</td> <td>114206</td><td>Ending KM :</td> <td>114214</td> <td> IMEI :</td><td>869124026460996</td> </tr><tr><td class="width-60">Starting Time :</td> <td>17/09 09:27 PM</td><td>Ending Time: </td> <td>17/09 09:43 PM</td> <td>Empty Km</td><td>5</td></tr><tr><td>Total Payable Time :</td><td>0</td>  <td>Paid Amount :</td><td>145</td><td>Tariff Type : </td><td> Oto </td></tr><tr><td>Discount Amount :</td><td>0</td><td> Followup Mobile :</td><td>9597667101</td><td> Remarks :</td><td></td></tr><tr><td>Is VIP :</td><td> - </td><td>Customer Type : </td><td>Silver</td> <td>Address : </td><td>vadavalli</td></tr></tbody>' +
                '</table>';
            return opt;
        }



        var table = "";
        table = $('#table').DataTable({
            "scrollX"     : true,
            "ajax"        : "assets/php/Data/booking",
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