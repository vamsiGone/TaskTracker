"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        $('#cp2').colorpicker();
    },
};
window.addEventListener('load', function () {
    app.main();
});