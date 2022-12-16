<?php 
    include_once('db.php');
    $conectar = conn();

$id=$_GET['id'];

$sql1="SELECT * FROM restaurantes WHERE cod_res='$id'";
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
        <link rel="stylesheet" type="text/css" href="css/estiloss.css">      
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>

    <header>
    <divc class="containerrr"> 
    <h1>Actualizar datos</h1>
    </div>
    </header>

                <div class="container mt-5">
                    <form action="updateR.php" method="POST" class="form" id="form">
                    
                                <input type="hidden" name="cod_res" id="cod_res" value="<?php echo $row['cod_res']  ?>">
                                <input type="hidden" class="form-control mb-3" name="telefono1" id="telefono1" placeholder="Telefono" value="<?php echo $row['telefono1']  ?>">
                                <input type="text" class="form-control mb-3" name="nombre1" id="nombre1" placeholder="Nombre" value="<?php echo $row['nombre1']  ?>">
                                <input type="text" class="form-control mb-3" name="direccion1" id="direccion1" placeholder="Direccion" value="<?php echo $row['direccion1']  ?>">
                                <input type="text" class="form-control mb-3" name="coordenada1" id="coordenada1" placeholder="Coordenada" value="<?php echo $row['coordenada1']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" id="Actualizar" value="Actualizar">
                            <a href="interfazrestaurante.php" class="btn btn-secondary">Volver</a>
                    </form>
                    
                </div>
                <script src="codigo.js"></script>
    </body>

<script>


$("#Actualizar").click(function() {
    
    $.ajax({
    url: 'updateR.php',
    type: 'POST',
    data: $('#form').serialize(),

    success: function(res1){

        if (res1==1) {

           
            alert("Hay campos vacíos");
            
        
      } 
      else{

        alert("Cambios realizados exitosamente");
        location.href = "interfazrestaurante.php";
        

      }
  }          

});           
});

</script>

    
</html>