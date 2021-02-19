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
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}


$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

if (password_verify($password, $hashedPassword)) {
    $queryStmt = 'UPDATE user_rental SET password='.$hashedPassword.' WHERE username ='.$username.';';
    $stmt2 = $db->prepare('UPDATE');
    $stmt2->execute();
    $rows2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// $stmt = $db->prepare('SELECT first_name, password FROM user_rental WHERE username =:username AND password =:password;');
// $stmt->bindValue(':username', $username, PDO::PARAM_STR);
// $stmt->bindValue(':password', $password, PDO::PARAM_STR);
// $stmt->execute();
// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $_SESSION["rows"] = $rows;

// //error_log(print_r($rows, true));

// if ($rows != NULL) {
//     $_SESSION["login"] = true;
//     header("Location: https://floating-skis.herokuapp.com/week05/editSkis.php");
//     die();
// } else {
//     $_SESSION["login"] = false;
//     header("Location: https://floating-skis.herokuapp.com/week05/login.php");
//     die();
// }
?>


<!DOCTYPE html>
<html lang="en">

<body>
    <div>Please wait while you are redirected.</div>
</body>

</html>