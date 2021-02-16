<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/agregarCanciones_style.css">
    <title>Document</title>
</head>
<body>
    <a href="http://localhost:3000/PHP/Principal.php" class="salir"><img src="../FOTOS/salir.png"  width="60" height="60"> </a>
    <div class="cuadro1"></div>
    <div class="cuadro2"></div>
    
    <div class="caja">
        <form method="post" class=content>
            <h3>Agregar Cancion</h3>
            <input class="in" type="text"   name="name"      placeholder="Nombre de la cancion">
            <input class="in" type="text"   name="lkmusica"  placeholder="Ingresa el link de la musica">
            <input class="su" type="submit" name="register"  value="Aceptar">
            <h3>Eliminar Canacion</h3>
            <input class="in" type="text"   name="id"      placeholder="Ingresa el id de la cancion">
            <input class="su" type="submit" name="eliminar"  value="Aceptar">
            <a class="saber" href="http://localhost:3000/PHP/aprende.php">Aprende a Agregar canciones aqui</a>
        </form>
    </div>

    <?php
        include("con_db.php");
        session_start();
        $id_pf=$_SESSION['id'];
        $usuario = "SELECT * FROM canciones WHERE id_list = '$id_pf'";
        $sacarus = mysqli_query($conex,$usuario);
        if(mysqli_num_rows($sacarus) > 0){
        ?>
            <div class="container">
                <div class="box">
                    <span></span>
                    <div class="content">
                        <h3>Lista Perfiles</h3>
                        <table>
                            <tr>
                                <td class="titulo">Nombre</td>
                                <td class="titulo">ID lista</td>
                            </tr>
                            <?php while($mostar = mysqli_fetch_array($sacarus)){
                            ?>
                                <tr>
                                    <td><?php echo $mostar['nombre']?></td>
                                    <td><?php echo $mostar['idcancion']?></td>
                                    <td class="titulo">enlaces de imagen correctos sino, no se identifican</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php
        }else{
            ?> 
            <div class="mensaje">
                <h3 >Todavia no hay canciones , Agrega una :3 </h3> 
            </div>
            <?php
        }

        if(isset($_POST['register'])){
            if(strlen($_POST['name']) >= 1 && strlen($_POST['lkmusica']) >= 1){
                $names = trim($_POST['name']);
                $music = trim($_POST['lkmusica']);
                $agregar = "INSERT INTO canciones(nombre, cancion, id_list) VALUES ('$names','$music','$id_pf')";
                $res = mysqli_query($conex,$agregar);
                if($res){
                    ?>
                        <h3 class="recarga">Cancion Agregada</h3>
                    <?php
                }
                else{
                    ?>
                        <h3 class="bad">No se pudo agregar</h3>
                    <?php
                }
            }
        }

        if(isset($_POST['eliminar'])){
            if(strlen($_POST['id']) >= 1){
                $ids = trim($_POST['id']);
                $quitar ="DELETE FROM canciones WHERE idcancion = '$ids'";
                $res = mysqli_query($conex,$quitar);
                if($res){
                    ?>
                        <h3 class="recarga">Cancion Eliminada</h3>
                    <?php
                }
                else{
                    ?>
                        <h3 class="bad">No se pudo eliminar</h3>
                    <?php
                }
            }
        }
    ?>
</body>
</html>