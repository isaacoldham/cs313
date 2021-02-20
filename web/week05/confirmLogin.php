<?php
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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
$saltOptions = '';

if ($username != null && $password != null) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
} else {
    $_SESSION["login"] = false;
    $_SESSION["badLogin"] = true;
    echo 'test numero uno';
    //header("Location: https://floating-skis.herokuapp.com/week05/login.php");
    die();
}

// This updates the password to a hash in the database
// if (password_verify($password, $hashedPassword)) {
//     var_dump($hashedPassword);
//     if ($username != null && $hashedPassword != null) {
//         //$queryStmt = 'UPDATE user_rental SET password='.$hashedPassword.' WHERE username ='.$username.';';
//         $stmt2 = $db->prepare('UPDATE user_rental SET password=:hashedPassword WHERE username =:username;');
//         $stmt2->bindValue(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
//         $stmt2->bindValue(':username', $username, PDO::PARAM_STR);
//         $stmt2->execute();
//         $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
//     }
// }



$stmt = $db->prepare('SELECT password FROM user_rental WHERE username =:username /*AND password =:password*/;');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
//$stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$_SESSION["rows"] = $rows;



error_log(print_r($rows, true));
print_r($rows);

if (password_verify($password, $rows[0]["password"])) {
    $_SESSION["login"] = true;
    $_SESSION["badLogin"] = false;
    header("Location: https://floating-skis.herokuapp.com/week05/editSkis.php");
    die();
}
/*if ($rows != NULL) {
    $_SESSION["login"] = true;
    $_SESSION["badLogin"] = false;
    header("Location: https://floating-skis.herokuapp.com/week05/editSkis.php");
    die();
}*/ else {
    $_SESSION["login"] = false;
    $_SESSION["badLogin"] = true;
    print_r($hashedPassword);
    echo '<div>$2y$10$qlhRNGy.KyKm/0yN9c1ryOscnVNOUbGu3OFWZ8JksU0CIcK5.j746</div>';
    echo '<div>$2y$10$VaRX/5eP3RG98/IRNMfiZuXP.7Tr37qC0eBsuYx9UXOymOjJvsE1O$2y$10$VaRX/5eP3RG98/IRNMfiZuXP.7Tr37qC0eBsuYx9UXOymOjJvsE1O</div>';
    //header("Location: https://floating-skis.herokuapp.com/week05/login.php");
    die();
}
?>


<!DOCTYPE html>
<html lang="en">

<body>
    <div>Please wait while you are redirected.</div>
    <div>
</body>

</html>