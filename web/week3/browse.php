<!DOCTYPE html>
<html lang="en">
<!--https://github.com/isaacoldham/cs313-->

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" description="Ski Shop">
  <title>The Ski Shop</title>
  <script>
    // function showImage() {
    //   document.getElementById("video").style.display = "block";
    // }
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

  <div class="picDiv"></div>
  <div style="text-align:center" id="clickable">
    <img src="ski1.jpg" class="clickableImage" />
    <img src="ski2.jpg" class="clickableImage" />
    <img src="ski3.jpg" class="clickableImage" />
    <img src="ski4.jpg" class="clickableImage" />
    <img src="ski5.jpg" class="clickableImage" />
    <img src="ski6.jpg" class="clickableImage" />
    <img src="ski7.jpg" class="clickableImage" />
    <img src="ski8.jpg" class="clickableImage" />
  </div>
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