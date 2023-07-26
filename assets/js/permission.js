"use strict";
var app = {
    main   : function () {
        "use strict";
        app.execute();
    },
    execute: function () {
        function check_or_uncheck(tsObj, onLoad) {
            var cked = $(tsObj).is(":checked");

            if (typeof($(tsObj).attr("data-pr_class")) != "undefined" && onLoad == false) {
                var cld = $(tsObj).attr("data-pr_class");
                $("." + cld).prop("checked", cked);
            }

            if (typeof($(tsObj).attr("class")) != "undefined") {
                var spl1 = $(tsObj).attr("class").split(" "),
                    mn_by = 0;

                $.each(spl1, function (k, v) {
                    mn_by = k != 0 ? 0 : 1;
                    if (cked == false || (($("." + v).length - mn_by) == $("." + v + ":checked").length)) $("[data-pr_class=" + v + "]").prop("checked", cked);
                });
            }
        }


        var i = 0;
        $.each($('input[type="checkbox"]:not([id])'), function (i, d) {
            $(d).attr('id', "cust_id" + i);
            $(d).next().attr('for', "cust_id" + i);
            i++;
        });

        $("body").on("click", "[type=checkbox]", function () {
            check_or_uncheck($(this), false);
        });

        $("[data-action=yes]").each(function () {
            check_or_uncheck($(this), true);
            check_or_uncheck($(this).closest("tr").find("[data-pr_class]"), true);
        });
    },
};
window.addEventListener('load', function () {
    app.main();
});