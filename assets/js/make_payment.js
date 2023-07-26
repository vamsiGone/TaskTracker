"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        $('#table').DataTable({
            "order"       : [ [ 0, 'desc' ] ],
        });
    },
};
window.addEventListener('load', function () {
    app.main();
});