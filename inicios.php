



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/styleinicios.css">
    <link rel="shortcut icon" href="img/descarga-assets/Captura.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>

    <header>

        <nav>

            <a href="Inicio.html">Inicio</a>
            <a href="Restaurante.html">Restaurantes</a>
            <a href="Discotecas.html">Discotecas</a>
            <a href="Moteles.html">Hoteles</a>
            <a href="Registrate.html">Registrate</a>
            <a href="inicios.php">Iniciar sesión</a>
            <a href="Contactos.html">Contactanos</a>
            
        </nav>

    </header>

    <form method="POST" id="form">
        
        <div class="form">
            <h1>Inicio de sesión</h1>
            <div class="grupo">
                <input type="text" name="usuariolg" id="users" placeholder="Usuario"><span class="barra"></span>
                
            </div>
            <div class="grupo">
                <input type="password" name="passlg" id="password" placeholder="Contraseña"><span class="barra"></span>
            </div>
            <button type="button" id="btnEnviar" name="Enviar" >Iniciar sesión</button>
            <p class="warnings" id="warnings"></p>
        </div>
    </form>

    <script src="codigo.js"></script>

</body>


<script>

$('#btnEnviar').click(function(){

    const nombre = document.getElementById("name")
    const correo = document.getElementById("email")
    const pass = document.getElementById("password")
    const pass1 = document.getElementById("password1")
    let warnings1 = ""
    let entrar4 = false
    let entrar2 = false
        
        $.ajax({
            url: 'verificarInicioS.php',
            type: 'POST',
            dataType: 'json',
            data: $('#form').serialize(), 
        })
        .done(function(respuesta) {
                console.log(respuesta);
                if (!respuesta.error) {
                    if (respuesta.tipo == 'Admin') {
                        location.href = "Registrate.html";
                    }else if(respuesta.tipo == 'Usuario'){
                        location.href = "sesionu.php";
                    }
                }else{
                    warnings1 += `Credenciales incorrectas`
                  entrar4 = true;
                  
                  if (entrar4==true) {
                      parrafo.innerHTML = warnings1
                  } 
                }
            })
            

    });




</script>



</html>


