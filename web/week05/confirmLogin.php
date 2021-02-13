<?php
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

    $stmt = $db->query('SELECT username, password FROM user_login WHERE username =:username AND password =:password');
    $stmt->bindValue(':username', $_POST["username"], PDO::PARAM_STR);
    $stmt->bindValue(':password', $_POST["password"], PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

// if($rows != NULL){
//     header("Location: https://floating-skis.herokuapp.com/week05/editSkis.php");
//     $_SESSION["login"] = true;
// }
// else{
//     header("Location: https://floating-skis.herokuapp.com/week05/login.php");
//     $_SESSION["login"] = false;
// }
?>
<!DOCTYPE html>
<html lang="en">
<body>
<div>Please wait while you are redirected.</div>
</body>
</html>