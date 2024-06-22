<?php
session_start();
include 'config.php'; // Archivo de configuración de la base de datos

// Verificamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // No encriptamos la contraseña

    // Conexión a la base de datos
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verificamos la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Preparamos la consulta SQL
    $sql = "SELECT id FROM usuarios WHERE username='$username' AND password='$password'";
    
    // Depuración: imprime los valores recibidos y la consulta SQL
    echo "Usuario recibido: $username<br>";
    echo "Contraseña recibida: $password<br>";
    echo "Consulta SQL: $sql<br>";

    $result = $conn->query($sql);

    // Verificamos si se encontró el usuario
    if ($result->num_rows == 1) {
        // Usuario autenticado
        $_SESSION['username'] = $username;
        header("Location: panel_usuario.php");
        exit();
    } else {
        // Credenciales incorrectas
        echo "Usuario o contraseña incorrectos.";
    }

    // Cerramos la conexión
    $conn->close();
}
?>

