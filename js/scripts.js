function printNoLogged() {
    $('#bienvenida').html('<div class="container"><div class="row"><div><h1>Bienvenido</h1><br><p id="mensajeBienvenida">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae officiacumque nostrum neque, incidunt corrupti. Eaque praesentium modi cumque amet aliquam ea fugitexplicabo dolores quod sapiente? Repudiandae, quae. Ut.</p></div></div></div>');
    $.ajax({
        url: "php/getExperiencies.php",
        type: "post",
        success: function(result){
            var resultObj = JSON.parse(result);

            var experienciesDiv = $('#experiencies');
            experienciesDiv.html('');

            for(let i = 0; i< resultObj.length; i++){
                var experiencia = resultObj[i];

                experienciesDiv.html(experienciesDiv.html() + '<div id="experiencia'+i+'" class="ultimesEx"><div class="titleExperiencia">' + experiencia['titol'] + 
                '</div><img class="imgExperiencia" src="' + experiencia['imatge'] +'"></img><button id=examinar numID="' + experiencia['id'] + '" class="btn-popup">Examinar</button></div>');

                activeShowMoreButton(i,experiencia['id']);
            }

        }
    });
}

function printLogged() {
    $('#bienvenida').hide();
    $('#overlay').hide();
    $('#btn-logout').show();
    $('#btn-abrir-popup').hide();
    $('#btn-registrar').hide();
    $('#btn-crear').show();

    $.ajax({
        url: "php/getExperiencies.php",
        type: "post",
        success: function(){
            printExperiencias();
        }
    });
}

function printExperiencias(){
    $.ajax({
        url: "php/getAllExperiencies.php",
        type: "post",
        success: function(result){
            var resultObj = JSON.parse(result);

            var experienciesDiv = $('#experiencies');
            experienciesDiv.html('');

            for(let i = 0; i< resultObj.length; i++){
                var xperiencia = resultObj[i];
                experienciesDiv.html(experienciesDiv.html() + '<div class="ultimesEx"><div class="titleExperiencia">' + xperiencia['titol'] + '</div><img class="imgExperiencia" src="' + xperiencia['imatge'] +'" width="286" height="180"></img><button numID="' + xperiencia['id'] +'" id="eliminar">Eliminar</button><button numID="' + xperiencia['id'] +'" id="editar">Editar</button></div>');
            }
        }
    });
}
function activeShowMoreButton(position,id){
    console.log("activeShowMoreButton i=" + position + " id = " + id );
    var nombreBoton = "btn-verExperiencia" + position;
    console.log(nombreBoton);
   
    $('#experiencies').on("click","#examinar",function() {
        var id = $(this).attr("numID");
        $.ajax({
            url: "php/verExperiencia.php",
            type: "post",
            data:{
                id: id
            },
            success: function(result){

                var resultObject = JSON.parse(result);
                var experiencia = resultObject[0];
                
                document.getElementById("details_title").textContent = experiencia['titol'];
                document.getElementById("details_image").innerHTML = "<img src='" + experiencia['imatge'] + "'>";
                document.getElementById("details_descripcio").textContent = experiencia['contingut'];
                document.getElementById("details_mapa").innerHTML = experiencia['coordenadas'];
                document.getElementById("details_data").innerHTML = "Data publicació: <br/>" + experiencia['fecha_publ'];
                document.getElementById("details_categoria").innerHTML = "Categoria: <br/>" + experiencia['nom'];
                document.getElementById("details_likes").innerHTML = '<i class="fas fa-thumbs-up"></i>' + experiencia['valoracioPos'];
                document.getElementById("details_dislikes").innerHTML = '<i class="fas fa-thumbs-down"></i>' + experiencia['valoracioNeg'];           

            }
        });
    });
}

$('#experiencies').on("click", "#examinar", function(){
    document.getElementById('overlayDetails').classList.add('active');
    document.getElementById('popupDetails').classList.add('active');

    document.getElementById('btn-cerrar-popupDetails').addEventListener('click', function(e){
        e.preventDefault();
        document.getElementById('overlayDetails').classList.remove('active');
        document.getElementById('popupDetails').classList.remove('active');
    });              
});

$('#experiencies').on("click", "#eliminar", function(){
    if(confirm("¿Estás seguro de que deseas eliminar esta experiencia?")){
        console.log("Dentro del if");
        var id = $(this).attr("numID");
        console.log(id);
        $.ajax({
            url: "php/eliminarExperiencia.php",
            type: "post",
            data: {
                id: id
            },
            success: function(){
                printExperiencias();
            }
        });
    }
});

$('#experiencies').on("click", "#editar", function(){
    document.getElementById('overlayEditar').classList.add('active');
    document.getElementById('popupEditar').classList.add('active');

    document.getElementById('btn-cerrar-popupEditar').addEventListener('click', function(e){
        e.preventDefault();
        document.getElementById('overlayEditar').classList.remove('active');
        document.getElementById('popupEditar').classList.remove('active');
    });
    
    var id = $(this).attr("numID");
    $.ajax({
        url: "php/verExperiencia.php",
        type: "post",
        data:{
            id: id
        },
        success: function(result){

            var resultObject = JSON.parse(result);
            var experiencia = resultObject[0];
            
            document.getElementById("tituloEditar").setAttribute("tituloID", experiencia['id']);
            document.getElementById("tituloEditar").setAttribute("value", experiencia['titol']);
            document.getElementById("contenidoEditar").setAttribute("value", experiencia['contingut']);
            document.getElementById("imagenEditar").setAttribute("value", experiencia['imatge']);
            document.getElementById("coordenadaEditar").setAttribute("value", experiencia['coordenadas']);
        }
    });
});

//Botones
$(document).ready(function(){
    $.ajax({
        url: "php/checkLogged.php",
        type: "post",
        success: function(result){

            if(result == 'true'){
                console.log("Funciono");
                printLogged();
            }else{
                printNoLogged();
            }
            
        }
    });

    $('#login').click(function() {
        var username = $('#usuario').val();
        var password = $('#pass').val();
        console.log(username,password);
        $.ajax({
            url: "php/login.php",
            type: "post",
            data: {
                username: username,
                password: password
            },
            success: function(result){
                var resultObj = JSON.parse(result);
                var msg= "";
                console.log(resultObj);
                if(resultObj.status == 'OK'){
                    printLogged();
                }else{
                    msg= "Invalid username and password";
                }

                $("#message").html(msg);
            }
        });
    });

    $('#registrar').click(function() {
        var username = $('#usuarioreg').val();
        var password = $('#passreg').val();
        //AQUI
        $.ajax({
            url: "php/register.php",
            type: "post",
            data: {
                username: username,
                password: password
            },
            success: function(result){
                var msg= "";
    
                if(result == 'OK'){
                    printLogged();
                }else if(result == "EXISTEIX"){
                    msg = "El nom d'usuari ja existeix";
                }else{
                    msg= "Nom d'usuari o contrasenya incorrectes";
                }
    
                $("#messageReg").html(msg);
            }
        });
    });

    $('#crearXP').click(function() {
        var titulo = $('#tituloCrear').val();
        var contenido = $('#contenidoCrear').val();
        var imagen = $('#imagenCrear').val();
        var coordenada = $('#coordenadaCrear').val();

        console.log(titulo);
        console.log(contenido);
        console.log(imagen);
        console.log(coordenada);
        $('#overlayCrear').hide();
        //AQUI
        $.ajax({
            url: "php/crearExperiencia.php",
            type: "post",
            data: {
                titulo: titulo,
                contenido: contenido,
                imagen: imagen,
                coordenada: coordenada
            },
            success: function(){
                printExperiencias();
            }
        });
    });

    $('#editarXP').click(function() {
        var id = $('#tituloEditar').attr("tituloID");
        var titulo = $('#tituloEditar').val();
        var contenido = $('#contenidoEditar').val();
        var imagen = $('#imagenEditar').val();
        var coordenada = $('#coordenadaEditar').val();
        console.log(id);
        console.log(titulo);
        console.log(contenido);
        console.log(imagen);
        console.log(coordenada);
        $('#overlayEditar').hide();
        //AQUI
        $.ajax({
            url: "php/editarExperiencia.php",
            type: "post",
            data: {
                id: id,
                titulo: titulo,
                contenido: contenido,
                imagen: imagen,
                coordenada: coordenada
            },
            success: function(){
                printExperiencias();
            }
        });
    });    
});
