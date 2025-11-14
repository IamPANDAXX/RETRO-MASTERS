<?php
$host = "dpg-d4bbn475r7bs7392gt8g-a.oregon-postgres.render.com";
$dbname = "retro_games";
$user = "pandaxx";
$pass = "hmtUK52VrQVqRsAkV7qtw82ytyjGaLtY";
$port = "5432";

try {
    $pdo = new PDO("pgsql:host=$host; port=$port; dbname=$dbname", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "ya conecto tu!";
} catch (PDOException $e) {
    die ("No conecto tu!:" .$e->getMessage());
}
?>