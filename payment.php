<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/pay.css" />
    <title>Payment Form</title>
  </head>
  
  
<body>


<?php

require_once('connection.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: index.php");
    exit; // Stop further execution of the script
    }

$email  =   $_SESSION['email'] ;

$sql="select *from booking where EMAIL='$email' order by BOOK_ID DESC ";
$cname = mysqli_query($con,$sql);
$email = mysqli_fetch_assoc($cname);
$bid=$email['BOOK_ID'];
$_SESSION['bid']=$bid;

if(isset($_POST['pay'])){
  $cardno=mysqli_real_escape_string($con,$_POST['cardno']);
  $exp=mysqli_real_escape_string($con,$_POST['exp']);
  $cvv=mysqli_real_escape_string($con,$_POST['cvv']);
  $price=$email['PRICE'];
  if(empty($cardno) || empty($exp) ||  empty($cvv) ){
    echo '<script>alert("please fill the place")</script>';
  }
  else{
    $sql2="insert into payment (BOOK_ID,CARD_NO,EXP_DATE,CVV,PRICE) values($bid,'$cardno','$exp',$cvv,$price)";
    $result = mysqli_query($con,$sql2);
    if($result){
      header("Location: pay_success.php");
    }
  }

}
?>


   
  <img src="./images/paym.jpg" alt="" class="bg_img">
  <div class="total_pay">
  <h2 class="payment">TOTAL PAYMENT : <a>₹<?php echo $email['PRICE']?>/-</a></h2>

    <div class="card">
      <form method="POST">
        <h1 class="card__title">Enter Payment Information</h1>
        <div class="card__row">
          <div class="card__col">
            <label for="cardNumber" class="card__label">Card Number</label
            ><input
              type="text"
              class="card__input card__input--large"
              id="cardNumber"
              placeholder="xxxx-xxxx-xxxx-xxxx"
              required="required"
              name="cardno"
              maxlength="16"
            />
          </div>
        </div>
        <div class="card__row">
          <div class="card__col">
            <label for="cardExpiry" class="card__label">Expiry Date</label
            ><input
              type="text"
              class="card__input"
              id="cardExpiry"
              placeholder="xx/xx"
              required="required"
              name="exp"
              maxlength="5"
            />
          </div>
          <div class="card__col">
            <label for="cardCcv" class="card__label">CCV</label
            ><input
              type="password"
              class="card__input"
              id="cardCcv"
              placeholder="xxx"
              required="required"
              name="cvv"
              maxlength="3"
            />
          </div>
          <div class="card__col card__brand"><i id="cardBrand"></i></div>
        </div>
        <div class="send">
        <input type="submit" VALUE="PAY NOW" class="pay" name="pay">
        </div>
      </form>
      <a href="cancelbooking.php" class="cancel"><button class="btn">CANCEL</button></a>
    </div>
    </div>
  </body>

    
  </body>
</html>