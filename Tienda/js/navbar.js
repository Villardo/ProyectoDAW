let mensajesError = [];

//String valido de 3 a 16 caracteres
const regex_nombre = /^[A-Za-z][A-Za-z0-9_]{3,15}$/;

//Email válido
const regex_email = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;

//1 minuscula, 1 mayuscula, 1 numero y al menos longitud de 8
const regex_password = /(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/;

const mensaje1 = "El nombre de usuario tiene que ser una cadena valida de 3 a 16 caracteres";
const mensaje2 = "El email tiene que ser válido y no puede estar vacío";
const mensaje3 = "La password tiene que tener 1 minuscula, 1 mayuscula, 1 numero y al menos longitud de 8 y no estar vacío";
const mensaje4 = "Las passwords no coinciden";
const mensaje5 = "Los campos no pueden estar vacios";


jQuery(function ($) {
  var path = window.location.href;
  $('ul a').each(function () {
    if (this.href === path) {
      $(this).addClass('active');
    }
  });

  $("#btnCrear").click(function () {

    mensajesError = [];

    let nombre = document.getElementById("new_inputUser").value;
    let emailForm = document.getElementById("new_inputEmail").value;
    let password1 = document.getElementById("new_inputPassword1").value;
    let password2 = document.getElementById("new_inputPassword2").value;

    if (!regex_nombre.test(nombre) || nombre.length == 0) {
      mensajesError.push(mensaje1 + "<br>");
    }
    if (!regex_email.test(emailForm) || emailForm.length == 0) {
      mensajesError.push(mensaje2 + "<br>");
    }
    if (!regex_password.test(password1) || password1.length == 0) {
      mensajesError.push(mensaje3 + "<br>");
    }
    if (password1 !== password2) {
      mensajesError.push(mensaje4 + "<br>");
    }
    if (nombre.length == 0 && emailForm.length == 0 && password1.length == 0 && password2.length == 0) {
      mensajesError = mensaje5;
    }

    if (mensajesError.length > 0) {
      Swal.fire({
        html: mensajesError,
        icon: "error",
      })
    } else {
      $.ajax({
        url: "registrar-nuevo-usuario.php",
        type: "POST",
        data: {
          nombre, email: emailForm, password1
        },
        success: function (response) {
          switch (response) {
            case "sqlError":
              Swal.fire({
                icon: "error",
                text: "Ya existe un usuario en la base de datos con ese nombre de usuario o email"
              })
              break;
            case "userAdded":
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                },didClose: (toast) => {
                  location.reload();
                }
              })
              Toast.fire({
                icon: 'success',
                title: "Usuario registrado con éxito"
              })
              break;
            case "error":
              Swal.fire({
                icon: "error",
                title: "Vaya...",
                text: "Parece que ha habido un problema al registrando un nuevo usuario"
              })
              break;
            default:
              break;
          }
        },
      });
    }
  })
});
