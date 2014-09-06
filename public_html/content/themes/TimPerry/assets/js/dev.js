/*
 * Avoid `console` errors in browsers that lack a console.
 */
if (!(window.console && console.log)) {
    (function () {
        var e = function () {
        };
        var t = ["assert", "clear", "count", "debug", "dir", "dirxml", "error", "exception", "group", "groupCollapsed", "groupEnd", "info", "log", "markTimeline", "profile", "profileEnd", "markTimeline", "table", "time", "timeEnd", "timeStamp", "trace", "warn"];
        var n = t.length;
        var r = window.console = {};
        while (n--) {
            r[t[n]] = e
        }
    })()
}

/*
 * Spoofs HTML5 Placeholders
 * Author: Dan Bentley (github.com/danbentley)
 */
(function ($) {
    if ("placeholder"in document.createElement("input"))return;
    $(document).ready(function () {
        $(':input[placeholder]').each(function () {
            setupPlaceholder($(this));
        });
        $('form').submit(function (e) {
            clearPlaceholdersBeforeSubmit($(this));
        });
    });
    function setupPlaceholder(input) {
        var placeholderText = input.attr('placeholder');
        if (input.val() === '')input.val(placeholderText);
        input.bind({focus: function (e) {
            if (input.val() === placeholderText)input.val('');
        }, blur: function (e) {
            if (input.val() === '')input.val(placeholderText);
        }});
    }

    function clearPlaceholdersBeforeSubmit(form) {
        form.find(':input[placeholder]').each(function () {
            var el = $(this);
            if (el.val() === el.attr('placeholder'))el.val('');
        });
    }
})(jQuery);
var ui = {

    init: function () {

        this.toggle_menu.apply(this)

    },
    toggle_menu: function () {

        var $action_icon = $(".action-icon"),
            $sidebar = $(".sidebar"),
            sidebar_minimised_class = "sidebar--minimised";

        $action_icon.parent("a").click(function (e) {

            e.preventDefault();

            if ($sidebar.hasClass(sidebar_minimised_class)) {

                $sidebar.removeClass(sidebar_minimised_class);

            } else {

                $sidebar.addClass(sidebar_minimised_class);

            }

        });

    }

};// UI
if( typeof ui != "undefined") {
    ui.init.apply(ui);
}