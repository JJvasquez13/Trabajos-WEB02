<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles/lista.css" />
    <title>Problema01</title>
  </head>
  <body>
    <div class="container-fluid">
    <div class="row mt-5"><div>
        <div class="row mt-5">
            <div class="col-12 ">
                <div class="d-flex justify-content-center align-content-center">
                    <?php
                        // Obtener el número de imagen seleccionada desde la URL
                        $imagenSeleccionada = isset($_GET['imagen']) ? $_GET['imagen'] : 1;

                        // Define una matriz de datos con información sobre las imágenes
                        $data = array(
                            1 => array(
                                'imagen' => 'images/concepto/normal/onePiece.webp',
                                'serie' => 'One Piece',
                                'año' => 'Desde 1997 hasta la fecha sigue en emisión',
                                'creador' => 'Eiichirō Oda',
                                'observaciones' => $observaciones = file_get_contents('docs/concepto/onePiece.txt')
                            ),
                            2 => array(
                                'imagen' => 'images/concepto/normal/onePunchMan.jpg',
                                'serie' => 'One Punch Man',
                                'año' => 'Desde 2009 hasta la fecha sigue en emisión',
                                'creador' => 'Tomohiro Suzuki',
                                'observaciones' => $observaciones = file_get_contents('docs/concepto/onePunchMan.txt')
                            ),
                            3 => array(
                                'imagen' => 'images/concepto/normal/hunterXHunter.jpe',
                                'serie' => 'Hunter x Hunter',
                                'año' => 'Desde 1998 y se encuentra en hiatus desde 2006',
                                'creador' => 'Yoshihiro Togashi',
                                'observaciones' => $observaciones = file_get_contents('docs/concepto/hunterXHunter.txt')
                            ),
                            4 => array(
                                'imagen' => 'images/concepto/normal/blackClover.jpg',
                                'serie' => 'Black Clover',
                                'año' => 'desde 2015 hasta la fecha sigue en emisión',
                                'creador' => 'Yūki Tabata',
                                'observaciones' => $observaciones = file_get_contents('docs/concepto/blackClover.txt')
                                )
                            );
                        ?>
                    <table border="2" width="750px" >
                        <tr class="p-5">
                            <td rowspan="4">
                            <img src="
                                <?php 
                                    echo $data[$imagenSeleccionada]['imagen'];
                                ?>" style="width: 250px; height: auto;">
                            </td>
                            <td>Serie <hr></td>
                            <td>
                                <?php
                                    echo $data[$imagenSeleccionada]['serie'];
                                ?> <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Año <hr></td>
                            <td>
                                <?php
                                    echo $data[$imagenSeleccionada]['año'];
                                ?> <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Creador <hr></td>
                            <td>
                                <?php
                                    echo $data[$imagenSeleccionada]['creador'];
                                ?> <hr>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-top">Observaciones</td>
                            <td>
                                <?php
                                    echo $data[$imagenSeleccionada]['observaciones'];
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
