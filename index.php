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
    <link rel="icon" href="icon.ico">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <title>KolvinExp</title>
</head>

<body>
    <!-- <?php include('php/header.php');?> -->

    <div class="navbar" id="navbar">
        <a id="logo" href = "index.php"><img src="./img/logo.png" alt="logo" width="100" height="70"></a>
        <!-- <img id="logo" src="./img/logo.png"> -->
        <div class="col-7 col-lg-4" id="headerRight" style="margin-top: 5px;">
            <button id="btn-abrir-popup" class="btn-popup">Ir al Login</button>
            <button id="btn-registrar" class="btn-popup">Registrar</button>
            <a href="logout.php" style="display: none;" id="btn-logout" class="btn-popup">Salir</a>
        </div>
    </div>

    <p id="bienvenida"></p>

    <div style="text-align: center;">
      <h1>Últimas Experiencias</h1>
      <button style="display: none;" id="btn-crear" class="btn-popup botones">Crear experiencia</button>
      <button style="display: none;" id="btn-personal" class="btn-popup botones">Ver mi información personal</button>
      <button style="display: none;" id="btn-reportadas" class="btn-popup botones">Ver experiencias reportadas</button>
      <button style="display: none;" id="btn-borrador" class="btn-popup botones">Ver experiencias en borrador</button>
    </div>
    

    <div id="div_filtros" class="container margin-bottom-20">
        <div id="filtreCat"></div>
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
              <input id="usuario" type="text" placeholder="Usuario" usuarioID="" required>
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
              <input id="usuarioreg" type="text" placeholder="Usuario" required >
              <input id="passreg" type="password" placeholder="Contraseña" required>
              <input id="confirmpassreg" type="password" placeholder="Confirmar contraseña" required>
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
              <div id="categoriasCrear">Categoria: </div>
              <input id="tituloCrear" type="text" placeholder="Título" required>
              <input id="contenidoCrear" type="text" placeholder="Contenido" required>
              <input id="imagenCrear" type="text" placeholder="URL de la imagen" required>
              <input id="coordenadaCrear" type="text" placeholder="Iframe para las coordenadas" required>
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
        <i class="fas fa-exclamation-triangle" id="reportar"></i><a href="#" id="btn-cerrar-popupDetails" class="btn-cerrar-popup">X</a>
        <div id="details_content">
          <div id ="details_title"></div>
          <div id="details_descripcio"></div>
          <div id="details_descripciomap">
            <div id="details_image"></div>
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
    <!--  POPUP UPDATE -->
    <div class="overlay" id="overlayEditar">
      <div class="popup" id="popupEditar">
        <div><a href="#" id="btn-cerrar-popupEditar" class="btn-cerrar-popup">X</a></div>
        <h3>Edita tu experiencia</h3>
        <div id="formulario">
          <div class="contenedor-inputs">
            <form class="form-Editar">
              <!-- <input id="tituloEditar" type="text" placeholder="Título" value="" required> -->
              <input id="tituloEditar" value="" tituloID=""/>
              <input id="contenidoEditar" value=""/>
              <input id="imagenEditar" value=""/>
              <input id="coordenadaEditar" value=""/>
              <!-- <div id="contenidoEditar"></div> -->
            </form>
            <p id="messageEditar" class= "message-error"></p>
          </div>
          <button id="editarXP" type="submit" class="btn-submit">Editar Experiencia</button>
        </div> 
      </div>
    </div>
    <!--  POPUP DELETE -->
    <div class="overlay" id="overlayEliminar">
      <div class="popup" id="popupEliminar">
        <div><a href="#" id="btn-cerrar-popupEliminar" class="btn-cerrar-popup">X</a></div>
        <h3>Elimina tu experiencia</h3>
        <div id="formulario">
          <div class="contenedor-inputs">
            <form class="form-Editar">
              <div>¿Estás seguro de que deseas eliminar esta experiencia?</div>
            </form>
            <p id="messageEliminar" class= "message-error"></p>
          </div>
          <button id="eliminarXP" type="submit" class="btn-submit" eliminarID="">Aceptar</button>
          <button id="cerrarEliminarXP" type="submit" class="btn-submit">Cancelar</button>
        </div> 
      </div>
    </div>
    <!--  POPUP PERSONAL -->
    <div class="overlay" id="overlayPersonal">
      <div class="popup" id="popupPersonal">
        <div><a href="#" id="btn-cerrar-popupPersonal" class="btn-cerrar-popup">X</a></div>
        <h3>Mi información personal</h3>
        <div id="formulario">
          <div class="contenedor-inputs">
            <form class="form-Personal">
              <!-- <input id="tituloEditar" type="text" placeholder="Título" value="" required> -->
              <div>Tu ID de usuario es: <spann id ="idUsuario"></span></div>
              <div>Tu nombre de usuario es: <span id ="nombreUsuario"></span></div>
              <div>¿Quieres editar tu nombre de usuario?</div>
              <input id="editarNombreUsuario" value=""/>
              <!-- <div id="contenidoEditar"></div> -->
            </form>
            <p id="messagePersonal" class= "message-error"></p>
          </div>
          <button id="editarInformacionPersonal" type="submit" class="btn-submit">Editar Información Personal</button>
        </div> 
      </div>
    </div>

    <!-- Footer -->

    <?php include('php/footer.php');?>

    <script type="text/javascript" src="js/scripts.js"></script>
    <script src="./js/popup.js"></script>
</body>

</html>