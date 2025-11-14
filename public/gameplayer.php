<?php
include "../backend/conexion/conexion.php" 
?>
<?php
//obetenemos el juego con un GET por Id
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$stmt = $pdo->prepare("SELECT * FROM juegos WHERE id = :id AND visible = TRUE");
$stmt->execute(['id' => $id]);
$game = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$game) {
    die("Juego no encontrado 😢");
}

//Striker%20Force%20Heroes%202.swf
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars ($game['titulo']) ?></title>
    <script src="https://unpkg.com/@ruffle-rs/ruffle"></script>
</head>
<body>
    <object style="width:800px; height:600px;" src="<?= htmlspecialchars($game['archivo_url']) ?>"></object>

</body>
</html>