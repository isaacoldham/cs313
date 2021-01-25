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
</head>

<body>
    <header>
        <h1>The Ski Shop</h1>
        <div id="menu">
            <a class="menuItem" href="">Mens skis</a>
            <a class="menuItem" href="">&nbsp &nbsp Womens skis &nbsp &nbsp</a>
            <a class="menuItem" href="">Kids skis</a>
        </div>
    </header>

    <br>
    <div style="font-size: 20px; margin-bottom: 8px;">
        The items in your cart are:
    </div>

    <?php
    
        foreach ($_SESSION as $key => $item){
            $cleanItem = htmlspecialchars($item);
            echo
            '<div><label style="font-weight:bold; font-size:18px">' . $cleanItem . '</label>
            <input type="checkbox" name="skis[]" value="' . $cleanItem . '" checked></div>';
        }
    
        if (isset($_POST['ski1'])) {
            echo
            '<div><label style="font-weight:bold; font-size:18px">Rossignol - Black Ops</label>
            <input type="checkbox" name="skis[]" value="' . $cleanItem . '" checked></div>';
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

    ?>

    <form action="checkout.php" method="post">
        <?php
        //foreach ($items as $item) {
          //  $cleanItem = htmlspecialchars($item);
            //echo
            //'<div><label style="font-weight:bold; font-size:18px">' . $cleanItem . '</label>
            //<input type="checkbox" name="skis[]" value="' . $cleanItem . '" checked></div>';
        //}
        //?>


        <hr>
        <div id="wrapper">
            <h3>Proceed to Checkout</h3>
            <input type="submit" style="text-align:center;" value="Checkout">
            <br><br>
            <div>Or you can <a href="browse.php">cancel</a> your order.</div>
        </div>
    </form>


    <footer>
    </footer>

</body>

</html>