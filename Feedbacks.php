<?php
session_start();
require_once ('connection.php');
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: index.php");
    exit; // Stop further execution of the script
}
?>

<!DOCTYPE HTML>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="css/Stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $comment = mysqli_real_escape_string($con, $_POST['comment']);

        $sql = "INSERT INTO feedback (NAME, EMAIL, COMMENT) VALUES ('$name', '$email', '$comment')";
        $result = mysqli_query($con, $sql);

        header("Location: ../cardetails.php");
        exit();
    }


    ?>
    <img src="./images/feedback.jpg" alt="" class="bg_img">
    <div class="content">
        <h1><b>FEEDBACK</b></h1>
    </div>
    <section class="contact">
        <div class="container">
            <div class="contactInfo">
                At RentWheelz, we are committed to providing exceptional service to our valued customers like you. Your
                feedback is incredibly important to us as it helps us understand how we can improve and better meet your
                needs.

            </div>
            <div class="contactForm">
                <form method="POST">
                    <h2>Send Feedback</h2>
                    <div class="inputBox">
                        <input type="text" name="name" required="required" placeholder="Full Name">
                    </div>

                    <div class="inputBox">
                        <input type="text" name="email" required="required" placeholder="Email">
                    </div>

                    <div class="inputBox">
                        <textarea required="required" name="comment" placeholder="Type Your Comment..."></textarea>
                    </div>

                    <div class="send">
                        <input type="submit" name="submit" value="Send">
                    </div>
                </form>
                <a class="home" href="./cardetails.php"><button class="btn">Home</button></a>
            </div>
        </div>
    </section>

</body>

</html>