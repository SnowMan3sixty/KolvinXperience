<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        require_once('php/Experiencia.php');
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="icon" href="icon.ico">
    <link rel="stylesheet" href="./css/index.css">

    <title>KolvinExp</title>
</head>

<body>
    <?php include('header.php');?>

    <div class="navbar" id="navbar">
        <a id="logo" href = "#top"><img src="./img/logo.png" alt="logo" width="100" height="70"></a>
        <!-- <img id="logo" src="./img/logo.png"> -->
        <div class="col-7 col-lg-4" id="headerRight" style="margin-top: 5px;">
            <button id="btn-abrir-popup" class="btn-popup">Ir al Login</button>
            <button id="btn-registrar" class="btn-popup">Registrar</button>
            <a href="logout.php" style="display: none;" id="btn-logout" class="btn-popup">Salir</a>
        </div>
    </div>
    <div id="bienvenida"></div>

    <div style="text-align: center;">
      <h1>Últimas Experiencias</h1>
      <button style="display: none;" id="btn-crear" class="btn-popup">Crear experiencia</button>
    </div>
    

    <div class="container margin-bottom-20">
        <div class="row d-flex flex-row-reverse bd-highlight col-12">
            <div id="afegir"></div>
            <div id="filtreCat"></div>
            <div id="ordenacio"></div>
        </div>
    </div>
    <div class="container">
        <div class="row" id="experiencies">

        </div>
    </div>

    <!-- Popups -->

    <!-- POPUP LOGIN -->
    <div class="overlay" id="overlay">
      <div class="popup" id="popup">
        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup">X</a>
        <h3>Login - KolvinXperience</h3>
        <div id="formulario">
          <div class="contenedor-inputs">
            <form class="form-login">
              <input id="usuario" type="text" placeholder="Usuario" required>
              <input id="pass" type="password" placeholder="Contraseña" required>
            </form>
            <p id="message" class= "message-error"></p>
          </div>
          <button id="login" type="submit" class="btn-submit">Login</button>
        </div>
      </div>
    </div>
    <!-- POPUP REGISTER-->
    <div class="overlay" id="overlayreg">
      <div class="popup" id="popupreg">
        <div><a href="#" id="btn-cerrar-popupreg" class="btn-cerrar-popup">X</a></div>
        <h3>Registrar - KolvinXperience</h3>
        <div id="formulario">
          <div class="contenedor-inputs">
            <form class="form-reg">
              <input id="usuarioreg" type="text" placeholder="Usuario" required>
              <input id="passreg" type="password" placeholder="Contraseña" required>
            </form>
            <p id="messageReg" class= "message-error"></p>
          </div>
          <button id="registrar" type="submit" class="btn-submit">Registrar</button>
        </div>
      </div>
    </div>
    <!-- POPUP CREATE-->
    <div class="overlay" id="overlayCrear">
      <div class="popup" id="popupCrear">
        <div><a href="#" id="btn-cerrar-popupCrear" class="btn-cerrar-popup">X</a></div>
        <h3>Crea tu experiencia</h3>
        <div id="formulario">
          <div class="contenedor-inputs">
            <form class="form-Crear">
              <input id="tituloCrear" type="text" placeholder="Título" required>
              <input id="contenidoCrear" type="text" placeholder="Contenido" required>
            </form>
            <p id="messageCrear" class= "message-error"></p>
          </div>
          <button id="crearXP" type="submit" class="btn-submit">Crear Experiencia</button>
        </div> 
      </div>
    </div>
    <!--  POPUP  DETAILS -->
    <div class="overlay" id="overlayDetails">
      <div class="popup" id="popupDetails">
        <a href="#" id="btn-cerrar-popupDetails" class="btn-cerrar-popup">X</a>
        <h3>Details Experiencie</h3>
        <div id="details_content">
          <div id ="details_title"></div>
          <div id="details_image"></div>
          <div id="details_descripciomap">
            <div id="details_descripcio"></div>
            <div id="details_mapa"></div>
          </div>
          <div id="details_footerExperiencia">
            <div id="details_data"></div>
            <div id="details_categoria"></div>
            <div id="details_likes"></div>
            <div id="details_dislikes"></div>
          </div>    
        </div>
      </div>
    </div>
    <!-- Footer -->

    <?php include('footer.php');?>

    <script type="text/javascript" src="js/scripts.js"></script>
    <script src="./js/popup.js"></script>
</body>

</html>