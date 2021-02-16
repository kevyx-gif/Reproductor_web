<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/reproductor_style.css">
    <link rel="stylesheet" href="../CSS/swiper.css" />
    <title>Document</title>
</head>
<body>
    <a href ="http://localhost:3000/PHP/Principal.php" class="salir"><img src="../FOTOS/salir.png" width="60" height="60"></a>
    
            
                <?php 
                    include("con_db.php");
                    session_start();
                    $id = $_SESSION["id"];
                    $canciones = "SELECT nombre ,  cancion FROM  canciones  WHERE id_list = '$id'";
                    $res = mysqli_query($conex,$canciones);
                    if(mysqli_num_rows($res) > 0){
                        ?>
                            <div class="testimonials">
                                <div class="swiper-container">
                                <div class="swiper-wrapper">
                        <?php
                        while($mostrar = mysqli_fetch_array($res)){
                        ?>
                            <div class="swiper-slide">
                                <div class="card" >
                                    <div class="layer" ></div>
                                        <div class="content">
                                            <div class="imgBx" >
                                                <?php echo $mostrar ['cancion'] ?>
                                            </div>
                                        <div class="details">
                                            <h2><br><span><?php echo $mostrar ['nombre'] ?></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    else{
                        ?>
                        <h5 class="nohay">No hay canciones porfavor agrega una para reproducir</h5>
                        <?php
                    }
                ?>
                

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 0,
        modifier: 1,
        slideShadows: true,
        },
        loop:true,
    });
    </script>

</body>
</html>