<!-- navbar -->

<?php
session_start();
include 'variables.php';

echo '<script type="text/javascript" src="js/navbar.js"></script>';
if (isset($_SESSION['usuario_logueado']["nombre"])) {
    $nombre_de_usuario = $_SESSION['usuario_logueado']["nombre"];
}else{
    $nombre_de_usuario = $texto_navbar_mi_cuenta;
}

echo '<nav class="navbar navbar-expand-sm navbar-light bg-light">';
    echo '<a class="navbar-brand" href="#">'.$logo_ruta.'</a>';
    echo '<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">';
        echo '<span class="navbar-toggler-icon"></span>';
    echo '</button>';
    echo '<div class="collapse navbar-collapse" id="collapsibleNavId">';
        echo '<ul class="navbar-nav mr-auto mt-2 mt-lg-0">';
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="inicio.php">'.$texto_navbar_inicio.'</a>';
            echo '</li>';
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="sobre-mi.php">'.$texto_navbar_sobre_mi.'</a>';
            echo '</li>';
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="servicios.php">'.$texto_navbar_servicios.'</a>';
            echo '</li>';
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="productos.php">'.$texto_navbar_productos.'</a>';
            echo '</li>';
            echo '<li class="nav-item">';
                echo '<a class="nav-link" href="contacto.php">'.$texto_navbar_contacto.'</a>';
            echo '</li>';
        echo '</ul>';

        echo '<ul class="navbar-nav ml-auto mt-2 mt-lg-0">';
            echo '<li class="nav-item">';
                echo '<a href="carrito.php"><i class="fas fa-shopping-cart fa-2x"></i></a>';
            echo '</li>';

            echo '<li class="nav-item mr-5">';
                echo '<a class="nav-link btn-formulario" href="#" id="navbar-cuenta" role="button"> ';                                            
                    if (isset($_SESSION['usuario_logueado']["nombre"])) {
                        echo $nombre_de_usuario;
                    }else{
                        echo $texto_navbar_mi_cuenta;                          
                    }  
                echo '</a>';
            echo '</li>';
        echo '</ul>';
    echo '</div>';
    echo '<div class="formulario-modal" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';

        if (isset($_SESSION['usuario_logueado']["nombre"])) {
            echo '<div class="form-structor medio">
                <div class="signup">
                    <h2 class="form-title" id="cerrar-sesion">Está seguro de que quiere desconectarse ?</h2>
                    <div class="form-holder">
                        <form action="cerrar-sesion.php" method="POST">
                            <button type="submit" class="btn btn-primary submit-btn" name="cerrar-sesion" submit-btn">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            </div>';
        }else{
            echo '<div class="form-structor medio">
                <div class="signup">
                    <h2 class="form-title" id="signupTitle">Registrarse</h2>
                    <div class="form-holder">
                        <form>
                            <input type="text" class="form-control" name="usuario_nombre" id="new_inputUser" placeholder="Usuario">
                            <input type="email" class="form-control" id="new_inputEmail" name="usuario_email" placeholder="Email...">
                            <input type="password" class="form-control" name="new_usuario_password1" id="new_inputPassword1" placeholder="Password">
                            <input type="password" class="form-control" name="new_usuario_password2" id="new_inputPassword2" placeholder="Repite la password...">
                            <button type="button" class="btn btn-primary submit-btn" id="btnCrear" name="nuevo_usuario">Crear cuenta</button>
                            <div id="errores"></div>
                        </form>
                    </div>
                </div>
                <div class="login slide-up">
                    <div class="center">
                        <h2 class="form-title" id="loginTitle">Iniciar sesión</h2>
                        <div class="form-holder">
                        <form action="inicio-sesion.php" method="POST">
                            <input type="text" class="form-control" name="usuario_nombre" id="inputUser" placeholder="Usuario">
                            <input type="password" class="form-control" name="usuario_password" id="inputPassword" placeholder="Password">
                            <button type="submit" class="btn btn-primary submit-btn">Iniciar sesión</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>';
        }
    echo '</div>';
echo '</nav>';

if (isset($_SESSION["flag_login_fail"]) && $_SESSION["flag_login_fail"]) {
    echo '<script type="text/javascript">
        Swal.fire({
            icon: "error",
            title: "Vaya...",
            text: "Parece que ha habido un problema al inicia sesión"
        })
    </script>';
    $_SESSION["flag_login_fail"]=false;
}

echo '<script type="text/javascript" src="js/formulario-modal.js"></script>';
?>

    