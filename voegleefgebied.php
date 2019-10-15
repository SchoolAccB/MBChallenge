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

<div id="zoekform">
    <form id="leefgebiedinput" action="" method="post">
        <input type="text" name="idleefgebied" placeholder="ID">
        <input type="text" name="omschrijvingleefgebied" placeholder="Leefgebied">
        <button type="submit" name="submitleefgebied">Submit</button>
    </form>
</div>

<?php
try {
    $dbh = new PDO('mysql:host=localhost;port=8889;dbname=apen', "root", "toor");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$leefgebiedId = 0;
$leefgebiedOmschrijving = "";

if (isset($_POST['submitleefgebied'])) {
    $leefgebiedId = $_POST['idleefgebied'];
    $leefgebiedOmschrijving = $_POST['omschrijvingleefgebied'];

    $sql = "INSERT INTO leefgebied (idleefgebied, omschrijving) VALUES ('$leefgebiedId', '$leefgebiedOmschrijving')";
    $dbh->exec($sql);
}

$stmtleefgebieden = $dbh->prepare("SELECT omschrijving, idleefgebied FROM leefgebied");
$stmtleefgebieden->execute();
$leefgebieden = $stmtleefgebieden->fetchAll(); ?>

<table>
    <tr>
        <th>ID</th>
        <th>Omschrijving</th>
    </tr>

    <?php foreach ($leefgebieden as $leefgebied) {
        echo "<tr><td>" . $leefgebied['idleefgebied'] . "</td><td>" . $leefgebied['omschrijving'] . "</td></tr>";
    }

    echo "</ul>";?>
</table>
</body>
</html>