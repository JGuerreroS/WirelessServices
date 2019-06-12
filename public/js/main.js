$(document).ready(function() {

    datosCliente();

    // Select2
    $('.js-example-basic-single').select2();

    // cargar tabla de convenios
    $("#convenioTabla").load('views/contenido/extra/convenioTabla.php');
    // cargar tabla de clientes
    $("#clienteTabla").load('views/contenido/extra/clienteTabla.php');
    // cargar tabla de Instalaciones
    $("#instalacionTabla").load('views/contenido/extra/instalacionTabla.php');
    // cargar tabla de usuarios
    $("#usuarioTabla").load('views/contenido/extra/usuariosTabla.php');
    // cargar tabla otros
    $("#otrosTabla").load('views/contenido/extra/otrosTabla.php');
    // cargar grafica del inicio
    $("#grafica").load('views/contenido/extra/grafica.php');
    // cargar tabla de facturacion
    $("#facturacionTabla").load('views/contenido/extra/facturacionTabla.php');

    /*Inicio de la Sección tuPerfil en ready*/

    // Ocultar al cargar vista de perfil del cliente
    $("#SaveChangesUpdateUser,#ChangePass,#NotEditClient,#NotEditPass,#frmEditPass,#frmEditProfile,#SaveChangesPass").hide();

    // Click al boton de editar tus datos
    $("#editarPerfil").click(function (e){

        $("#frmEditProfile,#NotEditClient,#SaveChangesUpdateUser,#ChangePass").show();
        $(this).hide();
        e.preventDefault();
        
    });

    // Clic al boton de no editar perfil
    $("#NotEditClient").click(function (e){

        $("#frmEditProfile,#NotEditClient,#SaveChangesUpdateUser,#ChangePass").hide();
        $("#editarPerfil").show();
        e.preventDefault();
        
    });

    // Click boton de cambiar contraseña
    $("#ChangePass").click(function (e){

        $("#NotEditClient,#frmEditProfile,#ChangePass,#SaveChangesUpdateUser").hide();
        $("#NotEditPass,#frmEditPass,#SaveChangesPass").show();
        e.preventDefault();
        
    });

    // Click boton de no editar contraseña
    $("#NotEditPass").click(function (e){

        $("#frmEditPass,#SaveChangesPass,#NotEditPass").hide();
        $("#editarPerfil").show();
        e.preventDefault();
        
    });

    // Editar datos de perfil
    $("#SaveChangesUpdateUser").click(function (e){

        $.ajax({
            type: "post",
            url: "controllers/updateProfile.php",
            data: $("#frmEditProfile").serialize(),
            success: function (res) {
                if(res == 1){
                    datosCliente();
                    alertify.success("Datos actualizados corectamente!");
                    $("#SaveChangesUpdateUser,#ChangePass,#NotEditClient,#NotEditPass,#frmEditPass,#frmEditProfile,#SaveChangesPass").hide();
                    $("#editarPerfil").show();
                }else{
                    alertify.error("No se pudo actualizar los datos");
                }
            }
        });
        e.preventDefault();
        
    });

    // Cargar datos del perfil del cliente
    function datosCliente(){
        $.ajax({
            url: "controllers/datosPerfil.php",
            type: "GET",
            success: function (r){
                let res = JSON.parse(r);
                $("#perfilRut").html(res.rut).addClass("text-info");
                $("#IperfilRut").val(res.rut);
                $("#perfilNombre").html(res.nombre).addClass("text-info");
                $("#IperfilNombre").val(res.nombre);
                $("#perfilApellidos").html(res.apellidos).addClass("text-info");
                $("#IperfilApellidos").val(res.apellidos);
                $("#perfilTelefono").html(res.telefono).addClass("text-info");
                $("#IperfilTelefono").val(res.telefono);
                $("#perfilEmail").html(res.email).addClass("text-info");
                $("#IperfilEmail").val(res.email);
                $("#perfilResidencia").html(res.direccion).addClass("text-info");
                $("#IperfilResidencia").val(res.direccion);
            }
        });
    }

    // Cambiar contraseña
    $("#SaveChangesPass").click(function (e){

        $.ajax({
            type: "post",
            url: "controllers/updatePassClient.php",
            data: $("#frmEditPass").serialize(),
            success: function (res){

                if(res == 1){

                    alertify.success("Contraseña actualizada con éxito");
                    $("#SaveChangesUpdateUser,#ChangePass,#NotEditClient,#NotEditPass,#frmEditPass,#frmEditProfile,#SaveChangesPass").hide();
                    $("#editarPerfil").show();
                    $("#frmEditPass").trigger('reset');

                }else if(res == 2){

                    alertify.error("Error en contraseña actual");
                    $("#frmEditPass").trigger('reset');
                        
                }else{

                    alertify.warning("Las nuevas contraseñas no coinciden!");
                    $("#frmEditPass").trigger('reset');
                }

            }
        });

        e.preventDefault();
        
    });
    
    /*Fin de la Sección tuPerfil en ready----------------------------------------------------------------------*/

    /*Inicio de la Sección facturas en ready-------------------------------------------------------------------*/
    $("#guardarFactura").click(function (e) {

        $.ajax({
            type: "post",
            url: "controllers/registroFactura.php",
            data: $("#frmSaveFactura").serialize(),
            success: function (r) {
                if(r == 1){

                    alertify.success("Factura registrada");
                    $("#facturacionTabla").load('views/contenido/extra/facturacionTabla.php');
                    $("#frmSaveFactura")[0].reset();

                }else{

                    alertify.error("No se pudo registrar");

                }
            }
        });
        e.preventDefault();
        
    });
    /*Inicio de la Sección facturas en ready*/

    /*Inicio de la Sección Convenios en ready*/

    // Registrar convenios
    $("#regConvenio").click(function (e) {

        $.ajax({
            type: "post",
            url: "controllers/registroConvenio.php",
            data: $("#frmRegConvenio").serialize(),
            success: function (r) {
                if(r == 1){
                    $("#convenioTabla").load('views/contenido/extra/convenioTabla.php');
                    $("#frmRegConvenio")[0].reset();
                    $("#convenioModal").modal('hide');
                    alertify.success('Convenio registrado');

                }else{

                    alertify.error('No se pudo registrar');

                }
            }
        });
        e.preventDefault();
        
    });

    // Boton eliminar convenio
    $("#eliminarConvenio").click(function (e) {

        alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function(){ 
    
            $.ajax({
                type: "post",
                url: "controllers/borrarConvenio.php",
                data: $("#frmEliminarConvenio").serialize(),
                success: function (r) {

                    if(r == 1){
    
                        $("#convenioTabla").load('views/contenido/extra/convenioTabla.php');
                        alertify.success("Convenio cerrado con éxito");
                        $("#frmEliminarConvenio")[0].reset();
                        $("#modalBConvenio").modal('hide');
        
                    }else{
        
                        alertify.error("No se pudo eliminar el registro");
        
                    }

                }
            });
    
        }, function(){});
        
        e.preventDefault();
        
    });
    /*Fin de la Sección Convenios en ready*/


    /*Inicio de la Sección Otros en ready*/

    // Ocultar botón de guardar en editar planes
    $("#guardarPlanEditado").hide();

    $("#EditarPlan").click(function (e){

        $("#planEditarNombre,#planEditarCosto").attr('disabled' , false);
        $("#guardarPlanEditado").show();
        e.preventDefault();
        
    });

    // Guardar cambios de planes editados
    $("#guardarPlanEditado").click(function (e) {

        $.ajax({
            type: "post",
            url: "controllers/editarPlanesOtros.php",
            data: $("#frmEditarPlan").serialize(),
            success: function (r) {
                if(r == 1){
                    alertify.success('Plan actualizado correctamente');
                    $("#otrosTabla").load('views/contenido/extra/otrosTabla.php');
                    $("#otrosEditarPlanes").modal('hide');
                }else{
                    alertify.error('Error al tratar de modificar');
                }
            }
        });

        e.preventDefault();
        
    });

    // registrar planes de internet
    $("#guardarPlan").click(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "controllers/registroPlan.php",
            data: $("#frmPlan").serialize(),
            success: function (r) {
                if (r == 1) {
                    $("#otrosTabla").load('views/contenido/extra/otrosTabla.php');
                    $("#frmPlan")[0].reset();
                    $("#otrosPlanModal").modal('hide');
                    alertify.success('Plan registrado correctamente');
                } else {
                    alertify.error('No se pudo registrar');
                }
            }
        });
    });

    // registrar modelo
    $("#guardarModelo").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "controllers/registroModelo.php",
            data: $("#frmDispositivo").serialize(),
            success: function (r) {
                
                if(r == 1){
                    $("#otrosTabla").load('views/contenido/extra/otrosTabla.php');
                    $("#frmDispositivo")[0].reset();
                    $("#otrosModeloModal").modal('hide');
                    alertify.success('Dispositivo registrado correctamente');
                }else{
                    alertify.error('No se pudo insertar el registro');
                    alert(r);
                }
            }
        });
        
    });
    /*Fin de la Sección Otros en ready*/

    /*-----------------------------------------------Inicio de la Sección de Clientes en ready------------------------------------*/

    // registrar clientes
    $('#btn-guardarCliente').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "controllers/registroCliente.php",
            data: $("#formRegistroCliente").serialize(),
            success: function (r) {
                if(r == 1){
                    $("#clienteTabla").load('views/contenido/extra/clienteTabla.php');
                    $("#formRegistroCliente")[0].reset();
                    $("#exampleModal").modal('hide');
                    alertify.success('Cliente registrado correctamente');
                }else if(r == 2){
                    alertify.error('No se pudo insertar el registro');
                }else{
                    alertify.warning('Formulario incompleto');
                }
            }
        });

    });

    // Colocar en mayusculas y quitar numeros
    $('#nombre,#apellido,#rNombre,#rApellidos').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
        this.value = (this.value + '').replace(/[^A-Z-Á-É-Í-Ó-Ú]/g, ' '); // Sin numeros
    });

    // Colocar en mayusculas
    $('#direccion,#rDireccion').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
    });

    // Ocultar botón guardar al abrir modal de editar
    $("#guardar").hide();

    // Mostrar botón guardar y activar inputs al presionar editar
    $("#editar").click(function (e) {

        $("#guardar").show();
        $("#rNombre,#rApellidos,#rRut,#rMail,#rTelefono,#rPlan,#rDispositivo,#rFechaI,#rDia,#rDireccion").attr("disabled" , false);
        e.preventDefault();
        
    });

    // Guardar cambios despues de editar
    $("#guardar").click(function (e) {

        e.preventDefault();
        $.ajax({
            type: "post",
            url: "controllers/registroClienteEditar.php",
            data: $("#formEdit").serialize(),
            success: function (r) {
                if(r == 1){
                    $("#clienteTabla").load('views/contenido/extra/clienteTabla.php');
                    $("#m_verMas").modal('hide');
                    $("#guardar").hide();
                    alertify.success('Registro actualizado con éxito');
                }else{
                    alertify.error('No se pudo actualizar el registro');
                }
            }
        });
        
    });

    /*----------------------Fin de la Sección de Clientes en ready----------------------------------------*/

/*-------------------------------------------------------------------------------*/

    /*Inicio de la Sección de Usuarios en ready*/

    // ocultar boton de guardar al editar usuario
    $("#guardarUsuarioEditado").hide();

    // funcion que se ejecutar al pulsar el boton de editar usuarios
    $("#editarUsuario").click(function(e) {

        $("#guardarUsuarioEditado").show();
        $("#vNombre,#vUsuario,#vNivel,#vFecha").attr('disabled', false);
        e.preventDefault();

    });

    // Registrar nuevo usuario
    $("#enviar").click(function (e) {

        $.ajax({
            type: "post",
            url: "controllers/registroUsuario.php",
            data: $("#frmRegistarUsuario").serialize(),
            success: function (r) {
                if(r == 1){
                    alertify.warning("El usuario ya se encuentra registrado");
                }else if(r == 2){
                    
                    $("#registrarUsuarioModal").modal('hide');
                    $("#usuarioTabla").load('views/contenido/extra/usuariosTabla.php');
                    $("#frmRegistarUsuario")[0].reset();
                    alertify.success("Usuario registrado con éxito");  
                }else{
                    alertify.error("No se pudo registrar el usuario");
                }
            }
        });
        e.preventDefault();
        
    });

    // Guardar cambios del usuario al editarlo
    $("#guardarUsuarioEditado").click(function (e) {

        $.ajax({
            type: "post",
            url: "controllers/registroUsuarioEditar.php",
            data: $("#frmEditarUsuario").serialize(),
            success: function (r) {
                if (r == 1) {

                    $("#verUsuarios").modal('hide');
                    $("#guardarUsuarioEditado").hide();
                    $("#usuarioTabla").load('views/contenido/extra/usuariosTabla.php');
                    alertify.success("Usuario actualizado exitosamente");

                } else {

                    alertify.error("No se pudo actualizar el registro");

                }
            }
        });
        e.preventDefault();
        
    });

    // función para las mayusculas en editar usuarios
    $('#vNombre').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
        this.value = (this.value + '').replace(/[^A-Z-Á-É-Í-Ó-Ú]/g, ' '); // Sin numeros
    });

    // función para comprobar la contraseña
    var pass1 = $('[name=pass1]');
    var pass2 = $('[name=pass2]');
    var confirmacion = "Las contraseñas coinciden!";
    var longitud = "La contraseña debe estar formada entre 6-10 carácteres";
    var negacion = "No coinciden las contraseñas";
    var vacio = "La contraseña no puede estar vacía";
    //oculto por defecto el elemento span
    var span = $('<span></span>').insertAfter(pass2);
    span.hide();

    //función que comprueba las dos contraseñas
    function coincidePassword() {

        var valor1 = pass1.val();
        var valor2 = pass2.val();
        //muestro el span
        span.show().removeClass();
        //condiciones dentro de la función
        if (valor1 != valor2) {
            span.text(negacion);
            $("#pass1,#pass2").addClass('is-invalid');
            $('#enviar').attr("disabled", true);
        }
        if (valor1.length == 0 || valor1 == "") {
            span.text(vacio);
            $("#pass1").addClass('is-invalid');
            $('#enviar').attr("disabled", true);
        }
        if (valor1.length < 6 || valor1.length > 10) {
            span.text(longitud).addClass('negacion');
            $("#pass1").addClass('is-invalid');
            $('#enviar').attr("disabled", true);
        }
        if (valor1.length != 0 && valor1 == valor2 && valor1.length > 5 && valor1.length < 11) {
            span.text(confirmacion);
            $("#pass1,#pass2").removeClass('is-invalid');
            $("#pass1,#pass2").addClass('is-valid');
            $('#enviar').attr("disabled", false);
        }

    }
    //ejecuto la función al soltar la tecla
    pass2.keyup(function() {
        coincidePassword();
    });
    /*Inicio de la Sección de Usuarios en ready*/

}); //Fin de la function ready


/*--------------------------------Clientes---------------------------------------------*/

// Imprimir perfil del cliente
function print(){
    var id_cliente = $("#id_cliente").val();
    $("#Icliente").val(id_cliente);
}

// Cargar información en los inputs al abrir modal de editar
function verMas(id) {

    $.getJSON("controllers/registroClienteVerMas.php", { id_cliente: id }, function(r) {

        $("#id_cliente").val(r.Id);
        $("#rNombre").val(r.Nombre).attr("disabled" , true);
        $("#rApellidos").val(r.Apellidos).attr("disabled" , true);
        $("#rRut").val(r.Rut).attr("disabled" , true);
        $("#rTelefono").val(r.Telefono).attr("disabled" , true);
        $("#rMail").val(r.Email).attr("disabled" , true);
        $("#rPlan").val(r.Plan).attr("disabled" , true);
        $("#rDispositivo").val(r.Dispositivo).attr("disabled" , true);
        $("#rFechaI").val(r.FechaI).attr("disabled" , true);
        $("#rDia").val(r.FechaP).attr("disabled" , true);
        $("#rDireccion").val(r.Direccion).attr("disabled" , true);
        $("#rUsuario").html('<b>Registrado por: </b><br>' + r.Usuario);
        $("#rFecha").html('<b>Fecha de registro: </b><br>' + r.Fecha);

    });

}

// Borrar cliente
function borrar(id){

    // alert(id);

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function(){ 
    
        $.get("controllers/registroClienteBorrar.php", {id_cliente : id}, function (r){

            if(r == 1){

                $("#clienteTabla").load('views/contenido/extra/clienteTabla.php');
                alertify.success("Registro eliminado con éxito");

            }else{

                alertify.error("No se pudo eliminar el registro");

            }

        });

    }, function(){});

}

/*--------------------------------Clientes---------------------------------------------*/

/*--------------------------------Convenios------------------------------------------*/
function verConvenio(id) {
    $.getJSON("controllers/zoomConvenio.php", { id_convenio : id }, function(r) {

        $("#zNombres").html("Nombres: " + r.Nombres);
        $("#zDireccion").html("Dirección: " + r.Direccion);
        $("#zDispositivo").html("Dispositivos: " + r.Dispositivo);
        $("#zMateriales").html("Materiales: " + r.Material);

    });
}
/*--------------------------------Convenios------------------------------------------*/

/*--------------------------------Instalación------------------------------------------*/

function verInstalacion(id) {
    $.getJSON("controllers/verMasInstalacion.php", { id_ins : id }, function(r) {

        $("#vMinstalacion").val(r.id_instalacion);
        $("#vMrut").html("Rut: " + r.Rut);
        $("#vMnombres").html("Cliente: " + r.Nombres);
        $("#vMdireccion").html("Dirección: " + r.Direccion);
        $("#vMdispositivo").html("Dispositivo: " + r.Dispositivo);
        $("#vMserial").val(r.Serial).attr("disabled", true);
        $("#vMmaterial").val(r.Material).attr("disabled", true);

    });
}

// Borrar instalación
function borrarInstalacion(id) {

    $("#id_instalacionB").val(id);

}

/*--------------------------------Instalación---------------------------------------------*/


/*--------------------------------Usuarios---------------------------------------------*/
function verUsuario(id) {

    $.getJSON("controllers/registroUsuarioVerMas.php", { usuario: id }, function(r) {

        $("#vNombre").val(r.Nombre).attr('disabled', true);
        $("#vUsuario").val(r.Usuario).attr('disabled', true);
        $("#vNivel").val(r.Nivel).attr('disabled', true);
        $("#id_usuario").val(r.IdUsuario);
        $("#vFecha").html('Fecha de registro: ' + r.Fecha);

    });
}

function borrarUsuario(id) {

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function() {

        $.get("controllers/registroUsuarioBorrar.php", { id_usuario: id }, function(r) {

            if (r == 1) {

                $("#usuarioTabla").load('views/contenido/extra/usuariosTabla.php');
                alertify.success("Usuario eliminado con éxito");
                

            } else if(r == 2) {

                alertify.error("No se pudo eliminar el registro");

            }else{

                alertify.error("No puedes eliminarte a ti mismo");

            }

        });

    }, function() {});

}
/*--------------------------------Usuarios---------------------------------------------*/

/*--------------------------------Otros---------------------------------------------*/
// Editar Dispositivos
function editarDispositivo(id){
    $("#guardarDispositivoEditado").click(function (e) {
        e.preventDefault();

        modelo = $("#dispositivoEditar").val();

        $.getJSON("controllers/editarDispositivosOtros.php", { modelo : modelo , id_modelo : id }, function (r) {
            if(r == 1){
                alertify.success('Dispositivo actualizado correctamente');
                $("#otrosTabla").load('views/contenido/extra/otrosTabla.php');
                $("#otrosEditarDispositivo").modal('hide');
                $("#dispositivoEditar").val('');
            }else{
                alertify.error('Error al tratar de modificar');
            }
        });
        
    });
    
}

// Borrar dispositivos
function borrarDispositivo(id) {

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function() {

        $.get("controllers/borrarDispositivo.php", { id_modelo: id }, function(r) {

            if (r == 1) {

                $("#otrosTabla").load('views/contenido/extra/otrosTabla.php');
                alertify.success("Dispositivo eliminado con éxito");
                
            }else{

                alertify.error("No se pudo eliminar el dispositivo");

            }

        });

    }, function() {});

}

// Editar planes
function verMasPlanes(id){
    $.getJSON("controllers/verMasPlanes.php", { id_plan : id }, function (r){

        $("#id_planH").val(r.id_plan);
        $("#planEditarNombre").val(r.plan).attr('disabled' , true);
        $("#planEditarCosto").val(r.costo).attr('disabled' , true);

    });

}

// Borrar planes
function borrarPlanes(id) {

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function() {

        $.get("controllers/borrarPlanes.php", { id_plan: id }, function(r) {

            if (r == 1) {

                $("#otrosTabla").load('views/contenido/extra/otrosTabla.php');
                alertify.success("Plan eliminado con éxito");
                

            }else{

                alertify.error("No se pudo eliminar el plan");

            }

        });

    }, function() {});

}
/*--------------------------------Otros---------------------------------------------*/

/*--------------------------------Convenios---------------------------------------------*/
// Borrar convenio
function borrarConvenio(id) {

    $("#id_convenioB").val(id);

}
/*--------------------------------Convenios---------------------------------------------*/