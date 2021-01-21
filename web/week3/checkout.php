<?php
$items = $_POST["skis"];
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
    <div>
        The items in your cart are:
    </div>

    <form action=".php" method="post">
        <?php
        print_r($items);
        foreach ($items as $item) {
            $cleanItem = htmlspecialchars($item);
            echo
            '<div><label>' . $cleanItem . '</label></div>';
        }
        ?>
        <label>Current Address:</label><input type="test" name="address">
    </form>

    <hr>
    <form action="confirmation.php" method="post">
        <div id="wrapper">
            <h3>Click here to Checkout</h3>
            <input type="submit" style="text-align:center;" ;>
        </div>
    </form>


    <footer>
    </footer>

</body>

</html>