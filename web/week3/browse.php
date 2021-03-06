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
      <a class="menuItem" href="">Mens skis</a>
      <a class="menuItem" href="">Womens skis</a>
      <a class="menuItem" href="">Kids skis</a>
    </div>
  </header>


  <form onsubmit="CheckNotNull()" action="" method="post" id="formId">
    <div style="text-align:center" id="wrapper">
      <div for="ski1" class="item" id="ski1">
        <img src="ski1.jpg" class="clickableImage" />
        <label for="ski1">Rossignol - Black Ops</label>
        <button type="submit" name="ski1" style="text-align:center;" value="true">Add to Cart</button>
      </div>
      <div class="item" id="ski2">
        <img src="ski2.jpg" class="clickableImage" />
        <label for="ski2">Dynastar - Menace</label>
        <button type="submit" name="ski2" style="text-align:center;" value="true">Add to Cart</button>
      </div>
      <div class="item" id="ski3">
        <img src="ski3.jpg" class="clickableImage" />
        <label for="ski3">Atomic - Vantage 83</label>
        <button type="submit" name="ski3" style="text-align:center;" value="true">Add to Cart</button>
      </div>
      <div class="item" id="ski4">
        <img src="ski4.jpg" class="clickableImage" />
        <label for="ski4">Blizzard - Bonafide</label>
        <button type="submit" name="ski4" style="text-align:center;" value="true">Add to Cart</button>
      </div>
      <div class="item" id="ski5">
        <img src="ski5.jpg" class="clickableImage" />
        <label for="ski5">Atomic - Vantage 75</label>
        <button type="submit" name="ski5" style="text-align:center;" value="true">Add to Cart</button>
      </div>
      <div class="item" id="ski6">
        <img src="ski6.jpg" class="clickableImage" />
        <label for="ski6">Rossignol - Hero Elite Plus</label>
        <button type="submit" name="ski6" style="text-align:center;" value="true">Add to Cart</button>
      </div>
      <div class="item" id="ski7">
        <img src="ski7.jpg" class="clickableImage" />
        <label for="ski7"> Atomic - Vantage 79</label>
        <button type="submit" name="ski7" style="text-align:center;" value="true">Add to Cart</button>
      </div>
      <div class="item" id="ski8">
        <img src="ski8.jpg" class="clickableImage" />
        <label for="ski8">Volkl - M5 Mantra</label>
        <button type="submit" name="ski8" style="text-align:center;" value="true">Add to Cart</button>
      </div>
    </div>

  </form>

  <div style="width: 100%; float: clear; box-sizing: border-box; clear: both;">
    <br>
    <a href="viewCart.php">
      <h3>Click here to view your cart!</h3>
    </a>
  </div>

  <?php

  if (isset($_POST['ski1'])) {
    $_SESSION["ski1"] = $_POST['ski1'];
  } elseif (isset($_POST['ski2'])) {
    $_SESSION["ski2"] = $_POST['ski2'];
  } elseif (isset($_POST['ski3'])) {
    $_SESSION["ski3"] = $_POST['ski3'];
  } elseif (isset($_POST['ski4'])) {
    $_SESSION["ski4"] = $_POST['ski4'];
  } elseif (isset($_POST['ski5'])) {
    $_SESSION["ski5"] = $_POST['ski5'];
  } elseif (isset($_POST['ski6'])) {
    $_SESSION["ski6"] = $_POST['ski6'];
  } elseif (isset($_POST['ski7'])) {
    $_SESSION["ski7"] = $_POST['ski7'];
  } elseif (isset($_POST['ski8'])) {
    $_SESSION["ski8"] = $_POST['ski8'];
  }

  //echo variable info
  echo "<div>post</div>";
  print_r($_POST);
  echo "<div>session</div>";
  print_r($_SESSION);


  ?>

  <br><br><br><br>
  <!-- <div class="picDiv">
    <button onclick="showImage()">Click here</button>
    To see a super cool video of the world record ski jump!
  </div> -->
  <iframe id="video" src="https://www.youtube.com/embed/-RYkapHBVs8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <footer>
    <hr>
    Education is the difference between wishing you could help others and being able to help them. <b>- President Nelson</b>
  </footer>
  <?php echo date("D M d, Y G:i a"); ?>

</body>

</html>