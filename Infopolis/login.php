<?php
include('functions/connection.php');
session_start();
session_regenerate_id(true);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $con = connection(); // Establecer la conexión a la base de datos

    $dni = mysqli_real_escape_string($con, $_POST['dni']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT dni, contraseña, nombre FROM usuarios WHERE dni = '$dni'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Error en la consulta SQL: " . mysqli_error($con);
    } else {
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['contraseña'])){
                $_SESSION['dni'] = $dni;
                $_SESSION['nombre'] = $row['nombre']; // Guardar el nombre en la sesión
                header("location: index.php");
                exit(); // Detener la ejecución del script
            } else {
                echo "La contraseña es incorrecta.";
            }
        } else {
            echo "No se encontró el usuario.";
        }
    }
}
?>


<!DOCTYPE html>
    <html lang="es" translate="no">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Infopolis</title>
            <link rel="shortcut icon" href="resources/icon.jpg" type="image/x-icon">
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/login.css">
        </head>
        <body>
            <main>
                <div class="index">
                    <h1>Ingresar a Infopolis</h1>
                </div>
                <form action="login.php" method="post">
                    <label>DNI: </label>
                    <input type="number" name="dni" required>
                    <label>Contraseña: </label>
                    <input type="password" name="password" required>
                    <input type="submit" value="Ingresar" class="ingresar">
                </form>
            </main>
        </body>
    </html>