"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        var table = "";
        table = $('#table').DataTable({
            "fnDrawCallback": function () {

                $('.text_edit').editable({
                    success : function (response, newValue) {
                    },
                    validate: function (value) {
                        if ($.trim(value) == '') {
                            return 'This field is required';
                        }
                    }
                });

                $('[data-type="text"]').editable({
                    validate: function (value) {
                        if ($.trim(value) == '') {
                            return 'This field is required';
                        }
                    }
                });

                $('[data-collection-type]').editable({
                    source : collection_type,
                    success: function (response, newValue) {

                    }
                });

                $('[data-collection-based-on]').editable({
                    source: collection_based_on,
                });

                $('[data-payment-type]').editable({
                    source: payment_type,
                });

                $('[data-payment-by]').editable({
                    source: payment_by,
                });
            },
            "order"         : [ [ 0, 'asc' ] ]
        });
    },
};
window.addEventListener('load', function () {
    app.main();
});