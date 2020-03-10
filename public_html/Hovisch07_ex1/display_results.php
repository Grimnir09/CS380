<?php
    // get the data from the form
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // get the rest of the data for the form
    $password = $_POST['password'];
    $phoneNumber = $_POST['phone'];
    $contactVia = $_POST['contact_via'];
    $comments = $_POST['comments'];
    // for the heard_from radio buttons,
    // display a value of 'Unknown' if the user doesn't select a radio button
    if (isset($_POST['heard_from'])) {
        $HowDidYouHear = $_POST['heard_from'];
    }
    else {
        $HowDidYouHear = isset($HowDidYouHear) ? $HowDidYouHear : 'Unknown'; 
    }
    // for the wants_updates check box,
    // display a value of 'Yes' or 'No'
    if (isset($specialOffers)) {
        $specialOffers = 'Yes';
    }
    else {
        $specialOffers = isset($specialOffers) ? $specialOffers : 'No'; 
    }


?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br>

        <label>Password:</label>
        <span><?php echo htmlspecialchars($password) ?></span><br>

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phoneNumber) ?></span><br>

        <label>Heard From:</label>
        <span><?php echo $HowDidYouHear ?></span><br>

        <label>Send Updates:</label>
        <span><?php echo $specialOffers ?></span><br>

        <label>Contact Via:</label>
        <span><?php echo $contactVia ?></span><br><br>

        <span>Comments:</span><br>
        <span><?php echo nl2br(htmlspecialchars($comments)) ?></span><br>        
    </main>
</body>
</html>