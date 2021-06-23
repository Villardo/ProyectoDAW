<!-- barra informativa -->

<?php
include 'variables.php';

echo '<div class="barra-informativa">';
    echo '<div class="row text-center">';
        echo '<div class="col-md-4">
            <span><a href=""><i class="fas fa-map-marked-alt"></i></a> '.$localizacion.'</span>
        </div>';
        echo '<div class="col-md-4">
            <span><a href="javascript:void(0);"><i class="fas fa-clock"></i></a> '.$horario.'</span>
        </div>';
        echo '<div class="col-md-4">
            <span>
                Contacto:
                <a href="#"><i class="fab fa-whatsapp-square"></i></a>
                <a href="#"><i class="fas fa-phone-square-alt"></i></a>
                <a href="#"><i class="fas fa-envelope-square"></i></a>
            </span>
        </div>';
    echo '</div>';
echo '</div>';
?>