<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        /*************************************************
         * validate and process the name
         ************************************************/
        // 1. make sure the user enters a name
        // 2. display the name with only the first letter capitalized
        # if name is empty
        if (!isset($name) || $name == "") {
            echo("<br> Please enter your name");
            return FALSE;
        }
        else {
                $message = "Hello " . ucfirst($name) . "," . "\n" . "Thank you for entering this data: \n";
        }
       
        /*************************************************
         * validate and process the email address
         ************************************************/
        // 1. make sure the user enters an email
        // 2. make sure the email address has at least one @ sign and one dot character

        if ($email == "") {

            echo "<br>Please enter Email";

        } else {

            if (strpos($email, ".") !== false && strpos($email, "@") !== false) {

                $message = $message . "Email: " . $email . "\n";

            } else {

                echo ("Invalid Email");

            }

        }

        /*************************************************
         * validate and process the phone number
         ************************************************/
        // 1. make sure the user enters at least seven digits, not including formatting characters
        // 2. format the phone number like this 123-4567 or this 123-456-7890

        if (strlen($phone) < 7 && is_numeric($phone)) {

            echo "<br>Enter a valid phone number ";

        } else {

            $message = $message . "Phone: " . substr_replace($phone, "-", 3, 0);

        }

        /*************************************************
         * Display the validation message
         ************************************************/

        break;
}
include 'string_tester.php';
?>