<?php
session_start();
require_once ('connection.php');
// Check if the user is logged in
if (!isset($_SESSION['adid'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: adminlogin.php");
    exit; // Stop further execution of the script
}
$query="SELECT *from booking ORDER BY BOOK_ID DESC";    
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


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
            box-sizing: border-box;
        }

        body {
            min-width: 1200px; 
        }

        .bg_img {
            position: fixed;
            width: 100%;
            height: 100%;
            opacity: 0.5;
            z-index: -1;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .icon {
            width: 200px;
            height: 70px;
            line-height: 70px;
        }

        .logo {
            color: black;
            font-size: 4rem;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .menu ul {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-right: 13rem;
        }

        .menu ul li {
            margin-left: 62px;
            margin-top: 27px;
            font-size: 14px;
        }

        .menu ul li a {
            text-decoration: none;
            color: black;
            font-family: Arial;
            font-weight: bold;
            transition: 0.4s ease-in-out;
        }

        .content{
            margin-left: 5%;
        }

        .content-table {
            border-collapse: collapse;
            border: 5px solid black;
            font-size: 1rem;
            margin: 0;
            margin-top: 40px;
            width: 80%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .7); 
            height: 300px;
        }

        .content-table thead tr {
            color: black;
            text-align: left;  
        }

        .content-table th{
            font-size: 1em;
            font-weight: 900;
            padding: 0.5em 0.5em;
            border-bottom: 4px solid black;
            border-right: 2px solid black;
        }

        .content-table td{
            padding: 0.5em 0.5em;
            font-weight: 700;
            border-right: 2px solid black;
        }

        .header {
            margin-top: 20px;
            margin-left: 400px;
            font-size: 3rem;
            font-weight: bold;
        }

        .nn{
            width: 150px;
            height: 40px;
            background: #5087ca;
            border: 1px solid black;
            font-size: 18px;
            font-weight: 700;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.4s ease;
        }

        .add{
            width: 150px;
            height: 40px;
            background: #5087ca;
            border: 1px solid black;
            font-size: 18px;
            font-weight: 700;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.4s ease;
            margin-left: 6rem;
        }

        .nn a,.add a {
            text-decoration: none;
            color: black;
        }

        .nn:hover,.add:hover {
            background-color: #fff;
        }

        .but{
            border: 2px solid black;
        }

        .but a {
            font-weight: 700;
            border: 1px solid black;
            background-color: #5087ca;
            text-decoration: none;
            color: black;
        }

        .but a:hover{
            background-color: white;
        }

        @media only screen and (max-width:1440px) {
            .icon{
                width: 1200px;
            }
            
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
                width: 1400px;
            }

            .menu ul li a {
                font-size: 30px;
            }

        }  
        
        @media only screen and (max-width:768px) {
            .menu ul {
                display: flex;
                flex-direction: column;
                margin-top: 80px;
            }

            .menu ul li a{
                font-size: 45px;
            }

            .logo {
                margin-top: 30px;
                margin-left: 80px;
                font-size: 120px;
            }

            .nn,.add{
                font-size: 25px;
                height: 80px;
                width: 200px;
            }

            .header{
                margin-left: 38%;
                font-size: 60px;
            }

            .content-table thead tr {
                display: none;
            }

            .content-table tr{
                display: block;
            }
            
            .content-table th,.content-table td{
                padding: 0.5em;
            }

            .content-table td{
                text-align: right;
                display: block;
                font-size: 2.5em;
            }

            .content-table td::before{
                content: attr(data-title) ": ";
                float: left;
            }

            tbody tr:nth-child(even){
                border-top: 5px solid black;
                border-bottom: 5px solid black;
            }

            .content-table{
                margin-left: 15%;
            }

            .but{
                font-size: 1em;
            }

        }

        @media only screen and (max-width:500px) {
            .logo{
                font-size: 160px;
                margin-top: 50px;
                margin-left: 0px;
            }

            .menu{
                margin-left: -30px;
            }

            .menu ul{
                margin-top: 180px;
            }

            .menu ul li a{
                font-size: 60px;
            }

            .nn,.add{
                height: 100px;
                width: 230px;
                font-size: 30px;
            }

            .header{
                margin-left: 31%;
                font-size: 80px;
            }

            .content-table{
                margin-left: 8%;
            }
        }
    </style>
</head>



<body>



        <img src="./images/adminbg1.jpg" alt="" class="bg_img">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">RentWheelz</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="adminvehicle.php">VEHICLE MANAGEMENT</a></li>
                    <li><a href="adminusers.php">USERS</a></li>
                    <li><a href="admindash.php">FEEDBACKS</a></li>
                    <li><a href="adminbook.php">BOOKING REQUEST</a></li>
                    <li><a href="logout.php"><button class="nn">LOGOUT</button></a></li>
                </ul>
            </div>
         </div>


        <div class="content">
            <div class="header">BOOKINGS</div>
                    <table class="content-table">
                <thead>
                    <tr>
                        <th>CAR ID</th>
                        <th>EMAIL</th>
                        <th>BOOK PLACE</th>
                        <th>BOOK DATE</th>
                        <th>DURATION</th>
                        <th>PHONE NUMBER</th>
                        <th>DESTINATION</th>
                        <th>RETURN DATE</th>
                        <th>BOOKING STATUS</th>
                        <th>APPROVE</th>
                        <th>CAR RETURNED</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                <tr  class="active-row">
                    
                    <td data-title="CAR ID"><?php echo $res['CAR_ID'];?></php></td>
                    <td data-title="EMAIL"><?php echo $res['EMAIL'];?></php></td>
                    <td data-title="BOOK PLACE"><?php echo $res['BOOK_PLACE'];?></php></td>
                    <td data-title="BOOK DATE"><?php echo $res['BOOK_DATE'];?></php></td>
                    <td data-title="DURATION"><?php echo $res['DURATION'];?></php></td>
                    <td data-title="PHONE NUMBER"><?php echo $res['PHONE_NUMBER'];?></php></td>
                    <td data-title="DESTINATION"><?php echo $res['DESTINATION'];?></php></td>
                    <td data-title="RETURN DATE"><?php echo $res['RETURN_DATE'];?></php></td>
                    <td data-title="BOOKING STATUS"><?php echo $res['BOOK_STATUS'];?></php></td>
                    <td data-title="APPROVE"><button type="submit"  class="but"  name="approve"><a href="approve.php?id=<?php echo $res['BOOK_ID']?>">APPROVE</a></button></td>
                    <td data-title="CAR RETURNED"><button type="submit" class="but" name="approve"><a href="adminreturn.php?id=<?php echo $res['CAR_ID']?>&bookid=<?php echo $res['BOOK_ID']?>">RETURNED</a></button></td>
                </tr>
               <?php } ?>
                </tbody>
                </table>
                
        </div>
</body>
</html>