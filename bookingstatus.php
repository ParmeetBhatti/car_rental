<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING STATUS</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .bg_img {
            position: fixed;
            width: 100%;
            height: 100%;
            opacity: 0.7;
            z-index: -1;
        }

        .head {
            display: flex;
            justify-content: center;
            padding: 1rem;
            margin-left: -26rem;
            gap: 10rem;
        }

        .hello{
            font-size: 3rem;
        }

        .message{
            display: flex;
            gap: 0.5rem;
        }

        .name {
            font-weight: bold;
            font-size: 3rem;
        }

        .box {
            position: center;
            top: 50%;
            left: 50%;
            padding: 20px;
            box-sizing: border-box;
            border: 5px solid black;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .7);         
            display: flex;
            align-content: center;
            width: 700px;
            height: 250px;
            margin-top: 100px;
            margin-left: 350px;
        }

        .box .content {
            margin-left: 5px;
            font-size: large;
        }

        .utton {
            width: 150px;
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

        .utton:hover {
            background-color: #fff;
        }

        @media only screen and (max-width:1240px){
            .head{
                margin-left: 10%;
                gap: 5rem;
            }
            .box{
                
                margin-left: 20%;
                float: left;
            }
        }

        @media only screen and (max-width:950px){
            .box{
                margin-left: 10%;
                width: 80%;
            }
        }

        @media only screen and (max-width:550px){
            .head{
                display: flex;
                flex-direction: column;
            }

            .box{
                height: 100%;
            }

            .hello{
                margin-left: -10%;
            }

            .hello,.name{
                font-size: 40px;
            }

            .box .content{
                font-size: 12px;
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

    $email = $_SESSION['email'];

    $sql = "select * from booking where EMAIL='$email' order by BOOK_ID DESC LIMIT 1";
    $name = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($name);
    if ($rows == null) {
        echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
        echo '<script> window.location.href = "cardetails.php";</script>';
    } else {
        $sql2 = "select * from users where EMAIL='$email'";
        $name2 = mysqli_query($con, $sql2);
        $rows2 = mysqli_fetch_assoc($name2);
        $car_id = $rows['CAR_ID'];
        $sql3 = "select * from cars where CAR_ID='$car_id'";
        $name3 = mysqli_query($con, $sql3);
        $rows3 = mysqli_fetch_assoc($name3);
        ?>

        <img src="./images/carbg2.jpg" alt="" class="bg_img">

        <div class="head">
            <a href="cardetails.php"><button class="utton">Home</button></a>
            <div class="message">
            <p class="hello">HELLO!</p>
            <p class="name">
                <?php echo $rows2['FNAME'] . " " . $rows2['LNAME'] ?>
            </p>
            </div>
        </div>



        <div class="box">
            <div class="content">
                <h1>CAR NAME :
                    <?php echo $rows3['CAR_NAME'] ?>
                </h1><br>
                <h1>NO OF DAYS :
                    <?php echo $rows['DURATION'] ?>
                </h1><br>
                <h1>BOOKING STATUS :
                    <?php echo $rows['BOOK_STATUS'] ?>
                </h1><br>

            </div>
        </div>



    <?php }
    ?>

</body>

</html>