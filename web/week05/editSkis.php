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

    <h2>Select a ski to edit or <a href="addSkis.php">click here</a> to add a new ski.</h2>


    <div style="text-align:center">
        <form method="post" action="edit.php">
            <?php
            foreach ($db->query('SELECT length, ski_name, make, img_url, ski_id FROM skis ORDER BY ski_id;') as $row) {
                echo '<div>' . $row['ski_name'];
                echo ' - <span style="font-weight: none;">' . $row['make'];
                echo ' ' . $row['length'] . 'cm';
                echo '</span><button type="submit" name="ski_id" value="'.$row['ski_id'].'">Edit</button><br></div>';
            };
            ?>
        </form>
    </div>

    <div style="width: 100%; float: clear; box-sizing: border-box; clear: both;">
        <br>
    </div>

    <br><br><br><br>
    <!-- <div class="picDiv">
    <button onclick="showImage()">Click here</button>
    To see a super cool video of the world record ski jump!
  </div> -->

    <footer style="padding:10px; margin-top:20px;">
        <hr>
        To add or delete skis, please <a href="login.php">login here</a>.
    </footer>

</body>

</html>