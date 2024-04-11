<?php
    session_start();
    require_once('connection.php');
    if(isset($_POST['adlog'])){
        $id=$_POST['adid'];
        $pass=$_POST['adpass'];
        
        
        if(empty($id)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select *from admin where ADMIN_ID='$id'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['ADMIN_PASSWORD'];
                if($pass  == $db_password)
                {
                    echo '<script>alert("Welcome ADMINISTRATOR!");</script>';
                    $_SESSION['adid'] = $id; // Set the session variable
                    header("location: adminvehicle.php");
                    exit();
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <style>

* {
    margin: 0;
    padding: 0;
}

body {
    background-image: url("images/adminbg.jpg");
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: 100% 100%;
}

.form {
    width: 80%; 
    height: 50%;
    max-width: 400px; 
    margin-left: 12%;
    border-radius: 10px;
    padding: 20px;
    border: 5px solid black;
    box-shadow: 0 5px 15px rgba(0, 0, 0, .7); 
}

.form h1 {
    font-family: sans-serif;
    text-align: center;
    color: black;
    font-size: 25px;
    border-bottom: 4px solid #5087ca;
    margin: 2px;
    padding: 8px;   
}

.form input {
    width: 100%; 
    height: 35px;
    margin-top: 50px;
    background: transparent;
    border-bottom: 2px solid #5087ca;
    border-top: none;
    border-right: none;
    border-left: none;
    color: black;
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 1px;
    
    font-family: sans-serif;
}

.form input:focus {
    outline: none;
}

::placeholder {
    color: black;
    font-family: sans-serif;
}

.btnn {
    cursor: pointer;
    transition: 0.4s ease;
    width: 100%; 
    height: 35px; 
}

.btnn:hover {
    background: #fff;
    border-radius: 10px;
    border: 1px solid black;
}

.btnn a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}

.form .link {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 17px;
    padding-top: 20px;
    text-align: center;
    color: black;
    font-weight: bold;
}

.form .link a {
    text-decoration: none;
    color: rgb(8, 96, 220);
    font-weight: 900;
    font-size: larger;
}

.helloadmin {
    text-align: left; 
    margin-bottom: 30px;
}

.helloadmin h1 {
    margin-left: 270px;
    font-family: sans-serif;
    font-size: 40px; 
    color: black;
}

.back { 
    height: 50px;
    width: 150px;
    background: #5087ca;
    color: black;
    border: 1px solid black;
    border-radius: 10px;
    cursor: pointer;
    font-size: 25px;
    padding: 7px; 
    margin-top: 20px;
}

.back:hover {
    background-color: #fff;
}

.home {
    text-align: left;  
    margin-left: 10px;
}

@media only screen and (max-width:768px) {
    .form {
        /* width: 87%;  */
        width: 70%; 
        margin-top: 50px; 
        margin-left: 5%;
    }

    .form input {
        margin-top: 30px; 
    }

    .helloadmin h1 {
        margin-left: 20%;
        font-size: 60px;
    }

    .back {
        height: 60px;
        width: 200px; 
        font-size: 30px; 
    }
}
</style>
</head>


<body>



<div class="home"><a href="index.php"><button class="back">Home</button></a></div>
    <div class="helloadmin">
    <h1>HELLO ADMIN!</h1></div>

    
    <form class="form" method="POST">
        <h1>Admin Login</h1>
        <input type="text" name="adid" placeholder="Enter admin user id">
        <input type="password" name="adpass" placeholder="Enter admin password">
        <input type="submit" class="btnn" value="LOGIN" name="adlog" >
    </form>
    
    

</body>
</html>