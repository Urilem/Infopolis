<!--Skibidi dopdopdop yesyes-->
<?php
include('functions/connection.php');
session_start();
session_regenerate_id(true);

if (!isset($_SESSION['dni'])) {
    header("Location: login.php");
    exit();
}

$con = connection();

$sql = 'SELECT * FROM registro ORDER BY Fecha DESC';
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
            <script src="js/script.js"></script>
        </head>
        <body>
            <main>
                <div class="index">
                    <h1>Registro infopolis</h1>
                    <div class="user" id="userDiv">
                        <h2><?php echo isset($_SESSION['nombre']) ? strtoupper($_SESSION['nombre']) : 'Usuario'; ?></h2>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha y hora de <br>entrega</th>
                            <th>Dispositivos</th>
                            <th>Observaciones</th>
                            <th>Profesor/a</th>
                            <th>Encargado/a</th>
                            <th>Devuelto</th>
                            <th>Fecha y hora de devolución</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <th><?= $row['ID']?></th>
                            <th><?= $row['Fecha']?></th>
                            <th><?= $row['Dispositivos']?></th>
                            <th><?= $row['Observaciones'] ? $row['Observaciones'] : '-'?></th>
                            <th><?= $row['Profesor/a']?></th>
                            <th><?= strtoupper($row['Encargados/as'])?></th>
                            <th><?= $row['Devuelto'] ? 'Sí' : 'No'?></th>
                            <th><?= $row['Devuelto'] ? $row['Hora'] : '-'?></th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="buttons">
                    <div class="action">
                        <button onclick="window.location.href='check.php'">Marcar devolución</button>
                        <button onclick="window.location.href='add_movement.php'">Añadir movimiento</button>
                    </div>
                    <div class="logout">
                        <button onclick="runPHP()">Cerrar Sesión</button>
                    </div>
                </div>
            </main>
        </body>
    </html>
<!--Sistema de registro de préstamos - Urile-->