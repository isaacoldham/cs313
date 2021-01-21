<!DOCTYPE html>
<html lang="en">
<!--https://github.com/isaacoldham/cs313-->

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" description="Ski Shop">
  <title>The Ski Shop - Isaac Oldham</title>
  <script>
    // function showImage() {
    //   document.getElementById("video").style.display = "block";
    // }
  </script>

</head>

<body>
  <header>
    <h1>The Ski Shop - Test</h1>
    <div id="menu">
      <a class="menuItem" href="">Mens skis</a>
      <a class="menuItem" href="">Womens skis</a>
      <a class="menuItem" href="">Kids skis</a>
    </div>
  </header>

  <div class="picDiv"></div>
  <div style="text-align:center" id="wrapper">
    <div class="item" id="ski1">
      <img src="ski1.jpg" class="clickableImage" />
      Rossignol - Black Ops
    </div>
    <div class="item" id="ski2">
      <img src="ski2.jpg" class="clickableImage" />
      Dynastar - Menace
    </div>
    <div class="item" id="ski3">
      <img src="ski3.jpg" class="clickableImage" />
      Atomic - Vantage 83
    </div>
    <div class="item" id="ski4">
      <img src="ski4.jpg" class="clickableImage" />
      Blizzard - Bonafide
    </div>
    <div class="item" id="ski5">
      <img src="ski5.jpg" class="clickableImage" />
      Atomic - Vantage 75
    </div>
    <div class="item" id="ski6">
      <img src="ski6.jpg" class="clickableImage" />
      Rossignol - Hero Elite Plus
    </div>
    <div class="item" id="ski7">
      <img src="ski7.jpg" class="clickableImage" />
      Atomic - Vantage 79
    </div>
    <div class="item" id="ski8">
      <img src="ski8.jpg" class="clickableImage" />
      Volkl - M5 Mantra
    </div>
  </div>
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