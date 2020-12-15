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
        <img id="logo" src="./img/logo.png">
        <div class="col-7 col-lg-4" id="headerRight" style="margin-top: 5px;">
            <button id="btn-abrir-popup" class="btn-popup">Ir al Login</button>
            <button id="btn-registrar" class="btn-popup">Registrar</button>
        </div>
    </div>
    <div id="bienvenida"></div>

    <h1 align="center">Últimas Experiencias</h1>

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
    <div class="overlay" id="overlay">
      <div class="popup" id="popup">
        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
        <h3>Login - KolvinXperience</h3>
        <div id="formulario">
          <div class="contenedor-inputs">
            <form class="form-login">
              <label for="inputUser" class="sr-only">User</label>
              <input id="usuario" type="text" placeholder="Usuario" required>
              <input id="pass" type="password" placeholder="Contraseña" required>
            </form>
            <p id="messageReg" class= "message-error"></p>
          </div>
          <button id="login" type="submit" class="btn-submit">Login</button>
        </div>
      </div>
    </div>
    <div class="overlay" id="overlayreg">
      <div class="popup" id="popupreg">
        <a href="#" id="btn-cerrar-popupreg" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
        <h3>Registrar - KolvinXperience</h3>
        <div id="formulario">
          <div class="contenedor-inputs">
            <form class="form-reg">
              <label for="inputUser" class="sr-only">User</label>
              <input id="usuarioreg" type="text" placeholder="Usuario" required>
              <input id="passreg" type="password" placeholder="Contraseña" required>
            </form>
            <p id="messageReg" class= "message-error"></p>
          </div>
          <button id="registrar" type="submit" class="btn-submit">Registrar</button>
        </div>
      </div>
    </div>
        <!-- Footer -->

    <?php include('footer.php');?>

    <script type="text/javascript" src="js/scripts.js"></script>
    <script src="./js/popup.js"></script>
</body>

</html>