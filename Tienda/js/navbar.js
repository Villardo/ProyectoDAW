
let mensajesError = [];

//String valido de 3 a 16 caracteres
const regex_nombre = /^[a-z0-9_-]{3,16}$/;

//Email válido
const regex_email = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;

//1 minuscula, 1 mayuscula, 1 numero y al menos longitud de 8
const regex_password = /(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/;

const mensaje1 = "El nombre de usuario tiene que ser una cadena valida de 3 a 16 caracteres";
const mensaje2 = "El email tiene que ser válido y no puede estar vacío";
const mensaje3 = "La password tiene que tener 1 minuscula, 1 mayuscula, 1 numero y al menos longitud de 8 y no estar vacío";
const mensaje4 = "Las passwords no coinciden";


jQuery(function ($) {
  var path = window.location.href;
  $('ul a').each(function () {
    if (this.href === path) {
      $(this).addClass('active');
    }
  });

  mensajesError = [];

  $("#btnCrear").click(function () {
    let nombre = document.getElementById("new_inputUser").value;
    let emailForm = document.getElementById("new_inputEmail").value;
    let password1 = document.getElementById("new_inputPassword1").value;
    let password2 = document.getElementById("new_inputPassword2").value;

    if (!regex_nombre.test(nombre)) {
      mensajesError.push(mensaje1);
    }
    if (!regex_email.test(emailForm) && emailForm.length == 0) {
      mensajesError.push(mensaje2);
    }
    if (!regex_password.test(password1) && password1.length == 0) {
      mensajesError.push(mensaje3);
    }
    if (password1 !== password2) {
      mensajesError.push(mensaje4);
    }

    if (mensajesError.length > 0) {
      console.log(mensajesError);
      console.log(mensajesError.values());


      Swal.fire({
        icon: "error",
        title: "Error",
        text: mensajesError
      })
    } else {
      $.ajax({
        url: "http://localhost/ProyectoDAW/Tienda/registrar-nuevo-usuario.php",
        type: "POST",
        data: {
          nombre, email: emailForm, password1
        },
        success: function (response) {
          if (response) {
            window.location.reload();
          } else {
            Swal.fire({
              icon: "error",
              title: "Vaya...",
              text: "Parece que ha habido un problema al registando un nuevo usuario"
            })
          }
        },
      });
    }
  })
});
