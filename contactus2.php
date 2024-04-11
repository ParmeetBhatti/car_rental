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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="css/cont.css">
    <title>Document</title>

    <style>

    </style>

</head>

<body>
    <img src="./images/contact.jpg" alt="" class="bg_img">
    <section class="contact">

        <div class="content">
            <h1><b>CONTACT US</b></h1>

        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fas fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">

                        <p>C-502 GreenHomes,<br>Seawoods,Navi Mumbai,<br>400706</p>
                    </div>

                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-phone-alt" aria-hidden="true"></i></div>
                    <div class="text">

                        <p>9643959012</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">

                        <p>getcarbooking@gmail.com</p>
                    </div>
                </div>

            </div>
            <div class="contactForm">
                <form>
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="" required="required" placeholder="Full Name">
                    </div>

                    <div class="inputBox">
                        <input type="text" name="" required="required" placeholder="Email">
                    </div>

                    <div class="inputBox">
                        <textarea required="required" placeholder="Type Your Message..."></textarea>
                    </div>

                    <div class="send">
                        <input type="submit" name="" value="Send">

                    </div>
                </form>
                <a class="home" href="cardetails.php"><button class="btn">Home</button></a>
            </div>
        </div>
    </section>

</body>

</html>