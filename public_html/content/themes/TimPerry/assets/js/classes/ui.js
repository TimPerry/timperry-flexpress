var ui = {

    init: function () {

        this.toggle_menu.apply(this)

    },
    toggle_menu: function () {

        var $action_icon = $(".action-icon"),
            $sidebar = $(".sidebar"),
            sidebar_minimised_class = "sidebar--minimised";

        $action_icon.click(function () {

            if ($sidebar.hasClass(sidebar_minimised_class)) {

                $sidebar.removeClass(sidebar_minimised_class);

            } else {

                $sidebar.addClass(sidebar_minimised_class);

            }

        });

    }

};