<?php 
    include_once('db.php');
    $conectar = conn();

$id=$_GET['id'];

$sql1="SELECT * FROM usuarios WHERE id='$id'";
$query1=mysqli_query($conectar,$sql1);

$row=mysqli_fetch_array($query1);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/descarga-assets/Captura.png" type="image/x-icon">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="updateU.php" method="POST">
                    
                                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?php echo $row['nombres']  ?>">
                                <input type="text" class="form-control mb-3" name="usuarios" placeholder="Usuario" value="<?php echo $row['usuarios']  ?>">
                                <input type="text" class="form-control mb-3" name="correo" placeholder="Correo electronico" value="<?php echo $row['correo']  ?>">
                                <input type="text" class="form-control mb-3" name="clave" placeholder="Contraseña" value="<?php echo $row['clave']  ?>">
                                <select name="tipo_u" id="tipo_u">
                                        <option value="Usuario">Usuario</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>