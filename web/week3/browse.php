<?php 
session_start();
session_destroy();
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
    function CheckNotNull() {
      if (document.getElementById("formId").value == NULL)
      {
        return false;
      }
      else
      {
        return true;
      }

    }
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


  <form onsubmit="CheckNotNull()" action="viewCart.php" method="post" id="formId">
    <div style="text-align:center" id="wrapper">
      <div for="ski1" class="item" id="ski1">
        <img src="ski1.jpg" class="clickableImage" />
        <label for="ski1">Rossignol - Black Ops</label>
        <input type="checkbox" id="ski1" name="skis[]" value="Rossignol - Black Ops">
      </div>
      <div class="item" id="ski2">
        <img src="ski2.jpg" class="clickableImage" />
        <label for="ski2">Dynastar - Menace</label>
        <input type="checkbox" id="ski2" name="skis[]" value="Dynastar - Menace">
      </div>
      <div class="item" id="ski3">
        <img src="ski3.jpg" class="clickableImage" />
        <label for="ski3">Atomic - Vantage 83</label>
        <input type="checkbox" id="ski3" name="skis[]" value="Atomic - Vantage 83">
      </div>
      <div class="item" id="ski4">
        <img src="ski4.jpg" class="clickableImage" />
        <label for="ski4">Blizzard - Bonafide</label>
        <input type="checkbox" id="ski4" name="skis[]" value="Blizzard - Bonafide">
      </div>
      <div class="item" id="ski5">
        <img src="ski5.jpg" class="clickableImage" />
        <label for="ski5">Atomic - Vantage 75</label>
        <input type="checkbox" id="ski5" name="skis[]" value="Atomic - Vantage 75">
      </div>
      <div class="item" id="ski6">
        <img src="ski6.jpg" class="clickableImage" />
        <label for="ski6">Rossignol - Hero Elite Plus</label>
        <input type="checkbox" id="ski6" name="skis[]" value="Rossignol - Hero Elite Plus">
      </div>
      <div class="item" id="ski7">
        <img src="ski7.jpg" class="clickableImage" />
        <label for="ski7"> Atomic - Vantage 79</label>
        <input type="checkbox" id="ski7" name="skis[]" value="Atomic - Vantage 79">
      </div>
      <div class="item" id="ski8">
        <img src="ski8.jpg" class="clickableImage" />
        <label for="ski8">Volkl - M5 Mantra</label>
        <input type="checkbox" id="ski8" name="skis[]" value="Volkl - M5 Mantra">
      </div>
    </div>

    <div style="width: 100%; float: clear; box-sizing: border-box; clear: both;">
      <br>
      <h3>Click here to view your cart!</h3>
      <input type="submit" style="text-align:center;" value="View Cart">
    </div>
  </form>



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