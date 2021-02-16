<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Perfiles_style.css">
    <title>Reproductor</title>
</head>
<body>
    <section>
        <div class="container">

            <a href="http://localhost:3000/PHP/configuracion.php" class="nota">
            <div class="card" >
                <div class="content">
                    <div class="imgBX" ><img src="../FOTOS/confi.png"></div>
                    <div class="contentBx">
                        <h3>Configuracion de Perfil</h3>
                    </div>
                </div>
            </div>
            </a>

            <a href="http://localhost:3000/PHP/paso2.php" class="nota">
            <div class="card" >
                <div class="content">
                    <div class="imgBX" ><img src="https://www.seekpng.com/png/detail/18-189630_icono-de-flecha-en-estilo-plano-icono-flecha.png" alt="Icono De Flecha En Estilo Plano - Icono Flecha Png@seekpng.com"></div>
                    <div class="contentBx">
                        <h3>Salir</h3>
                    </div>
                </div>
            </div>
            </a>

        </div>
    </section>
    <script type="text/javascript" src="../JS/vanilla-tilt.js"></script>
    <script>
        VanillaTilt.init(document.querySelectorAll(".card"),{
		max: 25,
		speed: 400,
        glare: true,
        "max-glare": 1,});
    </script>

    <?php
        include("con_db.php");
        session_start();
        $id = $_SESSION['variable'];
        $usuario = "SELECT * FROM perfiles WHERE `idUS` = '$id'";
        $sacarus = mysqli_query($conex,$usuario);
        if(mysqli_num_rows($sacarus) > 0){
            while($mostar = mysqli_fetch_array($sacarus)){
                ?>
                    <div class="container">
                        <a class="nota" href="http://localhost:3000/PHP/paso.php?var=<?php echo $mostar['id_lista']?>">
                            <div class="card" >
                                <div class="content">
                                    <div class="imgBX" ><img src=<?php echo $mostar['foto']?>></div>
                                    <div class="contentBx">
                                        <h3><?php echo $mostar['nombre']?><br><span>Musica</span></h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>  
                    <script type="text/javascript" src="../JS/vanilla-tilt.js"></script>
                    <script>
                        VanillaTilt.init(document.querySelectorAll(".card"),{
		                    max: 25,
		                    speed: 400,
                            glare: true,
                            "max-glare": 1,});
                    </script>
                <?php
            }
        }   
        else{
            ?>
                <h3 class="bad">No hay lista de perfiles Crea Tus pefil</h3>
            <?php
        }
    ?>

</body>
</html>