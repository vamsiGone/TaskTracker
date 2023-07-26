"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        $('#table').DataTable();
    },
};
window.addEventListener('load', function () {
    app.main();
});