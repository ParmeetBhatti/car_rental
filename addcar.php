<?php
session_start();
require_once ('connection.php');
// Check if the user is logged in
if (!isset($_SESSION['adid'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: adminlogin.php");
    exit; // Stop further execution of the script
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>

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
            opacity: 0.5;
            z-index: -1;
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
            margin-top: 30px;
            margin-left: 40px;
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

        label {
            color: black;
            font-family: sans-serif;
            font-weight: 900;
        }

        .name {
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


        #back {
            width: 100px;
            height: 40px;
            color: black;
            background: #5087ca;
            border: 1px solid black;
            font-size: 18px;
            border-radius: 10px;
            transition: 0.4s ease;
            cursor: pointer;
            margin-top: 10px;
            margin-left: 20px;
        }

        #back:hover {
            background: #fff;
        }

        #back {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        #fam {
            color: black;
            font-family: sans-serif;
            font-size: 50px;
            padding-left: 20px;
            letter-spacing: 2px;
            margin-top: 10px;
            margin-left: 250px;
        }

        .top {
            display: flex;
            text-align: center;
        }

        input::placeholder {
            color: black;
            font-family: sans-serif;
            font-weight: bold;
        }

        input{
            color: black;
            font-family: sans-serif;
            font-weight: bold;
        }

    </style>
</head>



<body>


    <img src="./images/addcar.jpg" alt="" class="bg_img">
    <div class="top">
        <a href="adminvehicle.php"><button id="back">HOME</button></a>
    </div>

    <div class="main">

        <div class="register">
            <h2>Enter Details Of New Car</h2>
            <form id="register" action="upload.php" method="POST" enctype="multipart/form-data">

                <br>
                <input type="text" name="carname" class="name" placeholder="Enter Car Name" required>
                <br><br>


                <br>
                <input type="text" name="ftype" class="name" placeholder="Enter Fuel Type" required>
                <br><br>


                <br>
                <input type="number" name="capacity" min="1" class="name" placeholder="Enter Capacity Of Car" required>
                <br><br>


                <br>
                <input type="number" name="price" min="1" class="name"
                    placeholder="Enter Price Of Car for One Day(in rupees)" required>
                <br><br>

                <div class="register_center">
                    <br>
                        <label>Car Image</label>
                        <input type="file" name="image" required>
                    <br><br>
                </div>


                <input type="submit" class="btnn" value="ADD CAR" name="addcar">



                </input>

            </form>
        </div>
    </div>
</body>

</html>