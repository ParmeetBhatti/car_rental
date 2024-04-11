<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>REGISTRATION</title>
  <link rel="stylesheet" href="css/regs.css">
</head>

<body>

  <?php

  require_once ('connection.php');
  if (isset($_POST['regs'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $lic = mysqli_real_escape_string($con, $_POST['lic']);
    $ph = mysqli_real_escape_string($con, $_POST['ph']);

    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $Pass = md5($pass);
    if (empty($fname) || empty($lname) || empty($email) || empty($lic) || empty($ph) || empty($pass) || empty($gender)) {
      echo '<script>alert("please fill the place")</script>';
    } else {
      if ($pass == $cpass) {
        $sql2 = "SELECT *from users where EMAIL='$email'";
        $res = mysqli_query($con, $sql2);
        if (mysqli_num_rows($res) > 0) {
          echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
          echo '<script> window.location.href = "index.php";</script>';

        } else {
          $sql = "insert into users (FNAME,LNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD,GENDER) values('$fname','$lname','$email','$lic',$ph,'$Pass','$gender')";
          $result = mysqli_query($con, $sql);

          if ($result) {
            echo '<script>alert("Registration Successful Press ok to login")</script>';
            echo '<script> window.location.href = "index.php";</script>';
          } else {
            echo '<script>alert("please check the connection")</script>';
          }

        }

      } else {
        echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
        echo '<script> window.location.href = "register.php";</script>';
      }
    }
  }

  ?>

  <img src="./images/regs.jpg" alt="" class="bg_img">
  <div class="top">
    <a href="index.php"><button id="back">HOME</button></a>
    <h1 id="fam">JOIN OUR FAMILY OF CARS!</h1>
  </div>

  <div class="main">

    <div class="register">
      <h2>Register Here</h2>

      <form id="register" action="register.php" method="POST">

        <input type="text" name="fname" class="name" placeholder="Enter Your First Name" required>
        <br><br>

        <input type="text" name="lname" class="name" placeholder="Enter Your Last Name" required>
        <br><br>

        <input type="email" name="email" class="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
          title="ex: example@ex.com" placeholder="Enter Valid Email" required>
        <br><br>

        <input type="text" name="lic" class="name" placeholder="Enter Your License number" required>
        <br><br>

        <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)" class="name"
          placeholder="Enter Your Phone Number" required>
        <br><br>


        <input type="password" name="pass" maxlength="12" id="psw" placeholder="Enter Password"
          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
          title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
          required>
        <br><br>

        <input type="password" name="cpass" id="cpsw" placeholder="Renter the password" required>
        <br><br>

        <div class="gender">
          Gender: &nbsp;&nbsp;

          Male<input type="radio" id="input_enabled" name="gender" value="male">&nbsp;&nbsp;

          Female<input type="radio" id="input_disabled" name="gender" value="female" />

          <br><br>
        </div>


        <input type="submit" class="btnn" value="REGISTER" name="regs">

        </input>

      </form>
    </div>
  </div>
  <div id="message">
    <h3>Password must contain the following:</h3>
    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
    <p id="number" class="invalid">A <b>number</b></p>
    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
  </div>
  <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function () {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function () {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }

    function onlyNumberKey(evt) {
      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode < 48 || ASCIICode > 57)
        return false;
      return true;
    }
  </script>



</body>

</html>