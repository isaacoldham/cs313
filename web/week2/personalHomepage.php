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
          document.getElementById("clickable").style.display = "block";
      }
  </script>

</head>

<body>
  <header>
  <h1>Welcome to Isaac Oldham's Home Page!</h1>
  <div id="menu">
    <a href="../home.php">CSE 341 Assignments</a>
  </div>
  <p>Hey everyone! My name is <strong>Isaac Oldham!</strong> My major is software engineering and I'm from Spanish Fork Utah.</p>
  <div id="picDiv">Below are some recent pictures from my life. <button onclick="showImage()">Click here</button> to view them.</div>
  <div style="text-align:center" id="clickable">
    <img src="IMG_20201007_224253.jpg"class="clickableImage"/>
    <img src="IMG_20201126_093233.jpg"class="clickableImage"/>
    <img src="IMG_20201120_134242.jpg"class="clivkableImage"/>
  </div>
  <footer>
    <hr>
    Education is the difference between wishing you could help others and being able to help them. <b>- President Nelson</b>
  </footer>
    
  </header>
</body>

</html>

