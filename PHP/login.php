<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/login_style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="content">
                <div class="imgBX"><img src="../FOTOS/logo_sin_nombre.png"></div>
                    <div class="contentBx">
                        <h3 class="nombre_logo">CreativeWare</h3>
                        <h3>Inicio de Sesion</h3>
                    </div>
                </div>
                    <ul class="sci">
                        <form method="post">
                        <li style="--i:1">
                            <input class="us" type="text" name="name" placeholder="Usuario">
                        </li>
                        <li style="--i:2">
                            <input class="pass" type="password" name="password" placeholder="Contraseña">
                        </li>
                        <li style="--i:3">
                            <input class="boton" name="register" type="submit" value="entrar">
                        </li>
                        <li style="--i:4">
                            <a href="http://localhost:3000/PHP/RegistroPerfiles.php" >¿No tienes cuenta?</a>
                        </li>
                        </form> 
                    </ul>
            </div>
        </div>
    </div>
    
    <?php
        include("con_db.php");
        if(isset($_POST['register'])){
            if (strlen($_POST['name']) >= 1 && strlen($_POST['password']) >= 1){
                $names = trim($_POST['name']);
                $contraseña = trim($_POST['password']);
                $nuevo_usuario="SELECT * FROM usuario WHERE nombre = '$names' and contraseña = '$contraseña'";
                $res = mysqli_query($conex,$nuevo_usuario);
                //Si hay filas con esa contraseña y usuario entra
                if(mysqli_num_rows($res) > 0){
                    //guardar en session el id para usar en perfiles
                    session_start();
                    $_SESSION['variable'] = mysqli_fetch_array($res)['id'];
                    //checar si el usuario tiene un perfil 
                    $checar = $_SESSION['variable'];
                    $ulti = $_SESSION['variable'];
                    $usuario = "SELECT * FROM perfiles WHERE `idUS` = '$checar'";
                    $sacarus = mysqli_query($conex,$usuario);
                    //si ya tiene un perfil entra
                    if(isset(mysqli_fetch_array($sacarus)['idUS'])){
                        ob_start();
                        header('Location: http://localhost:3000/PHP/Perfiles.php');
                        exit;
                    }
                    //si no tiene perfil se le crea el perfil central
                    else{
                        $default = "usuario";
                        $fotod="https://st2.depositphotos.com/1001599/8226/v/600/depositphotos_82260992-stock-illustration-man-with-virtual-reality-headset.jpg";
                        $insertar="INSERT INTO perfiles(nombre, idUS, foto) VALUES ('$default','$ulti','$fotod')";
                        $resultado = mysqli_query($conex,$insertar);
                        if($resultado){
                            ?>
                                <h3 class="recarga">Dato creado con exito</h3>
                            <?php
                            ob_start();
                            header('Location: http://localhost:3000/PHP/Perfiles.php');
                            exit;
                        }
                        else{
                            ?>
                                <h3 class="Es"> por razon de perfil no se inicio correctamente la cuenta</h3>
                            <?php
                        }
                    }
                }
                //Son datos incorrectos
                else{
                    ?>
                        <h3 class="Es">Tu usuario o contraseña son incorrectos</h3>
                    <?php
                }
            }
            else{
                ?>
                    <h3 class="bad">¡Completa los campos!</h3>
                <?php
            }
        }
    
    ?>
</body>
</html>