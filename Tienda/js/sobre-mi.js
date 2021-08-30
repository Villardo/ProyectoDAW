
$(document).ready(function () {
    $(".sobre-mi-icono").hover(
        function () {
            let img2= $(this).data('ruta');
            document.getElementById('cara').src = img2;
            $('#cara').addClass("animate__animated animate__fadeIn");
            $('#cara').on('animationend webkitAnimationEnd oAnimationEnd',function(){
                $('#cara').removeClass("animate__animated animate__fadeIn");
            });
        },
        function () {
            document.getElementById('cara').src = "images/svg/cara.svg";
            $('#cara').addClass("animate__animated animate__fadeIn")
        });
});

