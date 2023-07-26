"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        var select_mobile = [{"text":"86xxxxxx67","id":"867"},{"text":"70xxxxxx66","id":"706"},{"text":"81xxxxxx00","id":"810"},{"text":"96xxxxxx30","id":"960"},{"text":"98xxxxxx86","id":"986"},{"text":"95xxxxxx87","id":"957"},{"text":"99xxxxxx57","id":"997"},{"text":"94xxxxxx00","id":"940"},{"text":"99xxxxxx19","id":"999"},{"text":"99xxxxxx05","id":"995"},{"text":"99xxxxxx14","id":"994"},{"text":"77xxxxxx42","id":"772"},{"text":"82xxxxxx67","id":"827"},{"text":"97xxxxxx75","id":"975"},{"text":"93xxxxxx17","id":"937"},{"text":"96xxxxxx85","id":"965"},{"text":"96xxxxxx56","id":"966"},{"text":"95xxxxxx17","id":"957"},{"text":"97xxxxxx31","id":"971"},{"text":"93xxxxxx08","id":"938"},{"text":"98xxxxxx11","id":"981"},{"text":"99xxxxxx55","id":"995"},{"text":"77xxxxxx47","id":"777"},{"text":"82xxxxxx69","id":"829"},{"text":"84xxxxxx87","id":"847"},{"text":"80xxxxxx33","id":"803"},{"text":"84xxxxxx37","id":"847"},{"text":"77xxxxxx99","id":"779"},{"text":"95xxxxxx75","id":"955"},{"text":"99xxxxxx77","id":"997"},{"text":"80xxxxxx02","id":"802"},{"text":"97xxxxxx91","id":"971"},{"text":"75xxxxxx30","id":"750"},{"text":"81xxxxxx62","id":"812"},{"text":"90xxxxxx04","id":"904"},{"text":"73xxxxxx03","id":"733"},{"text":"95xxxxxx46","id":"956"},{"text":"97xxxxxx98","id":"978"},{"text":"95xxxxxx75","id":"955"},{"text":"80xxxxxx29","id":"809"},{"text":"94xxxxxx12","id":"942"},{"text":"90xxxxxx64","id":"904"},{"text":"78xxxxxx03","id":"783"},{"text":"95xxxxxx80","id":"950"}];
        $(".select_mobile").select2({
            data: select_mobile
        });
    },
};
window.addEventListener('load', function () {
    app.main();
});