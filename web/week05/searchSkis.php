<?php
session_start();
$ski_length = $_POST['searchSize'];
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

<h2>All Skis</h2>

<body>
    <header>
        <h1>The Ski Shop</h1>
        <div id="menu">
            <a style="text-decoration: underline;" class="menuItem" href="">All skis</a>
            <a class="menuItem" href="mensSkis.php">Mens skis</a>
            <a class="menuItem" href="womensSkis.php">Womens skis</a>
        </div>

    </header>

    <?php
    if ($ski_length != NULL) {
        echo '<h2>You seached for ' . $ski_length . 'cm length skis.</h2>';
        echo '<div style="text-align:center" id="wrapper">';
        
        $stmt = $db->prepare('SELECT s.length, s.ski_name, s.make, s.img_url, s.type FROM skis AS s WHERE s.length=:length');
        $stmt->bindValue(':length', $ski_length, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($rows != NULL){
        foreach ($rows as $row) {
            echo '<div class="item">' . $row['ski_name'];
            echo ' - <span style="font-weight: none;">' . $row['make'];
            echo ' ' . $row['length'] . 'cm';
            echo '<img src="' . $row['img_url'] . '" class="clickableImage" />';
            echo '</span></div><br>';
        }
        }
        else {
            echo '<h2>No skis were found at '.$ski_length.'cm</h2>';
        }
    echo '</div>';
    }
    else {
        echo 'There was an error. Please enter a valid ski length';}
    ?>



    <div style="width: 100%; float: clear; box-sizing: border-box; clear: both;">
        <br>
    </div>


</body>

</html>