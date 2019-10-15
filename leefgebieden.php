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

<ul><li><a href="index.php">Back</a></li></ul>

<?php
try {
    $dbh = new PDO('mysql:host=localhost;port=8889;dbname=apen', "root", "toor");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$stmtleefgebiedenenSoort = $dbh->prepare("SELECT * FROM aap 
JOIN aap_has_leefgebied ON aap_has_leefgebied.idaap = aap.idaap 
JOIN leefgebied ON leefgebied.idleefgebied = aap_has_leefgebied.idleefgebied");
$stmtleefgebiedenenSoort->execute();
$leefgebiedenenSoort = $stmtleefgebiedenenSoort->fetchAll(); ?>

<table>
    <tr>
        <th>Soort</th>
        <th>Leefgebied</th>
    </tr>
    <?php foreach($leefgebiedenenSoort as $leefgebiedSoort) {
        echo "<tr><td>".$leefgebiedSoort['soort']."</td><td>".$leefgebiedSoort['omschrijving']."</td></tr>";

    } ?>

</table>

</body>
</html>