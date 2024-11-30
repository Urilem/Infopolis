<?php
include('functions/connection.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $con = connection(); // Establecer la conexión a la base de datos

    $dni = mysqli_real_escape_string($con, $_POST['dni']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (dni, contraseña, Nombre) VALUES ('$dni', '$hashed_password', '$name')";
    if(mysqli_query($con, $sql)){
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registro de Usuario</title>
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            <form action="register.php" method="post">
                <label>DNI: </label>
                <input type="text" name="dni" required>
                <label>Contraseña: </label>
                <input type="password" name="password" required>
                <label>Nombre y apellido: </label>
                <input type="text" name="name">
                <input type="submit" value="Registrar">
            </form>
        </body>
    </html>