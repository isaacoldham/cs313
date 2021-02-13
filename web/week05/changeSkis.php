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


$ski_id = htmlspecialchars($_POST["ski_id"]);
$make = htmlspecialchars($_POST["make"]);
$length = htmlspecialchars($_POST["length"]);
$type = htmlspecialchars($_POST["type"]);
echo var_dump($_POST);

echo 'test 3';

$stmt = $db->prepare('UPDATE skis SET ski_name=:ski_name,make=:make,length=:length,type=:type WHERE ski_id =:ski_id;');
echo 'test 3.1';
$stmt->bindValue(':ski_id', $ski_id, PDO::PARAM_STR);
echo 'test 3.2';
$stmt->bindValue(':make', $make, PDO::PARAM_STR);
echo 'test 3.3';
$stmt->bindValue(':length', $length, PDO::PARAM_STR);
echo 'test 3.4';
$stmt->bindValue(':type', $type, PDO::PARAM_STR);
echo 'test 3.5';
$stmt->execute();

echo 'test 4';

$string2 = 'SELECT * FROM skis WHERE ski_id ='.$ski_id;
$stmt2 = $db->prepare($string2);
$stmt2->execute();
$ski = $stmt2->fetchAll(PDO::FETCH_ASSOC);

echo 'test 5';

echo var_dump($ski);
echo print_r($ski);
?>
<!DOCTYPE html>
<html lang="en">
<body>
<?php
    echo '<br>ski variable: '.print_r($ski);
    echo '<br>post variable:'.print_r($_POST);
?>

</body>
</html>