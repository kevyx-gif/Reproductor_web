<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro :3</title>
    <link rel="stylesheet" href="../CSS/Usuario_style.css">
</head>
<body>
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class=container>
                <div class="form">
                    <h1> Registrate Aqui </h1>
                    <form method="post">
                        <div class="inputBox">
                            <input type="text" name="name" placeholder="Usuario">
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" placeholder="Contraseña">
                        </div>
                        <div class="inputBox">
                            <input name="register" type="submit">
                        </div>
                        <div><a href="http://localhost:3000/PHP/login.php">Regresar</a> </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    
        include("con_db.php");

        if(isset($_POST['register'])){
            if (strlen($_POST['name']) >= 1 && strlen($_POST['password']) >= 1){
                $names = trim($_POST['name']);
                $nuevo_usuario="SELECT * FROM usuario WHERE nombre = '$names'";
                $res = mysqli_query($conex,$nuevo_usuario);
                if(mysqli_num_rows($res) > 0){
                    ?>
                        <h3 class="Es"> Lo sentimos el nombre del usuario ya no esta disponible</h3>
                    <?php
                }
                else{
                    $name = trim($_POST['name']);
                    $password = trim($_POST['password']);
                    $consulta = "INSERT INTO usuario(nombre , contraseña) VALUES ('$name','$password')";
                    $resultado = mysqli_query($conex,$consulta);
                    if($resultado){
                        ?>
                        <h3 class="ok">¡Se registro Correctamente!</h3>
                        <?php
                        $seconds=2;
                        sleep ( $seconds );
                        header('Location: http://localhost:3000/PHP/login.php'); 
                        exit;
                    }
                    else{
                        ?>
                        <h3 class="bad">¡Ups ha ocurrido un error!</h3>
                        <?php
                    }
                }
            }
            else{
                ?>
                    <h3 class="bad">¡Complete los campos porfavor!</h3>
                <?php
            }
        }
    ?>

</body>
</html>