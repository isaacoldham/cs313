<?php
session_start();
echo 'test 1';
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

try{
    $ski_name = htmlspecialchars($_POST["ski_name"]);
    $make = htmlspecialchars($_POST["make"]);
    $length = htmlspecialchars($_POST["length"]);
    $type = htmlspecialchars($_POST["type"]);

    echo print_r($_POST);
    $stmt = $db->prepare('INSERT INTO skis (ski_name,make,length,type) VALUES(:ski_name,:make,:length,:type)');
    $stmt->bindValue(':ski_name', $ski_name, PDO::PARAM_STR);
    $stmt->bindValue(':make', $make, PDO::PARAM_STR);
    $stmt->bindValue(':length', $length, PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: https://floating-skis.herokuapp.com/week05/editSkis.php");
}
catch (PDOException $ex){
    $_SESSION["notUpdated"] = true;
    header("Location: https://floating-skis.herokuapp.com/week05/editSkis.php");
}