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

    function getScriptures($book)
    {
        $statement = $db->prepare('SELECT * FROM scriptures AS s WHERE s.book =:book');
        $statement->bindValue(':book', $book, PDO::PARAM_STR);
        $statement->execute();
        $scriptures = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $scriptures;
    }
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
        foreach ($db->query('SELECT * FROM scriptures') as $row) {
            echo '<div><strong>' . $row['book'];
            echo ' ' . $row['chapter'];
            echo ':' . $row['verse'];
            echo '</strong> - ' . $row['content'];
            echo '</div><br>';
        };
        ?>
    </div>

    <form action="display_scriptures.php" method="post">
        <div>Please enter a book:</div>
        <input type="text" name="book">
        <div>Please enter a chapter:</div>
        <input type="number" name="chapter">
        <div>Please enter a verse:</div>
        <input type="number" name="verse">
        <div>Please enter the scripture:</div>
        <textarea name="scripture"></textarea>
        <?php
        foreach ($db->query('SELECT name FROM topic') as $row) {
            echo '<div><input type="checkbox" name="topic[]" value="'.$row['name'].'">' . $row['name'];
        };
        ?>
        <br>
        <input type="submit" value="Submit">
        <input type="hidden" name="action" value="searchScripture">
    </form>


    <?php
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
    }
    switch ($action) {
        case 'searchScripture':
            $book = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
            $scriptures = getScriptures($book);
            echo $scriptures;
            break;
        default:
            break;
    }
    ?>
</body>

</html>