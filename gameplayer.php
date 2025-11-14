<?php
include "conexion/conexion.php" 
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
    <object 
        data="<?= htmlspecialchars($game['archivo_url']) ?>" 
        type="application/x-shockwave-flash" 
        width="800" 
        height="600">
    </object>
</body>
</html>