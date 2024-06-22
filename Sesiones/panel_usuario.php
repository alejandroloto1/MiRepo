<?php
session_start();

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Protegida</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['username']; ?></h2>
    <form action="logout.php" method="POST">
        <button type="submit">Salir</button>
    </form>
</body>
</html>
