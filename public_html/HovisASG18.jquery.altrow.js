"use strict";

(function($){
    $.fn.alternateRows = function(th_css,even_css,odd_css) {
        return this.each(function() {


            var rows = this.getElementsByTagName("tr");
            var th;

            for (var i = 0; i < rows.length; i++) {
                // first check if it's a header row
                th = rows[i].getElementsByTagName("th");

                // if so, set header css class
                if (th.length > 0) {
                    if (th_css === undefined) {
                        rows[i].className = 'header';
                    }
                    else {
                        rows[i].className = th_css;
                    }

                // otherwise, set class based on odd or even loop counter variable
                } else {
                    if (i % 2 === 0) {
                        if (even_css === undefined || even_css === '') {
                            rows[i].className = 'even';
                        }
                        else {
                            rows[i].className = even_css;
                        }
                    } else {
                        if (odd_css === undefined || odd_css === '') {
                            rows[i].className = 'odd';
                        }
                        else {
                            rows[i].className = odd_css;
                        }
                    }
                }
            } // end for loop
            
        });   // end each function
    };        // end alternateRows function
})(jQuery);   // invoke IIFE and import jQuery object