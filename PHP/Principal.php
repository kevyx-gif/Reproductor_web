<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Principal_style.css">
    <title>Reproductor</title>
</head>
<body>
    <div class="glowing">
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
    </div>

    <div class="glowing">
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
    </div>


    <div class="glowing">
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
    </div>

    <div class="glowing">
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
    </div>

    <div class="container">
        <div class="card" >
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <div class="content">
                <h3>Lista de Canciones</h3>
                <p>Añade Canciones a tu playList, elimina las canciones que no te gusten</p>
                <a class="btn" href="http://localhost:3000/PHP/agregarCanciones.php">Agrega Canciones</a>
            </div>
        </div>
        
        <div class="card" >
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <div class="content">
                <h3>Reproductor de Musica</h3>
                <p>Reproduce las canciones de tu playList, disfruta de tu musica</p>
                <a href="http://localhost:3000/PHP/reproductor.php" >¡Click aqui!</a>
            </div>
        </div>

        <a href="http://localhost:3000/PHP/Perfiles.php" class="nota">
        <div class="card" >
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <div class="salir">
                <div class="imgBX" ><img src="https://www.seekpng.com/png/detail/18-189630_icono-de-flecha-en-estilo-plano-icono-flecha.png" alt="Icono De Flecha En Estilo Plano - Icono Flecha Png@seekpng.com"></div>
                <div class="contentBx">
                <h3>Salir</h3>
                </div>
                </div>
            </div>
            </a>



    </div>
    <script type="text/javascript" src="../JS/vanilla-tilt.js"></script>
    <script>
        VanillaTilt.init(document.querySelectorAll(".card"),{
        max: 25,
        axis: "x",
        speed: 400,
        glare: true,
        "max-glare": 0.5,});
    </script>

</body>
</html>