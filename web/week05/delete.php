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
echo 'test 2';
//If the $_SESSION["login"] is not equal to true then send the user back to the login page.
if ($_SESSION["login"] != true) {
    header("Location: https://floating-skis.herokuapp.com/week05/login.php");
}

try{
    $ski_id = $_POST["ski_id"];
    $stmt = $db->prepare('DELETE FROM skis WHERE (ski_id=:ski_id);');
    $stmt->bindValue(':ski_id', $ski_id, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: https://floating-skis.herokuapp.com/week05/editSkis.php");
}
catch (PDOException $ex){
    $_SESSION["notUpdated"] = true;
    header("Location: https://floating-skis.herokuapp.com/week05/editSkis.php");
}