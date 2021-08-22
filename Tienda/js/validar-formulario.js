//String valido de 3 a 16 caracteres
const nombre = document.getElementById("new_inputUser");
const regex_nombre = /^[a-z0-9_-]{3,16}$/;
const mensaje1 = "El nombre de usuario tiene que ser una cadena valida de 3 a 16 caracteres";

//Email válido
const email = document.getElementById("new_inputEmail");
const regex_email = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
const mensaje2 = "El email tiene que ser válido";

//1 minuscula, 1 mayuscula, 1 numero y al menos longitud de 8
const password = document.getElementById("new_inputPassword1");
const regex_password = /(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/;
const mensaje3 = "La password tiene que tener 1 minuscula, 1 mayuscula, 1 numero y al menos longitud de 8";

const errores = document.getElementById('errores');

let mensajesError = [];

$("#crear").click(function () {
    regex_nombre.test(nombre.value) ? mensajeError("new_inputUser", true) : mensajeError("new_inputUser", false);
    regex_email.test(email.value) ? mensajeError("new_inputEmail", true) : mensajeError("new_inputEmail", false);
    regex_password.test(password.value) ? mensajeError("new_inputPassword1", true) : mensajeError("new_inputPassword1", false);

    if (mensajesError.length > 0) {
        e.preventDefault()
        errores.innerText = messages.join(', ')
    }
});

function mensajeError(idElemento, flagError) {
    switch (idElemento) {
        case "new_inputUser":
            if (flagError) {
                mensajesError.push(mensaje1);
                document.getElementById(idElemento).style.backgroundColor = "#fac0c0";
            } else {
                if (mensajesError.includes(mensaje1)) {
                    mensajesError.splice(mensajesError.indexOf(mensaje1), 1)
                }
                document.getElementById(idElemento).style.backgroundColor = "#fff";
            }
            break;
        case "new_inputEmail":
            if (flagError) {
                mensajesError.push(mensaje2);
                document.getElementById(idElemento).style.backgroundColor = "#fac0c0";
            } else {
                if (mensajesError.includes(mensaje2)) {
                    mensajesError.splice(mensajesError.indexOf(mensaje2), 1)
                }
                document.getElementById(idElemento).style.backgroundColor = "#fff";
            }
            break;
        case "new_inputPassword1":
            if (flagError) {
                mensajesError.push(mensaje3);
                document.getElementById(idElemento).style.backgroundColor = "#fac0c0";
            } else {
                if (mensajesError.includes(mensaje3)) {
                    mensajesError.splice(mensajesError.indexOf(mensaje3), 1)
                }
                document.getElementById(idElemento).style.backgroundColor = "#fff";
            }
            break;
        default:
            break;
    }
}