<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Evidencia 4</title>


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

        <style>

            h1, footer p {font-style: italic;text-align: center;}

            table caption{font-size: 2rem;font-weight: 500;}
            table td:hover{background: #337ab7}

            .form-group, .form-control, select {width: 100%!important;}
            .btn{width: 49%;}

            footer p {font-weight: 200; line-height:5px}
            footer p a:hover{font-weight: 600; text-decoration: none;}


        </style>


    </head>
    <body>
        <?php
        require_once './presentacion.php';
        require_once './procesamiento.php';

        crearPuestos();
        ejecutar();

        function ejecutar() {
            $accion = $_POST['estado'];
            $fila = $_POST['fila'];
            $silla = $_POST['silla'];

            if (isset($accion) && isset($fila) && isset($silla)) {

                if ($accion === "reservar") {
                    reservarSilla($fila, $silla);
                } else if ($accion === "comprar") {
                    comprarSilla($fila, $silla);
                } else if ($accion === "liberar") {
                    liberarSilla($fila, $silla);
                } else {
                    error();
                }
            } else {
                error();
            }
        }
        ?>

        <header>
            <div class="jumbotron">
                <h1>Sistema de reserva para el teatro</h1>
            </div>
        </header>

        <main class="container-fluid">



            <table class="table table-bordered table-hover">
                <caption class="text-center">Sillas del escenario</caption>
                <tr>
                    <td>Fila / Silla</td>
                    <td>Silla 1</td>
                    <td>Silla 2</td>
                    <td>Silla 3</td>
                    <td>Silla 4</td>
                    <td>Silla 5</td>
                </tr>
                <?php
                        mostrarTabla();
                ?>
            </table>



            <section class="row">
                <article class="col-xs-12 col-md-4 col-md-offset-4">
                    <form action="index.php" method="POST" role="form">

                        <div class="form-group">
                            <label for="fila" class="control-label">Fila:</label>
                            <input type="number" id="fila" class="form-control" name="fila" min="1" max="5" placeholder="Ingresa la fila" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="silla" class="control-label">Silla:</label>
                            <input type="number" id="silla" class="form-control" name="silla" min="1" max="5" placeholder="Ingresa la silla" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="estado" class="control-label sr-only">Seleccionar estado</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="">Seleccionar estado</option>
                                <option value="reservar">Reservar</option>
                                <option value="comprar">Comprar</option>
                                <option value="liberar">Liberar</option>
                            </select>
                        </div>

                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Enviar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                        </div>
                    </form>
                </article>
            </section>
        </main>

        <hr/>
        <footer class="container-fluid text-center">
            <p>Medellín, 2016 - Hecho por Mario Andrés Ruiz.</p>
            <p>Curso de desarrollo web con PHP - Tutora: Ana María Alvarez.</p>
            <p>Actividad de aprendizaje 4.</p>
            <p><a class="w3-text-blue" href="http://oferta.senasofiaplus.edu.co/sofia-oferta/">Cursos virtuales SENA</a></p>
        </footer>

        
        <!-- Scripts de bootstrap y jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>
