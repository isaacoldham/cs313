<?php

//Connect to the database
session_start();
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
    header("Location: https://floating-skis.herokuapp.com/SeniorProject/login.php");
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
    <title>The RD Converter</title>
    <script>
    </script>

</head>

<body>
    <header>
        <h1>The RD Converter</h1>
        <div id="menu">
            
        </div>

    </header>

    <h2>Welcome<?php //echo $_SESSION['username']; ?>!</h2>
    
    <div style="text-align:center">

    <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      echo '<p class="notification">' . $_SESSION['message'] . '</p>';
      unset($_SESSION['message']);
    }
  ?>
  <form method="POST" action="processTable.php">
    <div class="upload-wrapper">
      <div class="">Paste your CREATE statement for a PostgreSQL table.</div>
      <textarea name="create_text" rows="20" cols="100" placeholder="CREATE table_name..."></textarea><br>
      <div class="">Paste the INSERT statements for your table here.</div>
      <textarea name="insert_text" rows="20" cols="100" placeholder="INSERT INTO table_name..."></textarea>
    </div>
    <br>

    <input type="submit" value="Submit" />
  </form>
    </div>

    <div style="width: 100%; float: clear; box-sizing: border-box; clear: both;">
        <br>
    </div>

    <br><br><br>
    <!-- <div class="picDiv">
    <button onclick="showImage()">Click here</button>
    To see a super cool video of the world record ski jump!
  </div> -->

    <footer style="padding:10px; margin-top:20px;">
        <hr>
        To log out <a href="logOut.php">click here</a>.
    </footer>

</body>

</html>