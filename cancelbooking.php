<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANCEL BOOKING</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .bg_img {
            margin: 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.6;
            z-index: -1;
            object-fit: cover;
        }

        .head {
            margin-top: 15rem;
            text-align: center;
            font-size: 3rem;
            font-weight: 700;
        }

        .hai,
        .no {
            margin-top: 2rem;
            width: 200px;
            height: 40px;
            background: #5087ca;
            border: 1px solid black;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.4s ease;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }


        .hai:hover,
        .no:hover {
            background-color: #fff;
        }

        .btn {
            display: flex;
            justify-content: space-evenly;
        }

        @media only screen and (max-width:425px) {
            /* .head{
                margin-left: 70px;
            } */

            .hai,.no{
                width: 150px;
            }
        }
    </style>
</head>

<body>

    <?php

    require_once ('connection.php');
    session_start();
    

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: index.php");
    exit; // Stop further execution of the script
    }

    $bid = $_SESSION['bid'];
    if (isset($_POST['cancelnow'])) {
        $del = mysqli_query($con, "delete from booking where BOOK_ID = '$bid' order by BOOK_ID DESC limit 1");
        echo "<script>window.location.href='cardetails.php';</script>";

    }

    ?>


    <img src="./images/cancel.jpg" alt="" class="bg_img">
    <div class="head">ARE YOU SURE YOU WANT TO CANCEL YOUR BOOKING?</div>
    <div class="btn">
        <a href="cardetails.php"><button class="hai" value="CANCEL NOW" name="cancelnow">CANCEL NOW</button></a>
        <a href="payment.php"><button class="no">GO TO PAYMENT</button></a>
    </div>
</body>

</html>