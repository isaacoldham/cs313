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
    <title>The RD Converter</title>
    <script>
    </script>

</head>

<body>
    <header>
        <h1>The RD Converter</h1>
        <div id="menu"> </div>

    </header>

    <h2>Please Login</h2>

    <?php
    if ($_SESSION["badLogin"] = true) {
        echo '<div style="color:red;">There was an error with your login. Please try again.</div>';
    }
    ?>

    <form method="post" action="confirmLogin.php" class="login">
        <div style="margin:10px;">
            Please enter your username:
            <input type="text" name="username">
        </div>
        <div style="margin-bottom:10px;">
            Please enter your password:
            <input type="password" name="password">
        </div>

        <input type="submit" value="Login">
    </form>

    <br><br>
    <div>Testing!!!!!</div>


    <br><br><br><br>
    <!-- <div class="picDiv">
    <button onclick="showImage()">Click here</button>
    To see a super cool video of the world record ski jump!
  </div> -->

</body>

</html>