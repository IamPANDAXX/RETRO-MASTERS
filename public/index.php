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
   
    <main>
        <p class="derechos">© 2025 | Todos los derechos reservados a <strong>MASTERSWEB</strong></p>
        <ul class='slider'>
            <?php foreach ($games as $game): ?>
            <li class='item' data-video="<?php echo htmlspecialchars($game['gif_url']); ?>">
           
                <img class="img-portada" src='<?php echo htmlspecialchars($game['portada_url']); ?>' 
                 alt='<?php echo htmlspecialchars($game['titulo']); ?>'
                 loading='lazy'>
                
                 <video class="video-portada" muted loop playsinline>
                    <source src="" type="video/mp4">
                 </video>

            <div class='content'>
                <h2 class='title'><?php echo htmlspecialchars($game['titulo']); ?></h2>
                <p class='description'><?php echo htmlspecialchars($game['descripcion']); ?></p>
                <button class="btn-53" onclick="window.location.href='gameplayer.php?id=<?= $game['id']; ?>'">
                <div class="original"><img class="original-img" src="imgs/punta-de-flecha-del-boton-de-reproduccion.png" alt=""></div>
                <div class="letters">
                    
                    <span>A</span>
                    <span>H</span>
                    <span>O</span>
                    <span>R</span>
                    <span>A</span>
                </div>
                </button>
            </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <nav class='nav'>
            <ion-icon class='btn prev' name="arrow-back-outline"></ion-icon>
            <ion-icon class='btn next' name="arrow-forward-outline"></ion-icon>
        </nav>

        
</main>

    

    
   


</body>
<script src="js/menu.js"></script>
<script src="js/carrusel.js"></script>
<script>
      AOS.init({ duration: 1200 });
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>