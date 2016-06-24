<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Mario Ruiz">
        <meta name="description" content="Página Web práctica con PHP">

        <title>Evidencia - Actividad de aprendizaje 2</title>

        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">


        <style type="text/css">
            header{height: 300px; padding-left: 16px; background: url('http://www.eduroam.co/files/VPWK8EH9MZ2.jpg') center top fixed; background-size: 100% 70%}
            header h1, h3 {color: #fff; font-weight: 600;}
            header h3 {font-style: italic}
            footer{height: 150px}
            
            main {padding-top:20px; padding-bottom: 30px}
            section article table td {color: #f44336;}
            section article table th {text-transform: uppercase;}
            section article table tr:hover{background-color: rgba(0,0,0,.85)!important}
            section article table tr td:hover{background-color: #f44336; color: black;}

            footer p {font-style: italic; font-weight: 200; text-align: center; line-height:5px}
            footer p a {text-decoration: none;}
            footer p a:hover{color:#575757; font-weight: 600;}

            @media screen and (max-width:767px){section table th{font-size: .75em}footer p {line-height: 13px}  }
        </style>

    </head>

    <body>
        <header class="w3-display-container w3-animate-opacity w3-animate-zoom">
            <h1>Actividad De Aprendizaje 2.</h1>
            <h3>Evidencia.</h3>
        </header>

        <main class="w3-main">

            <section class="w3-row">
                <article class="w3-container w3-center">
                    <?php
                    /**
                     * @author Mario Andrés Ruiz Bedoya <Marioarb.97@gmail.com>
                     * Este código está implementado sobre arrays, se crea un arreglo directorio, 
                     * un arreglo colores y una variable tabla que permite mostrar todo en el
                     * navegador. Despues el directorio es impreso por el navegador
                     * 
                     * Implementado para el curso de desarrollo web con PHP
                     * Evidencia de aprendizaje número 2
                     */
                    /**
                     * Declaración de variables globales
                     * @var array $directorio, arreglo con el directorio de usuarios a imprimir
                     * @var array $colores, arreglo con el significado de los colores
                     * @var string $tabla, variable que imprime en el navegador la tabla
                     */
                    $directorio = array(
                        array("nombre" => "Mario Ruiz", "direccion" => "calle 123", "telefono" => 310254, "color" => "Verde"),
                        array("nombre" => "Alberto Gutierrez", "direccion" => "carrera 1", "telefono" => 1234, "color" => "Azul"),
                        array("nombre" => "Andrés Bedoya", "direccion" => "avenida 80", "telefono" => 23085, "color" => "Rojo"),
                    );

                    $colores = array(
                        "Amarillo" => "Riqueza y alegria",
                        "Azul" => "Tranquilidad y Serenidad",
                        "Rojo" => "Amor y pasión"
                    );

                    $tabla;

                    /**
                     * Esta función crea los títulos ubicados en la cabecera de la tabla.
                     * 
                     * @global type $tabla, crea la variable global tabla para modificar la del ámbito
                     * externo de la función.
                     */
                    function cabecera() {
                        global $tabla;

                        $tabla .= "<table class=\"w3-table-all w3-centered\">";

                        $tabla .= "<tr class=\"w3-black\">";
                        $tabla .= "<th>" . "Nombre" . "</th>";
                        $tabla .= "<th>" . "Dirección" . "</th>";
                        $tabla .= "<th>" . "Teléfono" . "</th>";
                        $tabla .= "<th>" . "Color" . "</th>";
                        $tabla .= "<th>" . "Significado" . "</th>";
                        $tabla .= "</tr>";
                    }

                    /**
                     * Esta función "crea" un registro de la tabla, seguido de esto le asigna a la última
                     * columna (significado del color) su valor llamando la función significado
                     * 
                     * @global type $tabla, variable que permite modificar la variable global tabla
                     * @global array $directorio, variable que permite trabajar con el arreglo global directorio
                     * @param type $numUsuario, recibe por parámetro el número del usuario a modificar 
                     */
                    function imprimirUsuario() {
                        global $tabla;
                        global $directorio;
                        $user = 0;

                        foreach ($directorio as $usuario) {
                            $color = $directorio[$user]["color"];
                            $tabla .="<tr>";
                            foreach ($usuario as $datos) {

                                $tabla .="<td>" . $datos . "</td>";
                            }

                            if (!empty($color)) {
                                significado($color);
                            } else {
                                $tabla.="<td>" . "Campo color vacío" . "</td>";
                            }
                            $tabla .="</tr>";
                            $user++;
                        }
                    }

                    /**
                     * Esta función recibe como parámetro el valor del color a comparar,
                     * despues en la estructura switch asigna el valor correspondiente tomado del
                     * arreglo global $colores.
                     * 
                     * @global type $tabla
                     * @global array $colores
                     * @param type $color 
                     */
                    function significado($color) {
                        global $tabla;
                        global $colores;

                        switch ($color) {
                            case "Amarillo":
                                $tabla .="<td>" . $colores["Amarillo"] . "</td>";
                                break;
                            case "Azul":
                                $tabla .="<td>" . $colores["Azul"] . "</td>";
                                break;
                            case "Rojo":
                                $tabla .="<td>" . $colores["Rojo"] . "</td>";
                                break;
                            default :
                                $tabla .="<td>" . "No se encuentra el color" . "</td>";
                                break;
                        }
                    }

                    /**
                     * Esta función crea la tabla 
                     * crea la cabecera
                     * crea los 3 registros del array global $directorio
                     * imprime tabla en el navegador
                     * 
                     * @global array $directorio
                     */
                    function crearTabla() {
                        global $tabla;

                        //crear cabecera de la tabla
                        cabecera();

                        //crear los registros en la tabla
                        imprimirUsuario();

                        //Cerrar etiqueta table e Imprimir tabla en el navegador
                        $tabla .= "</table>";
                        echo $tabla;
                    }

                    crearTabla();
                    ?>
                </article>
            </section>

        </main>
        <hr />
        <footer class="w3-container">
            <p>Medellín, 2016 - Hecho por Mario Andrés Ruiz.</p>
            <p>Curso de desarrollo web con PHP - Tutora: Ana María Alvarez.</p>
            <p><a class="w3-text-blue" href="http://oferta.senasofiaplus.edu.co/sofia-oferta/">Cursos virtuales SENA</a></p>
        </footer>

    </body>
</html>