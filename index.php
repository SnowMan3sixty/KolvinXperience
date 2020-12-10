<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<title>Index</title>
</head>
<body>
    <h1 id="titulo">Index - KolvinXperience</h1>
	<div class="contenedor" id="contenedor">
		<div id="index">
			<button id="btn-abrir-popup" class="btn-abrir-popup">Ir al Login</button>
			<p>Contenido del index</p>
        </div>

		<div class="overlay" id="overlay">
			<div class="popup" id="popup">
				<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
				<h3>Login - KolvinXperience</h3>
				<div id="formulario">
					<div class="contenedor-inputs">
						<input id="usuario" type="text" placeholder="Usuario">
						<input id="pass" type="password" placeholder="Contraseña">
					</div>
					<input id="login" type="submit" class="btn-submit" value="Login">
                </div>
			</div>
		</div>
    </div>
    
    <div id="panel" style="display: none;">
        <h2>Contenido del Login</h2>
        <h4 id="bienvenida"></h4>
        <button id="logout" class="btn-logout">Salir</button>
    </div>

	<script src="popup.js"></script>
</body>
</html>