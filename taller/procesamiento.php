<?php
$datos = "";
$vendido = "Vendido";
$libre = "Libre";
$reservado = "Reservado";
$liberado = "Liberado";

/**
 * 
 */
//constructor de los puestos del teatro. al crear por primera vez los crea en estado libre
function crearPuestos() {
    $teatro = array();
    for ($i = 1; $i < 6; $i++) {
        for ($j = 1; $j < 6; $j++) {
            //${'teatro'.$i}[$j] = "Libre";
            $teatro[$i][$j] = $GLOBALS['libre'];
        }
    }
    implodeArray($teatro);
}

//get y set estado
function getEstado($fila, $silla) {
    $estado = explodeArray();
    return $estado[$fila][$silla];
}

function setEstado($fila, $silla, $estado) {
    $array = explodeArray();

    if ($estado === "Libre" or $estado === "Reservado" or $estado === "Vendido" or $estado === "Liberado") {
        $array[$fila][$silla] = $estado;
    } else {
        error();
    }
}

function comprarSilla($fila, $silla) {
    validaPuesto($fila, $silla);

    if (getEstado($fila, $silla) == $GLOBALS['vendido']) {
        ?>
        <script>
            alert('Lo sentimos, el puesto ya se encuentra vendido');
        </script>
        <?php
        header("Refresh: 1; URL=index.php");
    } else {
        setEstado($fila, $silla, $GLOBALS['vendido']);
    }
}

function reservarSilla($fila, $silla) {
    validaPuesto($fila, $silla);

    if (getEstado($fila, $silla) == $GLOBALS['vendido']) {
        error();
    } else if (getEstado($fila, $silla) == $GLOBALS['reservado']) {
        ?>
        <script>
            alert('Lo sentimos, el puesto ya se encuentra reservado');
        </script>
        <?php
        header("Refresh: 1; URL=index.php");
    } else {
        setEstado($fila, $silla, $GLOBALS['reservado']);
    }
}

function liberarSilla($fila, $silla) {

    validaPuesto($fila, $silla);

    $estado = getEstado($fila, $silla);

    if ($estado == $GLOBALS['vendido']) {
        error();
    } else if ($estado == $GLOBALS['liberado'] or $estado == $GLOBALS['libre']) {
        ?>
        <script>
            alert('El puesto ya se encuentra libre');
        </script>
        <?php
        header("Refresh: 1; URL=index.php");
    } else {
        setEstado($fila, $silla, $GLOBALS['liberado']);
    }
}

//implode y explode arrays
function implodeArray($array) {
    $cadena = implode(', ', $array);
    $GLOBALS['datos'] = $cadena;
}

function explodeArray() {
    $array = explode(', ', $GLOBALS['datos']);
    return $array;
}

//validar fila y silla
function validaPuesto($fila, $silla) {
    if ($fila < 1 or $fila > 5) {
        ?>
        <script>
            alert('La fila debe estar entre 1 y 5');
        </script>
        <?php
        header("Refresh: 1; URL=index.php");
    } else if ($silla < 1 or $silla > 5) {
        ?>
        <script>
            alert('La silla debe estar entre 1 y 5');
        </script>
        <?php
        header("Refresh: 1; URL=index.php");
    }
}

//error operacion no valida
function error() {
    ?>
    <script>
        alert('La operacion no se ha podido realizar.');
    </script>
    <?php
    header("Refresh: 1; URL=index.php");
}

//obtener cadena
function getCadena() {
    return $GLOBALS['datos'];
}

function enviarCadena() {
    ?>
    <div class="form-group hidden">
        <textarea class="hidden" name="arreglo" id="" cols="30" rows="10" disabled>
    <?php
    $arreglo = getCadena();
    ?>			
        </textarea>
    </div>
    <?php
}
