$(function(){ // Inicio de la función ready

    $("#aviso").hide();

    // Inicio de sesión administrador
    $("#iniciar").click(function() {

        $.ajax({
            type: "post",
            url: "./controllers/check-login.php",
            data: $("#formLogin").serialize(),
            cache: false,
            success: function(r) {
                if (r == 2) {
                    
                    $("#aviso").show().fadeOut(3000);

                } else {

                    window.location.href = "inicio";
                    
                }
            }
        }); //ajax
        return false;

    }); //click

    // Inicio de sesión normal
    $("#verify").click(function() {

        $.ajax({
            type: "post",
            url: "controllers/check-login2.php",
            data: $("#formLogin2").serialize(),
            cache: false,
            success: function(r) {
                if (r == 2) {
                    
                    $("#aviso").show().fadeOut(3000);

                } else {

                    window.location.href = "bienvenido";
                    
                }
            }
        }); //ajax
        return false;

    }); //click

}); // Fin de la función ready