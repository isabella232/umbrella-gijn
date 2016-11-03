(function() {
    var $ = jQuery;

    var calculate_ifr_dimensions = function(container) {
        var container_width = $(container).width();
        ifr = $($(container).data('iframe')),
        ifr_width = ifr.attr('width'),
        ifr_height = ifr.attr('height'),
        ratio = container_width / ifr_width,
        new_width = container_width,
        new_height = ifr_height * ratio;
        return [new_width, new_height];
    }

    var debounce = function(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };

    $('.video-container').on('click', 'a', function() {
        var dimensions = calculate_ifr_dimensions($(this).parent());
            ifr = $($(this).parent().data('iframe')),
            src = ifr.attr('src');

        ifr.attr('width', dimensions[0]);
        ifr.attr('height', dimensions[1]);
        ifr.attr('src', src + '&autoplay=1');

        $(this).parent().html(ifr);
        return false;
    });

    $(window).on('resize', debounce(function() {
        $('.video-container').each(function() {
            if ($(this).find('ifr').length > 0) {
                var ifr = $(this).find('ifr'),
                dimensions = calculate_ifr_dimensions($(this));
                ifr.attr('width', dimensions[0]);
                ifr.attr('height', dimensions[1]);
            }
        });
        return false;
    }.bind(this), 500));
})();
