function printNoLogged() {
    $('#bienvenida').html('<div class="container"><div class="row"><div ><h1>Bienvenido</h1><br><p id="mensajeBienvenida">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae officiacumque nostrum neque, incidunt corrupti. Eaque praesentium modi cumque amet aliquam ea fugitexplicabo dolores quod sapiente? Repudiandae, quae. Ut.</p></div></div></div>');
    $.ajax({
        url: "php/getExperiencies.php",
        type: "post",
        success: function(result){
            var resultObj = JSON.parse(result);

            var experienciesDiv = $('#experiencies');
            experienciesDiv.html('');

            for(let i = 0; i< resultObj.length; i++){
                var experiencia = resultObj[i];

                experienciesDiv.html(experienciesDiv.html() + '<div class="ultimesEx">' + experiencia['titol'] + '</div>');
            }

        }
    });
}

function printLogged() {
    $('#bienvenida').modal('hide');

    $.ajax({
        url: "php/getExperiencies.php",
        type: "post",
        success: function(result){
            var resultObj = JSON.parse(result);

            printExperiencias(resultObj);
        }
    });    
}

function printExperiencias(experiencies){

    var experienciesDiv = $('#experiencies');
    experienciesDiv.html('');

    for(let i = 0; i< experiencies.length; i++){
        var experiencia = experiencies[i];
        
        var fecha = new Date(experiencia['fecha_publ']);

        experienciesDiv.html(experienciesDiv.html() + '<p> aqui va lista experiencias</p>');
    }
};

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
});
