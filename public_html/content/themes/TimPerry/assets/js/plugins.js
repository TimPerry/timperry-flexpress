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
