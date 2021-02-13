<?php
session_start();

//Connect to the database
try {
    $dbUrl = getenv('DATABASE_URL');
    $dbOpts = parse_url($dbUrl);
    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //   function getSkis ($skis){
    //       $statement = $db->prepare('SELECT * FROM skriptures AS s WHERE s.book =:book');
    //       $statement->bindValue(':book', $skis, PDO::PARAM_STR);
    //       $statement->execute();
    //       $scriptures = $statement->fetchAll(PDO::FETCH_ASSOC);
    //       $statement->closeCursor();
    //       return $scriptures;
    //   }
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}

//If the $_SESSION["login"] is not equal to true then send the user back to the login page.
if ($_SESSION["login"] != true) {
    header("Location: https://floating-skis.herokuapp.com/week05/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<!--https://github.com/isaacoldham/cs313-->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" description="Ski Shop">
    <title>The Ski Shop</title>
    <script>
    </script>

</head>

<body>
    <header>
        <h1>The Ski Shop</h1>
        <div id="menu">
            <a style="text-decoration: underline;" class="menuItem" href="">All skis</a>
            <a class="menuItem" href="mensSkis.php">Mens skis</a>
            <a class="menuItem" href="womensSkis.php">Womens skis</a>
        </div>

    </header>

    <h2>Edit Ski</h2>
    <?php
        $ski_id = $_POST["ski_id"];
        echo var_dump($_POST);
        $stmt = $db->prepare('SELECT length, ski_name, make FROM skis WHERE ski_id =:ski_id');
        $stmt->bindValue(':ski_id', $ski_id, PDO::PARAM_STR);
        $stmt->execute();
        $ski = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div style="text-align:center" id="wrapper">
        <form method="post" action="changeSkis.php" style="margin-left:auto;margin-right:auto;">
            <?php
                $_SESSION["ski_id"]=$ski[0]['ski_id'];
                echo $_SESSION["ski_id"];
                echo '<div class="item">Name: <input type="text" name="ski_name" value="'.$ski[0]['ski_name'].'">';
                echo 'Brand: <input type="text" name="make" value="'.$ski[0]['make'].'">';
                echo 'Length: <input name="length" type="number" value="'.$ski[0]['length'].'">';
                echo 'Type: <select name="type">';
                echo '<option name="type" value="mens">Mens</option><br><option name="type" value="womens">Womens</option></select>';
                echo '<input type="submit" value="Submit">';
                echo '</div><br>';
            ;
            ?>
        </form>
    </div>

    <br><br><br><br>
    <!-- <div class="picDiv">
    <button onclick="showImage()">Click here</button>
    To see a super cool video of the world record ski jump!
  </div> -->

    <footer style="padding:10px; margin-top:20px;">
        <hr>
        <a href="login.php">Click here</a> to return to editing skis.
    </footer>

</body>

</html>