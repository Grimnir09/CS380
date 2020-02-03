// Call the function on load
getTemp();

// Converts Farenheit to Celsius
function getTemp() {
    var low = -100;
    var high = 212;

    var input =  prompt(
        "Enter Temp in Farenheit"
    );
    // restart the function if no input is given
    if (input == "" || input == null) {
        getTemp();
    }
    // end the application if user enters 999
    else if (input == 999) {
        return;
    }
    // if user enters a number not in our range alert them and then call our function again.
    else if (input < low || input > high) {
        alert('Invalid input: ' + input + ' \n Please enter a temp that is less than ' + low + ' or higher than ' + high);
        getTemp();
    }
    // if all are checks are complete do our conversion and call our function again
    else {
        alert(input + 'F is ' + ((input-32)*(5/9)).toFixed(2) + 'C')
        getTemp();
    }
}