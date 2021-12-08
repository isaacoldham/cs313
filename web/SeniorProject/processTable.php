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


if ($_SESSION["login"] != true) {
    header("Location: https://floating-skis.herokuapp.com/SeniorProject/login.php");
    die();
}



$create_text = htmlspecialchars($_POST["create_text"]);
$insert_text = htmlspecialchars($_POST["insert_text"]);

$stmt1 = $db->prepare($create_text);


if ($stmt1->execute()) {
    echo ' ';
} else {
    $_SESSION["create_table"] = false;
    // header("Location: https://floating-skis.herokuapp.com/SeniorProject/home.php");
    // die();
}

$insertArray = explode('INSERT INTO', $insert_text);
array_shift($insertArray);
//print_r($insertArray);

foreach ($insertArray as &$insertStmt) {
    $dbstmt = $db->prepare('INSERT INTO ' . $insertStmt);
    if ($dbstmt->execute()) {
        echo '';
    } else {
        $_SESSION["insert_table"] = false;
        header("Location: https://floating-skis.herokuapp.com/SeniorProject/home.php");
        die();
    }
}



// $stmt2 = $db->prepare($insert_text);


// if ($stmt2->execute()) {
//     $_SESSION["login"] = true;
//     $_SESSION["badLogin"] = false;
//     echo "Inserted!!!!";
//     //header("Location: https://floating-skis.herokuapp.com/SeniorProject/.php");
//     //die();
// }

$parts = explode(' ', $create_text);
$table_name = $parts[2];
echo 'table_name = [' . $table_name . ']';
$query = 'SELECT * FROM ' . $table_name . ';';
$stmt3 = $db->query($query);

$dbdata = array();
$dbdata = $stmt3->fetchAll();
// while ( $row = pg_fetch_assoc($stmt3)) {
//     $dbdata[]=$row;
// }

$dropString = 'DROP TABLE IF EXISTS ' . $table_name;
$dropStmt = $db->prepare($dropString);
//$dropStmt->bindValue(':table_name', $table_name, PDO::PARAM_STR);
if($dropStmt->execute()){
    echo '';
}
else {
    echo 'drop table did not work';
}
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

    <h2>Welcome <?php echo $_SESSION['username']; ?>!</h2>
    <div style="text-align:center">

        <?php
        // if (isset($_SESSION['message']) && $_SESSION['message'])
        // {
        //   echo '<p class="notification">' . $_SESSION['message'] . '</p>';
        //   unset($_SESSION['message']);
        // }
        print_r($_SESSION);
        ?>

    </div>

    <div style="width: 100%; float: clear; box-sizing: border-box; clear: both;">
        <?php echo json_encode($dbdata, JSON_PRETTY_PRINT); ?>
        <br><br>
        <div id="jsonDiv"><?php echo json_encode($dbdata); ?></div>
    </div>

    <br><br><br><br>
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
<script>
    var jsonString = document.getElementById('jsonDiv').innerHTML;
    var jsonPretty = JSON.stringify(JSON.parse(jsonString),null,2);  
    document.getElementById('jsonDiv').innerHTML = jsonPretty;
    console.log(jsonPretty);
</script>