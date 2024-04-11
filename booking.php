<?php

require_once ('connection.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: index.php");
    exit; // Stop further execution of the script
}


$carid = $_GET['id'];

$sql = "select *from cars where CAR_ID='$carid'";
$cname = mysqli_query($con, $sql);
$email = mysqli_fetch_assoc($cname);

$value = $_SESSION['email'];
$sql = "select * from users where EMAIL='$value'";
$name = mysqli_query($con, $sql);
$rows = mysqli_fetch_assoc($name);
$uemail = $rows['EMAIL'];
$carprice = $email['PRICE'];
if (isset($_POST['book'])) {

    $bplace = mysqli_real_escape_string($con, $_POST['place']);
    $bdate = date('Y-m-d', strtotime($_POST['date']));
    ;
    $dur = mysqli_real_escape_string($con, $_POST['dur']);
    $phno = mysqli_real_escape_string($con, $_POST['ph']);
    $des = mysqli_real_escape_string($con, $_POST['des']);
    $rdate = date('Y-m-d', strtotime($_POST['rdate']));

    if (empty($bplace) || empty($bdate) || empty($dur) || empty($phno) || empty($des) || empty($rdate)) {
        echo '<script>alert("please fill the place")</script>';

    } else {
        if ($bdate < $rdate) {
            $price = ($dur * $carprice);
            $sql = "insert into booking (CAR_ID,EMAIL,BOOK_PLACE,BOOK_DATE,DURATION,PHONE_NUMBER,DESTINATION,PRICE,RETURN_DATE) values($carid,'$uemail','$bplace','$bdate',$dur,$phno,'$des',$price,'$rdate')";
            $result = mysqli_query($con, $sql);

            if ($result) {

                $_SESSION['email'] = $uemail;
                header("Location: payment.php");
            } else {
                echo '<script>alert("please check the connection")</script>';
            }
        } else {
            echo '<script>alert("please enter a correct rturn date")</script>';
        }

    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR BOOKING</title>

    <style>
        * {
            margin: 0;
            padding: 0;

        }

        .bg_img {
            position: fixed;
            width: 100%;
            height: 100%;
            background-size: cover;
            opacity: 0.4;
            z-index: -1;
        }

        .navbar {
            width: 1200px;
            height: 75px;
            margin: auto;
        }


        .logo {
            color: black;
            font-size: 4rem;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            float: left;
            padding-top: 10px;

        }

        .menu {
            width: 400px;
            float: left;
            height: 70px;

        }

        ul {
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul li {
            list-style: none;
            margin-left: 62px;
            margin-top: 27px;
            font-size: 14px;

        }

        ul li a {
            text-decoration: none;
            color: black;
            font-family: Arial;
            font-weight: bold;
            transition: 0.4s ease-in-out;

        }

        .main {
            width: 400px;
            margin: 100px auto 0px auto;
            margin-top: 30px;
        }

        .btnn {
            width: 240px;
            height: 40px;
            background: #5087ca;
            border: 1px solid black;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: black;
            transition: 0.4s ease;
        }


        .btnn a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .btnn:hover {
            background-color: #fff;
        }

        h2 {
            text-align: center;
            padding: 20px;
            font-family: sans-serif;
            color: black;
        }

        .register {
            width: 100%;
            font-size: 18px;
            border-radius: 10px;
            border: 5px solid black;
            color: black;
            margin: auto;
        }

        form#register {
            margin: 40px;
        }

        .register_center {
            text-align: center;
        }

        input::placeholder {
            color: black;
            font-family: sans-serif;
            font-weight: bold;
        }

        label {
            color: black;
            font-family: sans-serif;
            font-weight: 900;
        }

        input#name {
            width: 300px;
            border-radius: 3px;
            outline: 0;
            padding: 7px;
            color: black;
            width: 100%;
            padding: 12px;
            border-radius: 4px;
            border: none;
            border-bottom: 2px solid #5087ca;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            background-color: transparent;
        }

        input#datefield {
            width: 300px;
            border-radius: 3px;
            outline: 0;
            padding: 7px;
            color: black;
            width: 100%;
            padding: 12px;
            border-radius: 4px;
            border: none;
            border-bottom: 2px solid #5087ca;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            background-color: transparent;
        }

        input#dfield {
            width: 300px;
            border-radius: 3px;
            outline: 0;
            padding: 7px;
            color: black;
            width: 100%;
            padding: 12px;
            border-radius: 4px;
            border: none;
            border-bottom: 2px solid #5087ca;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            background-color: transparent;
        }

        ::-webkit-datetime-edit-text,
        ::-webkit-datetime-edit-month-field,
        ::-webkit-datetime-edit-day-field,
        ::-webkit-datetime-edit-year-field {
            color: black;
            font-weight: bolder;
        }

        .nn {
            width: 100px;
            background: #5087ca;
            border: 1px solid black;
            height: 40px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.4s ease;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .nn:hover {
            background-color: #fff;
        }

        .circle {
            border-radius: 48%;
            width: 65px;
        }

        .phello {
            width: 200px;
            margin-left: -50px;
            padding: 0px;
        }

        @media only screen and (max-width:1440px) {
            .navbar {
                display: flex;
                flex-direction: column;
            }

            .logo {
                text-align: center;
            }

            .menu {
                width: 1200px;
            }

            .menu ul {
                width: 1100px;
            }

            .menu ul li a {
                font-size: 30px;
            }

            .phello {
                font-size: 15px;
            }

            #pname {
                font-size: 15px;
            }

            .register {
                margin-top: 200px;

            }

            .main {
                width: 1200px;
            }
        }

        @media only screen and (max-width:768px) {
            .menu ul {
                display: flex;
                flex-direction: column;
            }

            .phello {
                text-align: center;
                width: 450px;
            }

            .logo {
                margin-left: 80px;
                font-size: 90px;
            }

            .register {
                margin-top: 600px;
                font-size: 30px;
            }

            .phello {
                font-size: 30px;
            }

            #pname {
                font-size: 30px;
            }

            input::placeholder,
            input {
                font-size: 25px;
            }

            input#datefield,
            input#dfield {
                font-size: 25px;
            }

            .btnn {
                font-size: 35px;
            }
        }

        @media only screen and (max-width:500px) {
            .logo {
                font-size: 160px;
            }

            .menu ul li a {
                font-size: 60px;
            }

            .phello {
                font-size: 40px;
            }

            #pname {
                font-size: 40px;
            }

            .register {
                margin-top: 900px;
            }

            .nn {
                height: 100px;
                width: 230px;
                font-size: 30px;
            }
        }
    </style>

</head>

<body>
    <img src="./images/book.jpg" alt="" class="bg_img">

    <div class="navbar">
        <h2 class="logo">RentWheelz</h2>

        <div class="menu">
            <ul>
                <li><a href="cardetails.php">HOME</a></li>
                <li><a href="contactus2.php">CONTACT</a></li>
                <li><a href="Feedbacks.php">FEEDBACK</a></li>
                <a href="logout.php">
                    <li><button class="nn">LOGOUT</button>
                </a>
                <li><img src="images/profile.png" class="circle" alt="Alps"></li>
                <li>
                    <p class="phello">HELLO! &nbsp;<a id="pname">
                            <?php echo $rows['FNAME'] . " " . $rows['LNAME'] ?>
                        </a></p>
                </li>
            </ul>
        </div>
    </div>


    <div class="main">

        <div class="register">
            <h2>BOOKING</h2>
            <form id="register" method="POST">
                <h2>CAR NAME :
                    <?php echo "" . $email['CAR_NAME'] ?>
                </h2>

                <br>
                <input type="text" name="place" id="name" placeholder="Enter Your Booking Place">
                <br><br>

                <div class="register_center">
                    <label for="datefield">Enter booking date</label>
                    <br>
                    <input type="date" name="date" id="datefield">
                    <br><br>
                </div>

                <br>
                <input type="number" name="dur" min="1" max="30" id="name" placeholder="Enter Duration (in days)">
                <br><br>


                <br>
                <input type="tel" name="ph" maxlength="10" id="name" placeholder="Enter Your Phone Number">
                <br><br>


                <br>
                <input type="text" name="des" id="name" placeholder="Enter Your Destination">
                <br><br>

                <div class="register_center">
                    <label for="datefield">Enter Return Date</label>
                    <br>
                    <input type="date" name="rdate" id="dfield">
                    <br><br>
                    <input type="submit" class="btnn" value="BOOK" name="book">
                </div>
            </form>
        </div>
    </div>

    <script>
        var today = new Date();
        var futureDate = new Date();
        futureDate.setDate(today.getDate() + 4); // Adding 4 days to the current date

        var dd = futureDate.getDate();
        var mm = futureDate.getMonth() + 1; //January is 0!
        var yyyy = futureDate.getFullYear();

        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        var futureDateString = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("min", today.toISOString().split('T')[0]); // Setting minimum date to today
        document.getElementById("datefield").setAttribute("max", futureDateString); // Setting maximum date to four days ahead
    </script>

    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; // January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("dfield").setAttribute("min", today);

        // Add event listener to datefield input to update min attribute of dfield input
        document.getElementById("datefield").addEventListener("change", function () {
            var selectedDate = new Date(this.value);
            selectedDate.setDate(selectedDate.getDate() + 1); // Adding one day to the selected date
            var dd = selectedDate.getDate();
            var mm = selectedDate.getMonth() + 1;
            var yyyy = selectedDate.getFullYear();

            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }

            var nextDay = yyyy + '-' + mm + '-' + dd;
            document.getElementById("dfield").setAttribute("min", nextDay);
        });
    </script>


</body>

</html>