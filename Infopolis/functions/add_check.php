<?php
include('connection.php');

$con = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_registro = intval($_POST['id']);
    $id_registro = mysqli_real_escape_string($con, $id_registro);

    // Obtener el ID del registro más reciente para el profesor
    $sql = "SELECT ID FROM registro WHERE `ID` = '$id_registro' ORDER BY Fecha DESC LIMIT 1";
    $result = mysqli_query($con, $sql);

    if (empty($id_registro)) {
        header('Location: ../check.php?error=incompleto');
    }
    else {
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];

            // Actualizar el registro para marcarlo como devuelto
            $update_sql = "UPDATE registro SET Devuelto = 1, Hora = NOW() WHERE ID = $id_registro";
            if (mysqli_query($con, $update_sql)) {
                echo "Registro actualizado exitosamente.";
                header('Location: ../index.php');
                exit();
            } else {
                header('Location: ../check.php?error=sql_error');
            }
        } else {
            header('Location: ../check.php?error=no_encontrado');
        }
    }
}
?>
