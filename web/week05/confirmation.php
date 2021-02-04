<?php
session_start();
$items = $_POST["skis"];
$address = $_POST["address"];
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
        Your order Confirmation:
    </div>

    <?php
    foreach ($items as $item) {
        $cleanItem = htmlspecialchars($item);
        echo
        '<div style="font-weight:bold; font-size:18px">' . $cleanItem . '</label>';
    }
    ?>

    <div style="margin: 8px; font-size: 18px; font-weight:lighter;">These items will be shipped to:</div>
    
    <?php
        echo '<div>'.$address.'</div>';
    ?>

    <div style="margin:20px"><a href="browse.php">Return Home</a></div>

    <footer>
    </footer>

</body>

</html>