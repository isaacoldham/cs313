<?php
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
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<div>
<?php
    foreach ($db->query('SELECT * FROM scriptures') as $row)
    {
      echo 'book: ' . $row['book'];
      echo ' chapter: ' . $row['chapter'];
      echo ' verse:' . $row['verse'];
      echo ' content:' . $row['content'];
    };
?>
</div>

<form>

</form>
</body>


</html>