<!DOCTYPE html>
<html lang="en">
<!--https://github.com/isaacoldham/cs313-->

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="week2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" description="About me">
  <title>About Me</title>
  <script>
    function showImage() {
      document.getElementById("video").style.display = "block";
    }
  </script>

</head>

<body>
  <header>
    <h1>Welcome to Isaac Oldham's Home Page!</h1>
    <div id="menu">
      <a href="../home.php">CSE 341 Assignments</a>
    </div>
  </header>
  <p>Hey everyone! My name is <strong>Isaac Oldham!</strong> My major is software engineering and I'm from Spanish Fork Utah.</p>
  <div class="picDiv">Below are some recent pictures from my life.</div>
  <div style="text-align:center" id="clickable">
    <img src="IMG_20201007_224253.jpg" class="clickableImage" />
    <img src="IMG_20201126_093233.jpg" class="clickableImage" />
    <img src="IMG_20201120_134242.jpg" class="clickableImage" />
  </div>
  <div class="picDiv">
    <button onclick="showImage()">Click here</button>
    To see a super cool video of the world record ski jump!
  </div>
  <iframe id="video" src="https://www.youtube.com/embed/-RYkapHBVs8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <footer>
    <hr>
    Education is the difference between wishing you could help others and being able to help them. <b>- President Nelson</b>
  </footer>
  <?php echo date("D M d, Y G:i a"); ?>

</body>

</html>