<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Juego de Apuestas con Dados</title>

</head>

<body>
    <?php
    session_start();

    // Comprueba si los datos están disponibles en la sesión
    if (isset($_SESSION["nombre"]) && isset($_SESSION["monto_inicial"])) {
        $nombre = $_SESSION["nombre"];
        $montoInicial = $_SESSION["monto_inicial"];
    } else {
        // Los datos no están disponibles en la sesión, maneja esto como desees
        echo "Los datos no están disponibles en la sesión.";
        exit; // Sale del script si los datos no están disponibles
    }

    // Inicializa las variables del juego
    $nuevoMontoDisponible = $montoInicial; // Esto debe inicializarse con el monto inicial
    $montoApostado = 0; // Inicializa el monto apostado en cero

    // Comprueba si el formulario se ha enviado para realizar una apuesta
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene el monto apostado desde el formulario
        $montoApostado = floatval($_POST["monto_apostado"]);

        // Valida que el monto apostado no sea mayor que el monto disponible
        if ($montoApostado > $nuevoMontoDisponible) {
            echo "El monto apostado no puede ser mayor que el monto disponible.";
        } else {
            // Realiza el juego y actualiza el monto disponible
            // Aquí deberías agregar la lógica del juego y actualizar $nuevoMontoDisponible
            // Por ejemplo, podrías simular el lanzamiento de dados y calcular el resultado.

            // Actualiza el monto disponible después del juego
            $nuevoMontoDisponible -= $montoApostado;
        }
    }
    ?>
    <div class="container-fluid">
        <div class="row bg-color">
            <div class="col-12 p-4">
                <div class="d-flex justify-content-center">
                    <h3>Bienvenido al Juego de Apuestas con Dados</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 bg-player p-3 w-100 d-flex justify-content-star">
                <h4>Jugador: </h4>
            </div>
            <div class="col-4 d-flex justify-content-star bg-data align-items-center">
                <h4><?php echo $nombre; ?></h4>
            </div>
            <div class="col-3 bg-player p-3 w-100 d-flex justify-content-star">
                <h4>Monto Disponible: </h4>
            </div>
            <div class="col-3 d-flex justify-content-star bg-data align-items-center">
                <h4><?php echo "¢" . number_format($nuevoMontoDisponible, 2); ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-6 w-100 d-flex justify-content-star bg-nothing">
            </div>
            <div class="col-3 bg-player p-3 w-100 d-flex justify-content-star">
                <h4>Monto Apostado: </h4>
            </div>
            <div class="col-3 d-flex justify-content-star bg-data align-items-center">
                <h4><?php echo "¢" . number_format($montoApostado, 2); ?></h4>
            </div>
        </div>

        <!-- Formulario para que el jugador ingrese el monto de la apuesta -->
        <div class="row">
            <div class="col-12 d-flex justify-content-center mt-4">
                <form method="POST" action="dosDados.php">
                    <input type="number" name="monto_apostado" placeholder="Ingrese monto de apuesta" max="<?php echo $montoInicial; ?>" required>
                    <button type="submit" class="btn btn-game">Apostar</button>
                </form>
            </div>
        </div>
        <div class=" row mt-4">
            <div class="col-4 m-0 p-0">
                <div class="d-flex justify-content-center bg-title">
                    <h3>Dados</h3>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <img class="imgSize" id="dado1" src="img/fondoBlnco.jpg" alt="Dado 1" />
                    <img class="imgSize" id="dado2" src="img/fondoBlnco.jpg" alt="Dado 2" />
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-game mt-5" onclick="lanzarDados()">
                        <h2>[ JUGAR ]</h2>
                    </button>
                </div>
            </div>
            <div class="col-4 m-0 p-0">
                <div class="d-flex justify-content-center bg-title">
                    <h3>Tablero de Apuestas</h3>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-5">
                    <table border="2px" width="350px" height="100px">
                        <tr class="table">
                            <td id="celda1" style="width:87px" bgcolor="black"></td>
                            <td id="celda2" style="width:87px">2</td>
                            <td id="celda3" style="width:87px">3</td>
                            <td id="celda4" style="width:87px">4</td>
                        </tr>
                        <tr class="table">
                            <td id="celda5" style="width:87px">5</td>
                            <td id="celda6" style="width:87px">6</td>
                            <td id="celda7" style="width:87px">7</td>
                            <td id="celda8" style="width:87px">8</td>
                        </tr>
                        <tr class="table">
                            <td id="celda9" style="width:87px">9</td>
                            <td id="celda10" style="width:87px">10</td>
                            <td id="celda11" style="width:87px">11</td>
                            <td id="celda12" style="width:87px">12</td>
                        </tr>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div id="resultadosDados">
                        Numero Aleatorio:
                        <span id="numeroDado1"></span><br>
                        Numero Aleatorio:
                        <span id="numeroDado2"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div id="sumaDados">La suma de los dados es: <span id="numeroSuma"></span></div>
                </div>
            </div>
            <div class="col-4 m-0 p-0">
                <div class="d-flex justify-content-center bg-title">
                    <h3>Estatus</h3>
                </div>
                <div class="d-flex justify-content-center mt-5"><img class="imgSizeEmo" id="imagenResultado" src="img/fondoBlnco.jpg" alt="emoji 1"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="javascript/dadosGame.js"></script>
</body>

</html>