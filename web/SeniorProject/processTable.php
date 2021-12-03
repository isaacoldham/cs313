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

$create_text = htmlspecialchars($_POST["create_text"]);
$insert_text = htmlspecialchars($_POST["insert_text"]);

$stmt1 = $db->prepare($create_text);


if ($stmt1->execute()) {
    echo "it worked";
}
else {
    echo 'it didnt work';
}

$insertArray = explode(');', $insert_text);
print_r($insertArray);



$stmt2 = $db->prepare($insert_text);


if ($stmt2->execute()) {
    $_SESSION["login"] = true;
    $_SESSION["badLogin"] = false;
    echo "Inserted!!!!";
    //header("Location: https://floating-skis.herokuapp.com/SeniorProject/.php");
    //die();
}

$parts = explode(' ', $create_text);
$table_name = $parts[2];
echo 'table_name = [' . $table_name . ']';
$query = 'SELECT * FROM ' . $table_name . ';';
$stmt3 = $db->query($query);

$dbdata = array();
while ( $row = pg_fetch_assoc($stmt3)) {
    $dbdata[]=$row;
}
echo json_encode($dbdata);


/*This checks a password hash against the provided password
if (password_verify($password, $rows[0]["password"])) {
    $_SESSION["login"] = true;
    $_SESSION["badLogin"] = false;
    header("Location: https://floating-skis.herokuapp.com/SeniorProject/home.php");
    die();
}*/
// if ($password == $rows[0]["password"]) {
//     $_SESSION["login"] = true;
//     $_SESSION["badLogin"] = false;
//     header("Location: https://floating-skis.herokuapp.com/SeniorProject/home.php");
//     die();
// }
// /*if ($rows != NULL) {
//     $_SESSION["login"] = true;
//     $_SESSION["badLogin"] = false;
//     header("Location: https://floating-skis.herokuapp.com/SeniorProject/home.php");
//     die();
// }*/ else {
//     $_SESSION["login"] = false;
//     $_SESSION["badLogin"] = true;
//     header("Location: https://floating-skis.herokuapp.com/SeniorProject/home.php");
//     die();
// }
?>


<!DOCTYPE html>
<html lang="en">

<body>
    <div>Please wait while you are redirected.</div>
    <div>
</body>

</html>