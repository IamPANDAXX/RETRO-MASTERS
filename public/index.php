<?php
include "../backend/conexion/conexion.php" 
?>
<?php
//obetenemos el juego con un GET por Id
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$stmt = $pdo->prepare("SELECT * FROM juegos WHERE visible = TRUE");
$stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RETRO-MASTERS</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="imgs/logo-retro-master_transparente-ico.png" type="image/jpg">
    <!-- scrip ruffle para flash -->
    <script src="https://unpkg.com/@ruffle-rs/ruffle"></script>
    <!--librerias AOS-->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

</head>
    
<body>
    <?php include "complements/menu.php"; ?>

    <div class="contenedor-general">
    <?php foreach ($games as $game): ?>
    <div class="card">
        <div class="first-content">
            <span><?php echo htmlspecialchars($game['titulo']); ?></span>
        </div>
    <div class="second-content">
        <span>
            <img class="s-content-img" src="<?php echo htmlspecialchars($game['portada_url']); ?>" alt="">
        </span>
    </div>
    <button class="btn-53" onclick="window.location.href='gameplayer.php?id=<?= $game['id']; ?>'">
        <div class="original">JUEGA</div>
        <div class="letters">
            
            <span>A</span>
            <span>H</span>
            <span>O</span>
            <span>R</span>
            <span>A</span>
        </div>
    </button>

    </div>
    <?php endforeach; ?>
    </div>

    
   


</body>
<script src="js/menu.js"></script>
<script>
      AOS.init({ duration: 1200 });
</script>
</html>