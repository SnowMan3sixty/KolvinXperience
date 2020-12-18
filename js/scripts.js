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
                '</div><img class="imgExperiencia" src="' + experiencia['imatge'] +'"></img><button id="btn-verExperiencia'+i+'" class="btn-popup">Examinar</button></div>');

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
        success: function(result){
            var resultObj = JSON.parse(result);

            printExperiencias(resultObj);
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
                var experiencia = resultObj[i];

                experienciesDiv.html(experienciesDiv.html() + '<div class="ultimesEx"><div class="titleExperiencia">' + experiencia['titol'] + '</div><img class="imgExperiencia" src="' + experiencia['imatge'] +'"></img></div>');
                
            }
        }
    });
};
function activeShowMoreButton(i,id){
    console.log("activeShowMoreButton i=" + i + " id = " + id );
  /*  var nombreBoton = "btn-verExperiencia" + i;
    console.log(nombreBoton);
    document.getElementById(nombreBoton).addEventListener("click",function(){
        console.log("ENTRAS EN NUEVO LISTENER");
    });*/
    $('#btn-verExperiencia5').click(function() {
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
                document.getElementById("details_image").textContent = experiencia['imatge'];
                document.getElementById("details_descripcio").textContent = experiencia['contenido'];
                document.getElementById("details_mapa").textContent = experiencia['coordenadas'];
                document.getElementById("details_data").textContent = experiencia['fecha_publ'];
                document.getElementById("details_categoria").textContent = experiencia['id_cat'];
                document.getElementById("details_likes").textContent = experiencia['valoracioPos'];
                document.getElementById("details_dislikes").textContent = experiencia['valoriacioNeg'];             
                
            }
        });        
    });
}

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
        console.log(titulo);
        console.log(contenido);
        $('#overlayCrear').hide();
        //AQUI
        $.ajax({
            url: "php/crearExperiencia.php",
            type: "post",
            data: {
                titulo: titulo,
                contenido: contenido
            },
            success: function(){
                printExperiencias();
            }
        });
    });

    
});
