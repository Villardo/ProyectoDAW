
$(document).ready(function () {
    $(".sobre-mi-icono")
        .mouseenter(function () {
            let img2= $(this).data('ruta');
            document.getElementById('cara').src = img2;         
            $('#cara').addClass("animate__animated animate__fadeIn");

        })
        .mouseleave(function () {
            document.getElementById('cara').src = "images/svg/cara.svg";
            $('#cara').removeClass("animate__animated animate__fadeIn");
        });
});

