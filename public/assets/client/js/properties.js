"use strict";
(function($) {
    $(window).on("load", function() {

        $("a[rel='load-content']").on( "click", function(e) {
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(data) {
                $(".content .mCSB_container").append(data); //load new content inside .mCSB_container
                //scroll-to appended content 
                $(".content").mCustomScrollbar("scrollTo", "h2:last");
            });
        });

        $(".content").delegate("a[href='top']") .on( "click", function(e) {
            e.preventDefault();
            $(".content").mCustomScrollbar("scrollTo", $(this).attr("href"));
        });

    });
})(jQuery);


(function() {

    var selector = '[data-rangeSlider]',
        elements = document.querySelectorAll(selector);

    // Example functionality to demonstrate a value feedback
    function valueOutput(element) {
        var value = element.value,
            output = element.parentNode.getElementsByTagName('output')[0];
        output.innerHTML = value;
    }

    for (var i = elements.length - 1; i >= 0; i--) {
        valueOutput(elements[i]);
    }

    Array.prototype.slice.call(document.querySelectorAll('input[type="range"]')).forEach(function(el) {
        el.addEventListener('input', function(e) {
            valueOutput(e.target);
        }, false);
    });




    //update range



})();