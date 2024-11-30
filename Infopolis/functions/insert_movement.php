<?php
include('connection.php');
session_start();
session_regenerate_id(true);

$con = connection();

date_default_timezone_set('America/Argentina/Buenos_Aires');

$fecha = date('Y-m-d H:i:s');
$dispositivos = mysqli_real_escape_string($con, $_POST['dispositivos']);
$observacoines = mysqli_real_escape_string($con, $_POST["observaciones"]);
$profesor = mysqli_real_escape_string($con, $_POST['profesor']);
$encargado = $_SESSION['nombre'];
$devuelto = 'No';

if (empty($dispositivos) || empty($profesor)) {    
    header("Location: ../add_movement.php?error=incompleto");
}
else {
    $sql = "INSERT INTO registro (Fecha, Dispositivos, Observaciones, `Profesor/a`, `Encargados/as`, Devuelto) VALUES ('$fecha', '$dispositivos', '$observacoines', '$profesor', '$encargado', '$devuelto')";
    $query = mysqli_query($con, $sql);
    
    if ($query) {
        header("Location: ../index.php");
    } else {    
        header("Location: ../add_movement.php?error=error");
    }
}
?>
