<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!--https://github.com/isaacoldham/cs313-->

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" description="Ski Shop">
  <title>The Ski Shop</title>
  <script>
  </script>

</head>

<body>
  <header>
    <h1>The Ski Shop</h1>
    <div id="menu">
      <a style="text-decoration: underline;" class="menuItem" href="">All skis</a>
      <a class="menuItem" href="mensSkis.php">Mens skis</a>
      <a class="menuItem" href="womensSkis.php">Womens skis</a>
    </div>

  </header>

  <h2>Please Login</h2>
    <form method="post" action="editSkis.php" class="login">
        Please enter your username: 
        <input type="text" name="username">
        <br>
        Please enter your password:
        <input type="password" name="password">
        <input type="submit" value="Login">
    </form>

  <br><br>
  <form action="searchSkis.php" method="post">
    <div style="font-size=1.5erm;">Have something particular in mind? Search by length here!<br><br>
      <input type="number" name="searchSize" style="text-align:right">
      <input type="submit" name="submit" value="Search">
    </div>
  </form>

  <div style="width: 100%; float: clear; box-sizing: border-box; clear: both;">
    <br>
  </div>

  <br><br><br><br>
  <!-- <div class="picDiv">
    <button onclick="showImage()">Click here</button>
    To see a super cool video of the world record ski jump!
  </div> -->

</body>

</html>