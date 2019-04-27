$(document).ready(function() {

    // cargar tabla de clientes
    $("#clienteTabla").load('views/contenido/extra/registroClienteTabla.php');
    // cargar tabla de Instalaciones
    $("#instalacionTabla").load('views/contenido/extra/instalacionTabla.php');
    // cargar tabla de usuarios
    $("#usuarioTabla").load('views/contenido/extra/registroUsuarioTabla.php');
    // cargar tabla otros
    $("#otrosTabla").load('views/contenido/extra/otrosTabla.php');

    /*Inicio de la Sección Instalaciones en ready*/
    $("#serial,#material,#lSerial,#lMaterial,#buscarOtro").hide();
    $("#registrarInstalacion").attr('disabled' , true);

    // Buscar un cliente para la sección de instalaciones
    $("#buscarCliente").click(function (e) {

        var rutCliente = $("#rCliente").val();

        $("#rCliente").attr('disabled' , true);

        $("#buscarCliente").hide();
        $("#buscarOtro").show();

        $.getJSON("controllers/buscarDatosCliente.php", { rut : rutCliente }, function (r) {
            $("#iCliente").val(r.idCliente);
            $("#Inombres").html("Cliente: " + r.Nombre);
            $("#Iplan").html("Plan: " + r.Plan);
            $("#iDispositivo").val(r.id_dispositivo);
            $("#Idispositivo").html("Dispositivo: " + r.Dispositivo);
            $("#serial,#material,#lSerial,#lMaterial").show();
            $("#registrarInstalacion").attr('disabled' , false);
        });

        e.preventDefault();
        
    });

    // Buscar otro cliente en la sección de instalaciones
    $("#buscarOtro").click(function (e) {

        $("#buscarOtro").hide();
        $("#buscarCliente").show();
        $("#rCliente").val('');
        $("#serial,#material,#lSerial,#lMaterial").hide();
        $("#Inombres,#Iplan,#Idispositivo").html('');
        $("#iDispositivo,#iCliente").val('');
        $("#rCliente").attr('disabled' , false);
        e.preventDefault();
        
    });

    $("#registrarInstalacion").click(function (e) {

        $.ajax({
            type: "post",
            url: "controllers/registrarInstalacion.php",
            data: $("#frmRegistroInstalacion").serialize(),
            success: function (r) {

                if (r == 1) {

                    alertify.success('Instalación registrada correctamente');
                    $("#instalacionTabla").load('views/contenido/extra/instalacionTabla.php');
                    $("#modalInstalacion").modal('hide');
                    $("#frmRegistroInstalacion")[0].reset();
                    $("#serial,#material,#lSerial,#lMaterial").hide();
                    $("#Inombres,#Iplan,#Idispositivo").html('');
                    $("#iDispositivo,#iCliente").val('');

                } else {

                    alertify.error('No se pudo registrar');
                    
                }
            }
        });
        
        e.preventDefault();
        
    });


    /*Fin de la Sección Instalaciones en ready*/

    /*Inicio de la Sección Otros en ready*/

    // Ocultar botón de guardar en editar planes
    $("#guardarPlanEditado").hide();

    $("#EditarPlan").click(function (e) {

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

    /*Inicio de la Sección de Clientes en ready*/

    // registrar clientes
    $('#btn-guardarCliente').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "controllers/registroCliente.php",
            data: $("#formRegistroCliente").serialize(),
            success: function (r) {
                if(r == 1){
                    $("#clienteTabla").load('views/contenido/extra/registroClienteTabla.php');
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
                    $("#clienteTabla").load('views/contenido/extra/registroClienteTabla.php');
                    $("#m_verMas").modal('hide');
                    $("#guardar").hide();
                    alertify.success('Registro actualizado con éxito');
                }else{
                    alertify.error('No se pudo actualizar el registro');
                }
            }
        });
        
    });

    /*Fin de la Sección de Clientes en ready*/

/*------------------------------------------------------------------------------------------------------------*/
    
    /*Inicio de la Sección de Mascotas en ready*/

    // Función que carga dinamicamente las razas de las especies en registro de mascota
    $("#especie").change(function() {

        $("#especie option:selected").each(function() {
            especie = $(this).val();
            $.get("controllers/selectRaza.php", {
                id_especie: especie
            }, function(data) {
                $("#raza").html(data);
            });
        });

    });

    // Ocultar botón de guardar edición de mascota
    $("#guardarEdicionMascota").hide();

    // Al editar mascota
    $("#editarMascota").click(function(e) {

        $("#guardarEdicionMascota").show();
        $("#rMicrochip,#rNacimiento,#rNombre,#rEspecie,#rRaza,#rSexo,#rEsterilizado,#rColor,#rPatron,#rPropietario").attr("disabled", false);
        e.preventDefault();

    });

    // Convertir letras en mayuscula al escribir el microchip
    $('#micro,#rMicrochip').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
    });

    //Función que carga dinamicamente las razas de las especies en editar de mascota
    $("#rEspecie").change(function() {

        $("#rEspecie option:selected").each(function() {
            especie = $(this).val();
            $.get("controllers/selectRaza.php", {
                id_especie: especie
            }, function(data) {
                $("#rRaza").html(data);
            });
        });

    });

    // Guardar datos despues de editar la mascota
    $("#guardarEdicionMascota").click(function (e) {

        $.ajax({
            type: "post",
            url: "controllers/registroMascotaEditar.php",
            data: $("#frmEditMascota").serialize(),
            success: function (r) {
                if (r == 1) {
                    $("#verMascotas").modal('hide');
                    $("#guardarEdicionMascota").hide();
                    $("#mascotasTabla").load('views/contenido/extra/registroMascotaTabla.php');
                    alertify.success('Datos actualizados corectamente');
                } else {
                    alertify.error('No se pudieron actualizar los datos');
                }
            }
        });
        e.preventDefault();
        
    });

    // Registrar mascota
    $("#btn-registrarMascota").on("click", function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("frmRegistroMascota"));
        $.ajax({
            url: "controllers/registroMascota.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(r){
                if(r == 1){
                    $("#registroMascotaModal").modal('hide');
                    $("#mascotasTabla").load('views/contenido/extra/registroMascotaTabla.php');
                    alertify.success("Registrado con éxito");
                }else if(r == 2){
                    alertify.message("Lo siento, el código de la mascota que intentas ingresar ya se encuentra registrado");
                }else if(r == 3){
                    alertify.error('No se pudo cargar el calidad del responsable, tipo de archivo no admitido o excede el peso maximo permitido (2 MB).');
                }else if(r == 4){
                    alertify.error('No se pudo cargar el certificado, tipo de archivo no admitido o excede el peso maximo permitido (2 MB).');
                }else{
                    alertify.error('Debes llenar todos los campos');
                }
            }
        });
    });

    /*Fin de la Sección de Mascotas en ready*/

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
                    $("#usuarioTabla").load('views/contenido/extra/registroUsuarioTabla.php');
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
                    $("#usuarioTabla").load('views/contenido/extra/registroUsuarioTabla.php');
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

// Borrar registro
function borrar(id) {

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function(){ 
    
        $.get("controllers/registroClienteBorrar.php", {id_cliente : id}, function (r) {

            if(r == 1){

                $("#clienteTabla").load('views/contenido/extra/registroClienteTabla.php');
                alertify.success("Registro eliminado con éxito");

            }else{
                alertify.error("No se pudo eliminar el registro");
            }

        });

    }, function(){});

}

/*--------------------------------Clientes---------------------------------------------*/

/*--------------------------------Mascotas---------------------------------------------*/

function verMascota(id) {
    $.getJSON("controllers/verMasMascotas.php", { mascota: id }, function(r) {

        $("#id_mascota").val(r.idMascota);
        $("#rMicrochip").val(r.Microchip).attr("disabled", true);
        $("#rNombre").val(r.Nombre).attr("disabled", true);
        $("#rEspecie").val(r.idEspecie).attr("disabled", true);
        $("#rRaza").val(r.Raza).attr("disabled", true);
        $("#rSexo").val(r.Sexo).attr("disabled", true);
        $("#rEsterilizado").val(r.Esterilizado).attr("disabled", true);
        $("#rNacimiento").val(r.Nacimiento).attr("disabled", true);
        $("#rColor").val(r.Color).attr("disabled", true);
        $("#rPatron").val(r.Patron).attr("disabled", true);
        $("#rPropietario").val(r.Propietario).attr("disabled", true);
        $("#rUsuario").html('Usuario: ' + r.Usuario);
        $("#rFechaRegistro").html('Fecha de registro: ' + r.FechaRegistro);
        $("#rCertificado").attr('href', r.Certificado);
        $("#rCalidad").attr('href', r.Calidad);

    });
}

function borrarMascota(id){

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function(){ 
    
    $.get("controllers/registroMascotaBorrar.php", {id_mascota : id}, function (r) {

        if(r == 1){

            $("#mascotasTabla").load('views/contenido/extra/registroMascotaTabla.php');
            alertify.success("Mascota eliminada con éxito");

        }else{

            alertify.error("No se pudo eliminar el registro");
            
        }

    });

}, function(){});

}

/*--------------------------------Mascotas---------------------------------------------*/


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

                $("#usuarioTabla").load('views/contenido/extra/registroUsuarioTabla.php');
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
