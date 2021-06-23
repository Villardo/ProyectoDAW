<!-- footer -->

<?php
include 'variables.php';

echo'<div class="page-footer font-small blue pt-4">';
    echo'<div class="container-fluid text-center">';
        echo'<div class="col mt-3">';
            echo'<div>';
                echo'<div>';
                    echo $localizacion;
                echo'</div>';
                echo'<div>';
                    echo $horario;
                echo'</div>';
                echo'<div>';
                    echo ' Contacto:
                    <a href="#"><i class="fab fa-whatsapp-square"></i></a>
                    <a href="#"><i class="fas fa-phone-square-alt"></i></a>
                    <a href="#"><i class="fas fa-envelope-square"></i></a>';               
                echo'</div>';
        echo'</div>';
    echo'</div>';
    //<!-- Copyright -->
    echo'<div class="footer-copyright text-center py-3">© 2021 Copyright:';
        echo'<a href="'.$github_ruta.'"> '.$github.'</a>';
    echo'</div>';
echo'</div>';


echo '<script type="text/javascript" src="js/infobar.js"></script>';


?>