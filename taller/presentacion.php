<?php
require_once 'procesamiento.php';

function mostrarTabla() {
    $mostrar = explodeArray();

    foreach ($mostrar as $silla) {
        ?>
        <tr>
            <?php
            foreach ($silla as $datos) {

                echo "<td>" . $datos . "</td>";
            }
            ?>
        </tr>
        <?php
    }
}
