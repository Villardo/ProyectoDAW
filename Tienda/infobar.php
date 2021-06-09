<!-- barra informativa -->

<?php
include 'variables.php';

echo '<div class="barra-informativa d-flex justify-content-around">';
    echo '<span>';
        echo '<a href=""><i class="fas fa-map-marked-alt"></i></a> '.$localizacion;
    echo '</span>';
    echo '<span>';
        echo '<a href="javascript:void(0);"><i class="fas fa-clock"></i></a> '.$horario;
    echo '</span>';
    echo '<span>';
        echo 'Contacto:';
        echo'<a href="'.$whatsapp.'"><i class="fab fa-whatsapp-square"></i></a>';
        echo'<a href="'.$telefono.'"><i class="fas fa-phone-square-alt"></i></a>';
        echo'<a href="'.$email.'"><i class="fas fa-envelope-square"></i></a>';
    echo '</span>';
echo '</div>';
?>