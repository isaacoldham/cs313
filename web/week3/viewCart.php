<?php
session_start();
$_SESSION += $_POST;
$items = $_SESSION["skis"];
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
    $count = 0;
    if (empty($_SESSION)) {
        foreach ($items as $item) {
            $count = $count + 1;
            $cleanItem = htmlspecialchars($item);
            $_SESSION[$count] = $cleanItem;
            echo
            '<div><label style="font-weight:bold; font-size:18px">' . $_SESSION[$count] . '</label>
               <input type="checkbox" name="skis[]" value="' . $_SESSION[$count] . '" checked></div>';
        }
    } else {
        foreach ($_SESSION["skis"] as $key => $item){
            $cleanItem = htmlspecialchars($item);
            echo
            '<div><label style="font-weight:bold; font-size:18px">' . $cleanItem . '</label>
            <input type="checkbox" name="skis[]" value="' . $cleanItem . '" checked></div>';
        }
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