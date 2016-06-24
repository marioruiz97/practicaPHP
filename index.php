<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica PHP</title>
    </head>
    <body>
        <?php
        /**
         * @author Mario Ruiz <marioarb.97@gmail.com>
         * @link (http://code.sololearn.com/wNhDBVt4SfGk/#php)
         * Este código está implementado sobre arrays vacíos, es necesario agrgegar la forma en que 
         * el usuario pueda ingresar valores por teclado e implementarlos. Sin embargo, para no extender mucho
         * este archivo se deja así. La documentación se hara en el proyecto de NetBeans y no aquí.
         */
        echo "<h2>Se creará un arreglo con la siguiente información. Nombre, Sexo, Edad, Teléfono, Dirección
               y Profesión.</h2>";

        /**
         * @global $personas  
         * Variable global para que todas las funciones puedan acceder a ella  
         * Nótese que es diferente a persona el cual siempre se recibe por parámetro.  
         */
        global $personas;
        
        /**
         * @author Mario Ruiz <marioarb.97@gmail.com>
         * Este método permite definir las dimensiones del array y lo construye
         * dejándolo vacío, luego llama al metodo crearArreglos() para dar
         * valores a las posiciones.
         * @param type $dimension recibe el número de dimensiones del array
         */
        //Requiere llamado a la función
        function crearArreglo($dimension) {
            switch ($dimension) {
                case 0:
                    echo 'Número no válido, no se crea ningún arreglo';
                    break;
                case 1:
                    echo 'Se creará un arreglo de una dimensión (vector) <br/>';

                    $personas = array('', '', '', '', '', '');

                    crearArreglos($personas, 1);

                    break;
                case 2:
                    echo 'Se creará un arreglo de dos dimensiones (matriz) <br/>';

                    $personas = array(
                        "user1" => array('', '', '', '', '', ''),
                        "user2" => array('', '', '', '', '', '')
                    );

                    crearArreglos($personas, 2);

                    break;

                default:
                    echo 'El sistema no puede crear un arreglo de más de 2 dimensiones';
            }
        }
        
        /**
         * Este método recibe el array persona vacío y les da valores accediendo
         * a través de sus índices.
         * @param int $persona recibe el array persona vacío.
         * @param type $dimension para conocer si es multidimensional o no.
         */
        function crearArreglos($persona, $dimension) {
            $tamaño = sizeof($persona);


            for ($i = 1; $i <= $dimension; $i++) {
                for ($j = 0; $j < $tamaño; $j++) {

                    echo "Ingrese valor N° $j (recuerde el orden: 1.Nombre, 2.Sexo, 3.Edad, 4.Teléfono, 5.Dirección, 6.Profesión) <br/>";
                    $persona[$j] = 0;
                }
                echo '<br />';
            }
        }
        
        /**
         * Este método recibe que dato se va a cambiar del array y su nuevo
         * valor. Despues llama a asignarValor() para que este cambie el valor
         * en el array.
         * @param type $persona
         * @param type $dimension
         */
        function cambiarValor($persona, $dimension) { //requiere llamado
            $valores = array('', '', ''); // numUsuario, índice, nuevo valor

            if ($dimension == 2) {
                echo 'Ingrese el número de usuario a modificar';
                $valores[0] = 1;
            }

            echo 'Ingrese índice de variable a modificar (1.Nombre, 2.Sexo, 3.Edad, 4.Teléfono, 5.Dirección, 6.Profesión)';
            $valores[1] = 0;
            echo '<br />' . 'Ingrese el nuevo valor';
            $valores[2] = 0;

            asignarValor($persona, $dimension, $valores);
        }
        
        /**
         * Este método recibe un array $valores con el número del usuario (1 o 2), 
         * el índice a cambiar y el nuevo valor. Despues, el método se encarga de
         * cambiar el valor actual por el nuevo.
         * @param type $persona
         * @param type $dimension
         * @param type $valores array con el índice del dato y el valor a
         * cambiar.
         */
        function asignarValor($persona, $dimension, $valores) {

            if ($dimension == 2) {
                $persona[$valores[0] - 1][$valores[1] - 1] = $valores[2];
            } else {
                $persona[$valores[1] - 1] = $valores[2];
            }
        }
        
        /**
         * Imprime el array
         * @param type $persona
         * @param type $dimension
         */
        function imprimirArrays($persona, $dimension) { //requiere llamado
            $tamaño = sizeof($persona);

            for ($i = 1; $i <= $dimension; $i++) {
                echo "Usuario no.$i : ";

                for ($j = 0; $j < $tamaño; $j++) {

                    echo $persona[j] . ', ';
                }
                echo '<br />';
            }
        }

    //código ejemplo
        echo "<p>" . crearArreglo(1) . "</p";
        echo "<p>" . cambiarValor($personas, 1) . "</p>";
        echo "<p>" . imprimirArrays($personas, 1) . "</p>";
        if(!empty($personas)){
            echo 'No vacío' ;
        }
        ?>
    </body>
</html>
