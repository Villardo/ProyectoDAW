let modal = document.getElementById("modalUsuario");
let btn = document.getElementById("navbar-cuenta");

const h2IniciarSesion = document.getElementById('loginTitle');
const h2Registro = document.getElementById('signupTitle');

$("#navbar-cuenta").click(function () {
	document.body.parentElement.style.overflow = "hidden";
	$("#modalUsuario").show();
});

window.onclick = function (event) {
	if (event.target == modal) {
		document.body.parentElement.style.overflow = "auto";
		$('#modalUsuario').hide();
	}
}

if (document.getElementById("cerrar-sesion") == null) {
	h2IniciarSesion.addEventListener('click', (e) => {
		let parent = e.target.parentNode.parentNode;
		Array.from(e.target.parentNode.parentNode.classList).find((element) => {
			if (element !== "slide-up") {
				parent.classList.add('slide-up')
			} else {
				h2Registro.parentNode.classList.add('slide-up')
				parent.classList.remove('slide-up')
			}
		});
	});

	h2Registro.addEventListener('click', (e) => {
		let parent = e.target.parentNode;
		Array.from(e.target.parentNode.classList).find((element) => {
			if (element !== "slide-up") {
				parent.classList.add('slide-up')
			} else {
				h2IniciarSesion.parentNode.parentNode.classList.add('slide-up')
				parent.classList.remove('slide-up')
			}
		});
	});
}