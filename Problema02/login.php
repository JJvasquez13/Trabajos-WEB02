<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Juego de Apuestas con Dados</title>
    <script type="text/javascript">
        function mostrarVentanaEmergente() {
            alert("Lo sentimos, debes tener al menos 21 años para jugar.");
            setTimeout(function() {
                window.location.href = "login.php";
            }, 5000); // Redirige después de 5 segundos
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-5">
                <div class="d-flex justify-content-center">
                    <h3>Bienvenido al Juego de Apuestas con Dados</h3>
                    <?php
                    session_start(); // Inicia la sesión para mantener los datos

                    // Comprueba si el formulario se ha enviado
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Obtiene los datos del formulario
                        $nombre = $_POST["nombre"];
                        $fechaNacimiento = $_POST["fecha_nacimiento"];
                        $montoInicial = $_POST["monto_inicial"];
                        $cantidadDados = $_POST["cantidad_dados"];

                        // Calcula la edad del jugador
                        $hoy = new DateTime();
                        $nacimiento = new DateTime($fechaNacimiento);
                        $edad = $nacimiento->diff($hoy)->y;

                        // Valida si el jugador cumple con la edad mínima (21 años)
                        if ($edad >= 21) {
                            // Los datos son válidos, almacénalos en la sesión
                            $_SESSION["nombre"] = $nombre;
                            $_SESSION["monto_inicial"] = $montoInicial;

                            // Redirige al juego adecuado según la cantidad de dados
                            if ($cantidadDados == 2) {
                                header("Location: dosDados.php");
                            } elseif ($cantidadDados == 3) {
                                header("Location: tresDados.php");
                            }
                        } else {
                            // El jugador no cumple con la edad mínima, muestra ventana emergente y redirige después de 5 segundos
                            echo "<script>
                                mostrarVentanaEmergente();
                                    </script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="card">
                    <div class="card-header bg-black d-flex justify-content-center align-items-center">
                        <h3>Ingresar Datos</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group mt-2">
                                <label for="username">Nombre: </label>
                                <input type="text" name="nombre" required />
                            </div>
                            <div class="form-group">
                                <label for="username">Fecha de Nacimiento: </label>
                                <input type="date" name="fecha_nacimiento" required />
                            </div>
                            <div class="form-group">
                                <label for="username">Monto Inicial: </label>
                                <input type="number" name="monto_inicial" required />
                            </div>
                            <div class="form-group">
                                <label for="username">Cantidad de Dados (2 o 3): </label>
                                <select name="cantidad_dados" required>
                                    <option value="2">2 Dados</option>
                                    <option value="3">3 Dados</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-pers">Comenzar Juego</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>