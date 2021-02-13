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
echo 'test 2';
//If the $_SESSION["login"] is not equal to true then send the user back to the login page.
if ($_SESSION["login"] != true) {
    header("Location: https://floating-skis.herokuapp.com/week05/login.php");
}

try{
    $ski_id = $_SESSION['ski_id'];
    echo 'ski_id = '.$ski_id;
    $ski_name = htmlspecialchars($_POST["ski_name"]);
    $make = htmlspecialchars($_POST["make"]);
    $length = htmlspecialchars($_POST["length"]);
    $type = htmlspecialchars($_POST["type"]);

    echo print_r($_POST);
    $stmt = $db->prepare('UPDATE skis SET ski_name=:ski_name,make=:make,length=:length,type=:type WHERE ski_id =:ski_id;');
    $stmt->bindValue(':ski_id', $ski_id, PDO::PARAM_STR);
    $stmt->bindValue(':ski_name', $ski_name, PDO::PARAM_STR);
    $stmt->bindValue(':make', $make, PDO::PARAM_STR);
    $stmt->bindValue(':length', $length, PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->execute();

    $string2 = 'SELECT * FROM skis WHERE ski_id ='.$ski_id;
    $stmt2 = $db->prepare($string2);
    $stmt2->execute();
    $ski = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    header("Location: https://floating-skis.herokuapp.com/week05/editSkis.php");
}
catch (PDOException $ex){
    $_SESSION["notUpdated"] = true;
    header("Location: https://floating-skis.herokuapp.com/week05/editSkis.php");
}