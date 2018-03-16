(function($, undefined){
    $('h5.section-header').bind('click', function() {
        const upIcon = 'fa-angle-double-up';
        const downIcon = 'fa-angle-double-down';

        var $header = $(this);
        var $section = $header.siblings('table.table');
        var $expander = $header.find('.section-expander');
        var isExpanded = $header.attr('aria-expanded');

        if (isExpanded === 'true') {
            $header.attr('aria-expanded', 'false');
            $expander.removeClass(upIcon).addClass(downIcon);
        } else {
            $header.attr('aria-expanded', 'true');
            $expander.removeClass(downIcon).addClass(upIcon);
        }

        $section.fadeToggle(500);
    });

    $('')
})(jQuery);