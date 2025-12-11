<?php
include "../backend/conexion/conexion.php";
?>
<?php
//obetenemos el juego con un GET por Id
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$stmt = $pdo->prepare("SELECT * FROM juegos WHERE id = :id");
$stmt->execute(['id' => $id]);
$game = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$game) {
    die("Juego no encontrado" . $id);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars ($game['titulo']) ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- scrip ruffle para flash -->
    <script src="https://unpkg.com/@ruffle-rs/ruffle"></script>
    <!--librerias AOS-->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

</head>
<body>
    <?php include "complements/menu.php"; ?>

    <object
        class="player-flash"
        data="<?= htmlspecialchars($game['archivo_url']) ?>" 
        type="application/x-shockwave-flash">
    </object>

</body>
<script src="js/menu.js"></script>
<script>
      AOS.init({ duration: 1200 });
</script>
</html>