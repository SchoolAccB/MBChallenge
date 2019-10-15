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
    <form action="" method="post">
        <input type="text" name="zoekaapinput" placeholder="Aap soort">
        <button type="submit" name="zoekaapsubmit">Submit</button>
    </form>
</div>

<?php
try {
    $dbh = new PDO('mysql:host=localhost;port=8889;dbname=apen', "root", "toor");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$gezochteAap = "";

if (isset($_POST['zoekaapsubmit'])) {
$gezochteAap = $_POST['zoekaapinput']."%";
if ($gezochteAap == "%") {
    echo "<ul><li>Geen aap gevonden</li></ul>";
    exit();
} else {


$stmtzoekaap = $dbh->prepare("SELECT soort, omschrijving FROM aap
JOIN aap_has_leefgebied ON aap_has_leefgebied.idaap = aap.idaap
JOIN leefgebied ON leefgebied.idleefgebied = aap_has_leefgebied.idleefgebied WHERE soort LIKE :gezochteAap");
$stmtzoekaap->execute([":gezochteAap" => $gezochteAap]);
$zoekApen = $stmtzoekaap->fetchAll(); ?>

<table>
    <tr>
        <th>Soort</th>
        <th>Leefgebied</th>
    </tr>
    <?php foreach ($zoekApen as $zoekAap) {
        echo "<tr><td>" . $zoekAap['soort'] . "</td><td>" . $zoekAap['omschrijving'] . "</td></tr>";

    }
    }
    }


    ?>
</table>

</body>
</html>



