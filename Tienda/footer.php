<!-- footer -->

<?php
include 'variables.php';

echo'<footer class="page-footer font-small blue pt-4">';
    echo'<div class="container-fluid text-center">';
        echo'<div class="col mt-3">';
            echo'<p> '.$localizacion.' <br>';
                echo $horario.'<br>';
                echo'<span>';
                    echo'Contacto:';
                    echo'<a href="'.$whatsapp.'"><i class="fab fa-whatsapp-square"></i></a>';
                    echo'<a href="'.$telefono.'"><i class="fas fa-phone-square-alt"></i></a>';
                    echo'<a href="'.$email.'"><i class="fas fa-envelope-square"></i></a>';
                echo'</span><br>';
            echo'</>';
        echo'</div>';
    echo'</div>';
    //<!-- Copyright -->
    echo'<div class="footer-copyright text-center py-3">© 2021 Copyright:';
        echo'<a href="'.$github_ruta.'"> '.$github.'</a>';
    echo'</div>';
echo'</footer>';
?>