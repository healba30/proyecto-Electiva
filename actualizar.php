<?php 
    include_once('db.php');
    $conectar = conn();

$id=$_GET['id'];

$sql="SELECT * FROM lugares WHERE cod='$id'";
$query=mysqli_query($conectar,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/descarga-assets/Captura.png" type="image/x-icon">
        <title>Actualizar lugares</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST" id="form">
                    
                                <input type="hidden" name="cod" value="<?php echo $row['cod']  ?>">
                                <input type="hidden" class="form-control mb-3" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']  ?>">
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="direccion" placeholder="Direccion" value="<?php echo $row['direccion']  ?>">
                                <input type="text" class="form-control mb-3" name="coordenada" placeholder="Coordenada" value="<?php echo $row['coordenada']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" id="Actualizar" value="Actualizar">
                            <a href="interfazhotel.php" class="btn btn-secondary">Volver</a>
                    </form>
                    
                </div>
                <script src="codigo.js"></script>
    </body>
<script>


$("#Actualizar").click(function() {
    
    $.ajax({
    url: 'update.php',
    type: 'POST',
    data: $('#form').serialize(),

    success: function(res1){

        if (res1==1) {

           
            alert("Hay campos vac??os");
            
        
      } 
      else{

        alert("Cambios realizados exitosamente");
        location.href = "interfazhotel.php";
        

      }
  }          

});           
});

</script>
</html>