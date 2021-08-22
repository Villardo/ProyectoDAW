let modal = document.getElementById("modalUsuario");
let btn = document.getElementById("navbar-cuenta");

const btnIniciarSesion = document.getElementById('login');
const btnRegistro = document.getElementById('signup');

$("#navbar-cuenta").click(function () {
	document.body.parentElement.style.overflow = "hidden";
	if ($("#carousel-controls").length) {
		document.getElementById("carousel-controls").style.display = "none";
	}
	$("#modalUsuario").show();
});

window.onclick = function (event) {
	if (event.target == modal) {
		if ($("#carousel-controls").length) {
			document.getElementById("carousel-controls").style.display = "block";
		}
		document.body.parentElement.style.overflow = "auto";
		$('#modalUsuario').hide();
	}
}

btnIniciarSesion.addEventListener('click', (e) => {
	let parent = e.target.parentNode.parentNode;
	Array.from(e.target.parentNode.parentNode.classList).find((element) => {
		if (element !== "slide-up") {
			parent.classList.add('slide-up')
		} else {
			btnRegistro.parentNode.classList.add('slide-up')
			parent.classList.remove('slide-up')
		}
	});
});

btnRegistro.addEventListener('click', (e) => {
	let parent = e.target.parentNode;
	Array.from(e.target.parentNode.classList).find((element) => {
		if (element !== "slide-up") {
			parent.classList.add('slide-up')
		} else {
			btnIniciarSesion.parentNode.parentNode.classList.add('slide-up')
			parent.classList.remove('slide-up')
		}
	});
});

//background-color: #fac0c0; si eror



// array(6) {
// 	["items_carrito"]=>
// 	array(2) {
// 	  [0]=>
// 	  array(6) {
// 		["producto_id"]=>
// 		string(1) "3"
// 		["producto_nombre"]=>
// 		string(10) "producto 3"
// 		["producto_descripcion"]=>
// 		string(25) "descripcion de producto 3"
// 		["producto_precio"]=>
// 		string(5) "33.49"
// 		["producto_ruta"]=>
// 		string(37) "images/productos/producto3_imagen.png"
// 		["producto_cantidad"]=>
// 		string(1) "2"
// 	  }
// 	  [1]=>
// 	  array(6) {
// 		["producto_id"]=>
// 		string(1) "1"
// 		["producto_nombre"]=>
// 		string(10) "producto 1"
// 		["producto_descripcion"]=>
// 		string(25) "descripcion de producto 1"
// 		["producto_precio"]=>
// 		string(5) "14.99"
// 		["producto_ruta"]=>
// 		string(37) "images/productos/producto1_imagen.png"
// 		["producto_cantidad"]=>
// 		string(2) "10"
// 	  }
// 	}
// 	["items_cantidad"]=>
// 	int(12)
// 	["precio_total"]=>
// 	float(216.88)
// 	["precio_final"]=>
// 	float(108.44)
// 	["usuario_id"]=>
// 	string(1) "4"
// 	["usuario_nombre"]=>
// 	string(8) "ejemplo2"
//   }
  