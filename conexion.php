

<?php
//Creacion de conexion a una base de datos mysql

$host = 'localhost'; // Cambia por tu host
$usuario = 'root'; // Cambia por tu usuario de la base de datos
$contraseña = ''; // Cambia por tu contraseña
$base_datos = 'shu2'; // Cambia por tu nombre de base de datos

// Crear la conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
