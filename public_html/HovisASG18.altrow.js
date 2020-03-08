"use strict";

window.onload = function() {
    // showing that the user can enter both a emtpy string or pass undefined
    $("table").alternateRows('', 'alt_even' ,this.undefined);
};