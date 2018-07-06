(function($, undefined){
    $('h5.section-header').bind('click', function() {
        const upIcon = 'fa-angle-double-up';
        const downIcon = 'fa-angle-double-down';

        let $header = $(this);
        let $section = $header.siblings('table.table');
        let $expander = $header.find('.section-expander');
        let isExpanded = $header.attr('aria-expanded');

        if (isExpanded === 'true') {
            $header.attr('aria-expanded', 'false');
            $expander.removeClass(upIcon).addClass(downIcon);
        } else {
            $header.attr('aria-expanded', 'true');
            $expander.removeClass(downIcon).addClass(upIcon);
        }

        $section.fadeToggle(500);
    });

    $('input[name=dnsbl]').bind('click', function() {
        let search = $(this).val();
        let results = $('#dnsbl-results');

        dnsbl.setLookup($(this.val()));
        dnsbl.queryServer();
    });
})(jQuery);