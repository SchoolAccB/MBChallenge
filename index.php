<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Monkey Business</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>

<img id="logo" src="Resources/monkey-business.jpg">

<h1 id="logotext">Select your monkey!</h1>

<img id="logobar" src="Resources/monkey_swings.png">

<?php
$db = mysqli_connect('localhost', 'root', 'toor', 'apen', '8889');
try {
    $dbh = new PDO('mysql:host=localhost;port=8889;dbname=apen', "root", "toor");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$stmtapen = $dbh->prepare("SELECT * FROM aap");
$stmtapen->execute();
$apen = $stmtapen->fetchAll();

echo "<ul>";

foreach ($apen as $aap) { ?>
    <li><a href="https://www.google.nl/search?q=<?= $aap['soort'] ?>&tbm=isch"><?= $aap['soort'] ?></a></li>
<?php }

echo "</ul>"; ?>'

<ul><li><a href="voegleefgebied.php">Voeg leefgebied toe</a></li></ul>

<ul><li><a href="leefgebieden.php">Weergeef alle apen met leefgebieden</a></li></ul>

<ul><li><a href="zoekapensoort.php">Zoek apen soort met leefgebied</a></li></ul>

</body>
</html>