<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/configuracion_style.css">
    <title>Document</title>
</head>
<body>
    <a href="http://localhost:3000/PHP/Perfiles.php" class="salir"><img src="../FOTOS/salir.png"  width="60" height="60"> </a>
    <div class="container2">
        <div class="box2">
            <span class="span2"></span>
            <div class="content2">
                <ul class="sci">
                    <form method="post">
                        <li style="--i:1">
                            <h3>Configurar Perfil</h3>
                        </li>
                        <li style="--i:2">
                            <input class= "inp" type="text"   name="name"      placeholder="Nombre del usuario">
                        </li>
                        <li style="--i:3">
                            <input class= "inp" type="text"   name="idn"       placeholder="id del perfil">
                        </li>
                        <li style="--i:4">
                            <input class= "btn" type="submit" name="cnombre"   value="Aceptar">
                        </li>
                        <li style="--i:5">
                            <input class= "inp" type="text"   name="enlace"    placeholder="enlace a tu imagen de perfil">
                        </li>
                        <li style="--i:6">
                            <input class= "inp" type="text"   name="idf"       placeholder="id del perifl">
                        </li>
                        <li style="--i:7">
                            <input class= "btn" type="submit" name="cfoto"     value="Aceptar">
                        </li>
                        <li style="--i:8">
                            <h3>Agregar Perfil</h3>
                        </li>
                        <li style="--i:9">
                            <input class= "inp" type="text"   name="namen"     placeholder="Nombre del usuario">
                        </li>
                        <li style="--i:10">
                            <input class= "inp" type="text"   name="enlacen"   placeholder="enlace a imagen del perfil  /opcional">
                        </li>
                        <li style="--i:11">
                            <input class= "btn" type="submit" name="register"  value="Aceptar">
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    </div>

    <?php
        include("con_db.php");
        session_start();
        $id = $_SESSION['variable'];
        $usuario = "SELECT * FROM perfiles WHERE `idUS` = '$id'";
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
                                        <td class="titulo">ID Usuario</td>
                                        <td class="titulo">ID perfil</td>
                                        <td class="titulo">Normas de imagen </td>
                                    </tr>
                                    <?php while($mostar = mysqli_fetch_array($sacarus)){
                                        ?>
                                        <tr>
                                        <td><?php echo $mostar['nombre']?></td>
                                        <td><?php echo $mostar['idUS']?></td>
                                        <td><?php echo $mostar['id_lista']?></td>
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
        }   


        if(isset($_POST['cnombre'])){
            if(strlen($_POST['name']) >= 1){
                $names = trim($_POST['name']);
                $idd = trim($_POST['idn']);
                $cambio = "UPDATE perfiles SET nombre ='$names' WHERE idUS = '$id' && id_lista = '$idd'";
                $res = mysqli_query($conex,$cambio);
                if($res){
                    ?>
                        <h3 class="recarga">Nombre cambiado con exito</h3>
                    <?php
                }
                else{
                    ?>
                        <h3 class="bad">No se pudo cambiar el nombre</h3>
                    <?php
                }
            }
            else{
                ?>
                    <h3 class="bad">No le pusiste nada</h3>
                <?php
            }
        }

        if(isset($_POST['cfoto'])){
            if(strlen($_POST['enlace']) >= 1){
                $foto = trim($_POST['enlace']);
                $idd = trim($_POST['idf']);
                $cambio = "UPDATE perfiles SET foto ='$foto' WHERE idUS = '$id' && id_lista = '$idd'";
                $res = mysqli_query($conex,$cambio);
                if($res){
                    ?>
                        <h3 class="recarga">foto  cambiada con exito</h3>
                    <?php
                }
                else{
                    ?>
                        <h3 class="bad">No se pudo cambiar la foto</h3>
                    <?php
                }
            }
        }

        if(isset($_POST['register'])){
            if(strlen($_POST['namen']) >= 1 && strlen($_POST['enlacen']) == 0){
                $names = trim($_POST['namen']);
                $agregar = "INSERT INTO perfiles ( nombre , idUS ) VALUES ( '$names' , '$id' )";
                $res = mysqli_query($conex,$agregar);
                if($res){
                    ?>
                        <h3 class="recarga">Perfil Agregado</h3>
                    <?php
                }
                else{
                    ?>
                        <h3 class="bad">No se pudo agregar</h3>
                    <?php
                }
            }
            elseif (strlen($_POST['namen']) >= 1 && strlen($_POST['enlacen']) >= 1 ){
                $names = trim($_POST['namen']);
                $foto = trim($_POST['enlacen']);
                $agregar = "INSERT INTO perfiles ( nombre , idUS , foto ) VALUES ( '$names' , '$id' , '$foto')";
                $res = mysqli_query($conex,$agregar);
                if($res){
                    ?>
                        <h3 class="recarga">Perfil Agregado</h3>
                    <?php
                }
                else{
                    ?>
                        <h3 class="bad">No se pudo agregar</h3>
                    <?php
                }
            }
            else{
                ?>
                    <h3 class="bad">Pon el Nombre por lo menos</h3>
                <?php
            }
        }

    ?>
</body>
</html>