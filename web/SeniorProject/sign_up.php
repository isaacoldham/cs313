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

    <h2>Sign up Here!</h2>

    <?php
    /*if ($_SESSION["badLogin"] = true) {
        echo '<div style="color:red;">There was an error with your login. Please try again.</div>';
    }*/
    ?>

    <form method="post" action="addLogin.php" class="login">
        <div style="margin:10px;">
            First Name:
            <input type="text" name="first_name">
        </div>
        <div style="margin:10px;">
            Last Name:
            <input type="text" name="last_name">
        </div>
        <div style="margin:10px;">
            Username:
            <input type="text" name="username">
        </div>
        <div style="margin-bottom:10px;">
            Password:
            <input type="password" name="password" id='password'>
        </div>
        <div style="margin-bottom:10px;">
            Ry-type your password:
            <input type="password" name="password2" id='password2'>
        </div>

        <input type="submit" value="Login">
    </form>

    <br><br>



    <br><br><br><br>
    <!-- <div class="picDiv">
    <button onclick="showImage()">Click here</button>
    To see a super cool video of the world record ski jump!
  </div> -->

</body>

</html>
<script>
    element.addEventListener("submit", function(event) {
        let password = document.getElementById('password').value
        let password1 = document.getElementById("password1").value
        if (password != password1) {
            event.preventDefault();
            window.history.back();
        }}, true);
</script>