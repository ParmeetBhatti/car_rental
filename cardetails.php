<?php
require_once ('connection.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: index.php");
    exit; // Stop further execution of the script
}

$value = $_SESSION['email'];
$_SESSION['email'] = $value;

$sql = "select * from users where EMAIL='$value'";
$name = mysqli_query($con, $sql);
$rows = mysqli_fetch_assoc($name);

$sql2 = "select * from cars where AVAILABLE='Y'";
$cars = mysqli_query($con, $sql2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>

    <style>
        * {
            margin: 0;
            padding: 0;

        }

        html {
            overflow-x: hidden;
        }

        .bg_img {
            position: fixed;
            width: 100%;
            height: 100%;
            opacity: 0.6;
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

        .box {

            position: center;
            top: 50%;
            left: 50%;
            padding: 20px;
            box-sizing: border-box;
            background: #fff;
            border: 1px solid black;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            background: linear-gradient(to top, rgba(255, 251, 251, 0.8)50%, rgba(250, 246, 246, 0.8)50%);
            display: flex;
            align-content: center;
            width: 600px;
            height: 200px;
            margin-top: 100px;
            margin-left: 350px;
        }

        .box .imgBx {
            width: 150px;
            flex: 0 0 150px;
        }

        .box .imgBx img {
            max-width: 150%;
        }

        .box .content {
            padding-left: 100px;
        }

        .box .button {
            width: 240px;
            height: 40px;
            background: #ff7200;
            border: none;
            margin-top: 30px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
        }

        .utton {
            width: 240px;
            height: 40px;
            background: #5087ca;
            border: 1px solid black;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.4s ease;
            font-size: 18px;
            font-weight: bold;
        }

        .utton:hover {
            background-color: #fff;
        }

        .de {
            float: left;
            clear: left;
            display: block;
        }

        .de li a:hover {
            color: black;

        }

        .de .lis:hover {
            color: white;
        }


        .nn {
            width: 100px;
            background: #5087ca;
            border: 1px solid black;
            height: 40px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: black;
            transition: 0.4s ease;
            text-decoration: none;
            font-weight: bold;
        }

        .nn:hover {
            background-color: #fff;
        }

        .overview {
            text-align: center;

            margin-top: 40px;
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

        #stat {
            margin-left: -5rem;
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

            .overview {
                font-size: 70px;
                width: 1200px;
                margin-top: 150px;
            }

            .box {
                margin-left: 40%;
            }
        }

        @media only screen and (max-width:768px) {
            .menu ul {
                display: flex;
                flex-direction: column;
            }

            .logo {
                margin-left: 80px;
                font-size: 90px;
            }

            .overview {
                margin-top: 600px;
            }

            .phello {
                text-align: center;
                width: 450px;
                font-size: 30px;
            }

            #pname {
                font-size: 30px;
            }

            #stat {
                margin-left: 10px;
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

            .overview {
                margin-top: 1000px;
            }

            .nn {
                height: 100px;
                width: 230px;
                font-size: 30px;
            }

            .box {
                margin-left: 170px;
                width: 700px;
                height: 400px;
            }

            .box .imgBx {
                height: 500px;
            }

            .box .imgBx img {
                height: 300px;
            }

            .box .content {
                font-size: 30px;
            }

            .utton {
                width: 400px;
                height: 50px;
                font-size: 30px;
            }
        }
    </style>

</head>


<body class="body">

    <img src="./images/carbg.jpg" alt="" class="bg_img">
    <div class="navbar">
        <h2 class="logo">RentWheelz</h2>

        <div class="menu">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="contactus2.php">CONTACT</a></li>
                <li><a href="Feedbacks.php">FEEDBACK</a></li>
                <li><a href="logout.php"><button class="nn">LOGOUT</button></a></li>
                <li><img src="images/profile.png" class="circle" alt="Alps"></li>
                <li>
                    <p class="phello">HELLO! &nbsp;<a id="pname">
                            <?php echo $rows['FNAME'] . " " . $rows['LNAME'] ?>
                        </a></p>
                </li>
                <li><a id="stat" href="bookingstatus.php"><button class="nn">BOOKING STATUS</button></a></li>
            </ul>
        </div>
    </div>

    <h1 class="overview">OUR CARS OVERVIEW</h1>

    <ul class="de">
        <?php
        while ($result = mysqli_fetch_array($cars)) {
            $res = $result['CAR_ID'];
            ?>
            <li>
                <div class="box">
                    <div class="imgBx">
                        <img src="images/<?php echo $result['CAR_IMG'] ?>">
                    </div>
                    <div class="content">
                        <h1>
                            <?php echo $result['CAR_NAME'] ?>
                        </h1>
                        <h2>Fuel Type : <a>
                                <?php echo $result['FUEL_TYPE'] ?>
                            </a> </h2>
                        <h2>CAPACITY : <a>
                                <?php echo $result['CAPACITY'] ?>
                            </a> </h2>
                        <h2>Rent Per Day : <a>₹
                                <?php echo $result['PRICE'] ?>/-
                            </a></h2>
                        <form method="GET" action="booking.php">
                            <input type="hidden" name="id" value="<?php echo $res; ?>">
                            <button type="submit" name="booknow" class="utton" style="margin-top: 5px;">Book</button>
                        </form>
                    </div>
                </div>
            </li>
            <?php
        }
        ?>
    </ul>



</body>