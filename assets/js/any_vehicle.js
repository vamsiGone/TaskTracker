"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        $('#model_list').bootstrapDualListbox();
    },
};
window.addEventListener('load', function () {
    app.main();
});