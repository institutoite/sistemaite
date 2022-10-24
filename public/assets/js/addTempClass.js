(function ($) {
    'use strict';
    $.fn.addTempClass = function (className, expire, callback) {
        className || (className = '');
        expire || (expire = 2000);
        return this.each(function () {
            $(this).addClass(className).delay(expire).queue(function () {
                $(this).removeClass(className).clearQueue();
                callback && callback();
            });
        });
    };
}(jQuery));