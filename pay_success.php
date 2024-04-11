<?php

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: index.php");
    exit; // Stop further execution of the script
    }
?>

<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Success!!</title>

  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      height: 100vh;
    }

    .bg_img {
      position: fixed;
      width: 100%;
      height: 100%;
      opacity: 0.6;
      z-index: -1;
    }

    h1 {
      text-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
      color: black;
      font-family: sans-serif;
      font-weight: 900;
      font-size: 40px;
      margin-bottom: 10px;
    }

    p {
      text-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
      color: black;
      font-family: sans-serif;
      font-size: 20px;
      font-weight: 700;
    }

    i {
      text-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
      color: black;
      font-size: 100px;
      line-height: 200px;
      margin-left: -15px;
    }

    .card {
      width: 40%;
      padding: 40px;
      border: 5px solid black;
      box-shadow: 0 5px 15px rgba(0, 0, 0, .7);
      border-radius: 10px;
      text-align: center;
      margin: auto;
    }

    .back {
      width: 125px;
      background: #5087ca;
      color: black;
      border: 1px solid black;
      border-radius: 10px;
      cursor: pointer;
      font-size: 18px;
      padding: 7px;
      font-size: 18px;
      font-weight: bold;
      transition: 0.4s ease-in-out;
    }

    .back:hover {
      background-color: #fff;
    }

    @media only screen and (max-width:768px) {
      .card{
        width: 70%;
      }
    }

  </style>
</head>


<body>
  <img src="./images/ps.png" alt="" class="bg_img">
  <div class="card">
    <div>
      <i class="checkmark">✓</i>
    </div>
    <h1>Success</h1>
    <p>We received your rental request;<br /> we'll be in touch shortly!</p>
    <a href="cardetails.php"><button class="back">Search Cars</button></a>
  </div>
</body>

</html>