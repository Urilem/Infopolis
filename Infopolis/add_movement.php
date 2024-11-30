<?php
include('functions/connection.php');

$con = connection();

$sql = 'SELECT * FROM registro';
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
    <html lang="es" translate="no">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Infopolis</title>
            <link rel="shortcut icon" href="resources/icon.jpg" type="image/x-icon">
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/add.css">
        </head>
        <body>
            <main>
                <form action="functions/insert_movement.php" method="POST">
                    <h1>Añadir movimiento</h1>

                    <h3>Dispositivos&ast;</h3>
                    <textarea name="dispositivos" placeholder="Dispositivos"></textarea>
                    <h3>Observaciones</h3>
                    <textarea name="observaciones" placeholder="Observaciones"></textarea>
                    <h3>Profesor/a&ast;</h3>
                    <input type="text" name="profesor" placeholder="Profesor/a">
                    <input type="submit" value="Añadir" class="boton">
                    <p id="mensaje">
                        <?php 
                            if(isset($_GET['error']) && $_GET['error']=='incompleto') {
                                echo "Complete todos los campos con un asterisco.";
                            }
                            if(isset($_GET['error']) && $_GET['error']=='error') {
                                echo "Error al añadir el préstamo: " . mysqli_error($con);
                            }
                        ?>
                    </p>
                </form>

                <button class="volver" onclick="window.location.href='index.php'">Volver</button>
            </main>
        </body>
    </html>