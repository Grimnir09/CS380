// Get element ids
var $ = function(id) {
    return document.getElementById(id);
};

var makeChange = function() {
    //Trunicate decimals by using tofixed
    var cents = parseInt($("cents").value).toFixed(0);

    if (cents < 100) {
        if (cents >= 25) {
            var quarters = Math.floor(cents / 25);
            cents = cents % 25;
            $("quarters").value = quarters;
        }
        else {
            $("quarters").value = null;
        }

        if (cents >= 10) {
            var dimes = Math.floor(cents / 10);
            cents = cents % 10;
            $("dimes").value = dimes;
        }
        else {
            $("dimes").value = null;
        }

        if (cents >= 5) {
            var nickels = Math.floor(cents / 5);
            cents = cents % 5;
            $("nickels").value = nickels;

        }
        else {
            $("nickels").value = null;
        }

        if (cents >= 1) {
            var pennies = cents;
            $("pennies").value = pennies;
        }
        else {
            $("pennies").value = null;
        }
    } 
    else 
    {
        alert("Invalid input " + cents + " change must be between 0 and 99");
    }
};
$("cal").addEventListener("click", makeChange);