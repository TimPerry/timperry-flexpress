window.console&&console.log||function(){for(var n=function(){},i=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","markTimeline","table","time","timeEnd","timeStamp","trace","warn"],e=i.length,o=window.console={};e--;)o[i[e]]=n}(),function(n){function i(n){var i=n.attr("placeholder");""===n.val()&&n.val(i),n.bind({focus:function(){n.val()===i&&n.val("")},blur:function(){""===n.val()&&n.val(i)}})}function e(i){i.find(":input[placeholder]").each(function(){var i=n(this);i.val()===i.attr("placeholder")&&i.val("")})}"placeholder"in document.createElement("input")||n(document).ready(function(){n(":input[placeholder]").each(function(){i(n(this))}),n("form").submit(function(){e(n(this))})})}(jQuery);var ui={init:function(){this.toggle_menu.apply(this)},toggle_menu:function(){var n=$(".action-icon"),i=$(".sidebar"),e="sidebar--minimised";n.parent("a").click(function(n){n.preventDefault(),i.hasClass(e)?i.removeClass(e):i.addClass(e)})}};ui!==void 0&&ui.init.apply(ui);