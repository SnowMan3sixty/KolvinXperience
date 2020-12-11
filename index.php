<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <!-- Begin Page -->
    <div class="row-layout">
        <!-- ========== Header Start ========== -->
        <?php include('header.php');?>
        <!-- ========== End Header ========== -->
       
            <?php 
                if(!isset($_COOKIE['user'])){
                    echo'<div class="navbar">
                    <button class="btn-popup" href="index.php">Inicio</button>
                    <button id="btn-registrar" class="btn-popup">Registrar</button>
                    <button id="btn-abrir-popup" class="btn-popup">Ir al Login</button>
                    </div>';
                }
                else{
                    echo $_COOKIE['user'];
                }
            ?>
            
        
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div id="content">
          <p>Hola</p>
        </div>

        <div class="overlay" id="overlay">
          <div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>Login - KolvinXperience</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
              <div class="contenedor-inputs">
                <input id="usuario" type="text" placeholder="Usuario" name="usuario">
                <input id="pass" type="password" placeholder="Contraseña" name="pass">
              </div>
              <input id="login" type="submit" class="btn-submit" value="Login" name="login">
            </form>
          </div>
        </div>

        <?php
          if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["login"]){
              require_once("Db/usuaris.php");
              $usuarioBD = new User();
              $usuarioBD->select($_POST["usuario"]);
              if($_POST["usuario"] == $usuarioBD){
                echo "Bienvenido ".$_POST["usuario"];
                console.log("Hola KEVIN")
              }
              console.log("Hola PAU")
          }

        ?>

        <div id="panel" style="display: none;">
          <p>Estás logueado</p>
        </div>

        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        <!-- ========== Footer Start ========== -->
        <?php include('footer.php');?>
        <!-- ========== End Footer ========== -->

        <script src="popup.js"></script>
        <!-- <script src="login.js"></script> -->
</body>
</html>