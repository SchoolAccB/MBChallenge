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
try {
$dbh = new PDO('mysql:host=localhost;port=8889;dbname=apen', "root", "toor");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

$stmtapen = $dbh->prepare("SELECT * FROM aap");
$stmtapen->execute();
$apen = $stmtapen->fetchAll();

echo "<ul>";

foreach($apen as $aap) { ?>
<li><a href="https://www.google.nl/search?q=<?=$aap['soort']?>&tbm=isch"><?=$aap['soort']?></a></li>
<?php }

echo "</ul>";

$stmtleefgebieden = $dbh->prepare("SELECT * FROM leefgebied");
$stmtleefgebieden->execute();
$leefgebieden = $stmtleefgebieden->fetchAll();

echo "<ul>";

foreach($leefgebieden as $leefgebied) {
    echo "<li>".$leefgebied['omschrijving']."</li>";
}

echo "</ul>";?>

</body>
</html>