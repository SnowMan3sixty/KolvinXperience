var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
	overlay = document.getElementById('overlay'),
	popup = document.getElementById('popup'),
	btnCerrarPopup = document.getElementById('btn-cerrar-popup');

btnAbrirPopup.addEventListener('click', function(){
	overlay.classList.add('active');
	popup.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	popup.classList.remove('active');
});

document.getElementById("login").addEventListener("click", function(){
    axios.get('http://labs.iam.cat/~a18kevlarpal/valida.php',{
        timeout: 3000,
        params: {
            user: document.getElementById("usuario").value,
            pass: document.getElementById("pass").value
        }
    }).then(function (respuesta){
        if(respuesta.data.status == "fail"){
            document.getElementById("login").innerHTML = "Validar";
            alert("Usuario o contraseña incorrectos");
        }
        else{
            document.getElementById("contenedor").style.display = "none";
            document.getElementById("panel").style.display = "block";
            document.getElementById("bienvenida").innerHTML = `Bienvenido ${respuesta.data.name}`;
        }
    }).catch(function (error){
        alert("El servidor ha tardado mucho en responder");
    }).then(function () {
        document.getElementById("login").innerHTML = "Validar";
    });
})

document.getElementById("logout").addEventListener("click", function(){
    document.getElementById("usuario").value = "";
    document.getElementById("pass").value = "";
    document.getElementById("contenedor").style.display = "block";
    document.getElementById("panel").style.display = "none";
    document.getElementById("overlay").style.display = "none";
})