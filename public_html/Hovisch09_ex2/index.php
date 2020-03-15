<?php
//set default values
$number1 = 78;
$number2 = -105.33;
$number3 = 0.0049;
$message = 'Enter some numbers and click on the Submit button.' . "\n";

//process
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
    case 'process_data':
        $number1 = filter_input(INPUT_POST, 'number1');
        $number2 = filter_input(INPUT_POST, 'number2');
        $number3 = filter_input(INPUT_POST, 'number3');

        // make sure the user enters three numbers
        if (!isset($number1) || !isset($number2) || !isset($number3)) {
            $message = $message . "Please fill all 3 numbers.";
            return FALSE;
        }

        // make sure the numbers are valid
        if (is_numeric($number1) && is_numeric($number2) && is_numeric($number3)) {
            $message = $message . "Number 1: " . $number1 . "\n" . "Number 2: " . $number2 . "\n" . "Number 3: " . $number3 . "\n";
        }

        else {
            return FALSE;
        }

        // get the ceiling and floor for $number2
        $message = $message . "Number 2 ceiling: " . ceil($number2) . "\n" . "Number 2 Floor: " . floor($number2) . "\n";
        
        // round $number3 to 3 decimal places
        $message = $message . "Number 3 rounded: " . round($number3,3) . "\n";

        // get the max and min values of all three numbers
        $message = $message . "Max value: " . max($number1,$number2,$number3) . "\n" . "Min Value: " . min($number1,$number2,$number3) . "\n";
        // generate a random integer between 1 and 100
        srand(floor(time() / (60*60*24)));
        $message = $message . "Random Value (1 - 100): " . rand(1,100);


        break;
}
include 'number_tester.php';
?>