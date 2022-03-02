 $(document).ready(function () {
     $("#usuario").focus();
     //$('#alert').css("color", "transparent");
 });
 $('#ingresar').click(function () {
     if ($('#usuario').val() == '') {
         $('#alert').css("display", "block");
         $('#alert').css("text-align", "center");
         $('#alert').css("color", "darkorange");
         $('#alert').text('Falta el Usuario');
         $('#usuario').css("border-color", "darkorange");
         $('#descripcion-usuario').css("color", "darkorange");
         $("#usuario").focus();
         return false;
     } else if ($('#password').val() == '') {
         $('#alert').css("display", "block");
         $('#alert').css("text-align", "center");
         $('#alert').css("color", "darkorange");
         $('#alert').text('Falta La Contraseña');
         $('#password').css("border-color", "darkorange");
         $('#descripcion-contrasena').css("color", "darkorange");
         $("#password").focus();
         return false;
     }
 });
 $('#usuario').on('keyup', function () {
     if ($('#usuario').val() == '') {
         $('#usuario').css("color", "darkorange");
         $('#usuario').css("border-color", "darkorange");
         $('#descripcion-usuario').css("color", "darkorange");
     } else if ($('#usuario').val() != '') {
         $('#usuario').css("color", "#ffffff");
         $('#usuario').css("border-color", "#ffffff");
         $('#descripcion-usuario').css("color", "#ffffff");
         $('#password').css("color", "#ffffff");
         $('#password').css("border-color", "#ffffff");
         $('#descripcion-contrasena').css("color", "#ffffff");
         $('#alert').css("color", "transparent");
     }
 });
 $('#password').on('keyup', function () {
     if ($('#password').val() == '') {
         $('#password').css("color", "darkorange");
         $('#password').css("border-color", "darkorange");
         $('#descripcion-contrasena').css("color", "darkorange");
     } else if ($('#password').val() != '') {
         $('#password').css("color", "#ffffff");
         $('#password').css("border-color", "#ffffff");
         $('#descripcion-contrasena').css("color", "#ffffff");
         $('#usuario').css("color", "#ffffff");
         $('#usuario').css("border-color", "#ffffff");
         $('#descripcion-usuario').css("color", "#ffffff");
         $('#alert').css("color", "transparent");
     }
 });
 $('#cambiar').click(function () {
     if ($('#pass').val() == '') {
         $('#error').css("display", "block");
         $('#error').css("text-align", "center");
         $('#error').css("color", "darkorange");
         $('#error').text('Falta La Nueva Contraseña');
         $('#pass').css("border-color", "darkorange");
         $('#descripcion-pass').css("color", "darkorange");
         $("#pass").focus();
         return false;
     } else if ($('#pass').val() == '11111') {
         $('#error').css("display", "block");
         $('#error').css("text-align", "center");
         $('#error').css("color", "darkorange");
         $('#error').text('La Nueva Contraseña es Igual');
         $('#pass').css("border-color", "darkorange");
         $('#descripcion-pass').css("color", "darkorange");
         $("#pass").focus();
         return false;
     } else {
         if ($('#repass').val() == '') {
             $('#error').css("display", "block");
             $('#error').css("text-align", "center");
             $('#error').css("color", "darkorange");
             $('#error').text('Falta Repetir la Contraseña');
             $('#repass').css("border-color", "darkorange");
             $('#descripcion-repass').css("color", "darkorange");
             $("#repass").focus();
             return false;
         } else if ($('#repass').val() != '') {
             if ($('#pass').val() != $('#repass').val()) {
                 $('#error').css("display", "block");
                 $('#error').css("text-align", "center");
                 $('#error').css("color", "darkorange");
                 $('#error').text('No Coincide La Contraseña, Verificala.');
                 $('#pass').css("color", "darkorange");
                 $('#pass').css("border-color", "darkorange");
                 $('#descripcion-pass').css("color", "darkorange");
                 $('#repass').css("color", "darkorange");
                 $('#repass').css("border-color", "darkorange");
                 $('#descripcion-repass').css("color", "darkorange");
                 return false;
             } else {
                 var datos = $(' #form').serialize();
                 //alert(datos);  
                 $.ajax({
                     type: "POST",
                     url: "../funciones/password/cambiar.php",
                     data: datos
                 }).done(function (res) {
                     var mensaje = $('#error').html(res);
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: '¡ Se cambio la Contraseña !',
                         showConfirmButton: false,
                         confirmButtonText: 'Editar Ingreso',
                         confirmButtonColor: '#3085d6',
                         html: '<a href="../form/dashboard.php"><button style="padding: 9px 16px 9px 16px; background: #82c25e; color: #ffffff; border:none; border-radius: 3px; margin-bottom: 10px;">Aceptar</button></a>',
                         allowOutsideClick: false,
                         allowEscapeKey: false,
                         allowEnterKey: false,
                         stopKeydownPropagation: true,
                         footer: '<c style="font-weight: 600; font-size: 12px;">Cambio de Contraseña | CanterSoft</c>'
                     })
                     $('#error').hide();
                 });
             }
         }
     }
 });
 $('#pass').on('keyup', function () {
     if ($('#pass').val() == '') {
         $('#pass').css("color", "darkorange");
         $('#pass').css("border-color", "darkorange");
         $('#descripcion-pass').css("color", "darkorange");
     } else if ($('#pass').val() != '') {
         $('#pass').css("color", "#ffffff");
         $('#pass').css("border-color", "#ffffff");
         $('#descripcion-pass').css("color", "#ffffff");
         $('#repass').css("color", "#ffffff");
         $('#repass').css("border-color", "#ffffff");
         $('#descripcion-repass').css("color", "#ffffff");
         $('#error').css("color", "transparent");
     }
 });
 $('#repass').on('keyup', function () {
     if ($('#repass').val() == '') {
         $('#repass').css("color", "darkorange");
         $('#repass').css("border-color", "darkorange");
         $('#descripcion-repass').css("color", "darkorange");
     } else if ($('#repass').val() != '') {
         $('#repass').css("color", "#ffffff");
         $('#repass').css("border-color", "#ffffff");
         $('#descripcion-repass').css("color", "#ffffff");
         $('#pass').css("color", "#ffffff");
         $('#pass').css("border-color", "#ffffff");
         $('#descripcion-pass').css("color", "#ffffff");
         $('#error').css("color", "transparent");
     }
 });