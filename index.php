<?php
require_once('connection.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        
        
        if(empty($email)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select *from users where EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['PASSWORD'];
                if(md5($pass)  == $db_password)
                {
                    header("location: cardetails.php");
                    session_start();
                    $_SESSION['email'] = $email;
                    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }
            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR RENTAL</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
require_once('connection.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (empty($email) || empty($pass)) {
        echo '<script>alert("Please fill in all the fields.")</script>';
    } else {
        $query = "SELECT * FROM users WHERE EMAIL='$email'";
        $res = mysqli_query($con, $query);
        if ($row = mysqli_fetch_assoc($res)) {
            $db_password = $row['PASSWORD'];
            if (md5($pass) == $db_password) {
                session_start();
                $_SESSION['email'] = $email;
                header("location: cardetails.php");
            } else {
                echo '<script>alert("Incorrect password.")</script>';
            }
        } else {
            echo '<script>alert("Email not found.")</script>';
        }
    }
}
?>

<img src="./images/carbg5.jpg" alt="" class="bg_img">
<div class="navbar">
    <div class="icon">
        <h2 class="logo">RentWheelz</h2>
    </div>
    <div class="menu">
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="contactus.html">CONTACT</a></li>
            <li><a href="adminlogin.php"><button class="adminbtn">ADMIN LOGIN</button></a></li>
        </ul>
    </div>
</div>

<div class="content">
    <p class="par">Experience the epitome of luxury by renting your dream car from our extensive collection.
        Cherish every moment with your loved ones as you indulge in the opulence of your choice.
        Join our family and create unforgettable memories together.</p>
    <a href="register.php"><button class="cn">JOIN US</button></a>
    <div class="form">
        <h1>Login Here</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="Enter Email Here">
            <input type="password" name="pass" placeholder="Enter Password Here">
            <input class="btnn" type="submit" value="Login" name="login">
        </form>
        <p class="link">Don't have an account?<br>
            <a href="register.php">Sign up</a> here</p>
    </div>
</div>



</body>
</html>
