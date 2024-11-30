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
                <form action="functions/add_check.php" method="POST">
                    <h1>Marcar devolución</h1>

                    <h3>ID</h3>
                    <input type="number" name="id" placeholder="ID">
                    <input type="submit" value="Añadir" class="boton">

                    <p id="mensaje">
                        <?php 
                            if(isset($_GET['error']) && $_GET['error']=='incompleto') {
                                echo "Ingrese el ID del registro que quiere actualizar.";
                            }
                            if(isset($_GET['error']) && $_GET['error']=='sql_error') {
                                echo "Error al actualizar el registro: " . mysqli_error($con);
                            }
                            if(isset($_GET['error']) && $_GET['error']=='no_encontrado') {
                                echo "No se encontró un registro para el ID especificado.";
                            }
                        ?>
                    </p>
                </form>

                <button class="volver" onclick="window.location.href='index.php'">Volver</button>
            </main>
        </body>
    </html>