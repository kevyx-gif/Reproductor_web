<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $aqui = $_SESSION['idd'];
        $aqui2 = $_SESSION['variable'];
        ?><h3>  aquiii <?php echo $aqui?></h3> <?php
        ?><h3>  aquiiix <?php echo $aqui2?></h3> <?php
    ?>
</body>
</html>