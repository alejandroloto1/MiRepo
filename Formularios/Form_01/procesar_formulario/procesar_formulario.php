<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion_bdd.php';

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, password, telefono, direccion) VALUES ('$nombre', '$email', '$password', '$telefono', '$direccion')";

    // Verificar si la inserción fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success mt-4'>Registro exitoso</div>"; // Mensaje de éxito
    } else {
        echo "<div class='alert alert-danger mt-4'>Error: " . $sql . "<br>" . $conn->error . "</div>"; // Mensaje de error
    }

    // Cerrar la conexión
    $conn->close();
}
?>
