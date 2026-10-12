<?php
// para que los errores se muestren como mensajes y no como excepciones
mysqli_report(MYSQLI_REPORT_OFF);

// Datos de la conexion (los mismos de HeidiSQL)
$host = "host.docker.internal";   // en Docker, esto es tu PC
$puerto = 3307;
$usuario = "fogar";
$clave = "clave123";
$base = "practicobd";

$conexion = mysqli_connect($host, $usuario, $clave, $base, $puerto);

if (!$conexion) {
    die("No se pudo conectar: " . mysqli_connect_error());
}
mysqli_set_charset($conexion, "utf8mb4");
?>
